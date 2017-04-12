<?php
session_start();
include"connect.php";
//retrieve inputted data from login.html
$username =$_POST['username'];
$password =$_POST['password'];
// To protect MySQL injection 
$username = stripslashes($username);
$password = stripslashes($password);



$query = "SELECT * FROM users WHERE username = '$username' AND userpassword ='$password'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)==1){
    $_SESSION['loggedin'] = "yes";
    $_SESSION['username'] = $username;
    echo $username." you are logged in<BR>";
    echo "<a href='logout.php'>Log out</a><br><br>";
    echo "<br><a href='sql1.php'>sql1.php</a>";
    echo "<br><a href='sql2.php'>sql2.php</a>";
    echo "<br><a href='sql3.php'>sql3.php</a>";
    echo "<br><a href='sql4.php'>sql4.php</a>";
    echo "<br><a href='sql5_1.php'>sql5_1.php</a>";
    echo "<br><a href='sql6.php'>sql6.php</a>";
    echo "<br><a href='sql7.php'>sql7.php</a>";
    echo "<br><a href='sql8.php'>sql8.php</a>";
    echo "<br><a href='sql9.php'>sql9.php</a>";
    echo "<br><a href='sql10.php'>sql10.php</a>";
    
}
else {
    echo "invalid log in information. Please try again or <a href='register.html'>Register</a>";
        
        
}
?>