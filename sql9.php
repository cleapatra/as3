<?php session_start();
?><link rel="stylesheet" href="button.css">
<?php
if ($_SESSION['loggedin']== "yes"){
include"connect.php";
$query="SELECT bookID , max( q ) FROM (SELECT bookID, sum( quantity ) AS q FROM book GROUP BY bookID) sum_view";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
for ($i=1; $i<=$num;$i++)
{
    $row= mysqli_fetch_array($result);
    echo "BookID: ".$row[0] . " <br>Max Quantity: " . $row[1] . "<br>";
    
}
mysqli_close($conn);
    
    
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