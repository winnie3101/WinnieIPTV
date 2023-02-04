<?php
    // MBC 표준FM = sfm
	// MBC FM4U = mfm
	// MBC 올댓뮤직 = chm
	$headers =[
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36",
            "Referer: https://miniwebapp.imbc.com/"
        ];
	
	$id = $_GET['id'];
    $bstrURL = "https://sminiplay.imbc.com/aacplay.ashx?channel={$id}&protocol=M3U8&agent=webapp";
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $bstrURL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);
   
    header("location:$data");
?>