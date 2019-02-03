<?php
session_start();
session_destroy();
echo "Log Out";
 echo "<a href='http://localhost/swin/'>Login Again</a>";
?>