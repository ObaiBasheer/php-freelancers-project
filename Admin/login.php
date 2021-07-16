<?php
 session_start();

    
    include 'connect.php';
        $msq = '';
        $addClass= '';
        if(isset($_SESSION['idAdmin'])) {
          
          header("location:index.php");
        
        }else
        if (isset($_POST['loginAdmin'])) {
            $email = $_POST['email'];
            $pass =sha1($_POST['pwd']);

            echo $email;
            echo $pass;

          

      

        if (!empty($email) && !empty($pass)) {
          
            $sql = "SELECT  userID , email , pass FROM users WHERE email=? AND pass=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($email , $pass));
            $info = $stmt->fetch();

            if($stmt->rowCount() > 0) {
     

                $_SESSION['userAdmin'] = $email;// reqister session name
                $_SESSION['idAdmin'] = $info['userID'];

                header("location: index.php");
                exit();
             
             
              
            }else {
                $msq= "Name and password not found";
                $addClass= "alert-danger";
            }
          
        }else {
            $msq = 'USERNAME && PASSWOED MUST NOT BE EMPTIY';
            $addClass = "alert-danger";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KARMA Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="<?php echo $_SERVER['PHP_SELEF']; ?>" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pwd" id="exampleInputPassword" placeholder="Password">
                    </div>
                   
                    
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block"><i class="fa fa-sign-in"></i> Log in</button>
                    
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
