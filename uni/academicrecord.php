<?php

session_start();
$_SESSION['dataResource']="http://localhost/swin/academicrecord.php";

?>
<html>
<head><title>Accademic record</title></head>
<body  align="center">

<br />

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_sharing_policy";
$final_access = "deny";
$ip=$_SERVER['REMOTE_ADDR'];

$requested_url= "http://localhost/swin/academicrecord.php";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$hash_uri= hash ("md5", $requested_url);


if (isset($_GET['securityToken']))
{
$securityToken =$_GET['securityToken'];
$sql = "SELECT * FROM resource_security_token_mapping where uri='$hash_uri' && token='$securityToken'" ;

$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0)
 {

 $sql1 = "SELECT * FROM data_resource_mapping where uri='$hash_uri'" ;
// echo  $sql1;

$result1 = mysqli_query($conn,$sql1);
 
 while($row = mysqli_fetch_array($result1, MYSQLI_NUM))
{
$policies = $row[1];
}

// echo $policies;
 $json_url= $policies.".json";
 $json = file_get_contents($json_url);
$data = json_decode($json, TRUE);

$startday= $data['dataSharingPolicy'][5]['compositeCondition']['contextCondition']['AttributeValue'];
$endday= $data['dataSharingPolicy'][5]['compositeCondition'][0]['AttributeValue'];



$dteStart = Date('Y-m-d', strtotime($startday));
$today=date('Y-m-d');
$dtetodya=date('Y-m-d', strtotime($today));
$dteEnd   = Date('Y-m-d', strtotime($endday));


//echo $days1."day==".$days2."<br>";

if (($dtetodya > $dteStart) && ($dtetodya < $dteEnd))
 {
    
	$final_access = "permit";
	
    $network_ip = $data['dataSharingPolicy'][5]['compositeCondition'][1]['AttributeValue'];
	
   if ($ip == $network_ip)
     {
	 $final_access = "permit";
	 }
	else
     {
	 $final_access = "deny";
	 }	

 }
 
 $purpose = $data['dataSharingPolicy'][6]['policyObligation']['purpose'];
 $notificaiton= $data['dataSharingPolicy'][6]['policyObligation']['notification'];
 
 if ($purpose!=null)
 {
 ?>
 
  <script type="text/javascript">
	   
	   var txt;
       var r = confirm("You can use this document only for <?php echo $purpose; ?> purpose.");
    if (r == false) {
        // document.getElementById("hidden1").value = "true";
		 window.location = "http://localhost/swin/error.php";
				 
    } 

		</script>
<?php 
 }
 
if ($notificaiton!=null)
{

}
if ($final_access == "permit")
{

//$datavalue= $json['id'];
//echo $datavalue;

 
 
?>
<h1 align="center"> Academic Record of Alice</h1>
<br />
<?php

  $canShare= $data['dataSharingPolicy'][7]['reSharingCondition']['canShare'];
  
  if ($canShare == "true")
    {

?>

<div align="center" ><a href="policy.php"><button type="submit">Share</button></a></div>
<?php
}
?>

<div align="center"><img src="xmlofftrans.png" ></div>

<?php
}
else
{
echo "<h2 align='center'>Access Denied.</h2>";
}
}
}


else if ($_SESSION['dataSubject'] =='alice')
{
?>

<h1 align="center"> Academic Record of Alice</h1>
<br />
<div align="center" ><a href="policy.php"><button type="submit">Share</button></a></div>
<div align="center"><img src="xmlofftrans.png" ></div>
<?php
}
?>
</body>
</html>