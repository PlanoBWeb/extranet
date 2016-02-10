<?php

	function validaUrl($url){
		$urlCerta = strpos($url, "http://");
		if($urlCerta === false){
			$url = "http://". $url;
		}
		return $url;
	}

?>