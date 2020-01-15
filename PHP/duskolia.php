<?php
session_start();
require_once ("conf.php");

$sql = "DELETE FROM gamestate ";
mysqli_query($link, $sql);

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(empty($_POST["duskolia"])){
		
        header($_SERVER['PHP_SELF']);
    } else{
    	
		//epilogi tyxaias kryfis lexis

		$number=rand(1,10);
		$sql="SELECT wname FROM words WHERE (wid=$number)";
		$result=mysqli_query($link, $sql); 
		$row = mysqli_fetch_assoc($result);
		$sword= $row["wname"]; 
				
		$attempts =$_POST['duskolia'];
		
		$user1 = $_SESSION['username'];
		
		//eisagogi ton dedomenon sto gamestate
		$sql = "INSERT INTO gamestate (word, attempts, turn) VALUES ('$sword', '$attempts', '$user1')";
		mysqli_query($link, $sql);
			
			mysqli_close($link);
			header("location: kremala.php");
			exit;
			
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Duskolia</title>
<link rel="stylesheet" href="bootstrap.css"/>
<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 450px; padding: 20px; margin-left:40%; margin-top:10%; }
    </style>
</head>
    <body>
         <div class="wrapper">
           <form method="post" action="duskolia.php">
             

                                <p> 
			   Easy: You can guess wrong 10 times.   
                                <button type="submit" name="duskolia" value="10" class="btn btn-primary" >EASY</button></p>
                               
                                <p>
			   Medium : You can guess wrong 7 times.
                                <button type="submit" name="duskolia" value="7" class="btn btn-primary" >MEDIUM</button></p>
                                
								<p>
          	   Hard: You can guess wrong 5 times. 
                                <button type="submit" name="duskolia" value="5" class="btn btn-primary" >HARD</button></p>
                                
                               
                                
                                
                
            </form>
        </div>      
    </body>
</html>
