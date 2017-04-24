<?php session_start(); 
?><link rel="stylesheet" href="button.css">
<?php
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