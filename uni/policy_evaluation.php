<?php
session_start();
?>

<html>
</head>


</head>
<body>

<?php

require "dbConnect.php";
require "helper.php";
//require "contextAquirer.php";
$final_access = "deny";


$conn=database_Connection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
   
 if (isset($_GET['securityToken']))
 {
 

 $securityToken=$_GET['securityToken'];
 $_SESSION['securityToken']= $securityToken;
 $_SESSION['flag']=1;

 $resourceURI= $_GET['resourceURI']; 
 $_SESSION['resourceURI']= $resourceURI;
  }
  
  
  if ($_SESSION['flag']==1)
    {
	  echo $_SESSION['flag'];

	 $_SESSION['flag']=2;

   
	   header("Location:"."contextAquirer.php");
	   
	
	}
  
  
  
  

$sql = "SELECT * FROM data_resource_mapping where seurity_token='".$_SESSION['securityToken']."'" ;
echo $sql."<br>";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0)
 {
 while($row = mysqli_fetch_array($result, MYSQLI_NUM))
	{
		$policy_id = $row[1];
		echo "URL==".$_SESSION['resourceURI']."<br>";
		$hash_uri= hash ("md5",  $_SESSION['resourceURI']);
		echo "URL Hash==".$hash_uri."<br>";
	}

// echo $policies;
 $json_url= './policyRepositoy/'.$policy_id.".json";
 $json = file_get_contents($json_url);
 $dataPolicy = json_decode($json, true);

 $nuberOfCondition=count($dataPolicy['dataSharingPolicy']['contextCondition'])-1;
// print_r($dataPolicy['dataSharingPolicy']['id']);
 
 
 $location= $dataPolicy['dataSharingPolicy']['contextCondition'][4]['AttributeValue'];
	

$startday= $dataPolicy['dataSharingPolicy']['contextCondition'][0]['AttributeValue'];
$endday= $dataPolicy['dataSharingPolicy']['contextCondition'][2]['AttributeValue'];

echo "Start date==".$startday."   End date==".$endday."<br>";

$dteStart = Date('Y-m-d', strtotime($startday));
$today=date('Y-m-d');
$dtetodya=date('Y-m-d', strtotime($today));
$dteEnd   = Date('Y-m-d', strtotime($endday));


echo "Start time".$dteStart."End day==".$dteEnd."<br>";
echo "Todays date====".$dtetodya."<br>";

if (($dtetodya >= $dteStart) && ($dtetodya <= $dteEnd))
 {
    



	
	$latitude="-37.8222114";
    $longitude="145.0328017";
	
	


    //Send request and receive json data by latitude and longitude
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if($status=="OK"){
        //Get address from json data
       // $location = $data->results[0]->formatted_address;
	   
	   $derived_location = $data->results[0]->address_components[2]->long_name;
    }else{
       $derived_location =  '';
    }
    //Print address 

	
	if ($derived_location=="Hawthorn")
	 {
	 
	 	$final_access = "permit";
	 }
	


	
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
  echo "Final access===".$final_access."<br>";
 if ($final_access=="permit")
    {
	  $authzToken=authzToken();
	 
	  header("Location:".$_SESSION['resourceURI']."?authzToken=".$authzToken);
	 
	 	 
	}
 
 else
 {
   echo "You do not have access. Please contact the person who shared the resource.";
 }
 


}
else
{
  echo "Error, Please Contact Data Subject.";
}

}

?>

</body>
</html>