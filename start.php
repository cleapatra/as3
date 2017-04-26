<?php session_start();
?><link rel="stylesheet" href="button.css">
<?php
if ($_SESSION['loggedin']== "yes"){
    class navigation
{
    protected $stack;

    public function __construct() {
        // load the stack
        $this->stack = array();
    }

    public function push($item) {
        //push variables to the end of the array
        array_push($this->stack, $item);
       
    }

    public function pop() {
        //return the last value in the array
            return array_pop($this->stack);
    }

}

$navlinks = new navigation();
//insert the links into an array
$_SESSION["navlinks"]= array();
$_SESSION["navlinks"][]='sql1.php';
$_SESSION["navlinks"][]='sql2.php';
$_SESSION["navlinks"][]='sql3.php';
$_SESSION["navlinks"][]='sql4.php';
$_SESSION["navlinks"][]='sql5_1.php';
$_SESSION["navlinks"][]='sql6.php';
$_SESSION["navlinks"][]='sql7.php';
$_SESSION["navlinks"][]='sql8.php';
$_SESSION["navlinks"][]='sql9.php';
$_SESSION["navlinks"][]='sql10.php';
// shuffle the array so that they don't pop in a FILO order, but randomly.
shuffle($_SESSION["navlinks"]);


    //display the current page
    $current=basename($_SERVER['PHP_SELF']);
echo "<button>Current Page (".$current.")</button>";
    //pop the next page from the stack as a link
    $link=array_pop($_SESSION["navlinks"]);
echo "<button><a href='";
echo $link;
echo "'>Next Page (".$link.")</a></button>";

//store current page in session
    $_SESSION["pagetrack"]=basename($_SERVER['PHP_SELF']);  
    
 //start the counter
$_SESSION["countpages"]=0;

}
else{
header('Location: login.html');
}


?>
