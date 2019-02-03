<?php
session_start();
//$_SESSION['dataResource']="http://localhost/swin/academicrecord.php";
require "dbConnect.php";
?>
<html>
<head><title>Policy Defination</title>
<link rel="stylesheet" type="text/css" href="css/datepicker.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<script type="text/javascript" src="js/datepicker.js"></script>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>

</head>
<body  align="center">

<br />
<?php



$_SESSION['dataResource'] = $_SERVER['HTTP_REFERER'];


$conn=database_Connection();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{

  
?>

<div class="layout">
<div id="logout"><a href="logoff.php">Logoff</a><br></div>
<h1 align="center">Data Sharing Policy</h1>
<form action="policy_process.php" method="GET">
<input type="hidden" id="dataResource" name="dataResource">


<p><label for="attributeName"><b>Policy Name</b></label> 
    <input type="text" placeholder="policyDsc" name="policyDsc">
	</p>
   <fieldset class="fieldset-format">
   <legend id="title">Data Consumer</legend>
    <input type="hidden" id="category" name="category" value="dataConsumer">
	<p><label for="attributeName">Attribute Name</label> 
    <input type="text" placeholder="Attribute Name" name="conAttributeName1">
	</p>
	<p><label for="Attribute Value">Attribute Value</label> 
				<input type="text" placeholder="Attribute Value" name="conAttributeValue1" >
			</p>
   </fieldset>
   

   
 
  <fieldset class="fieldset-format">
   <div id="dynamicInput">
   <legend id="title">Context Condition</legend>  
 <fieldset>
   <legend>Time</legend>
   	<p><label for="startDate">Start Date</label> 
				<input id='start_dt'  placeholder="Start Date" name="envAttributeValue1" class='datepicker'>
				</p>
	<p><label for="endDate">End Date</label> 
					<input id='another_dt' placeholder="End Date"  name="envAttributeValue2" class='myclass datepicker'>
	</p>
   </fieldset>
   
    
   
	</div>
	<div id="centered"><input type="button" value="Add Another Condition" onClick="addInput('dynamicInput');" /> </div>
	   
	

  </fieldset> <!--Composite Condition End-->
  
   
<fieldset class="fieldset-format">
   <legend id="title">Policy Obligation</legend>
   <p><label for="attributeName">Purpose</label> 
    <input type="text" placeholder="purpose" name="purpose">
	</p>
	<fieldset>
    <legend>Data Representation</legend>
   <p>
				<label for="granularity">Granularity</label> 
   			<select name="granularity" id="granularity">
			     <option value="null">Null</option>
			    <option value="level_1">Level-1</option>
				<option value="level_2">Level-2</option>			
				<option value="level_3">Level-3</option>
				<option value="level_4">Level-4</option>
			</select>
			</p> 
			<p>
				<label for="Anonymization">Anonymization</label> 
   			<select name="anonymization" id="anonymization">
			    <option value="true">Yes</option>
				<option value="false">No</option>			
			</select>
			</p> 
			
	</fieldset>
		<p><label for="notification">Notification</label> 
				<input type="text" placeholder="Email Address" name="notification">
			</p> 
			
			
			<p>
				<label for="Accounting">Accounting<label> 
   			<select name="accounting" id="accounting">
			    <option value="true">Yes</option>
				<option value="false">No</option>			
			</select>
			</p> 	
    </fieldset> <!--Privacy Obligation End-->

	<!--Re-sharing Constraints-->
	<fieldset class="fieldset-format">
   <legend id="title">Re-sharing Conditions</legend>
   <p>
				<label for="CanShare">CanShare</label> 
   			<select name="canShare" id="canShare">
			    <option value="true">Yes</option>
				<option value="false">No</option>			
			</select>
			</p> 

		<p><label for="cardinality">Cardinality</label> 
				<input type="text" placeholder="cardinality" name="cardinality">
			</p> 
		<p><label for="recurring">Recurring</label> 
				<input type="text" placeholder="recurring" name="recurring">
			</p> 	
	
			
    </fieldset> <!--Privacy Obligation End-->
 <div id="buttonStyle"><input type="submit" name="buttonName" class="button" value="Generate Policy (without Re-sharing Condition)"></input><input type="submit" name="buttonName"  class="button" value="Generate Policy (with Re-sharing Condition)"></input></div>
</form>
<?php
}
?>

</div>
</body>
</html>
