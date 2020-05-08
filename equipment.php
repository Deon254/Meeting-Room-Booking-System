<?php
session_start();

		  $choice=$_POST["choice"];
		
		  $chk="";
		   foreach($choice as $chk1){
		  
	   
		      $chk.=$chk1." , ";
	   
	   }		
			   $_SESSION['chk']=$chk;
			 
			
	  
			

	  
	 
?>


