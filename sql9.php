<?php session_start();
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