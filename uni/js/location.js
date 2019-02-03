

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {

var longitude=position.coords.latitude;
var latitude=position.coords.longitude;


// $.ajax({
  // type: 'POST',
  // url: 'contextAquirer.php',
  // data: {'longitude': longitude},
// });	 
			
		
			window.location.href = "http://localhost/abc/policy_evaluation.php";
//window.location.href = "http://localhost/abc/policy_evaluation.php?longitude=" + longitude + "&latitude=" + latitude;	
	 
	     //  alert(address_json_object[0].formatted_address)

		// var xmlhttp = new XMLHttpRequest();
        // xmlhttp.open("GET", "contextAquirer.php?longitude=" + longitude, true);
        // xmlhttp.send(); 
		 
		 
		 
		 
		 
		 
}
