<?php
	$URL = "https://cdn106.stm.trueid.net/live1/i001_multi_w_auto_tidapp.smil/chunklist_w380677423_b2159536_vo_t64TWFpbg==.m3u8?appid=trueid&type=live&visitor=web&drm=aes&uid=27529186&did=SHVZUzhxZjJXUGtXNVljRnBnOThzN0EzYmZmVWUwNlk&mpass=c-3LujSGiLWHPMAOpT4r0vS3V5_MAGxSjpb34cnTtvyIPESY_w5YZtbp8eYHHLriaL8zvruYkkZnc0MEgV9kac5N93R739ZOWv2O_xmiBzGy7JcinF7rAKMPmvrBniZ2Ojp1hdXvtxWUpqJSQFz9BdjT&sid=a4dfbb4917&rt=1675415021&tk=ZWyQHfEzTQB3LwjFz4M_F9y90oM4skWkAqh6DUrcvE0";
	$key = "https://nkd.stm.trueid.net/rotate_decryptor.php?token=5bbb379ee7217f3dcd72115b6cfb36b463baf5a22a2c099be03ea097222afa76&wowzasessionid=380677423&appid=trueid&type=live&visitor=web&drm=aes&uid=27529186&did=SHVZUzhxZjJXUGtXNVljRnBnOThzN0EzYmZmVWUwNlk&mpass=c-3LujSGiLWHPMAOpT4r0vS3V5_MAGxSjpb34cnTtvyIPESY_w5YZtbp8eYHHLriaL8zvruYkkZnc0MEgV9kac5N93R739ZOWv2O_xmiBzGy7JcinF7rAKMPmvrBniZ2Ojp1hdXvtxWUpqJSQFz9BdjT&sid=a4dfbb4917&rt=1675415021&tk=ZWyQHfEzTQB3LwjFz4M_F9y90oM4skWkAqh6DUrcvE0";
	$key_method = "AES-128";
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);
	openssl_decrypt(
		$URL,
		$key,
		$key_method
	);
		
    header("location:$data");
?>