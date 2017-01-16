<?php

session_start();

require_once('config.php');

$createToken = 'http://api.sendspace.com/rest/?method=auth.createtoken&api_key=YR2ZXGTLW2&api_version=1.0&response_format=XML&app_version=0.1';
$ch = curl_init($createToken); 
$request_token_response = curl_exec( $ch );
parse_str( $request_token_response, $parsed_request_token );
$json_access = json_decode( $request_token_response );

$login = 'http://api.sendspace.com/rest/?method=auth.login&token=57md654jwfl6l25idskzh8x3b5zwp46k&user_name=memamemanmeman@gmail.com&tokened_password=2cb501e4j86ef8ad17f6b26b90ee5764';
$ch2 = curl_init($login); 
$request_token_response2 = curl_exec( $ch2 );
parse_str( $request_token_response2, $parsed_request_token2 );
$json_access = json_decode( $request_token_response2 );


?>