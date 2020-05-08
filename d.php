<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_health";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Room=$_POST["Room"];
$date=$_POST["date"];
$participants=$_POST["participants"];
 

$_SESSION["Room"] = $Room;
$_SESSION["date"] = $date;
$_SESSION["participants"] = $participants;

		$top=$_POST["top"];
		  $tpk="";
		   foreach($top as $tpk1){
		  
	   
		      $tpk.=$tpk1." , ";
	   
	   }
			   $_SESSION['tpk']=$tpk;
			

		$choice=$_POST["choice"];
		  $chk="";
		   foreach($choice as $chk1){
		  
	   
		      $chk.=$chk1." , ";
	   
	   }		
			   $_SESSION['chk']=$chk;
			 
			header ("Location:book.php");
?>










