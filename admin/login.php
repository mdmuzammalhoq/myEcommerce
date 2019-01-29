<?php 
  include "../lib/Session.php";
    Session::checkLogin();

 include "../Config/config.php";
 include "../Config/Database.php";
 include "../Config/Format.php";

  $db = new Database();
  $fm = new Format();

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>BCORE Admin Dashboard Template | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
        <img src="assets/img/logo.png" id="logoimg" alt=" Logo" />
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $username = $fm -> validation($_POST['username']);
      $password = $fm -> validation(md5($_POST['password']));

      $username = mysqli_real_escape_string($db->link, $username);
      $password = mysqli_real_escape_string($db->link, $password);

      $query = "SELECT * FROM tbl_user WHERE user_username = '$username' AND user_password = '$password'";
      $result = $db->select($query);
      if($result){
        $value = mysqli_fetch_array($result);
        $row = mysqli_num_rows($result);
        if($row > 0){

          Session::set("login", true);
          Session::set("user_username", $value['username']);
          Session::set("user_id", $value['user_id']);
          header("Location:index.php");
          
        }else{
          echo "<span style ='color: red; font-size=18px; '>No Result Found !!</span>";
        } 
        }else{
          echo "<span style ='color: red; font-size=18px; '>Username or Password Not Matched !!</span>";
      }
    }
  ?>
            <form action="login.php" class="form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your username and password
                </p>
                <input type="text" placeholder="Username" name="username" class="form-control" />
                <input type="password" placeholder="Password" name="password" class="form-control" />
                <button class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
            </form>
        </div>
        
        
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
