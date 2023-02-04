<?php
    /*
		ID: KBS1 = 11
			KBS2 = 12
			KBS NEWS D = 81
			KBS Drama = N91
			KBS Joy = N92
			KBS Life = N93
			KBS Story = N94
			KBS Kids = N96
			KBS Dokdo Live = cctv01
			KBS World = 14
			KBS Radio 1 = 21
			KBS Radio 2 = 22
			KBS Radio 3 = 23
			KBS 1 FM = 24
			KBS 2 FM = 25
			KBS Hanminjok (한민족) FM = 26
			KBS World Radio = I92
	*/
	
    $id = $_GET['id'];
    $bstrURL = "https://pwwwapi.kbs.co.kr/api/v1/landing/live/channel_code/$id";
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $bstrURL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36");
        $data = curl_exec($ch);
        curl_close($ch);
    $json = json_decode($data);
    //channel_item[0].service_url
    $szPlayURL = $json->channel_item[0]->service_url;
    header("location:$szPlayURL");

?>