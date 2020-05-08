

<!DOCTYPE html>
	<head>
		<title>Login</title>
	</head>
	<style>


* {
  box-sizing: border-box;
  
}


/* Add styles to the form container */
.container {
  position: absolute;
 margin-left:480px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
  input[type=text], input[type=password],select[name=type] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, select[name=type]:focus{
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
	
	<body>
<div class="bg-img" align="center">
  <form action="" class="container">
    <h1>Login</h1>
	  <label for="User type"><b>User type</b></label>
		
				<select name="type" required>
				<option value ="-1">Select user type</option>
				<option value ="Admin">Admin</option>
				<option value ="User">User</option>
				</select>
				
    <label for="username"><b>Username</b></label>
    <input type="text" name="user" placeholder="Enter Username"  required>

    <label for="password"><b>Password</b></label>
    <input type="password" name="pass" placeholder="Enter Password"  required>

    <input type="submit" class="btn" value="Login" name="submit">	</input>
  </form>
</div>	
	
			</body>
			</html>
			
<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("smart_health");

if(isset($_REQUEST["submit"]))
{
	  $type=$_REQUEST["type"];
	  $user=$_REQUEST["user"];
	  $pass=$_REQUEST["pass"];
	  $query=mysql_query("select * from multilevel where type='$type'&& user='$user' && pass='$pass' ");
	  $rowcount=mysql_num_rows($query);
	  if($rowcount==true && $type == User)
	  {
		    $_SESSION["user"]=$user;
		 header('location:home.php');
		 
		  
	  }
	  elseif($rowcount==true && $type == Admin)
	  {
		   
		   header('location:bookings.php');
	  }
	  else{

			echo '<script>alert("Incorrect username or password!");window.location="login1.php";</script>'; 
		  
	  }
}

?>
