<?php
$id_rec = "IDRECORD"; // home.teyhd.ru
$dom = 'home.teyhd.ru';
$request_headers = array(
    'X-Auth-Email: YOUR@mail.ru',
    'X-Auth-Key: YOUR',
    'Content-Type: application/json'
);
$dnsData = array();
$dnsData["type"] = "A";
$dnsData["name"] = "home.teyhd.ru";
$dnsData["ttl"] = 120;
$dnsData["proxied"] = false;
$adr = "https://api.cloudflare.com/client/v4/zones/<ZONEID>/dns_records/{$id_rec}";