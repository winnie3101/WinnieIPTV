<?php
$url = "https://apis.wavve.com/fz/streaming?device=pc&partner=pooq&apikey=E5F3E0D30947AA5440556471321BB6D9&credential=none&service=wavve&pooqzone=none&region=kor&drm=none&targetage=all&contentid=C5202&hdr=hdr&videocodec=avc&audiocodec=aac&issurround=y&format=normal&withinsubtitle=y&contenttype=live&action=hls&protocol=hls&quality=1080p&deviceModelId=Windows%2010&guid=8ff1950c-a0a8-11ed-8cd0-3675fb283093&lastplayid=none&authtype=cookie&isabr=y&ishevc=y";
$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36');
   
    $data = curl_exec($ch);
    $json = json_decode($data);
    $szPlayUrl = $json->playurl."?".$json->awscookie;
	$szPlayUrl = preg_replace('/; /i', '_&', $szPlayUrl);
    header("location:$szPlayUrl");
?>