<?php 
session_start();
?><link rel="stylesheet" href="button.css">
<?php
if ($_SESSION['loggedin']== "yes"){
include"connect.php";

$query1="SELECT avg(Price) FROM book";
$avresult = mysqli_query ($conn, $query1);

$query2="SELECT count(memberid) FROM member";
$countresult = mysqli_query ($conn, $query2);

echo "<table border = '1'>
<tr>
<th>Average Price</th>
<th>Count members</th>

</tr>";

$av = mysqli_fetch_row($avresult);
$count = mysqli_fetch_row($countresult);
echo "<tr>";
echo "<td>" . $av [0] . "</td><td>" . $count [0] . "</td>";
echo "</tr>";
echo "</table>";

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