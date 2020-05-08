<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'smart_health');
if(isset($_SESSION['date'])){
    $date = $_SESSION['date'];
	//$date=$_SESSION['date'];
	$stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
            
            }
            
            $stmt->close();
        }
    }
    
}

if(isset($_POST['submit'])){
	$timeslot = $_POST['timeslot'];
	$Department=$_POST["Department"];
	$title=$_POST["title"];
	//$title=$_SESSION["title"];
	//$timeslot=$_SESSION['timeslot'];
	$participants=$_SESSION["participants"];
	$Room=$_SESSION["Room"];
	$user=$_SESSION["user"];
	$chk=$_SESSION['chk'];
	$tpk=$_SESSION['tpk'];

	
	$stmt = $mysqli->prepare("select * from bookings where date = ? AND timeslot = ? AND Room = ?  ");
    $stmt->bind_param('sss', $date,$timeslot,$Room);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
          $msg = "<div class='alert alert-danger'>Already booked</div>";

			
		}else{
									 
				mysql_connect("localhost","root","");
				mysql_select_db("smart_health");
				$query=mysql_query("select * from multilevel where user='$user'");
						if (!$query) { 
						// add this check.
					die('Invalid query: ' . mysql_error());
				}
				$row=mysql_fetch_array($query);
				if ($id=$row["id"]){
			   mysql_query("insert into bookings(user, Room, Department,participants,date,timeslot,title,choice,top,user_id)value('$user','$Room', '$Department','$participants','$date','$timeslot','$title','$chk','$tpk','$id')");
		
				$msg = "<div class='alert alert-success'>Booking Successful</div>";
				$bookings[] =$timeslot;
				//header("location:equipment.php");
				//$conn->close();
				}
						
            }
            
        }
    

}
	//$bookings[]=$row['timeslot'];


?>

 <?php

$duration=60;
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
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Timeslot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
      </ul>
      <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  <body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('d/m/Y', strtotime($date)); ?></h1><hr>
          <div class="col-md-12">
              <?php echo isset($msg)?$msg:"";?>
          </div>
		    <div class="row">
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
		


   <!-- Modal content-->		
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" align="center">
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
                        <input required type="text" name="timeslot" id="timeslot" class="form-control">
						</div>
                  <div class="form-group">
                 <label for="select" class=" form-control-label">Department</label>
				                                                                       
<?php

    $dbserver = "localhost";
    $dbusername = "root";
    $password="";
    $dbname="smart_health";
    
    $connect=mysqli_connect($dbserver,$dbusername,$password,$dbname);							
                                                                    
    $result = mysqli_query($connect,"SELECT `DeptName` FROM `department`");

    $DeptName = [];
?>

<select name="Department">

<?php
    while($row = mysqli_fetch_array($result))
    {
        array_push($DeptName,$row[0]);
        echo '<option>'. $row[0] .'</option>';
    }													
?>   
																		
																			
                  </select>
                  </div>
                  <div class="form-group">
                      <label for=" ">Title of the Meeting</label>
                      <input required type="text" class="form-control" name="title" id="title">
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

<br>
</br>
    
         
		<div class="row">
    <div class="col-sm-12 text-center">
		
		       <a href="preview.php"><button class="btn btn-success btn"  name="submit" value="submit">Continue</button> </a>
     </div>
</div>



  
         
		  
  
       
  
			
 
			
        </div>
		
		
		
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
	integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
	crossorigin="anonymous"></script>
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
