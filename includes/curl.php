<?php
class curl {
	public static function http($url, $data = null) {
		if (empty($url)) {
			return null;
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		if (preg_match('/^https:/', $url)) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:37.0) Gecko/20100101 Firefox/37.0');
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		if ($data) {
			//设置为POST方式
			curl_setopt($ch, CURLOPT_POST, 1);
			//POST数据
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
		}
		$response = curl_exec($ch);
		if (curl_errno($ch) > 0) {
			echo "CURL ERROR:$url " .curl_error($ch).'url:'.$url."\n";
		}
		//throw new Exception("CURL ERROR:$url " . curl_error($ch));
		return $response;
	}
}