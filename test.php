<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.google.com/favicon.ico",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
echo "结果:";
echo "<pre>";
var_dump($response);
curl_close($curl);

