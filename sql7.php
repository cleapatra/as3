<?php session_start();?>
<html>
<head>
<link rel="stylesheet" href="button.css">

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