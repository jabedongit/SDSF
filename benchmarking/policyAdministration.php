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
<tr><td width="20%" valign="top"><?php 
$menu=menu();
echo $menu;
?>
</td><td width="80%" colspan="3">
<br><br>
<table border="1px">
<tr><th>Resource</th><th>Description</th><th>Policy Id</th><th>Time Generated</th><th>Action</tr>

<?php

$conn=database_Connection();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
$sql = "SELECT * FROM policy_administration" ;
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0)
 {
 while($row = mysqli_fetch_array($result, MYSQLI_NUM))
	{

?>


<tr><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td><td><?php echo $row[3]; ?></td><td><a href="/am/policyRepositoy/<?php echo $row[2]; ?>.json" target="_blank">View Policy</a></td></tr>


<?php
}
}
 }

?>
</table>
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