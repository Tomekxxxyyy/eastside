<?php
session_start();
if(!isset($_SESSION["id"])){
    $basename = basename($_SERVER['PHP_SELF']);
    if($basename != "index.php"){
		header("Location: ../index.php");
	}
}

include("includes/connect.php");

$basename = basename($_SERVER['PHP_SELF']);
$active_tab = ($basename == "account.php")? "class='active'":"";

if(!isset($_SESSION["id"])){
    $login = "<li><a href='index.php?register'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li><li><a href='index.php?login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
    $user_account = "";
}
else{
    $login = "<li><a href='includes/logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
    $user_account = "<ul class='nav navbar-nav'><li $active_tab><a href='account.php'>User account</a></li></ul>";
}
?>

<!-- view -->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
<title>File upload system</title>
</head>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div navbar-header">
       <a class="navbar-brand" href="index.php">Home</a>
    </div>
      <?php echo $user_account; ?>
    <ul class="nav navbar-nav navbar-right">
      <?php echo $login; ?>
    </ul>
  </div>
</nav>
<body>


