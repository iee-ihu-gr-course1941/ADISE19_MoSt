<?php
session_start();
require_once ("conf.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


$param_user1 = $_SESSION['username'];
$param_code = "";
$err_code = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(empty($_POST["code"])){
		$err_code = "Please enter a code";
        header($_SERVER['PHP_SELF']);
    } else{
		//syndesi se paixnidi me to code
    	$sql = "SELECT session_id, con_num FROM usersstate WHERE con_num = ?";
				
		$result = mysqli_query($link, $sql);
		if($stmt = mysqli_prepare($link, $sql)){
			
			mysqli_stmt_bind_param($stmt, "s", $param_code);

			$param_code = trim($_POST["code"]);

			if(mysqli_stmt_execute($stmt)){
					mysqli_stmt_store_result($stmt);
				
					if(mysqli_stmt_num_rows($stmt) == 1){
								
					mysqli_stmt_bind_result($stmt, $col1, $col2);
					mysqli_stmt_fetch($stmt);
					
					
					//Insert user2 in table
					$sql = "UPDATE usersstate SET user2= '$param_user1' WHERE usersstate.session_id = '$col1' AND usersstate.con_num = '$param_code'";
					mysqli_query($link, $sql);
					
					/*new_id =  $col1; //Save sid to new_id
					 		
					session_write_close();
					session_id($new_id);      //Change sid to same for both players
					session_start();		*/
					header("location: kremala.php");
					
					
					} else{
							$err_code = "Wrong Code";}
		
		
				} else{
					echo "Something went wrong. Please try again later.";
        		}
		}
		mysqli_stmt_close($stmt);
	}
	mysqli_close($link);
}

		



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Sundesi se Paixnidi</title>
<link rel="stylesheet" href="bootstrap.css"/>
<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin-left:40%; margin-top:10%; }
    </style>
</head>

<body>
<div class="wrapper">
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

	<div class="form-group">
		<h1>Player Name: <?php echo $param_user1; ?></h1>
		<h2>Ente Code below</h2>
		<input type="text" name="code" class="form-control" value="<?php echo $err_code?>" onfocus="this.value=''"/>
		<button type="submit" class="btn btn-primary" >PLAY</button>
		Not you? <a href="logout.php">Sign Out</a>
				
	</div>
</form>




