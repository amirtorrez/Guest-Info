<?php
echo('<!Doctype html><html>');
echo('<head>');
echo('<title>Guest Info</title>');
echo('<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">');
echo('</head>');
echo('<body>');

function getLocation($var){
    $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
    switch($var){
        case "latitud": return $meta['geoplugin_latitude']; break;
        case "longitud": return $meta['geoplugin_longitude']; break;
        case "ciudad": return $meta['geoplugin_city']; break;
        case "estado": return $meta['geoplugin_region']; break;
        case "pais": return $meta['geoplugin_countryName']; break;
        case "pais_codigo": return $meta['geoplugin_countryCode']; break;
        case "region_codigo": return $meta['geoplugin_regionCode']; break;
        case "ciudad_estado": $ciudad_estado = $meta['geoplugin_city'].', '.$meta['geoplugin_region']; return $ciudad_estado; break;
        case "estado_pais": $estado_pais = $meta['geoplugin_region'].', '.$meta['geoplugin_countryName']; return $estado_pais; break;
        case "ciudad_pais": default: $ciudad_pais = $meta['geoplugin_city'].', '.$meta['geoplugin_countryName']; return $ciudad_pais; break;
    }
}

function getSO(){
	$agente = $_SERVER['HTTP_USER_AGENT'];
	if (preg_match('/linux/i', $agente)) {
		 $so = "Linux";
	} elseif (preg_match('/ubuntu/i', $agente)) {
    		$so = "Ubuntu";
	} elseif (preg_match('/macintosh|mac os x/i', $agente)) {
		 $so = "Mac";
	} elseif (preg_match('/windows|win32/i', $agente)) {
		 $so = "Windows";
	} elseif (preg_match('/android/i', $agente)) {
    		$so = "Android";
	} elseif (preg_match('/ios/i', $agente)) {
        	$so = "iOS";
	} elseif (preg_match('/Mobile/i', $agente) && preg_match('/Gecko/i', $agente)){
        	$so = "Firefox OS";
	} else {
		$so = "Desconocido";
	}
	return $so;
}

function getBrowser(){
	$agente = $_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/MSIE/i',$agente) || preg_match('/.net/i',$agente) || preg_match('/trident/i',$agente) && !preg_match('/Opera/i',$agente)){
		$navegador = 'Internet Explorer';
	}
	elseif(preg_match('/Edge/i',$agente)){
    		$navegador = 'Microsoft Edge';
	}
	elseif(preg_match('/Spartan/i',$agente)){
        	$navegador = 'Microsoft Spartan';
	}
	elseif(preg_match('/Firefox/i',$agente)){
		$navegador = 'Mozilla Firefox';
	}
	elseif(preg_match('/Chromium/i',$agente)){
		$navegador = "Chromium";
	}
	elseif(preg_match('/Chrome/i',$agente)){
		$navegador = "Chrome";
	}
	elseif(preg_match('/Safari/i',$agente)){
		$navegador = 'Safari';
	}
	elseif(preg_match('/Opera Mini/i',$agente)){
    	$navegador = 'Opera Mini';
	}
	elseif(preg_match('/Opera/i',$agente)){
		$navegador = 'Opera';
	}
	elseif(preg_match('/Netscape/i',$agente)){
		$navegador = 'Netscape';
	} else {
    	$navegador = "Desconocido";
	}
    return $navegador;
}


echo("<b>Ubicaci&oacute;n</b>: ".getLocation('ciudad_pais')."<br>");
echo("<b>Navegador:</b> ".getBrowser()."<br>");
echo("<b>SO:</b> ".getSO()."<br>");
//echo($_SERVER['HTTP_USER_AGENT']);

echo('</body></html>');
?>
