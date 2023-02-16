<?php
    $bstrURL = "http://jtbcgolfnsports.joins.com/inc/main_ovenplayer_onair.asp";
    #$proxy = "59.11.153.88";
	#$proxyPort = "80";
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $bstrURL);
		#curl_setopt($ch, CURLOPT_PROXY, $proxy);
		#curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);
		#curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
		#curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
		#curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36');
		$data = curl_exec($ch);
		curl_close($ch);
	
    preg_match('/streamingURL: \'(.*?)\'/i', $data, $matches);

    $szPlayURL = $matches[1];
    header("location:$szPlayURL");
   
   
?>