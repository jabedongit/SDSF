<?php
session_start();
session_destroy();
echo "Log Out";
 echo "<a href='http://localhost/am/login.php'>Login Again</a>";
?>