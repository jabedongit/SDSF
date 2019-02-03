<?php
session_start();
require "dbConnect.php";
require "helper.php";
require "contextAquirer.php";
$final_access = "deny";
$resourceURI= $_GET['resourceURI']; 

$conn=database_Connection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
  $time_start = microtime(true);
  
 for ($i=0;$i<25000;$i++) 
  {
  $securityToken=$_GET['securityToken'];

$sql = "SELECT * FROM data_resource_mapping where seurity_token='$securityToken'" ;
//echo $sql."<br>";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0)
 {
 while($row = mysqli_fetch_array($result, MYSQLI_NUM))
	{
		$policy_id = $row[1];
		//echo "URL==".$resourceURI."<br>";
		$hash_uri= hash ("md5",  $resourceURI);
		//echo "URL Hash==".$hash_uri."<br>";
	}

// echo $policies;
 $json_url= './policyRepositoy/'.$policy_id.".json";
 $json = file_get_contents($json_url);
 $dataPolicy = json_decode($json, true);

 $nuberOfCondition=count($dataPolicy['dataSharingPolicy']['contextCondition'])-1;
// print_r($dataPolicy['dataSharingPolicy']['id']);
 
$json_url= './policyRepositoy/reSharePolicy/'."1b9b63b124d75".".json";
 $json = file_get_contents($json_url);
 $dataRePolicy = json_decode($json, true);
 
 $startday1= $dataRePolicy['dataSharingPolicy']['contextCondition'][0]['AttributeValue'];
 
$startday= $dataPolicy['dataSharingPolicy']['contextCondition'][0]['AttributeValue'];
$endday= $dataPolicy['dataSharingPolicy']['contextCondition'][2]['AttributeValue'];

//echo "Start date==".$startday."   End date==".$endday."<br>";

$dteStart = Date('Y-m-d', strtotime($startday));
$today=date('Y-m-d');
$dtetodya=date('Y-m-d', strtotime($today));
$dteEnd   = Date('Y-m-d', strtotime($endday));


//echo "Start time".$dteStart."End day==".$dteEnd."<br>";
//echo "Todays date====".$dtetodya."<br>";

if (($dtetodya >= $dteStart) && ($dtetodya <= $dteEnd))
 {
    
	$final_access = "permit";
	
	/*	
    $network_ip = $data['dataSharingPolicy']['compositeCondition'][1]['AttributeValue'];
	
   if ($ip == $network_ip)
     {
	 $final_access = "permit";
	 }
	else
     {
	 $final_access = "deny";
	 }	
*/
 }

//************************************* Context Acquirer ******************************* 
 
 
 /*list of context supported....
 
 1. location
 2. 
 
 
 */
 
 //$location = location();
 
 
 
 
 
 
 
 
 
 

 
 
 

 
 //********************************************* Generate Authorization Code **************************************************************
  //echo "Final access===".$final_access."<br>";
 if ($final_access=="permit")
    {
	  $authzToken=authzToken();
	 
	  header("Location:".$resourceURI."?authzToken=".$authzToken);
	 
	 // $time_end = microtime(true);
    // $time = $time_end - $time_start;
    // echo "Process Time: {$time}";
	 	 
	}
 
 else
 {
   // echo "You do not have access. Please contact the person who shared the resource.";
   
   // $time_end = microtime(true);
    // $time = $time_end - $time_start;
	 // echo "<br>"."<br>";
	// echo $time_start;
	 // echo "<br>"."Process Time: {$time}"."<br>";
	 // echo $time_end;
    // echo "<br>"."Process Time: {$time}"."<br>";
 }
 }
 

 //print_r($dataPolicy);
 }

 
 $time_end = microtime(true);
    $time = $time_end - $time_start;
	 
    echo "<br>"."Process Time: {$time}"."<br>";

}

?>