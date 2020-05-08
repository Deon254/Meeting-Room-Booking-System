<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'smart_health');

if(isset($_POST['submit']))
{
    $food = $_POST['food'];
   //$department=$_SESSION["department"];
    $query = "INSERT INTO foodstuff (`food`) VALUES ('$food')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: foodsadmin.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

}

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM foodstuff WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:foodsadmin.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

	if(isset($_POST['updatedata']))
			{   
				$id = $_POST['update_id'];
				$food = $_POST['food'];
				$query = "UPDATE foodstuff SET food	='$food' WHERE id='$id'  ";
				$query_run = mysqli_query($connection, $query);

			if($query_run)
			{
				echo '<script> alert("Data Updated"); </script>';
					header("Location:foodsadmin.php");
			}
			else
			{
				echo '<script> alert("Data Not Updated"); </script>';
				
					
        }
    }

	
		











?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
	<style>
	a:visited{
		color:black;
	}
	myBtn{
		margin-right:300px;
	}
	</style>
  </head>
  <body>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
       
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="bookings.php" class="nav-link">Home</a>
      </li>
     
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    
  </nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
         <li class="active"><?php echo $_SESSION["user"];?></li>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="bookings.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="adminsample.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li> 
            </ul>
			   <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Rooms.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rooms</p>
                </a>
              </li> 
            </ul>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="equipmentsadmin.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Equipments</p>
                </a>
              </li> 
            </ul>
          </li>
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
	  	</div>
    <!-- /.sidebar -->

	
  </aside>
    <div class="content-wrapper">
	
	  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	



	
      <div class="card">
            <div class="card-body">

            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'smart_health');

                $query = "SELECT * FROM foodstuff";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
							<th scope="col"> ID</th>
                            <th scope="col">Food and drinks</th>
							<th scope="col">Edit</th>	
							<th scope="col">Delete</th>
                        
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr>
							<td> <?php echo $row['id']; ?> </td>  
                            <td> <?php echo $row['food']; ?> </td>
									
								<td> 
                                <button type="button" class="btn btn-success editbtn"> EDIT </button>
                            </td> 
                            
                            <td>
                                <button type="button" class="btn btn-danger deletebtn" name="delete" > DELETE </button>
                            </td>
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
            </div>
			<div class="card-footer clearfix">
               	   	    <button class="btn btn-secondary book float-right"type="submit" name="submit" value = "Submit"> + Add Food and Drink</button>              </div>
        </div>
			    
      
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" align="center">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Add Food and Drink:</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
              <form action="" method="post">
				  
                  <div class="form-group">
                      <label for="">Food and Drink</label>
                      <input type="text"  class="form-control" name="food">
                  </div>
                  <div class="form-group">
                     
                      <button class="btn btn-success"type="submit" name="submit">Add</button>
                  </div>
              </form>
      </div>
          </div>
        </div>
      
    </div>

  </div>
</div>


<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete Food and Drink </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="" method="POST">

            <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">

                <h4> Do you want to Delete this Data ??</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">  NO </button>
                <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
            </div>
        </form>

    </div>
  </div>
</div>

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Food and Drink </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="" method="POST">

            <div class="modal-body">

                <input type="hidden" name="update_id" id="update_id">

              
                <div class="form-group">
                    <label> Food and Drink </label>
                    <input type="text" name="food" id="food" class="form-control" placeholder="Food and Drink">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
            </div>
        </form>

    </div>
  </div>
</div>


</div>
			


	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script>
          $(".book").click(function(){
              var room=$(this).attr('data-timeslot');
              $("#myModal").modal("show");
          })
      </script>




<script>

$(document).ready(function () {

    $('.deletebtn').on('click', function() {
        
        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
      
    });
});

</script>

<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            
            $('#food').val(data[1]);
    });
});

</script>
			</body>
			</html>
			



  