<?php
session_start();
session_destroy();
echo 'You have been logged out. <a href="login.html"> back to log in</a>';
?>