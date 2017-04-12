<?php
include "connect.php";
//Get inputted data from register.html
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$register="INSERT INTO users(username, email, userpassword) VALUES('$username', '$email', '$password')";
        mysqli_query($conn, $register) or die ("<br>Invalid Query");


 echo "Account created!";
echo "<br><a href='login.html'>Log In</a>";
    
     
 mysqli_close($conn);
     


?>