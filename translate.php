<?php
	function translate($cn_text){
		$encoded_text = urlencode($cn_text);
		$url_base = "http://translate.google.cn/translate_a/single?client=t&sl=zh-CN&tl=en&hl=zh-CN&dt=bd&dt=ex&dt=ld&dt=md&dt=qc&dt=rw&dt=rm&dt=ss&dt=t&dt=at&dt=sw&ie=UTF-8&oe=UTF-8&ssel=0&tsel=0&q=";
		$url_final = $url_base . $encoded_text;
		$curl_handler = curl_init();
		curl_setopt($curl_handler, CURLOPT_URL, $url_final);
		curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl_handler, CURLOPT_HEADER,0);
		curl_setopt($curl_handler, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curl_handler, CURLOPT_ENCODING, 'gzip,deflate,utf8');
		$output = mb_convert_encoding(curl_exec($curl_handler), "GB2312", "UTF8");
		curl_close($curl_handler);
		$pattern = '/\[{3}\".+?\"/';
		$matches = Array();
		preg_match($pattern, $output, $matches);
		$text = substr($matches[0],4,-1);
		return $text;
	}
	echo translate('中文转英文测试');


?>
