<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once ("conf.php");

$sql = "DELETE FROM usersstate WHERE user1 = ?";

if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_user1);
            $param_user1 = $_SESSION['username'];
            mysqli_stmt_execute($stmt);
			} 
else{
            echo "Oops! Something went wrong. Please try again later.";
    }



$sql = "INSERT INTO usersstate (user1, session_id, con_num) VALUES (?, ?, ?)";

        
$stmt = mysqli_prepare($link, $sql);
	
	mysqli_stmt_bind_param($stmt, "sss", $param_user1, $param_session, $param_conum);
		
	$param_user1 = $_SESSION['username'];
    $param_session = session_id();
    $param_conum = rand(1000,9999);
    
   if(mysqli_stmt_execute($stmt)){
		
	} 
	else{
		echo "Something went wrong. Please try again later.";
    } 
    
mysqli_stmt_close($stmt);
    
    
    
mysqli_close($link);




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Neo Paixnidi</title>
<link rel="stylesheet" href="bootstrap.css"/>
<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 450px; padding: 20px; margin-left:40%; margin-top:10%; }
    </style>
</head>

<body>
<div class="wrapper">
<form method="post" action="duskolia.php"  >

	<h1>Player Name: <?php echo $param_user1; ?></h1>
	<h2>Code: <?php echo $param_conum; ?></h2>
	<p>Give this code to your friend!</p>
	<p>Waiting for Player2</p>
	<button type="submit" class="btn btn-primary" >PLAY</button>

</form>



Not you? <a href="logout.php">Sign Out</a>
</div>



</body>

</html>
