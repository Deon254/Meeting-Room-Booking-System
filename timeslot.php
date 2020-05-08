<?php
session_start();
if(isset($_GET['date'])){
    $date = $_GET['date'];
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mysqli = new mysqli('localhost', 'root', '', 'smart_health');
    $stmt = $mysqli->prepare("INSERT INTO calendar (name, email, date) VALUES (?,?,?)");
    $stmt->bind_param('sss', $name, $email, $date);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking Successful</div>";
    $stmt->close();
    $mysqli->close();
}

?>

 
 <?php

$duration=30;
$cleanup=0;;
$start="07:00";
$end="19:00";
 function timeslots($duration,$cleanup,$start,$end){
     $start= new DateTime($start);
     $end= new DateTime($end);
     $interval= new DateInterval("PT".$duration."M");
     $cleanupInterval= new DateInterval("PT".$cleanup."M");
     $slots= array();
     
     for($intStart= $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
         $endPeriod= clone $intStart;
         $endPeriod->add($interval);
         if($endPeriod>$end){
             break;
         }$slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
         
     }
     return $slots;
 }
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
	<style>
	a:visited{
		color:white;
	}
	myBtn{
		margin-right:300px;
	}
	</style>
	
  </head>

  <body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
			<li class="active"><a href="equipment.php">Equipment</a></li>
				<li class="active"><a href="foodanddrinks.php">Food and Drinks</a></li>
     
      </ul>
      <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
		
	

	<h2 class="text-center">Book timeslot</h2><hr>
      <div class="row">
          <div class="col-md-12">
              <?php echo isset($msg)?$msg:"";?>
          </div>
          <?php $timeslots=timeslots($duration,$cleanup,$start,$end);
          foreach($timeslots as $ts){
              ?>
          <div class="col-md-2">
              <div class="form-group">
			   
			  <?php if(in_array($ts,$bookings)){
		       ?>
              <button class="btn btn-danger book" disabled><?php echo $ts;?></button>
              <?php }else{?> 
             <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts;?></button>
			  <?php }?>
          </div>
          </div>
          <?php }?>
      </div>
      </div>
	  </div>
	 
<!-- The Modal -->

    
      <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" align="center">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking:<span id="slot"></span></h4>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
              <form action="" method="post">
                    <div class="form-group">
                        <label for="">Timeslot</label>
                        <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
						</div>
                  <div class="form-group">
                      <label for="">Name</label>
                      <input required type="text" readonlyname="name" class="form-control" name="name">
                  </div>
                  <div class="form-group">
                      <label for=" ">Email</label>
                      <input required type="email" readonlyname="email" class="form-control" name="email">
                  </div>
                  <div class="form-group pull-right">
                      <button class="btn btn-primary"type="submit"name="submit">Submit</button>
                  </div>
              </form>
      </div>
          </div>
        </div>
      
    </div>

  </div>
</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script>
          $(".book").click(function(){
              var timeslot=$(this).attr('data-timeslot');
              $("#slot").html(timeslot);
              $("#timeslot").val(timeslot);
              $("#myModal").modal("show");
          })
      </script>
	 
  </body>
</html>