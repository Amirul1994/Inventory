<?php

# how function works - https://www.youtube.com/watch?v=8Bfnmeer18M
# function function name($argument)

function check_login($con) 
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0) 
		{
           
			# Associative array — An array where each key has its own specific value. 
			# The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
            # Fieldnames returned from this function are case-sensitive.

            $user_data = mysqli_fetch_assoc($result);
			return $user_data;

		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

#need_to_understand_following_code
function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}