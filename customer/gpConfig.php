<?php


//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '706903260402-rotilbkmbrt9o3vb57vkhb899qvsj7em.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'wzTw0zakwO3d6pOMWrSEluiG'; //Google client secret
$redirectURL = 'http://localhost/mmtest/merecer'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>