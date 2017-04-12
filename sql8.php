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
}

else{
header('Location: login.html');
}
?>