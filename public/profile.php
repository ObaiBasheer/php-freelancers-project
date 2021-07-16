<?php
 
include 'init.php';
if(isset($_SESSION['ID'])) {
    $id = $_SESSION['ID'];
    
    ?>
<style>
    .pro-img {
        border-radius: 50%;
    }
</style>

    

    <div class="jumbotron jumbotron-fluid">
    <div class="container">

        <center>
            <img src="./imgs/index5.png" alt="profile Photo" class="pro-img" width="150px" height="150px">
        <?php 
            $profile = "SELECT * FROM users WHERE userID = '" . $id . "' ";
            $stmt = $conn->prepare($profile);
            $stmt->execute();
           $de = $stmt->fetch(PDO::FETCH_OBJ);
            
        ?>
        <h1 class="display-4"><?php echo $de->Fname .'  ' . $de->Lname;
         ?></h1>
        </center>
        
        AboutMe:<p class="lead"><?php echo $de->aboutMe ;?>.</p>

        <p>Country:<b>sudan</b></p>  <p>Services:<b>2</b></p> <p>LastActivity:<b>2</b></p>
        
    </div>
    </div>
    <br />
    <h3>MY SERVICES</h3>
    <div class="container">
           

    </div>
 



   

<?php } 

include './includes/footer.php';