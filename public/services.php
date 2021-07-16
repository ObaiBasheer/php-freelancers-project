<?php
ob_start();
include 'init.php';
$msq = '';
$addClass= '';
if(isset($_SESSION['ID'])){

  $id = $_SESSION['ID'];

 

  

  

   

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    /*
    ** MANAGE SERVECES PAGE
    */

    if($do == 'Manage'){

     $sql2 = "
      SELECT services.*,cateogries.cat_name AS cateogry_name, users.Fname AS user_name, sub_cateogry.sub_name AS sub_cateogry 
      FROM services 
      INNER JOIN cateogries ON cateogries.cat_ID = services.`cat-id`
      INNER JOIN users ON users.userID = services.`user-id`
      INNER JOIN sub_cateogry ON sub_cateogry.sub_id = services.subb_id ";

      $serma = $conn->prepare($sql2);
      $serma ->execute();

    
      
        ?>

        <style>
            .col {
              color: #e7305b;
            }
        

          </style>

  
<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Services</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Services</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-12">
              <p class="text-muted lead text-center">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>
              <div class="products-big">
                <div class="row products">
                  <?php 
                      while($i = $serma->fetch(PDO::FETCH_OBJ)) { 
                        $ids = $i->serv_id;  
                        global $ids;
          
                  ?>

                  <div class="col-lg-3 col-md-4">
                    <div class="product">
                      <div class="image"><a href="shop-detail.html"><img src="img/product1.jpg" alt="" class="img-fluid image1"></a></div>
                      <div class="text">
                        <h3 class="h5"><a href="service-details.php?id=<?php echo $ids; ?>"><?php echo $i->name; ?></a></h3>
                        <p class="price">$<?php echo $i->price; ?></p>
                      </div>
                      <div class="ribbon-holder">
                        <div class="ribbon sale"><small><?php echo $i->cateogry_name; ?></small></div>
                        <div class="ribbon new"><small><?php echo $i->user_name; ?></small></div>
                      </div>
                    </div>
                  </div>
                      <?php } ?>
             
            
             
              
             
               
               
                </div>
              </div>
           
              <div class="pages">
                <p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>

              



                   


                  
      

   <?php }

    /*
    ** ADD SERVECES PAGE
    */
    elseif($do == 'Add') {

      $getTitle = 'Add New Services';

        if(isset($id)) {?>
        <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">ADD NEW SERVICES</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="services.php">SERVICES</a></li>
                <li class="breadcrumb-item active">ADD NEW SERVICES</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-12">
          <div class="container con">
            <form class="was-validated" method="POST" action="?do=Insert" enctype="multipart/form-data" autocomplate="off"> 
                <div class="form-group mb-3">
                  <label for="formGroupExampleInput">Title</label>
                  <input type="text"  name="name" class="form-control " id="validationServer01" placeholder="Fully describe your service" required>
                  <span class="de">Fully describe your service in the title.</span>
                </div>
                <div class="form-group">
                <div class="mb-3">
                <label for="validationTextarea">Descriptions</label>
                <textarea name="desc" class="form-control is-invalid" id="validationTextarea" placeholder="Explain your service in detail" required></textarea>
                <div class="invalid-feedback">
                <span class="de">Explain your service in detail.Members should know exactly what to expect from your service. </div>
                </div>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Price</label>
                  <input type="text" name="price" class="form-control" id="formGroupExampleInput" placeholder="PRICING YOUR SERVICE" required>
                  <span class="de">PRICING YOUR SERVICE</span>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput" >delivery Time</label>
                  <div class="mb-3">
                    <select name="delivery" class="custom-select" required>
                      <option value="">Choose...</option>
                      <option value="DAY">1-Day</option>
                      <option value="3-DAY">3-Days</option>
                      <option value="4-DAY">4-Day</option>
                      <option value="WEEK">weeks</option>
                      <option value="2-WEEK">2-weeks</option>
                      <option value="3-WEEK">3-weeks</option>
                      <option value="MONTH">month</option>
                    </select>
                    <div class="de">Select a delivery period that is right for you. The buyer can cancel the service directly in case of delay in delivering the service on time.</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput" >Type Of Tarde</label>
                  <div class="mb-3">
                    <select name="trad" class="custom-select" required>
                      <option value="">Choose...</option>
                      <option value="FELXABLE">Felxable</option>
                      <option value="PAY">Pay For Cash</option>
                      <option value="EXCHANGE">Exchange Services</option>
                   
                    
                    </select>
                    <div class="de">Select The Type Of Trading .</div>
                  </div>
                </div>



                <div class="form-group">
                <div class="row">
                  <div class="col">
                  <div class="mb-3">
                  <script>
                    function showUser(str) {
                      if (str == "") {
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                      } else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                          if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                          }
                        };
                        xmlhttp.open("GET","getitem.php?q="+str,true);
                        xmlhttp.send();
                      }
                    }
                    </script>
                  <?php 
                    $sql = "SELECT  cat_ID, cat_name FROM cateogries";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    

                    ?>
                  <label for="Category">Category:</label>
                    <select  name="cate" onchange="showUser(this.value)" class="custom-select" required>
                      <option value="">Choose...</option>
                      <?php while($info =$stmt->fetch()){ ?>
                      <option value="<?php echo $info['cat_ID']; ?>"><?php echo $info['cat_name']; ?></option>
                    <?php }?>
                      <option value="0">other</option>
                     
                    </select>
                    
                  </div>
                  </div>
                  <div class="col">
                  <div class="mb-3">
                  <label for="Sub Category" >Sub Category:</label>
                      <select id="txtHint" name="sub_cate"  class="custom-select" required>
                    
                        <option value=''></option>
                       
                     
                      </select>
                      
                    </div>
                  </div>
                </div>
                </div>
           

           
               <button class="btn btn-outline-secondary" name="submit" type="submit">Offer Services</button>
          
            </form>




          </div>
                      </div>
                      </div>
                      </div>
        


            <?php
        }else{
          echo '<div class="alert alert-danger">YOUR ARE NOT AUTHERID</div>';
        }
       
    }


     /*
    ** INSERT SERVECES PAGE
    */
    elseif($do == 'Insert') {

      if(isset($_POST['submit'])) {

        

     

        if(isset($id)) {        

          $title    = $_POST['name'];
          $desc     = $_POST['desc'];
          $price    = $_POST['price'];
          $trad     = $_POST['trad'];
          $delivery = $_POST['delivery'];
          $cate     = $_POST['cate'];
          $subCate  = $_POST['sub_cate'];
        
         
           

        
       


          $sqli =

         "INSERT INTO `services`(
            `name`, `description`, `price`,  `status`, `delivery`,  `cat-id`,  `subb_id`, `user-id`, `date`) 
          VALUES 
          (:title,:adesc,:aprice,:atrad,:adeliver,:acate,:asubb,:auser, now())";
          
          $stmt2 = $conn-> prepare($sqli);
           $stmt2->execute(array(
            'title'   => $title,
            'adesc'    =>$desc,
            'aprice'   => $price,
            'atrad'    => $trad,
            'adeliver' => $delivery,
            'acate'     => $cate,
            'asubb'    => $subCate,
            'auser'   => $id
            
          ));

          $count = $stmt2->rowCount();

         if($count > 0) {

          $Msg = '<div class="alert alert-success"> تم إضافه خدمه جديده</div>';

          RedirectIndex($Msg,2,'services.php');

         
        

         

         }

         

           

        }
          
  

        

    



      }else {

        echo '<div class="alert alert-danger">YOUR ARE NOT AUTHERID</div>';

      }

        
    }



     /*
    ** EDIT SERVECES PAGE
    */
    elseif($do == 'Edit') {

        echo 'hello from Edit page ';
    }


     /*
    ** DELETE SERVECES PAGE
    */
    elseif($do == 'Delete') {

        echo 'hello from Delete page ';
    }



}else {
 
    echo   '<div class="alert alert-danger">YOURE ARE NOT REGESTER PLEASE LOG IN </div>'; 
   // RedirectIndex('YOURE ARE NOT REGESTER PLEASE LOG IN',3,'customer-register.php');
            //header('location: customer-register.php');
}

include './includes/footer.php';
ob_end_flush();
