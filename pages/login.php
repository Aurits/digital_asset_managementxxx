<?php require('session.php');?>
<?php if(logged_in()){ ?>
          <script type="text/javascript">
            window.location = "index.php";
          </script>
    <?php
    } ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Digital-Asset-Management-System</title>

  <!--<link rel="icon" href="https://www.freeiconspng.com/uploads/sales-icon-7.png">-->

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<!--<title>Login and Registration</title>-->
<link rel="stylesheet" href="../css/login.css" type="text/css">
</head>
<body>
<hr>
<div class="container">
<div class="card">
<div class="inner-box" id="card">
<div class="card-front">
<h2>Victoria University Digital Asset Management System</h2><br/><br/>
<form class="user" role="form" action="processlogin.php" method="post">
<input class="input-box" placeholder="Username" name="user" type="text" autofocus>
<input class="input-box" placeholder="Password" name="password" type="password" value="">
<button type="submit" class="submin-btn" name="btnlogin">Login</button>
<input type="checkbox"><span>Remember Me</span><br/><br/><br/>
<p><center><marquee>&copy 2023 Victoria University, All Rights Reserved</marquee></center></p>
<!--<button type="button" class="btn" onclick="openRegister()">New Here</button>
<a href="">Forgot Password</a>
</div>
<div class="card-back">
<h2>REGISTER</h2>
<form action="">
<input type="text" class="input-box" placeholder="Your Name" required>
<input type="email" class="input-box" placeholder="Your email id" required>
<input type="password" class="input-box" placeholder="Your password" required>
<button type="submit" class="submin-btn">Register</button>
</form>
<button type="button" class="btn" onclick="openLogin()">Have Account</button>
<a href="">Forgot Password</a>-->
</div>
</div>
</div>
</div>
</form>
<hr>
 <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>
<script>
var card = document.getElementById("card");
function openRegister(){
card.style.transform = "rotateY(-180deg)";
}
function openLogin(){
card.style.transform = "rotateY(0deg)";
}
</script>
</html>
