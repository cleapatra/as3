<?php
include "connect.php";
//Get inputted data from register.html
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$password = md5($password);

$match="/.@/";
if(preg_match($match,$email)){
$register="INSERT INTO users(username, email, userpassword) VALUES('$username', '$email', '$password')";
        mysqli_query($conn, $register) or die ("<br>Invalid Query");


 echo "Account created!";
    
}
   
   else {
       echo "email not valid - must contain @ and . <br>";
       echo "<a href='register.html'>Try again</a>";
       
   }
echo "<br><br><br><a href='login.html'>Log In</a>";
    
     
 mysqli_close($conn);
     


?>