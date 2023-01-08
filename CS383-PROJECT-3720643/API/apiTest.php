<?php

$url = 'http://localhost/CS383-PROJECT-PHASE-1 3720643/API/JSON/employeeAPI.php';
$client  = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$jResponse = json_decode($response);
echo '<pre>';
print_r($jResponse->data[1]);


 ?>