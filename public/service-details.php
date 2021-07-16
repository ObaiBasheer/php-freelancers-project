<?php


    include 'init.php'; 
    if (isset($_SESSION['ID'])) { 
      if (isset($_GET['id'])) {
          $id = $_GET['id'];

          $sql2 = "
      SELECT services.*,cateogries.cat_name AS cateogry_name, users.Fname AS user_name, sub_cateogry.sub_name AS sub_cateogry 
      FROM services 
      INNER JOIN cateogries ON cateogries.cat_ID = services.`cat-id`
      INNER JOIN users ON users.userID = services.`user-id`
      INNER JOIN sub_cateogry ON sub_cateogry.sub_id = services.subb_id  WHERE serv_id = '".$id."'";

          $serma = $conn->prepare($sql2);
          $serma ->execute(); ?>
        
    
        <head>  
        


        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head> 
  
   
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2"> services detail</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Portfolio services detail</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <section class="bar no-padding-bottom">
            <div class="row">
              <div class="col-md-12">
                <div class="heading">
                  <?php while ($det = $serma->fetch(PDO::FETCH_ASSOC)) { ?>
                  <h2><?php echo $det['user_name']; ?></h2>
                </div>
                <?php $use = $conn->prepare("SELECT userID, aboutMe FROM users WHERE Fname = '" .$det['user_name']."' ");
                        $use->execute();
                        $aboutme = $use->fetch(PDO::FETCH_ASSOC);
                ?>
                <p class="lead no-mb"><?php echo $aboutme['aboutMe']; ?>.</p>
              </div>
            </div>
          </section>
          <section class="bar">
            <div class="row portfolio-project">
              <div class="col-sm-8">
                <div class="project owl-carousel mb-4">
                  <div class="item"><img src="img/main-slider1.jpg" alt="" class="img-fluid"></div>
                  <div class="item"><img src="img/main-slider2.jpg" alt="" class="img-fluid"></div>
                  <div class="item"><img src="img/main-slider3.jpg" alt="" class="img-fluid"></div>
                  <div class="item"><img src="img/main-slider4.jpg" alt="" class="img-fluid"></div>
                </div>
              </div>

              

                    
            

              <div class="col-sm-4">
                <div class="project-more">
                  <h4>Client</h4>
                  <p><?php echo $det['user_name']; ?></p>
                  <h4>Services</h4>
                  <p><?php echo $det['name']; ?></p>
                  <h4>cateogry</h4>
                  <p><?php echo $det['cateogry_name'] . ' / '. $det['sub_cateogry']; ?></p>
                  <h4>Dates</h4>
                  <p><?php echo $det['date'];?></p>
                  <h4>Order Service</h4>
                  
                  <button class="btn btn-info  start_chat" data-touserid="<?php echo $aboutme['userID']; ?>" data-tousername="<?php echo $det['user_name']; ?>">Start Chat</button>

                  <div id="user_model_details"></div>

  

                </div>
              </div>
              <div class="col-sm-12">
                <div class="heading">
                  <h3>Project description</h3>
                </div>
                <p><?php echo $det['description']?>.</p>
                <p></p>
                <section>
                  <div class="row portfolio">
                    <div class="col-md-12">
                      <div class="heading">
                        <h3>Comments</h3>
                      </div>
                    </div>
                   
                    <div class="col-md-6 col-lg-3">
                 
                    <a  href="comments.php?userid=<?php echo $det['user_name']; ?> && serviceid=<?php echo $det['serv_id']; ?> class="btn btn-outline-secondary" name="submit" type="submit">Offer Services</button>
                        
                     
            
                  
                    </div>
             
                
                 
                  
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
      
<script>  
$(document).ready(function(){



 setInterval(function(){
  update_last_activity();
 
  update_chat_history_data();
 }, 5000);



 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }

 function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  modal_content+= '<button type="button" name="pay" id="'+to_user_id+'" class="btn btn-info send_chat"><a href="http://localhost:4242">pay</a></button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
 
 });

 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    //$('#chat_message_'+to_user_id).val('');
    var element = $('#chat_message_'+to_user_id);
    element[0].setText('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
 });

 $(document).on('focus', '.chat_message', function(){
  var is_type = 'yes';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {

   }
  })
 });

 $(document).on('blur', '.chat_message', function(){
  var is_type = 'no';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    
   }
  })
 });

 $('#uploadFile').on('change', function(){
  $('#uploadImage').ajaxSubmit({
   target: "#group_chat_message",
   resetForm: true
  });
 });
 
});  
</script>
                      

                  
                  <?php }
      }
}




else {
  echo '<div class="alert alert-danger"> please login </div>';
}

include './includes/footer.php';
?>
