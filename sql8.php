<?php session_start();
if ($_SESSION['loggedin']== "yes"){
include"connect.php";
$query="SELECT title from book where price= (SELECT max(price) FROM book)";
$result = mysqli_query ($conn, $query);

    if($result){
        
        $row=mysqli_fetch_assoc($result);
        echo "<h2>Title of book with highest price</h2><br>".$row['title'];
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