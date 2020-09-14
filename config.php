 <?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('179557976373-a80jmie8fva67oaguut2h02m3maomkpr.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('vdid2fDQ7vO3E_FqUZ06Buog');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://preneur-news.herokuapp.com/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>
