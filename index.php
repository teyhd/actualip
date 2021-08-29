<?php
require('config.php');
$ip = get_ip();
$dnsData["content"] = $ip;
$actual = gethostbyname($dom);
$host_ip = get_cloudflare();

if ($host_ip!=$ip){
    echo("<pre>");
    echo("Адреса не совпадают - запуск процесс замены<br>");

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $adr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dnsData));
    $result = curl_exec($ch);
    echo "Result: " . $result;
    echo("</pre>");
} 
$ans = ["yandex"=>$ip,"cloudflare"=>$host_ip,"internet"=>$actual];
$ans = json_encode($ans);
echo($ans);
function get_ip(){
$page = file_get_contents("https://yandex.ru/internet/");
preg_match('/<div>*\d.*?<\/div>/', $page, $ip);
$ip = trim($ip[0], "<div>\n /");
return $ip;
}
function get_cloudflare(){
    global $adr,$request_headers;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $adr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    $result = curl_exec($ch);
    $result = json_decode($result);
    $result = $result->result->content;
    return $result;
}
