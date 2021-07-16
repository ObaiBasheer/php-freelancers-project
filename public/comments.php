<?php 
include "connect.php";
session_start();
if (isset($_SESSION['ID'])) {
    $reseve = $_GET['userid'];
    $serv   = $_GET['serviceid'];
    $writer = $_SESSION['ID'];
    
    ?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<textarea  class="control-form" name="comment" placeholder="comments">

</textarea>
<button type="submit" name="submit" class="btn btn-primray">post</button>

</form>
<?php

    $comment = $_POST['comment'];

    
  
    $stmt = $conn-> prepare("INSERT INTO `comments`(`serve_id_c`, `user_id_c`, `comment`, `comment_time`) VALUES (aserv,auser,acomment,now()");
    $stmt->execute(array(
                'aserv'   => $serv,
                'auser'    =>$writer,
                'acomment'   => $comment
  ));

    $count = $stmt->rowCount();

    if ($count > 0) {
        echo  '<div class="alert alert-success"> تم إضافه تعليق جديده</div>';
    }
}