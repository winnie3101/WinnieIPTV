<?php

$url = "https://imnewsapi.imnews.imbc.com/live/getinfo?ch=1";
$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36');
   
    $data = curl_exec($ch);
    $json = json_decode($data);
    //Live Stream URL
    $szPlayUrl = $json->LiveUrl;
    header("location:$szPlayUrl");
?>