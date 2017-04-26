<?php
session_start();
include"connect.php";
//retrieve inputted data from login.html
$username =$_POST['username'];
$password =$_POST['password'];
// To protect MySQL injection 
$password=md5($password);


$query = "SELECT * FROM users WHERE username = '$username' AND userpassword ='$password'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)==1){
    $_SESSION['loggedin'] = "yes";
    $_SESSION['username'] = $username;
    echo $username." you are logged in<BR>";
    echo "<br><a href='start.php'>Go to Start.php</a><br><br><br>";
    
    echo "<a href='logout.php'>Log out</a><br><br>";  
}
else {
    echo "invalid log in information. Please try again or <a href='register.html'>Register</a>";
        
        
}
?>