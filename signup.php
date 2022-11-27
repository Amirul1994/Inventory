<?php 

# Session variables store information to be used across multiple pages. By default, session variables last until the user closes the browser. 
# A session is started with the session_start() function

session_start();

# The include statement takes all the text/code/markup that exists in the specified file and copies it into the file that uses the 
# include statement 

	include("connection.php"); 
	include("functions.php");

	#isset checks whether a variable is empty. Also checks whether the variable is declared.

    if((isset($_POST['password']))&&(isset($_POST['user_name']))) {   
	 
  $user_name = $_POST['user_name']; 
  $password = $_POST['password'];
  
 #preg_match() function returns whether a match was found in a string
  $number = preg_match('@[0-9]@', $password);
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password); 

  #  \w matches any single letter, number or underscore
  # [^abc] find any character not between the bracket
  
  $specialChars = preg_match('@[^\w]@', $password);
 
  
         
  if($password == (strlen($password) >= 8 && $number && $uppercase && $lowercase && $specialChars)) { 

           $hashed_password = password_hash($password, PASSWORD_DEFAULT);

           if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

			//save to database 
			//random_num($length)

			$user_id = random_num(20); 

			$check_duplicate_username = "select * from users where user_name = '$user_name' limit 1 " ; 
           
			# mysqli_query performs query against a database
			$result = mysqli_query($con, $check_duplicate_username); 
            
			# mysqli_num_rows returns number of  rows in a result set
			$count = mysqli_num_rows($result); 

			if($count > 0){
				echo "Username already exists"; 
				return false;
			
			}elseif($count >= 0){
			
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$hashed_password')";

			$test = mysqli_query($con, $query);


				var_dump($test);

			exit();
			

			


           
			# header function to redirect to a location
			header("Location: login.php");
			die; 
			}
           }
           else{
            echo "Please enter some valid information!";
        } 
    } else
    {
        echo "Please use strong password containing letters, numbers and special characters";
    } 
}	
    ?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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

		padding: 10px;
		width: 100px;
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

<body> 

    <!-- the <div> tag defines a division or a section in an html document 
		div id is the assignment of the id attribute to a div block to 
		apply styling or interactivity to that specific div block-->
	
		<div id="box">
		
		<form action = "signup.php" method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
            
            <label> Username </label>
			<input id="text" type="text" name="user_name"><br><br> 

			<label> Password </label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br> 
            

            <!--<span><?php echo $msg?></span>-->

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>