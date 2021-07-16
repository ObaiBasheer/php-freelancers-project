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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Users</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>DATE</th>
                      <th>...</th>
                    </tr>
                  </thead>
                
                  <tbody>
                      <?php 
                      $stmt = $conn->prepare("SELECT * FROM users");
                     
                      $serv  = $stmt->execute();
                      while( $serv = $stmt->fetch(PDO ::FETCH_OBJ)) {?>

                     
                    <tr>
                      <td><?php echo $serv->userID; ?></td>
                      <td><?php echo $serv->Fname; ?></td>
                      <td><?php echo $serv->Lname; ?></td>
                      <td><?php echo $serv->email; ?></td>
                      <td><?php echo $serv->createdTime; ?></td>
                      <td><a href="users.php?do=delete&userid=<?php echo $serv->userID ?>" class="confirm btn btn-danger">Delete</a></td>
                     
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





<?php
}elseif($do == 'delete') {

    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

    $check = checkitems ('userID', 'users', $userid);
  
    if($check > 0) {
      $stmtd = $conn->prepare("DELETE FROM users WHERE userID = :zuser");
      $stmtd ->bindParam("zuser" , $userid);
      $stmtd->execute();
  
      $msg = '<div class="alert alert-success">' . $stmtd->rowCount() . 'Record Deleted </div>';
  
      RedirectIndex($msg,3,'users.php');
    }
  else {
    $msg = '<div class="alert alert-danger"> there no such id </div>';
    RedirectIndex($msg,4,'users.php');
  }
  
}else{
  header("location:404.html");
}
include './includes/footer.php';
ob_end_flush();