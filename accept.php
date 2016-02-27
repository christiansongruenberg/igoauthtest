<?php
$get = $_GET['code'];

/*$url = 'https://api.instagram.com/oauth/access_token';
$fields = array(
    'client_id' => '654ff94de9ee44cead7e4de4891d5d18',
    'client_secret' => 'e96b9424eee14238a947738fc4e6a753',
    'grant_type' => 'authorization_code',
    'redirect_uri' => 'http://localhost/oauth/accept.php',
    'code' => $get
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

echo $result;

//close connection
curl_close($ch);*/

$params = array(
    'client_id' => '654ff94de9ee44cead7e4de4891d5d18',
    'client_secret' => 'e96b9424eee14238a947738fc4e6a753',
    'grant_type' => 'authorization_code',
    'redirect_uri' => 'https://localhost/oauth/accept.php',
    'code' => $get
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
    'https://api.instagram.com/oauth/access_token',  // page url
    false,
    $context);

var_dump($result);

// Server response is now stored in $result variable so you can process it

?>
<!doctype html>
<html lang="en">
<head>
        <script src="accept.js"></script>
        <meta charset="UTF-8">
        <title>Document</title>
</head>
<body>

</body>
</html>
