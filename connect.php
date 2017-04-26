<?php

$conn = mysqli_connect ("localhost", "B00642652", "bDmwDSc0")
    or die ("Could not connect:" . mysqli_error ($conn));
    

mysqli_select_db($conn, 'B00642652') or die ('Db will not open');

?>