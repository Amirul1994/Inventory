<?php 
session_start();

	include("connection.php");
	include("functions.php");

	# check_login($con)  is a function declared in functions.php file
  $user_data = check_login($con); 

?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8"> 

	<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>
	<title>IT Inventory</title> 

</head>
<body> 

	<div class="topnav"> 
  <img src="brilliant_logo.png" width="50px" class="navbar-nav ml-auto">
  <a href="logout.php">Logout</a> 
  <a href="change_password.php">Change Password</a> 
  <a href="jquery_search_2.php">Search</a>
  
  
</div>

	
	<h1>Welcome to the IT Inventory</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?> <br><br>

	
</body>
</html>