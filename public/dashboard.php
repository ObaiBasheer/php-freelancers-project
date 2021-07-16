<?php
 
include 'init.php';
if(isset($_SESSION['ID'])) {
    

 
    ?>
    <style>
        .dash{
            width:800px;
            margin-top: 50px;
            
        }
        .siz{
            text-align: center;
            margin: 50% auto;
            
        }
        .img {
            opacity: .2;
            cursor: pointer;
            border-radius: 25%;
        }
        .cateo .cl:hover .img {
            opacity: 1;
            
        }
        .new-service .new {
            width: 25%;
            height: 160px;
        }
        
        
    </style>
    <div class="container dash">
        <span class="title">
            <h3>All creative and professional services to develop your business</h3>
        </span>
        <div class="cateo">
        <div class="container">
        <div class="row row-cols-3">
                <div class="col">
            <div class="card bg-dark text-white cl">
                <img src="./imgs/development.png" class="card-img img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center siz">Programming & Development</h5>
                   
                </div>
            </div>


                </div>
                <div class="col">
                <div class="card bg-dark text-white cl">
                <img src="./imgs/development.png" class="card-img img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center siz">Design</h5>
                   
                </div>
            </div>

                </div>
                <div class="col">
                <div class="card bg-dark text-white cl">
                <img src="./imgs/development.png" class="card-img img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center siz">Desin videoes</h5>
                   
                </div>
            </div>

                </div>
                <div class="col">
                <div class="card bg-dark text-white cl">
                <img src="./imgs/development.png" class="card-img img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center siz">E.Marketing</h5>
                   
                </div>
            </div>
    </div>
            <div class="col">
                <div class="card bg-dark text-white cl">
                <img src="./imgs/development.png" class="card-img img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center siz">Business</h5>
                   
                </div>
            </div>
    </div>
            <div class="col">
                        <div class="card bg-dark text-white cl">
                        <img src="./imgs/development.png" class="card-img img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title text-center siz">Distance training</h5>
                        
                        </div>
                    </div>
            </div>

        
        
            <div class="col">
                <div class="card bg-dark text-white cl">
                <a href="#"><img src="./imgs/development.png" class="card-img img" alt="..."></a>
                <div class="card-img-overlay">
                    <h5 class="card-title text-center siz">Writing and translating</h5>
                   
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
    </div>

    <hr />
    <div class="new-service">
        <div class="container dash">
            <h3>New In Karma </h3>

        <div class="container">
     

            <div class="row row-cols-4">
            <?php
                    $se = $conn->prepare("SELECT services.*,cateogries.cat_name AS cateogry_name, users.Fname AS user_name, sub_cateogry.sub_name AS sub_cateogry 
                    FROM services 
                    INNER JOIN cateogries ON cateogries.cat_ID = services.`cat-id`
                    INNER JOIN users ON users.userID = services.`user-id`
                    INNER JOIN sub_cateogry ON sub_cateogry.sub_id = services.subb_id
                    WHERE userID != '".$_SESSION['ID']."' ");
                    $se->execute();
                    while ($show = $se->fetch(PDO::FETCH_ASSOC)){
                        $ids = $show['serv_id'];  
                ?>
                    <div class="col-md-6 col-lg-3">
                      <div class="box-image">
                        <div class="image"><img src="img/portfolio-4.jpg" alt="" class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="content">
                              <div class="name no-mb">
                                <h3><a href="service-details.php?id=<?php echo $ids; ?>" class="color-white" ><small><?php echo $show['name']; ?></small></a></h3>
                              </div>
                              <div class="text">
                                
                                <p class="buttons"><a href="service-details.php?id=<?php echo $ids; ?>" class="btn btn-template-outlined-white">View</a></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <?php }?>
                </div>


             


                

               
           
        </div>
        </div>
    </div>
  
   
    
    





<?php }else{
    echo '<div class="alert alert-danger">YOUE NOT AUTHORIZED</div>';
}




include './includes/footer.php';