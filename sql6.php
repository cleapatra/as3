<?php session_start();?>
<html>
<head>
    </head>
    
    <body>
        <h2>INSERT member details</h2>
         <form action="" method="post">
            MemberID <input type="text" name="memberid"/>
           Forename <input type="text" name="forename"/>
           Surname <input type="text" name="surname"/>
           Address <input type="text" name="address"/>
         Telephone <input type="text" name="telephone"/>
        <input type="submit" name="submit" value="submit"/>
        </form>
        <?php
if ($_SESSION['loggedin']== "yes"){
include"connect.php";


if (isset($_POST['submit'])) { 
$memberid=$_POST["memberid"];
$forename=$_POST["forename"];
$surname=$_POST["surname"];
$address=$_POST["address"];
$telephone=$_POST["telephone"];



$query="INSERT INTO member(memberid,forename,surname,address,telephone) VALUES( '$memberid','$forename','$surname','$address','$telephone')";
    
mysqli_query($conn ,$query) or die('Invalid Query');
    echo "Record Inserted";
    
}
    }

else{
header('Location: login.html');
}
        ?>
    </body>
</html>