<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />





</head>



 <script>
  $(document).ready(function(){
	  var minDate=new Date();
	  $("#date").datepicker({
		  showAnim:'drop',
		  numberOfMonth:1,
		  minDate:minDate,
		  dateFormat:'yy/mm/dd'
		
	  });
  });
  </script>
  
  <script>
$(document).ready(function(){
 $('#choice').multiselect({
  nonSelectedText: 'Select Equipment',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'300px'
 });
 
 
});
</script>


<script>
$(document).ready(function(){
 $('#top').multiselect({
  nonSelectedText: 'Select Food and Drinks',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 
});
</script>

<body>

    

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Home</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
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
    				 //here is your page text
							}
						else
						{

							// PHP program to pop an alert 
							// message box on the screen 

							// Display the alert box 
									echo '<script>alert("Sorry please login first before visiting this page!");window.location="login1.php";</script>'; 


						}
								
                               							//   header("location:login1.php");

							//echo 'Sorry please login first before visiting this page!'; //also a redirect can be made here instead.
								


										?>	
						
                            <li class="active"><?php echo "welcome"." ".$_SESSION["user"];?></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		
<style>
body {
  background-image: url('images/Sample3 room.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
    font-family: Trebuchet MS;
}
</style>

		
		
		
	

        <div class="content mt-3">
            <div class="animated fadeIn">
			<form action="d.php" method="POST">
			
	
	
       
                                            <div class="col-lg-10" align="center">
                                                <div class="card" align="center">
                                                    <div class="card-header text-center">
                                                        <strong>Book Appointment </strong> 
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                              
																	<div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Room</label></div>
                                                                    <div class="col-12 col-md-9">
      <?php
    $dbserver = "localhost";
    $dbusername = "root";
    $password="";
    $dbname="smart_health";
    
    $connect=mysqli_connect($dbserver,$dbusername,$password,$dbname);							
    $status="Present";                                                       
    $result = mysqli_query($connect,"SELECT `RoomName` FROM `room`");

    $Room = [];
?>

<form method="post" action="d.php">
<select name="Room"> 

<?php
    while($row = mysqli_fetch_array($result))
    {
        array_push($Room,$row[0]);
        echo '<option>'. $row[0] .'</option>';
    }													
?>   
			</form>																
																			
                                                                        </select><small class="help-block form-text"> Please enter your room</small>
                                                                    </div>
                                                                </div> 
																		<form method="post" action="d.php">	
																 <div class="row form-group">
															<div class="col col-md-3"><label for="date" class=" form-control-label">Date</label></div>
															<div class="col-12 col-md-9"><input required="true" type="text" placeholder="Date" name="date" required="true" id="date" class="form-control"><small class="help-block form-text">Please enter preferred date</small></input></div>
															</div>         															
                       

																
																
	
								
     <div class="row form-group">
            <div class="col col-md-3">
			<label for="participants" class=" form-control-label">No. of participants</label>
			</div>
            <div class="col-12 col-md-9">
			
			<style>
			 
			.form-control{width: 200px; margin-bottom: 10px;}
			</style>
			<input size="16" type="number" class="form-control" id="participants" name ="participants" placeholder="No. of participants" required="true" >
			</input>
			<small class="help-block form-text"> Please enter the number of participants</small>
			</div>
			
            </div> 

																
																	<div class="row form-group">
                                                                    <div class="col col-md-3">
																	<label for="select" class=" form-control-label">Equipment</label>
																	</div>
																	  <form action ="d.php" method="post" id="framework_form">
																
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

     <select id="choice" name="choice[]" multiple class="form-control">
	 <?php
    while($row = mysqli_fetch_array($result))
    {
        array_push($choice,$row[0]);
        echo '<option>'. $row[0] .'</option>';
    }													
?>   
	

     </select>
    
																			<small class="help-block form-text"> Please enter your equipment</small>
																			</div>
                                                                    
																	</form>	
																	</div>	
																	
																	
																	<div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Food and Drinks</label></div>
                                                                    <div class="col-12 col-md-9">
																	
      <?php
    $dbserver = "localhost";
    $dbusername = "root";
    $password="";
    $dbname="smart_health";
    
    $connect=mysqli_connect($dbserver,$dbusername,$password,$dbname);							
    $status="Present";                                                       
    $result = mysqli_query($connect,"SELECT `food` FROM `foodstuff`");

    $top = [];
?>
     <select id="top" name="top[]"multiple class="form-control">
	 <?php
    while($row = mysqli_fetch_array($result))
    {
        array_push($top,$row[0]);
        echo '<option>'. $row[0] .'</option>';
    }													
?>   
	

     </select>
    
																		<small class="help-block form-text"> Please enter your Food and Drinks</small>
                                                                    </div>
                                                                </div> 								
																	
																	
																	
																	
																	
																	</form>
                                                          </div> 			
                       
		




			
                                                            
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                </div>
                                               
                                                </div>
												
					<style>
					.card{
						
						background-color: transparent;
						background: rgba(0, 0, 0, 0.5); 
						  color: #f1f1f1; /* Grey text */
						    position: absolute; /* Position the background text */
							 padding: 20px;
							 margin-left:300px;
						



						
					}
					</style>
					
                                     
                                <!-- Right Panel -->

                            <script src="vendors/jquery/dist/jquery.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>

                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
					</form>
</body>
</html>

	 
	 
		
