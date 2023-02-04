<?php
	// Live Stream parse (WAVVE) By Winnie

	// WAVVE LIVE CHANNELS LIST

	// KBS1 = K01
	// KBS2 = K02
	// KBS JOY = K04
	// KBS Life = K05
	// KBS Drama = K06
	// KBS Story = K09
	// MBC = M01
	// MBC Drama = M02
	// MBC Every1 = M03
	// MBC M = M06
	// MBC ON = M14
	// SBS = S01
	// SBS  = S02
	// SBS funE = S04
	// YTN = C2101
	// Hyundai Home Shopping (현대홈쇼핑) = C4101
	// SK stoa (SK스토아) = F2701
	// TV CHOSUN = C2601
	// Gongyoung Home Shopping (공영홈쇼핑) = F6901
	
	// WAVVE VOD CHANNELS LIST
	
	// MBC VOD (MBC 무한도전) = PM1
	// iHQ Delicious guys (iHQ 맛있는녀석들) = C5202
	// KBS 2 Days & 1 Night (KBS 1박 2일) = K15
	
	

	$id = $_GET['id'];
	$url = "https://apis.wavve.com/fz/streaming?device=pc&partner=pooq&apikey=E5F3E0D30947AA5440556471321BB6D9&credential=none&service=wavve&pooqzone=none&region=kor&drm=none&targetage=all&contentid={$id}&hdr=hdr&videocodec=avc&audiocodec=aac&issurround=y&format=normal&withinsubtitle=y&contenttype=live&action=hls&protocol=hls&quality=1080p&deviceModelId=Windows%2010&guid=8ff1950c-a0a8-11ed-8cd0-3675fb283093&lastplayid=none&authtype=cookie&isabr=y&ishevc=y";
	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_PROXY, '220.87.121.155:80');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36');
   
		$data = curl_exec($ch);
		$json = json_decode($data);
		$szPlayUrl = $json->playurl."?".$json->awscookie;
		$szPlayUrl = preg_replace('/; /i', '_&', $szPlayUrl);
		
		if ($id == K01 && K02 && K04 && K05 && K06 && K09 && M01 && M02 && M03 && M06 && S01 && C2101 && F6901 && F2701 && C2601) {		// SBS, YTN, Gongyoung Home Shopping, SK stoa
			$szPlayUrl = str_replace('AVC-FHD_5M-TS-KO-221026000000.m3u8','AVC/HD_5M/TS/KO/221026000000/live.m3u8', $szPlayUrl);	// Replace for force 1080p
		}
		if ($id == C4101 && PM1 && K15) {		// Hyundai Home Shopping, MBC VOD, KBS 2 Days & 1 Night, 
			$szPlayUrl = str_replace('AVC-HD_2M-TS-KO-221026000000.m3u8','AVC/HD_2M/TS/KO/221026000000/live.m3u8', $szPlayUrl);		// Replace for force 720p
		}
		else {		// iHQ Delicious guys, 
			$szPlayUrl = str_replace('live5000.m3u8','5000/live.m3u8', $szPlayUrl);		// Replace for force 1080p
		}
	
	header("location:$szPlayUrl");
?>