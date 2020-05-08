<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_health";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


 
$tpk=$_SESSION['tpk'];
$chk=$_SESSION['chk'];
$Room=$_SESSION["Room"];
$user=$_SESSION["user"];
 
//header("location:preview.php");


if($_SESSION["user"]==true)
{
//echo "welcome"." ".$_SESSION["user"];
}

if($_SESSION["Room"]==true)
{
//echo "Room:"." ".$_SESSION["Room"];
}
else
{
	  echo "Error";
}

?>
		

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Bookings</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
	  
      <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<h2 class="text-center">View Bookings</h2><hr>  

            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'smart_health');
                //$id =$_GET['user_id'];
                $query = "SELECT * FROM bookings where user='$user' ";
					
                $query_run = mysqli_query($connection, $query);
            ?>      
  <table class="table table-bordered">
    <thead>
      <tr>
		<th>ID</th>
        <th>Username</th>
        <th>Room</th>
        <th>Department</th>
		<th>Participants</th>
		<th>Date</th>
		<th>Time</th>
		<th>Title</th>
		  <th>Equipment</th>
		   <th>Food and Drinks</th>
		
      </tr>
    </thead>
	            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
	
    <tbody>
      <tr>					<td> <?php echo $row['id']; ?> </td> 
							<td> <?php echo $row['user']; ?> </td> 							
							<td> <?php echo $row['Room']; ?> </td>
							<td> <?php echo $row['Department']; ?> </td>							
							<td> <?php echo $row['participants']; ?> </td> 
							<td> <?php echo $row['date']; ?> </td> 
								<td> <?php echo $row['timeslot']; ?> </td> 
									<td> <?php echo $row['title']; ?> </td> 
										<td><?php echo $row['choice']; ?></td>
											<td><?php echo $row['top']; ?></td>
								
      </tr>
 
      
    </tbody>
	
	<?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
  </table>
  <br>
  </br>
  <div class="row">
    <div class="col-sm-12 text-center">
		       <a href="home.php"><button class="btn btn-success btn"  name="submit" value="submit">Make another booking </button> </a>
			   
			   <a href="preview.php"><button class="btn btn-info btn"  name="submit" value="submit">Preview Booking </button> </a>
			   
			   
     </div>
</div>
</div>


  </div>
</div>
</body>



</html>
