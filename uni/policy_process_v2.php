<?php
session_start();

?>
<html>
<head><title>Accademic record</title></head>
<body  align="center">

<br />

<h1 align="center"> Your document is shared.</h1>
<br />
<?php

//echo "URL==".$_GET['dataResource'];
/*
$dataSharingPolicy = array();
$conAttributeName = array();
$conAttributeValue = array();
$subAttributeName = array();
$subAttributeValue = array();
$envAttributeName = array();
$envAttributeValue = array();


foreach($_GET as $key => $value){
	if ($key == "dataResource")
	{   
		echo $_GET['dataResource']. "<br />\r\n";
		$hash_uri= hash ("md5", $_GET['dataResource']);
		echo $hash_uri. "<br />\r\n";
	}
	else if (is_array($value)) 
	{
		if ($key == 'conAttributeName'){
			$conAttributeName = $value;
		}
		if ($key == 'conAttributeValue'){
			$conAttributeValue = $value;
		}
		echo $key; print_r($value);
	}
	else
	{
		//$dataSharingPolicy[]=array('key'=> $key, 'value'=> $value);
	//	$dataSharingPolicy[]=array($key => $value);
	//	print_r ($dataSharingPolicy);
       echo $key . " : " . $value . "<br />\r\n";
		
	}
	
}
*/








//$response['dataSharingPolicy'] = $dataSharingPolicy;
//$fp = fopen('results.json', 'w');
//fwrite($fp, json_encode($response));
//fclose($fp);


?>


</body>
</html>