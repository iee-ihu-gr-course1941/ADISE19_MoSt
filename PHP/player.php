<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
	
	include("conf.php");
    
    
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Epilogi Paixnidiou</title>
<link rel="stylesheet" href="bootstrap.css"/>
<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 450px; padding: 20px; margin-left:40%; margin-top:10%; }
    </style>
</head>

<body>
<div class="wrapper">
<form  method="post" action="neo_paixnidi.php"  >

	<h1>Player Name:<?php echo $_SESSION['username']; ?></h1>
	<button type="submit" class="btn btn-primary" >New Game</button>

</form> 

<form  method="post" action="sundesi_paixnidi.php"  >
<button type="submit" class="btn btn-default" >Connect to Game</button>
</form> 

Not you? <a href="logout.php">Sign Out</a>
</div>



</body>

</html>
