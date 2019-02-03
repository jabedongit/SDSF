function valueAssignment()
{
var oldURL = document.referrer;

document.getElementById("dataResource").setAttribute("value",oldURL);
}

function addInput(divName){
			
            var newdiv = document.createElement('div');


          newdiv.innerHTML = "<fieldset class='fieldset-format'><legend id='title'>Composite Condition</legend><p><label for='attributeName'>Operation</label><select name='operation[]' id='operation'>    <option value='null'>Null</option><option value='and'>AND</option><option value='or'>OR</option><option value='xor'>XOR</option></select></p></p></fieldset><fieldset><legend>Category <select name='category[]'><option value='dataSubject'>Data Subject</option><option value='dataConsumer'>Data Consumer</option><option value='environment'>Environment</option></select></legend><p><label for='function'>Function</label> <select name='function[]' id='function'><option value='equal'>Equal</option><option value='not'>Not</option><option value='less-than'>Less-than</option><option value='greater-than'>Greater-than</option><option value='less-than-equal'>Less-than-equal</option><option value='greater-than-equal'>Greater-than-equal</option></select>		</p><label for='attributeName'>Attribute Name</label><input type='text' placeholder='Attribute Name' name='attributeName[]' required></p><p><label for='attributeValue'>Attribute Value</label>	<input type='text' placeholder='Attribute Value' name='attributeValue[]' required></p></fieldset>";

          /*newdiv.innerHTML = "jabed";*/
		  document.getElementById(divName).appendChild(newdiv);

    }