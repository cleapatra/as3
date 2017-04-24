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
}

else{
header('Location: login.html');
} ?>
    </body>
</html>