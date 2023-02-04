<?php
    // parsr for Channel A living
    $bstrURL = "http://www.ichannela.com/com/cmm/onair.do";

    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $bstrURL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36");
        $data = curl_exec($ch);
        curl_close($ch);
	preg_match('/vUrl" : "(.*?)"/i', $data, $matches);		//vUrl_rtmp
	var_dump($matches);


    $szPlayURL = $matches[1];
    header("location:$szPlayURL");
   
   
?>