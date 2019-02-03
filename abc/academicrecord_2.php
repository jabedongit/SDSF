<html>
<head><title>Accademic record</title></head>
<body  align="center">

<br />

<h1 align="center"> Academic Record of Alice</h1>
<br />
<?php
session_start();

if (isset($_GET['securityToken']))
{
  $resourceURI= 'http://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
  $resourceURI= strtok($resourceURI,'?');
  $securityToken=$_GET['securityToken'];
  header("Location: http://localhost/abc/policy_evaluation.php?securityToken=".$securityToken."&"."resourceURI=".$resourceURI);
}
if (isset($_GET['authzToken']))
{
?>



<table width="70%" align="center">
<tr><td width="20%" valign="top"><h3 align="center">Links</h3>
<a href="academicrecord.php">Academic Record</a><br>
<a href="payslip.php">Pay Slip</a><br>
<a href="logoff.php">Logoff</a><br>
</td><td width="80%" colspan="3">
<br><br>
<div align="center" ><a href="http://localhost/abc/policy.php"><button type="submit">Share</button></a></div>

<div align="center"><img src="xmlofftrans.png" ></div>
</td></tr>

</table>
<?php
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

?>
<table width="70%" align="center">
<tr><td width="20%" valign="top"><h3 align="center">Links</h3>
<a href="academicrecord.php">Academic Record</a><br>
<a href="payslip.php">Pay Slip</a><br>

</td><td width="80%" colspan="3">
<br><br>
<div align="center" ><a href="http://localhost/abc/policy.php"><button type="submit">Share</button></a></div>

<div align="center"><img src="xmlofftrans.png" ></div>
</td></tr>

</table>

<?php
}
?>




</body>
</html>