<?php
    /*
        S01 = SBS
        S02 = SBS-Sports
        S03 = SBS-Plus
        S04 = SBS-Fun
        S05 = SBS-Golf
        S06 = SBS-Biz
        S07 = SBS-POWER FM
        S08 = SBS-LOVE FM
        S09 = SBS-MTV
        S19 = SBS-GorealraM

        // Radio //
        * S17 = SBS-POWER FM *
        * S18 = SBS-LOVE FM *
        
    */
   
    $id = $_GET['id']; //S01
	$bstrURL = "https://dev.apis.sbs.co.kr/play-api/2.0/onair/channel/$id?v_type=2&platform=pcweb&protocol=hls&ssl=N&rscuse=&jwt-token=N&rnd=616";
	#$proxy = "115.144.102.39";
	#$proxyPort = "10080";
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $bstrURL);
		#curl_setopt($ch, CURLOPT_PROXY, $proxy);
		#curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);
		#curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
		#curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTPS');
		#curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36');
		$data = curl_exec($ch);
		curl_close($ch);
   
    $json = json_decode($data);
    //onair.source.mediasource.mediaurl
    $szPlayUrl = $json->onair->source->mediasource->mediaurl;
    header("location:$szPlayUrl");
?>