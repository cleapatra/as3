<?php 
session_start();
if ($_SESSION['loggedin']== "yes"){
include"connect.php";

//QUERY 1

$query1="SELECT bookID, COUNT(LoanID) FROM Loan GROUP BY BOOKID";
$result1 = mysqli_query ($conn, $query1);
$num = mysqli_num_rows ($result1);
$col = mysqli_num_fields ($result1);


//QUERY 1 RESULTS Counts how many loans for a specific book
echo "QUERY1 </br><table border = '1'>
<tr>
<th>BookID</th>
<th>Book Count</th>

</tr>";

for ($i=0; $i<$num; $i++) {
    $group1 = mysqli_fetch_row($result1);
    echo "<tr>";
    
    for ($j=0; $j<$col; $j++) {
        echo "<td>" . $group1[$j] . "</td>";
    }
       echo "</tr>";
}
echo "</table></br>";



//QUERY 2
$query2="SELECT authorID, sum(Price) FROM book GROUP BY authorID";
$result2 = mysqli_query ($conn, $query2);
$num2 = mysqli_num_rows ($result2);
$col2 = mysqli_num_fields ($result2);



// QUERY 2 RESULTS Adds up the prices of all the Authors books

echo "QUERY2 </br> <table border = '1'>
<tr>
<th>AuthorID</th>
<th>sum(price)</th>

</tr>";

for ($i=0; $i<$num2; $i++) {
    $group2 = mysqli_fetch_row($result2);
    echo "<tr>";
    
    for ($j=0; $j<$col2; $j++) {
        echo "<td>" . $group2[$j] . "</td>";
    }
       echo "</tr>";
}
echo "</table>";



mysqli_close($conn);
    }

else{
header('Location: login.html');
}
?>