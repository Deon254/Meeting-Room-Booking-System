<?php
session_start();


		 $food=$_POST["food"];
		   
		  $tpk="";
		   foreach($food as $tpk1){
		  
	   
		      $tpk.=$tpk1." , ";
	   
	   }

			   $_SESSION['tpk']=$tpk;
			


	  
 
	  
?>
