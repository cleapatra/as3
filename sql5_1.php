<?php
session_start();?>
<html>
<head>
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
} ?>
    </body>
</html>