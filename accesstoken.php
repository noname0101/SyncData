<?php

session_start();

require_once('config.php');

$metadata_url = 'http://localhost/SyncData/Application/DropBox/metadata.php';
//$download_url = 'http://localhost/SyncData/Application/DropBox/download.php';

if ( isset( $_GET['oauth_token'] ) && isset( $_GET['uid'] ) && isset( $_SESSION['myapp'] ) ) {
	
	$ch = curl_init(); 
	
	$headers = array( 'Authorization: OAuth oauth_version="1.0", oauth_signature_method="PLAINTEXT", oauth_consumer_key="' . $app_key . '", oauth_token="'  .$_GET['oauth_token'] . '", oauth_signature="' . $app_secret . '&' . $_SESSION['myapp']['oauth_request_token_secret'] . '"' );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers ); 
	
	curl_setopt( $ch, CURLOPT_URL, "https://api.dropbox.com/1/oauth/access_token" );  
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );  
	$accesstoken = curl_exec( $ch );
	
	parse_str( $accesstoken, $accesstokenJSON );

	error_log( $accesstoken );
	
	$json_access = json_decode( $accesstoken );

	if ( isset( $json_access->error ) ) {
		echo '<br><br>FATAL ERROR: ' . $json_access->error . '<br><br>';
		die();
	}
	
	$_SESSION['myapp']['uid'] = $accesstokenJSON['uid'];
	$_SESSION['myapp']['oauth_access_token'] = $accesstokenJSON['oauth_token'];
	$_SESSION['myapp']['oauth_access_token_secret'] = $accesstokenJSON['oauth_token_secret'];
	

	header( 'Location: ' . $metadata_url );

	
}
