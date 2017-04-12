<?php
session_start(); include "connect.php";?>
<html>
<head>
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
    
    
}

else{
header('Location: login.html');
} ?>
    </body>
</html>