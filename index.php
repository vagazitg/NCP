<?php
require("config.php");
$msg="";
if (isset($_POST["btn-login"])) {
  # code...
$email=$_POST["email"];
$password=$_POST["password"];

$conx=new mysqli(host,username,pwd,db);

$req=$conx->query(" select * from login_info where email='$email' and password='$password' ");

if (mysqli_num_rows($req) >0) {
  # code...
header("location:welcome.php");
}
else
{
  $msg='<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Check your email/password</strong>
</div>';
}
}
?>

<!DOCTYPE html>
<html lang="EN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<style type="text/css">
  
 #mypannel{
position: relative;
top: 230px;

 }
 body
 {
background-image:url('../image/background.jpg');
 }
</style>

  <body>

<div class="container">
<div class="panel panel-default" id="mypannel">
  <div class="panel-body">

<form action="/login/login_check.php" method="POST" role="form">
  <legend>Login to your session</legend>

  <div class="form-group">
    <label for="">Login</label>
    <input type="text" class="form-control" name="email" placeholder="username/email">

<label for="">Password</label>
    <input type="password" class="form-control" name="password" placeholder="password">

  </div>
<center>
  <button type="submit" class="btn btn-success btn-lg " name="btn-login">Login</button>
  <a href="register.php" class="btn btn-lg btn-primary ">Register</a>
  </center>
</form>


  </div>
<center>
<?php
echo $msg;
?>
</center>

  </div>
  </div>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>
