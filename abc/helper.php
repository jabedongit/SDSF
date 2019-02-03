<?php

require "jwt_helper.php";

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

//************************************************************ JSON Web Token **************************************************************//


// Generate Security Token.
function tokenGenerate()
{
$token = array();
date_default_timezone_set("Australia/Sydney");
$token['id']=$_SESSION['dataSubject'];
$token['time']=date("Y-m-d H:i:s");
$generatedToken=JWT::encode($token, 'secret_server_key');
return $generatedToken;
}

// Generate Authorization Token
function authzToken()
{

$token = array();
date_default_timezone_set("Australia/Sydney");
//$token['id']=$_SESSION['dataSubject'];
$token['time']=date("Y-m-d H:i:s");
$authzToken=JWT::encode($token, 'secret_server_key');
return $authzToken;

}
//catchToken=$_GET['token'];
/*
$token = JWT::decode($generatedToken, 'secret_server_key');
echo "<br>".$token->id."<br>";
print_r($token);
*/
?>