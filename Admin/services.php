<?php
ob_start();
include './includes/header.php';
//include './includes/functions.php';
include './connect.php';


$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

if($do == 'Manage'){
?>


<!-- Begin Page Content -->



        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
            <a href="#" onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Services</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">services</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>PRICE</th>
                      <th>STATUS</th>
                      <th>DELAVERY</th>
                      <th>USERNAME</th>
                      <th>CATEOGRY NAME</th>
                      <th>SUBB CATEOGRY</th>
                      <th>DATE</th>
                      <th>...</th>
                    </tr>
                  </thead>
                
                  <tbody>
                      <?php 
                      $stmt = $conn->prepare("SELECT services.*,cateogries.cat_name AS cateogry_name, users.Fname AS user_name, sub_cateogry.sub_name AS sub_cateogry 
                      FROM services 
                      INNER JOIN cateogries ON cateogries.cat_ID = services.`cat-id`
                      INNER JOIN users ON users.userID = services.`user-id`
                      INNER JOIN sub_cateogry ON sub_cateogry.sub_id = services.subb_id");
                     
                      $serv  = $stmt->execute();
                      while( $serv = $stmt->fetch(PDO ::FETCH_OBJ)) {?>

                     
                    <tr>
                      <td><?php echo $serv->serv_id; ?></td>
                      <td><?php echo $serv->name; ?></td>
                      <td><?php echo $serv->price; ?></td>
                      <td><?php echo $serv->status; ?></td>
                      <td><?php echo $serv->delivery; ?></td>
                      <td><?php echo $serv->user_name; ?></td>
                      <td><?php echo $serv->cateogry_name; ?></td>
                      <td><?php echo $serv->sub_cateogry  ; ?></td>
                      <td><?php echo $serv->date; ?></td>
                      <td><a href="services.php?do=delete&serviceid=<?php echo $serv->serv_id ?>" class="confirm btn btn-danger">Delete</a></td>
                      
                    </tr>

                    <?php  } ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
                      
      <!-- End of Main Content -->

<!-- End of Main Content -->
<?php } elseif($do == 'delete') {

  $service_id = isset($_GET['serviceid']) && is_numeric($_GET['serviceid']) ? intval($_GET['serviceid']) : 0 ;

 $check = checkitems ('serv_id', 'services', $service_id);

 if($check > 0) {
   $stmtd = $conn->prepare("DELETE FROM services WHERE serv_id = :zserv");
   $stmtd ->bindParam("zserv" , $service_id);
   $stmtd->execute();

   $msg = '<div class="alert alert-success">' . $stmtd->rowCount() . 'Record Deleted </div>';

   RedirectIndex($msg,3,'services.php');
 }
else {
  $msg = '<div class="alert alert-danger"> there no such id </div>';
  RedirectIndex($msg,4,'services.php');
}
  //end delete page 
  
} else{
  header("location:404.html");
}

include './includes/footer.php';
ob_end_flush();
?>