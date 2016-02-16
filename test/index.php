<?php
/**
 * Created by PhpStorm.
 * User: Christianson
 * Date: 13/02/2016
 * Time: 6:45 PM
 */
$params = array(
    'client_id' => 'heythere'
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
    'http://159.203.6.68/sub/',  // page url
    false,
    $context);

echo $result;