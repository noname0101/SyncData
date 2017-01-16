s<?php

session_start();

require_once('config.php');

if ( isset( $_SESSION['myapp'] ) ) {
		
	$ch = curl_init(); 
	
	$headers = array( 'Authorization: OAuth oauth_version="1.0", oauth_signature_method="PLAINTEXT", oauth_consumer_key="' . $app_key . '", oauth_token="'  . $_SESSION['myapp']['oauth_access_token'] . '", oauth_signature="' . $app_secret . '&' . $_SESSION['myapp']['oauth_access_token_secret'] . '"' );
	
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers ); 
	curl_setopt( $ch, CURLOPT_URL, 'https://api.dropbox.com/1/metadata/sandbox' );  
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
	$api = curl_exec($ch);
	
	$apiJSON = json_decode($api);
	
	echo '<pre>';
	print_r( $apiJSON );
	echo '</pre>';

}