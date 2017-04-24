<?php session_start();?>
<html>
<head>
<link rel="stylesheet" href="button.css">
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
    
        
 //STACK NAVIGATION
    
    
    
 //add 1 to the counter
    
$_SESSION["countpages"]=$_SESSION["countpages"]+1;
    
//display the previous page
    
echo "<button><a href='".$_SESSION["pagetrack"]."'>Previous page (".$_SESSION["pagetrack"]. ")</a></button>";

//display the current page
    
    $current=basename($_SERVER['PHP_SELF']);
echo "<button>Current Page(".$current.")</button>";
    
    
    if ($_SESSION["countpages"]<10){
//pop the next page
        
    $link=array_pop($_SESSION["navlinks"]);
echo "<button><a href='";
echo $link;
echo "'>Next Page (".$link.")</a></button><br>";
    }
    
//store the current page in the session
    
     $_SESSION["pagetrack"]=basename($_SERVER['PHP_SELF']);  
    
    
    

    }

else{
header('Location: login.html');
}
        ?>
    </body>
</html>