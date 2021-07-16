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
          <h1 class="h3 mb-2 text-gray-800">Main Cateogry </h1>
          <p>TO ADD MORE CATEOGRY CLICK <a class="btn" href="cateogry.php?do=add"><i class="fa fa-plus"></i></a></p>
          <div class="col-md-12">
          <?php  
                $stmt = $conn->prepare("SELECT cat_ID, cat_name FROM cateogries");
                            
                $serv  = $stmt->execute();
                while( $serv = $stmt->fetch(PDO ::FETCH_OBJ)) {
                
                ?>
                  <div class="card shadow mb-4  border-bottom-info">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $serv->cat_name; ?></h6>
                </a>
               
                <?php 
                    $stmt1 = $conn->prepare("SELECT * FROM sub_cateogry WHERE cate_id = '" .$serv->cat_ID . "' ");
                            
                    $sub  = $stmt1->execute();
                    while( $sub = $stmt1->fetch(PDO ::FETCH_OBJ)) {
                    
                    ?>
               
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">

                  
                   
                       <li><?php echo  $sub->sub_name ?></li>
                   
                  </div>
                </div>
                    <?php } ?>
              </div>

              <?php } ?>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- End of Main Content -->





<?php
}elseif($do == 'add') {?>
<div class="container">
      <center><h5 class="alert alert-info">Add New Cateogry</h5></center>

      <form class="user" method="POST" action="?do=insert">
        <div class="container">
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user" name="cat_name" id="exampleFirstName" placeholder="Cateogry Name">
                        </div>
                     
                      </div>
                      

                     
                         
                      </div>
                      <br>

                      <button type="submit" class="btn btn-info  block" name="submited">ADD</button>
        </div>
                        
                      
                     
        </form>
  </div>




<?php }
elseif($do == 'insert' ) {
  if(isset($_POST['submited'])) {

    $catname = $_POST['cat_name'];

    $sqli = "INSERT INTO `cateogries`( `cat_name`) VALUES (:aname)";
    $stmt2 = $conn-> prepare($sqli);
    $stmt2->execute(array(
     'aname'   => $catname
    ));
    $count = $stmt2->rowCount();

    if($count > 0) {

      $Msg = '<div class="alert alert-success"> تم إضافه  قسم جديد</div>';

      RedirectIndex($Msg,2,'cateogry.php');
    }

  }

}

elseif($do == 'edit' ) {

  
}
elseif($do == 'delete' ) {

  
}


else{
  header("location:404.html");
}
include './includes/footer.php';
ob_end_flush();