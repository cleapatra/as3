<?php 
session_start();
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