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
	
						if($_SESSION["user"]==true)
					{
							//echo "welcome"." ".$_SESSION["user"];
						}
								else
							{
									echo "Error";
									}
									
									
									
if(isset($_POST['submit'])){
	
		  $choice=$_POST["choice"];
		
		 
		  $chk="";
		   foreach($choice as $chk1){
		  
	   
		      $chk.=$chk1." , ";
	   
	   }
	  $sql="Insert into equipment(choice) values('$chk')";
       	   if($conn->query($sql)==true){
			   $_SESSION['chk']=$chk;
			 
			
			   echo "$chk";
			  //header ("Location:foodanddrinks.php"); 
				
	  }
	  else{
		  echo "Error";
	  }
 }
	  
	 
?>




<!DOCTYPE html>
<html>
 <head>
  <title>Equipment</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 align="center">Bootstrap Multi Select Dropdown with Checkboxes using Jquery in PHP</h2>
   <br /><br />
   <div class="form-group">
  <form action ="equipmentsample.php" method="post" id="framework_form">
 
     <label>Select which Framework you have knowledge</label>
	                                                               <div class="col-12 col-md-9">
      <?php
    $dbserver = "localhost";
    $dbusername = "root";
    $password="";
    $dbname="smart_health";
    
    $connect=mysqli_connect($dbserver,$dbusername,$password,$dbname);							
    $status="Present";                                                       
    $result = mysqli_query($connect,"SELECT `equipment` FROM `dep`");

    $choice = [];
?>
     <select id="choice" name="choice[]"multiple class="form-control">
	 <?php
    while($row = mysqli_fetch_array($result))
    {
        array_push($choice,$row[0]);
        echo '<option>'. $row[0] .'</option>';
    }													
?>   
	

     </select>
    </div>
    <div class="form-group">
     <input type="submit" class="btn btn-info" name="submit" value="submit" />
    </div>
   </form>
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('#choice').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 
});
</script>