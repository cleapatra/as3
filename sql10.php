<?php
session_start(); include "connect.php";?>
<html>
<head>
<link rel="stylesheet" href="button.css">
    </head>
    
    <body>
        <?php if ($_SESSION['loggedin']== "yes"){?>
    
        
        
        <h2>Add a table column</h2>
         <form action="" method="post">
           Select the Table:
             <select name="tablechosen">
             
          <?php
$query1= "select TABLE_NAME from INFORMATION_SCHEMA.TABLES
where TABLE_TYPE = 'BASE TABLE'";
$result1= mysqli_query ($conn, $query1) or die ("Invalid query");
$num1 = mysqli_num_rows($result1);
$col1 = mysqli_num_fields($result1);
while ($row1 = mysqli_fetch_array($result1))
{
          
          
          ?>
          <option name="tablechosen" value="<?php echo $row1[0];?>">  <?php echo $row1[0];?></option>
              
              <?php } ?>
              
              </select>
             
             
             
             
             <br/>
           Enter the New Column Name: <input type="text" name="columnname"/>
        
        <input type="submit" name="submit" value="submit"/>
        </form>
        
        
<?php 
 if(isset($_POST['submit'])){   
$tablechosen = $_POST['tablechosen'];
$column = $_POST['columnname'];

//ADD the column

$query="ALTER TABLE $tablechosen
ADD $column varchar(30)";
    
mysqli_query($conn ,$query) or die('Invalid Query');   
 
echo "successfully added";
  $query= "SHOW columns FROM $tablechosen";
$result= mysqli_query ($conn, $query) or die ("Invalid query for show table");  
     echo"<table><tr>";
    while ($row = mysqli_fetch_array($result))
{
     echo "<th>".$row['Field']."<th>";   
    }
     echo"</tr></table>";
     
 }
    
    
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
} ?>
    </body>
</html>