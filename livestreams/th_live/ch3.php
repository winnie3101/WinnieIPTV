<?php
    $bstrURL = "https://api-ch3plus.mello.me/api/live";
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $bstrURL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36');
        $data = curl_exec($ch);
        curl_close($ch);
		
		$json = json_decode($data);
		$PlayURL = $json->result->streamUrl;

	$matches = str_replace('playlist.m3u8', 'playlist_720p/index.m3u8', $matches);
	
    #$PlayURL = $matches[1];
    header("location:$PlayURL");
?>
