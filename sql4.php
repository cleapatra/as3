<?php 
session_start();
?><link rel="stylesheet" href="button.css">
<?php
if ($_SESSION['loggedin']== "yes"){
include"connect.php";

//QUERY 1 Gets all author forenames and surnames with the book titles they have written

$query1="SELECT forename, surname, title FROM author INNER JOIN book ON author.authorid=book.authorid";
$result1 = mysqli_query ($conn, $query1);
$num = mysqli_num_rows ($result1);
$col = mysqli_num_fields ($result1);


//DISPLAY QUERY 1 RESULTS 
echo "QUERY1 </br><table border = '1'>
<tr>
<th>Forename</th>
<th>Surname</th>
<th>Book Title</th>

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



//QUERY 2 Loan IDs and member info for that loan
$query2="SELECT loan.loanid, member.forename, member.surname FROM loan RIGHT JOIN member ON loan.memberid=member.memberid ORDER BY loan.loanid";
$result2 = mysqli_query ($conn, $query2);
$num2 = mysqli_num_rows ($result2);
$col2 = mysqli_num_fields ($result2);



// DISPLAY QUERY 2 RESULTS 

echo "QUERY2 </br> <table border = '1'>
<tr>
<th>LoanID</th>
<th>Forename</th>
<th>Surname</th>

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