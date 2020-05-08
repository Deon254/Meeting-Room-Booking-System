<?php
  session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_health";

// Create connection
$connect=mysqli_connect($servername,$username,$password,$dbname);

if(isset($_POST['delete'])){
$Room=$_SESSION["Room"];
$date=$_SESSION["date"];
$Department=$_SESSION["Department"];
$timeslot =$_POST["timeslot"];
$email =$_POST["email"];
$name=$_POST["name"];
$sql="DELETE FROM `calendar` WHERE `Room`='$Room' AND `date`='$date' AND `Department`='$Department' AND `timeslot`='$timeslot' AND `email`='$email' AND `name`='$name'";
	
if(mysqli_query($connect,$sql)){

	echo "success";
}
else{
	
	echo "failure";
}
}
	
?>
 <!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=50%, initial-scale=0.5">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
	<style>
	a:visited{
		color:white;
	}
	</style>
  </head>

  <body>
  <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
              <form method="post"">
			  <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Delete Appointment </strong> 
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="row form-group">
            <div class="col col-md-3"><label for="timeslot" class=" form-control-label">Timeslot</label></div>
            <div class="col-12 col-md-9"><input required="true" type="text" placeholder="Timeslot" name="timeslot" required="true" id="timeslot" class="form-control"><small class="help-block form-text">Please enter timeslot</small></input></div>
            </div>   
       <div class="row form-group">
            <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
            <div class="col-12 col-md-9"><input required="true" type="text"  placeholder="Name" name="name" required="true" id="name" class="form-control"><small class="help-block form-text">Please enter name</small></input></div>
            </div>   
       <div class="row form-group">
            <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
            <div class="col-12 col-md-9"><input required="true" type="email"   placeholder="Email" name="email" required="true" id="email" class="form-control"><small class="help-block form-text">Please enter corresponding email address</small></input></div>
            </div>   	
                  <div class="form-group pull-right">
                      <button class="btn btn-primary"type="delete"name="delete">Delete</button>
					   <button class="btn btn-danger" id="myBtn"><a href="book.php">Back</a></button>
                  </div>
              </form>
      </div>
          </div>
        </div>
		</body>
		</html>