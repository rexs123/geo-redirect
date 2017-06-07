<?php
ob_start();
function getUserIP() {
  $client  = @$_SERVER['HTTP_CLIENT_IP'];
  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
  $remote  = $_SERVER['REMOTE_ADDR'];
  if(filter_var($client, FILTER_VALIDATE_IP)) {
    $ip = $client;
  } elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
    $ip = $forward;
  } else {
    $ip = $remote;
  } return $ip;
}
function getCurlData($url) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
	$curlData = curl_exec($curl);
	curl_close($curl);
	return $curlData;
}

$ip = getUserIP();
$lookup = getCurlData("http://freegeoip.net/json/$ip");
$cc = $obj->country_code;
switch($cc) {
  case "CA":
    header("Location: https://google.ca");
  break;
  case "GB":
    header("Location: https://google.co.uk");
  break;
  case "AU":
    header("Location: https://google.com.au");
  break;
  case "DE":
    header("Location: https://google.de");
  break;
  case "FR":
    header("Location: https://google.fr");
  break;
  case "DK":
    header("Location: https://google.dk");
  break;
  case "NZ":
    header("Location: https://google.co.nz");
  break;
  case "PH":
    header("Location: https://google.com.ph");
  break;
  case "US":
    header("Location: https://google.us");
  break;
  default:
    header("Location: https://google.com");
  break;
}
