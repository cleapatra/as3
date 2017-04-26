<?php
include "connect.php";
//Get inputted data from register.html
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);




//check if username is already registered in the database

$checkUsername="SELECT username FROM users WHERE username= '".$username."'";
    $checkresult=mysqli_query($conn,$checkUsername);

if(mysqli_num_rows($checkresult)>0){
         echo "Username already exists. Please choose another username.";
         echo "<br><a href='register.html'>Try again</a><br>";
     }


//check if email address has an @ and a .


elseif(!preg_match("/.@/",$email)){
 echo "email not valid - email must contain an @ and .";
    echo "<br><a href='register.html'>Try again</a><br>";
    
}

// check if password is less than 6 characters
elseif (strlen($password) < 6) {
    echo "password not valid - password must be more than 6 characters"; 
    echo "<br><a href='register.html'>Try again</a><br>";
}
   
   else {
       $password = md5($password);
       
       $register="INSERT INTO users(username, email, userpassword) VALUES('$username', '$email', '$password')";
        mysqli_query($conn, $register) or die ("<br>Invalid Query");
        echo "Account created!";
        }


echo "<br><br><br><a href='login.html'>Already Have an Account? Log In</a>";
    
     
 mysqli_close($conn);
     


?>