<?php

$conn = mysqli_connect ("localhost", "B00686355", "7qSVCBxE")
    or die ("Could not connect:" . mysqli_error ($conn));
    

mysqli_select_db($conn, 'B00686355') or die ('Db will not open');

?>