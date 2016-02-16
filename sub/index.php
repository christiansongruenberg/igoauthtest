<?php
/**
 * Created by PhpStorm.
 * User: Christianson
 * Date: 13/02/2016
 * Time: 5:22 PM
 */

$params = array(
    'client_id' => '654ff94de9ee44cead7e4de4891d5d18',
    'client_secret' => 'e96b9424eee14238a947738fc4e6a753',
    'object' => 'user',
    'aspect' => 'media',
    'verify_token' => 'myVerifyToken',
    'callback_url' => 'http://159.203.6.68/sub/'
);

// Build Http query using params
$query = http_build_query ($params);

// Create Http context details
$contextData = array (
    'method' => 'POST',
    'header' => "Connection: close\r\n".
        "Content-Length: ".strlen($query)."\r\n",
    'content'=> $query );

// Create context resource for our request
$context = stream_context_create (array ( 'http' => $contextData ));

// Read page rendered as result of your POST request
$result =  file_get_contents (
    'https://api.instagram.com/v1/subscriptions/',  // page url
    false,
    $context);

echo $result;