<?php
require_once './data/SxGeo.php';

function getIp() {
    $keys = [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'REMOTE_ADDR'
    ];
    foreach ($keys as $key) {
        if (!empty($_SERVER[$key])) {
            $ip = trim(end(explode(',', $_SERVER[$key])));
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }
}
$ip = getIp();
$SxGeo = new SxGeo('./data/SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);
$city = $SxGeo->getCityFull($ip);

$IPcity = $city['city']['name_en'];
$IPlat = $city['city']['lat'];
$IPlon = $city['city']['lon'];
$IPcountry = $city['country']['name_en'];
