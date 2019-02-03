<html>
<head></head>
<body >
<?php
session_start();
require "dbConnect.php";
require "menu.php";


if (isset($_SESSION['loggedinAM']) && $_SESSION['loggedinAM'] == true) {
?>
<h2 align="center">Authorization Manager Dashboard</h2>
<table width="60%" align="center">
<tr><td width="20%" valign="top">
<?php 
$menu=menu();
echo $menu;
?>
</td><td width="80%" colspan="3">
<br><br>

<form action="policyMappingAction.php">
<table>

<tr><td>Resource URI</td><td><input type="text" name="resourceURI"></td></tr>
<tr><td>Policy Id</td><td><input type="text" name="policyId"></td></tr>
<tr><td>Data Consumer(optional) *</td><td><input type="text" placeholder="Write your email." name="dataConsumerEmail"></td></tr>

<tr><td colspan="2"><input type="submit" value="Share Your resource"></td></tr>

</table>
</form>

<h3 color="red"> If the data consumer if different than the data consumer defined in the original policy.</h3>






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