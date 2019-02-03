<html>
<head></head>
<body >
<?php
session_start();
require "dbConnect.php";
require "menu.php";
require "helper.php";

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<h2 align="center">Authorization Manager Dashboard</h2>
<table width="60%" align="center">
<tr><td width="20%" valign="top">
<?php 
menu();
?>
</td><td width="80%" colspan="3">
<br><br>

<?php

$resourceURI=$_GET['resourceURI'];
$policyId=$_GET['policyId'];
$email=$_GET['dataConsumerEmail'];
$id = uniqidReal(); 
$securityToken = tokenGenerate();  // in full version, we will use json web token (JSON) 
$hash_uri= hash ("md5", $resourceURI);

$conn = database_Connection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {


$sql = "insert into policy_administration values ('$hash_uri','$id','$securityToken');";
//echo $sql;
$result = $conn->query($sql);

$uri_token=$resourceURI."?securityToken=".$securityToken;

// if email is not in the input field retrive it from policy..
echo "<div align='center'><h2> Email Body</h2>";
echo "<h4>Alice has shared this resource with you. Please click on the link to get access </h4><br><a href='$uri_token'>".$uri_token."</a></div>";


}




?>






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