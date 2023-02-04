<?php
    $bstrURL = "https://www.amarintv.com/live";
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $bstrURL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36');
        $data = curl_exec($ch);
        curl_close($ch);

    preg_match('/live_url":"(.*?)"/i', $data, $matches);
	$matches = preg_replace('/\\\u0026/i', '&', $matches);
	$matches = str_replace('index.m3u8','1080p/index.m3u8', $matches);

    $PlayURL = $matches[1];
    header("location:$PlayURL");
   
   
?>