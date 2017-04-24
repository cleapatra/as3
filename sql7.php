<?php session_start();?>
<html>
<head>
    </head>
    
    <body>
        <h2>DELETE Loan records</h2>
         <form action="" method="post">
           Enter LoanID of record to be deleted: <input type="text" name="loanid"/>
           
        <input type="submit" name="submit" value="submit"/>
        </form>
        <?php
if ($_SESSION['loggedin']== "yes"){
include"connect.php";


if (isset($_POST['submit'])) { 
$loanid=$_POST["loanid"];



$query="DELETE FROM loan WHERE loanid=$loanid";
    
mysqli_query($conn ,$query) or die('Invalid Query');
    echo "Record Deleted";
    
}
    
          
    //display the previous page
echo "<a href='".$_SESSION["pagetrack"]."'>Previous page=".$_SESSION["pagetrack"]. "</a>";

    //display the current page
    $current=basename($_SERVER['PHP_SELF']);
echo "Current Page=".$current;
    //pop the next page
    $link=array_pop($_SESSION["navlinks"]);
echo "<a href='";
echo $link;
echo "'>Next Page (".$link.")</a><br>";

    
     $_SESSION["pagetrack"]=basename($_SERVER['PHP_SELF']);  
    
    

    }

else{
header('Location: login.html');
}
        ?>
    </body>
</html>