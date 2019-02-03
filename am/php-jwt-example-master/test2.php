<?php


//************************************************************ JSON Web Token **************************************************************//
//require "vendor/autoload.php";
require "jwt_helper.php";


$token = array();
$token['id'] = "Jabed";
date_default_timezone_set("Australia/Sydney");
echo date("Y-m-d H:i:s")."<br>"; 
//$token['time']=date("Y-m-d H:i:s");
$generatedToken=JWT::encode($token, 'secret_server_key');
echo $generatedToken;

//catchToken=$_GET['token'];

$token = JWT::decode($generatedToken, 'secret_server_key');
echo "<br>".$token->id."<br>";
print_r($token);

//echo JWT::decode("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9", 'secret_server_key')."<br>";

//*************************************************************** Unique ID **************************************************************//


function uniqidReal($lenght = 13) {
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}


echo "Test:"."<br>";

for($i=0;$i<20;$i++) {
    echo uniqid()."------------".uniqidReal()."<br>";
}





?>