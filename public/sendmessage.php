<?php 
                $q = intval($_GET['q']);

                $dsn = 'mysql:host=localhost;dbname=servex';
                $user     = 'root';
                $password = '';
                $conn = new PDO($dsn, $user, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $idsend  = $_SESSION['ID'];


                  $message = $_POST['message'];
                  $fromWho = $idsend;
                  $to      = $idsend;
                  
                  $chat = $conn->prepare("INSERT INTO  `chatBox`( `chat_body`, `send_to`, `from_who`) VALUES (:amessage,:asender,:aresev)"); 
                  $chat->execute(array(
                    'amessage' => $message,
                    'asender'  => $idsend,
                    'aresev'   => $to
                  ));
                  ?>