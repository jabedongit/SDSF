<?php
session_start();
require "helper.php";
require "dbConnect.php";
?>
<html>
<head><title>Shared Document</title></head>
<body  align="center">

<br />

<h1 align="center"> Your document is shared.</h1>
<br />
<?php



$id = $_SESSION['policyId'];  // we will generate automatically later
$author =   $_SESSION['dataSubject'];
$priority = 1;
$decision = "permit";

$dataSharingPolicy=array("id" => $id, "author" => $author, "priority"=> $priority, "decision" => $decision);

$conAttributeName1=$_GET['conAttributeName1'];
$conAttributeValue1= $_GET['conAttributeValue1'];
$envAttributeValue1=$_GET['envAttributeValue1'];
$envAttributeValue2=$_GET['envAttributeValue2'];




$dataSharingPolicy=array_merge ($dataSharingPolicy, array("dataConsumer" => array ('attributeName' => $conAttributeName1, 'attributeValue' => $conAttributeValue1)));


$contextCondition['contextCondition']= array( array ( "function" => "greater-than-equal","category" => "environment", "attributeName" => "startDate",'AttributeValue' => $envAttributeValue1),
array ("operation" => "AND"),
 array ("function" => "less-than-equal","category" => "environment", "attributeName" => "endtDate",'AttributeValue' => $envAttributeValue2));
 


//******************************************* Dynamic to  Context Condition ***************************** 


//$numberOfConditions=count($_GET['operation']);
if (isset($_GET['operation'])>0)
{
$numberOfConditions=count($_GET['operation']);

$operation=$_GET['operation'];
$category=$_GET['category'];
$function=$_GET['function'];
$attributeName=$_GET['attributeName'];
$attributeValue=$_GET['attributeValue'];



for ($i=0;$i<$numberOfConditions;$i++)
{
echo $operation[$i]."<br>";
echo $category[$i]."<br>";
echo $function[$i]."<br>";
echo $attributeName[$i]."<br>";
echo $attributeValue[$i]."<br>";

$condition[$i]=array (array ("operation" => $operation[$i]),
  array ( "function" => $function[$i], "category" => $category[$i], "attributeName" => $attributeName[$i],'AttributeValue' => $attributeValue[$i]));
  
$contextCondition['contextCondition']=array_merge ($contextCondition['contextCondition'],$condition[$i]);
}

print_r($dataSharingPolicy);
}

$dataSharingPolicy=array_merge ($dataSharingPolicy, $contextCondition); 



$purpose = $_GET['purpose'];
if ($purpose!=null) $privacyObligation = array ('purpose' =>$purpose);
$granularity=$_GET['granularity'];
if ($granularity!=null) $privacyObligation = array_merge ($privacyObligation, array ('granularity' =>$granularity));

$anonymization=$_GET['anonymization'];
if ($anonymization=="true") $privacyObligation = array_merge ($privacyObligation, array ('anonymization' =>$anonymization));

$notification=$_GET['notification'];
if ($notification!=null) $privacyObligation = array_merge ($privacyObligation, array ('notification' =>$notification)); 

$accounting=$_GET['accounting'];
if ($accounting=="true") $privacyObligation = array_merge ($privacyObligation, array ('accounting' =>$accounting)); 

print_r($privacyObligation);

$dataSharingPolicy=array_merge ($dataSharingPolicy, array("privacyObligation" =>$privacyObligation)); 





$canShare=$_GET['canShare'];
$cardinality=$_GET['cardinality'];
$recurring=$_GET['recurring'];


$dataSharingPolicy=array_merge ($dataSharingPolicy, array("reSharingCondition" => array ( 'canShare' => $canShare, 'cardinality' => $cardinality, 'recurring' => $recurring)));

/*
$dataSharingPolicy[]=array('canShare' => $canShare);
$dataSharingPolicy[]=array('cardinality' => $cardinality);
$dataSharingPolicy[]=array('recurring' => $recurring);
$dataSharingPolicy[]=array('reSharingPolicyId' => $reSharingPolicyId);
*/




$securityToken = $_SESSION['securityToken'];  // in full version, we will use json web token (JSON) 


// write to the policy file.
$response['dataSharingPolicy'] = $dataSharingPolicy;
$newFileName = './policyRepositoy/reSharePolicy/'.$id.".json";
$fp = fopen($newFileName, 'w');
//fwrite($fp, '$response['dataSharingPolicy']');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));

fclose($fp);
print_r($dataSharingPolicy);
// send email with url and security token

$uri_token=$_SESSION['dataResource']."?securityToken=".$securityToken;
echo "<div align='center'><h2> Email Body</h2>";
echo "<h4>Alice has shared this resource with you. Please click on the link to get access </h4><br><a href='$uri_token'>".$uri_token."</a></div>";







?>


</body>
</html>