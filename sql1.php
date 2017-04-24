<?php session_start();
if ($_SESSION['loggedin']== "yes"){
include"connect.php";

$result = mysqli_query ($conn, "select * from book");
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