<?php
        // kr mbc
        /*
        MBC = 0;
        MBC-Drama = 1;
        MBC-Every1 = 2;
        MBC-M = 3;
        ALL THE K-POP = 4;
        MBC-On = 6;
        */
        $headers = [
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36",
            "X-FORWARDED-FOR: 121.254.133.162",
            "Referer: https://onair.imbc.com/"
        ];
        $id = isset($_GET['id'])?$_GET['id']:0;
        $ts = time()."123";
        $ch = curl_init();
		$bstrURL = "https://mediaapi.imbc.com/Player/".($id==0?"OnAirURLUtil?type=PC&t={$ts}":"OnAirPlusURLUtil?ch={$id}&type=PC&t={$ts}");
        curl_setopt($ch, CURLOPT_URL, $bstrURL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		
        $data = curl_exec($ch);
        curl_close($ch);
		
        $json = json_decode($data);
        $szPlayURL = str_replace('playlist.m3u8','chunklist.m3u8', $json->MediaInfo->MediaURL);
        header("location:$szPlayURL");

?>