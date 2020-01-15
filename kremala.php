<?php session_start(); 
require_once "conf.php";
   
    $noletter="";
	$letter="";

	//Sundesi me tin vasi kremala
	mysqli_select_db( $link,'kremala'); 
	if (! mysqli_select_db( $link,'kremala')) {
		       echo( "Adunati i sundesi metin vasi</P>" );
		       exit();
	}	
	
	   
	if($_SERVER["REQUEST_METHOD"] == "POST"){
			
	
			if(empty($_POST["letter"]) || $_POST["letter"] == "Please enter a letter" ){
				$noletter= "Please enter a letter";
			        	header($_SERVER['PHP_SELF']);
			} else{
	    
	    		$letter=$_POST["letter"];
	    		
	    	}     
	}                
	
	 
							
						
				
	

	
	$sql="SELECT * FROM gamestate";
	$result=mysqli_query($link, $sql);
	$temp = mysqli_fetch_assoc($result); 
	$word= $temp["word"];
	$att= $temp["attempts"];
	$turn= $temp["turn"];
	$answer = str_split($word);
	//print_r($answer) ;
	//$table = json_encode($temp);
	
	

	
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Kremala</title>
<link rel="stylesheet" href="bootstrap.css"/>
<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin-left:40%; margin-top:10%; }
    </style>
</head>
    
        
    <body>
    <h1 style="text-align:center">KREMALA</h1>  
    <h1 >Player : <?php echo $_SESSION['username']; ?></h1>   
    
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" > 
            <div style="text-align:center">
            	<p><?php foreach ($answer as $s) {
							echo " _";
						}  				
					?></p>
            	<p><?php echo "Remaining wrong answers : ". $att; ?></p>
                Guess a letter :
                <input type="text" value="<?php echo $noletter?>" name="letter" maxlength="1" onfocus="this.value=''"/>
                <input type="submit" name="koumpi" value="Guess!"/>
                <input type="hidden" name="counter" value="<?php echo $_SESSION['counter']; ?>" />
            </div>
    </form>
    
    </body>

    


</html>