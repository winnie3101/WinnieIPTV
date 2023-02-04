<?php
	$bstrURL = "https://ytn2.ytn.co.kr/hd/cdnurl.js";
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $bstrURL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36');
        $data = curl_exec($ch);
        curl_close($ch);

    preg_match('/hls":"(.*?)"/i', $data, $matches);

    $PlayURL = $matches[1];
    header("location:$PlayURL");
?>