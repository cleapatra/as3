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
    }

else{
header('Location: login.html');
}
?>