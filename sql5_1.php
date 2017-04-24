<?php
session_start();?>
<html>
<head>
<link rel="stylesheet" href="button.css">

    </head>
    
    <body>
        <?php if ($_SESSION['loggedin']== "yes"){ ?>
        <h2>UPDATE member details</h2>
         <form action="sql5_2.php" method="post">
            BookID of record to be updated: <input type="text" name="bookID"/>
             <br/>
           New Price for book: <input type="text" name="newprice"/>
           <input type="submit" name="submit" value="submit"/>
        </form>
<?php 
    
       
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