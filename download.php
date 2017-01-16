
<!-- <?php

session_start();

require_once('config.php');

if ( isset( $_SESSION['myapp'] ) ) {
		
	$ch = curl_init(); 
	
	$headers = array( 'Authorization: OAuth oauth_version="1.0", oauth_signature_method="PLAINTEXT", oauth_consumer_key="' . $app_key . '", oauth_token="'  . $_SESSION['myapp']['oauth_access_token'] . '", oauth_signature="' . $app_secret . '&' . $_SESSION['myapp']['oauth_access_token_secret'] . '"' );
	
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers ); 
	curl_setopt( $ch, CURLOPT_URL, 'https://www.dropbox.com/sh/5nmgg663eyfu5vy/AAA4tnTClUfXucv5yMPEFZ3Na?dl=0?dl=1');
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
	$api = curl_exec($ch);
	
	$destination = "../SyncData/WebFile/DropBox";

	$file = fopen($destination, "w+");
	echo($file);
	fputs($file, $api);
	fclose($file);

	$apiJSON = json_decode($api);
	
	echo '<pre>';
	print_r( $apiJSON );
	echo '</pre>';



} -->
