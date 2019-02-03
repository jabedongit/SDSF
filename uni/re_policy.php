<?php
session_start();
//$_SESSION['dataResource']="http://localhost/swin/academicrecord.php";
?>
<html>
<head><title>Re-sharing Constraints</title>
<link rel="stylesheet" type="text/css" href="css/datepicker.css" /> 
<script type="text/javascript" src="js/datepicker.js"></script>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
/*
function valueAssignment()
{
var oldURL = document.referrer;

document.getElementById("dataResource").setAttribute("value",oldURL);
}
*/
/*
function addInput(divName){
			
            var newdiv = document.createElement('div');


          newdiv.innerHTML = "<fieldset class='fieldset-format'><legend id='title'>Composite Condition</legend><p><label for='attributeName'>Operation</label><select name='operation' id='operation'>    <option value='null'>Null</option><option value='and'>AND</option><option value='or'>OR</option><option value='xor'>XOR</option></select></p></p></fieldset><fieldset><legend>Category <select><option>Data Subject</option><option>Data Consumer</option><option>Environment</option></select></legend><p><label for='function'>Function</label> <select name='function' id='function'><option value='equal'>Equal</option><option value='not'>Not</option><option value='less-than'>Less-than</option>		<option value='greater-than'>Greater-than</option><option value='less-than-equal'>Less-than-equal</option><option value='greater-than-equal'>Greater-than-equal</option></select>		</p><label for='attributeName'>Attribute Name</label><input type='text' placeholder='Attribute Name' name='attributeName' required></p><p><label for='attributeValue'>Attribute Value</label>	<input type='text' placeholder='Attribute Value' name='attributeValue' required></p></fieldset>";
*/
          /*newdiv.innerHTML = "jabed";*/
		//  document.getElementById(divName).appendChild(newdiv);


</script>

<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<style>
.layout{
width : 40%;
margin: auto;
}

button {
    background-color: #4CAF50;
    color: black;
    padding: 14px 20px;
	font-size: 1.275em;
	font-weight: bold;
   	text-align: center;
    border: none;
    cursor: pointer;
    width: 100%;
}
#centered {
  width : 60%;
  padding: 14px 20px;
  margin: 0 auto;
  }
.fieldset-format
{
  margin-bottom : 20px;
}
#title
{
font-size: 1.1em;
font-weight: bold;
}
</style>
</head>
<body  align="center">

<br />
<div class="layout">
<h1 align="center">Re-Sharing Constraints</h1>
<form action="policy_process.php" method="GET">
<input type="hidden" id="dataResource" name="dataResource">
<input type="hidden" name="reSharingPolicyId" value=<?php $_GET['reSharingPolicyId']?>>


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
   
   
   <fieldset class="fieldset-format">
   <legend id="title">Composite Condition</legend>
   <p><label for="operation1">Operation</label> 
   			<select name="operation1" id="operation">
			    <option value="null">Null</option>
				<option value="and">AND</option>			
				<option value="or">OR</option>
				<option value="xor">XOR</option>
			</select>
		</p>
	</p>
	
   </fieldset>
   
   
   
   
 <fieldset>
	<legend>Category 
		<select name="category2">
			<option value="dataSubject">Data Subject</option>
			<option value="dataConsumer">Data Consumer</option>
			<option value="environment">Environment</option>
		</select>
	</legend>
   <p><label for="function">Function</label> 
   			<select name="function1" id="function">
			    <option value="equal">Equal</option>
				<option value="not">Not</option>			
				<option value="less-than">Less-than</option>
				<option value="greater-than">Greater-than</option>
				<option value="less-than-equal">Less-than-equal</option>
				<option value="greater-than-equal">Greater-than-equal</option>
			</select>
		</p>
   <p><label for="conAttributeName">Attribute Name</label> 
    <input type="text" placeholder="Attribute Name" name="conAttributeName2">
	</p>
	<p><label for="female">Attribute Value</label> 
				<input type="text" placeholder="Attribute Value" name="conAttributeValue2">
			</p> 
    </fieldset>  
	
	
		   
	

  </fieldset> <!--Composite Condition End-->
  
   
<fieldset class="fieldset-format">
   <legend id="title">Policy Obligation</legend>
   <p><label for="attributeName">Purpose</label> 
    <input type="text" placeholder="purpose" name="purpose" required>
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
   			<select name="granularity" id="granularity">
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
	
 <div id="centered"><button type="submit">Generate Policy</button></div>
</form>
</div>
</body>
</html>
