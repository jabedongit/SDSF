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
<h3>Data Custodian Registration</h3>
<form action="dataCusRegAction.php" method="GET">
<table>

<tr><td>Data Custodian</td><td><input type="text" name="dataCustodian" size="50"></td></tr>
<tr><td>Data Representation Supported</td><td><fieldset>
      <p>
				<label for="granularity">Granularity</label> 
   			<textarea placeholder="comma separate (e.g., Level1(exact location), Level2(street level location))" cols="50" name="granularity"></textarea>
			</p> 
			<p>
				<label for="Anonymization">Anonymization</label> 
   			<select name="anonymization" id="anonymization">
			    <option value="true">Yes</option>
				<option value="false">No</option>			
			</select>
			</p> 
			
	</fieldset></td></tr>			
<tr><td>Notification</td><td><select name="notification" id="notification">
			    <option value="true">Yes</option>
				<option value="false">No</option>			
			</select></td></tr>
			
		<tr><td>Accounting</td><td><select name="accounting" id="accounting">
			    <option value="true">Yes</option>
				<option value="false">No</option>			
			</select></td></tr>
	

<tr><td colspan="2"><input type="submit" value="Registration of Data Custodian"></td></tr>

</table>
</form>








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