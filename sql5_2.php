        <?php
session_start();
if ($_SESSION['loggedin']== "yes"){
include"connect.php";



$bookid=$_POST["bookID"];
$price=$_POST["newprice"];


//UPDATE THE RECORD

$query="UPDATE book SET price=$price WHERE bookID = $bookid";
    
mysqli_query($conn ,$query) or die('Invalid Query');


// SHOW THE NEW UPDATED RECORD

echo "<h2>Updated Record:</h2>";
$show="select * from book WHERE bookID= $bookid";
$result = mysqli_query ($conn, $show);
$num = mysqli_num_rows ($result);
$col = mysqli_num_fields ($result);
echo "<table border = '1'>
<tr>
<th>id</th>
<th>title</th>
<th>Isbn</th>
<th>published</th>
<th>Price</th>
<th>PublisherID</th>
<th>AuthorID</th>
</tr>";

for ($i=0; $i<$num; $i++) {
    $row = mysqli_fetch_row($result);
    echo "<tr>";
    
    for ($j=0; $j<$col; $j++) {
        echo "<td>" . $row [$j] . "</td>";
    }
       echo "</tr>";
}
echo "</table>";
    }

else{
header('Location: login.html');
}
    

        ?>