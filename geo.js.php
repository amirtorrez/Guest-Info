<?php
$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
echo("
function geoplugin_request() { return '".$meta['geoplugin_request']."';} 
function geoplugin_status() { return '".$meta['geoplugin_status']."';} 
function geoplugin_city() { return '".$meta['geoplugin_city']."';} 
function geoplugin_region() { return '".$meta['geoplugin_region']."';} 
function geoplugin_regionCode() { return '".$meta['geoplugin_regionCode']."';} 
function geoplugin_regionName() { return '".$meta['geoplugin_regionName']."';} 
function geoplugin_areaCode() { return '".$meta['geoplugin_areaCode']."';} 
function geoplugin_dmaCode() { return '".$meta['geoplugin_dmaCode']."';} 
function geoplugin_countryCode() { return '".$meta['geoplugin_countryCode']."';} 
function geoplugin_countryName() { return '".$meta['geoplugin_countryName']."';} 
function geoplugin_continentCode() { return '".$meta['geoplugin_continentCode']."';} 
function geoplugin_latitude() { return '".$meta['geoplugin_latitude']."';} 
function geoplugin_longitude() { return '".$meta['geoplugin_longitude']."';} 
function geoplugin_currencyCode() { return '".$meta['geoplugin_currencyCode']."';} 
function geoplugin_currencySymbol() { return '".$meta['geoplugin_currencySymbol']."';} 
function geoplugin_currencySymbol_UTF8() { return '".$meta['geoplugin_currencySymbol_UTF8']."';}
function geoplugin_currencyConverter() { return '".$meta['geoplugin_currencyConverter']."';}

function geoplugin_countryState() { return '".$meta['geoplugin_city'].", ".$meta['geoplugin_region']."';} 
function geoplugin_stateCountry() { return '".$meta['geoplugin_region'].", ".$meta['geoplugin_countryName']."';} 
function geoplugin_cityCountry() { return '".$meta['geoplugin_city'].", ".$meta['geoplugin_countryName']."';} 
");
?>
