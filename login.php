<?php 

session_start();

	include("connection.php");
	include("functions.php");


	#if($_SERVER['REQUEST_METHOD'] == "POST")
	if((isset($_POST['password']))&&(isset($_POST['user_name'])))
	{
		//something was posted
		$user_name = $_POST['user_name']; 
        $password = $_POST['password'];


		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database

			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					echo $user_data['user_name'];
					echo $user_data['password'];

					//hash password verification
					if(password_verify($password, $user_data['password']))
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						$_SESSION['id'] = $user_data['id'];
						$_SESSION['user_name'] = $user_data['user_name'];  
						$role = ['role'];
						$_SESSION['role']  =  $user_data['role']; 
						if($user_data['role'] == 2){ 
						header("Location: index.php"); 
						}if($user_data['role'] == 1){ 
							header("Location: admin_index2.php");
						
						} 
						die;
                     } 
					 } else{
						echo "wrong username or password!";
					} 
						
                          }
					}
					else{
						echo "field is empty!";
					} 
			}  
		?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{
    
    display: inline-block;
    margin: 5px;
		padding: 10px; 
    color: white;
		background-color: lightblue;
		border: none; 
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>
   
   <style>
img {
  border: 1px solid #ddd; /* Gray border */
  border-radius: 4px;  /* Rounded border */
  padding: 5px; /* Some padding */
  width: 100px; /* Set a small width */
}


</style>
<body>

<a target="_blank" >
  <img src="brilliant_logo.png">
</a>

</body>


	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
             
             <label> Username </label>
		    <input id="text" type="text" name="user_name"><br><br> 

		    <label> Password </label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login">

			

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>