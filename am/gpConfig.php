<?php
session_start();

//Include Google client library 
include_once 'google/src/Google_Client.php';
include_once 'google/src/contrib/Google_Oauth2Service.php';

//require_once '/google-api-php-client-2.1.3_PHP54/vendor/autoload.php';

/*
 * Configuration and setup Google API
 */
$clientId = '895945965240-kk7dhgto0tg38v36had4od7b83k6vsv6.apps.googleusercontent.com';
$clientSecret = 'sXECVOv_qGplIEwoXdhRNsSC';
$redirectURL = 'http://localhost/am/login.php';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Authorization Manager Login');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>