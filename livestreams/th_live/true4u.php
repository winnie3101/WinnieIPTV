<?php
    $URL = "https://www.true4u.com/live-api/signer-url";
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);
		
    $PlayURL = str_replace('playlist.m3u8','pl_720p/index.m3u8', $data);
    header("location:$PlayURL");
?>