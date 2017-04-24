<?php session_start();
?><link rel="stylesheet" href="button.css">
<?php

    class navigation
{
    protected $stack;
    protected $limit;
    
    public function __construct($limit = 10) {
        // initialize the stack
        $this->stack = array();
        // stack can only contain this many items
        $this->limit = $limit;
    }

    public function push($item) {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_push($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!'); 
        }
    }

    public function pop() {
        if ($this->isEmpty()) {
            // trap for stack underflow
	      throw new RunTimeException('Stack is empty!');
	  } else {
            // pop item from the start of the array
            return array_pop($this->stack);
        }
    }

    public function top() {
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
}

$navlinks = new navigation();

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
   
shuffle($_SESSION["navlinks"]);
/*
$links->push('sql1.php');
$links->push('sql2.php');
$links->push('sql3.php');
$links->push('sql4.php');
$links->push('sql5_1.php');
$links->push('sql7.php');
$links->push('sql8.php');
$links->push('sql9.php');
$links->push('sql10.php');
*/
/*
$random=rand(0,8);
for ($i=0;$i<$random;$i++){
 $links->pop();

}

*/


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




?>
