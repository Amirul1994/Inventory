<?php 

# A session is a way to store information (in variables) to be
# used  across multiple pages 
# A session is started with the session_start() function.
session_start () ; 

# The session is set with a user name
$user_name = $_SESSION['user_name']; 

if ($user_name) {

//user is logged in  

# isset check whether a variable is empty 
#Also checks whether the variable is set/declared

if(isset($_POST['submit']))  
{  
    

    //check fields 

    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword']; 
    $repeatnewpassword = $_POST['repeatnewpassword']; 


    if(isset($_POST['repeatnewpassword'])){ 

  $number = preg_match('@[0-9]@', $repeatnewpassword);
  $uppercase = preg_match('@[A-Z]@', $repeatnewpassword);
  $lowercase = preg_match('@[a-z]@', $repeatnewpassword);
  $specialChars = preg_match('@[^\w]@', $repeatnewpassword);   

  if($repeatnewpassword == (strlen($repeatnewpassword)>=8 && $number && $uppercase && $lowercase && $specialChars)){

    
    //password encryption 
    
    $hasholdpassword = password_hash($oldpassword, PASSWORD_DEFAULT); 
    $hashnewpassword = password_hash($newpassword, PASSWORD_DEFAULT);
    $hashrepeatnewpassword = password_hash($repeatnewpassword, PASSWORD_DEFAULT); 

    //check password against db 


    //connect db 
    $connect = mysqli_connect("localhost", "root", "", "inventorydb");
    
    $queryget = mysqli_query($connect,"SELECT password FROM users WHERE user_name='$user_name'") or die("Query didn't work"); 
    $row = mysqli_fetch_assoc($queryget); 

    #$oldpassworddb = $row['password'];  
  
   }

    }

    
    $oldpassworddb = $row['password'];
    //check passwords 

    if (password_verify($oldpassword,$oldpassworddb)) 

    {
        
        // check two new passwords 
        if (password_verify($newpassword,$hashnewpassword)==password_verify($repeatnewpassword,$hashrepeatnewpassword)) 
        {
             //success 
             //change password in db 
             
             $querychange = mysqli_query($connect,"UPDATE users SET password='$hashnewpassword' WHERE user_name='$user_name'");
             
             
             echo("Your password has been changed. <a href='index.php'>Return</a>");
             

        } 
        else 
           echo "New passwords don't match!";
    } 
    else 
       echo "Old password doesn't match!";

    
}
else 
{


?>

<form action='change_password.php' method='POST'> 

Old password: <input type='password' name='oldpassword'><p><br>
New password: <input type='password' name='newpassword'><br><br>
Repeat new password: <input type='password' name='repeatnewpassword'><p><br><br>
<input type='submit' name='submit' value='Change password'>

</form>

<?php

 }
} 
# the } above is used because different type of  tag (here <form> tag is used inside php tag)
else 
   die("You must be logged in to change your password!");
