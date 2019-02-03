<html>
<head></head>
<body >
<?php
session_start();
require "menu.php";
 
if (isset($_SESSION['loggedinAM']) && $_SESSION['loggedinAM'] == true) {
?>
<h2 align="center">Authorization Manager Dashboard</h2>
<table width="60%" align="center">
<tr><td width="20%" valign="top"><?php 
$menu=menu();
echo $menu;
?>
</td><td width="80%" colspan="3">
<br><br>


<div align="center"><img src="dashboard.jpg" ></div>
</td></tr>

</table>
<?php
} else {
   header("Location: http://localhost/am/login.php");
 //  $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>
</body>
</html>