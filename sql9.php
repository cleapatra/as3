<?php session_start();
if ($_SESSION['loggedin']== "yes"){
include"connect.php";
$query="SELECT bookID ,max(q) FROM (SELECT bookID, sum(quantity) AS q FROM book GROUP BY bookID) sum_view";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
for ($i=1; $i<=$num;$i++)
{
    $row= mysqli_fetch_row($result);
    echo "BookID: ".$row[0] . " <br>Max Quantity: " . $row[1] . "<br>";
    
}
mysqli_close($conn);
}

else{
header('Location: login.html');
}
?>