<?php

session_start();

require_once('config.php');

$accesstoken_url = 'http://localhost/SyncData/Application/DropBox/accesstoken.php';

$ch = curl_init(); 

$headers = array( 'Authorization: OAuth oauth_version="1.0", oauth_signature_method="PLAINTEXT", oauth_consumer_key="' . $app_key . '", oauth_signature="' . $app_secret . '&"' );

curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers ); 
curl_setopt( $ch, CURLOPT_URL, "https://api.dropbox.com/1/oauth/request_token" );  
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );  
$code = curl_exec( $ch );

parse_str( $code, $codeJSON );

$json_access = json_decode( $code );

if ( isset( $json_access->error ) ) {
	echo '<br><br>FATAL ERROR: ' . $json_access->error . '<br><br>';
	die();
}

$_SESSION['myapp'] = array();
$_SESSION['myapp']['oauth_request_token'] = $codeJSON['oauth_token'];
$_SESSION['myapp']['oauth_request_token_secret'] = $codeJSON['oauth_token_secret'];

header( 'Location: https://www.dropbox.com/1/oauth/authorize?oauth_token=' . $codeJSON['oauth_token'] . '&oauth_callback=' . $accesstoken_url );
