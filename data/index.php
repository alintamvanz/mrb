<?php
error_reporting(0);
########################################
# c0ded by : alinko a.k.a shutdown57   #
# email    : alinkokomansuby@gmail.com #
########################################
function a_curry($url){
	@define('ch',curl_init());
	curl_setopt(ch,CURLOPT_URL,$url);
	curl_setopt(ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt(ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt(ch,CURLOPT_AUTOREFERER,1);
	curl_setopt(ch,CURLOPT_HEADER,0);
	$e=curl_exec(ch);
	return $e;
	curl_close(ch);
	
}
function a_ambil($pemisah,$string){
    return explode(chr(1),str_replace($pemisah,chr(1),$string));
}
$a_html="<html><head><title>MIRROR REPO BLC TELKOM KLATEN | alinko</title></head>";
$a_html.="<style>";
$a_html.="body{background:#000;color:#fff;text-align:center;}";
$a_html.="a{text-decoration:none;color:#fff;}a:hover{text-decoration:underline;}tr:hover{background:#f00}.autoindex_table{width:100%;border:2px solid #fff;border-radius:8px;}";
$a_html.="</style>";
$a_html.="<body>";
$a_html.="<h1> MIRROR REPOSITORY BLC TELKOM KLATEN </h1>";
$a_html.="<pre>";
$a_html.="YOUR IP   :".$_SERVER['REMOTE_ADDR']."<br>";
$a_html.="YOUR INFO :".$_SERVER['HTTP_USER_AGENT']."<br>";
$a_html.="</pre>";
if(empty($_GET['dir'])&&empty($_GET['file'])){
	$a_url="http://203.130.243.185/data/";
}else{
	if($_GET['file']){
	$a_url_frame="<h1> REVIEW </h1>";
	$a_url_frame.= "<center><iframe src='http://203.130.243.185/data/".$_GET['dir']."/".$_GET['file']."' style='width:100%;height:800px;' frameborder='0'></iframe></center>";
}else{
	$a_url="http://203.130.243.185/data/index.php?dir=".urlencode($_GET['dir']);
}
}
$a_curry=a_curry($a_url);
if(empty($_GET['file'])){
$a_ambil=a_ambil(array("<table class=\"autoindex_table\">","</table>"),$a_curry);
echo $a_html;
echo "MIRRORED TO :<a href='$a_url'  target='_blank'>$a_url</a>";
echo "<table class='autoindex_table'>";
print_r($a_ambil[1]);
echo "</table>";
}else{
	echo $a_html;
	echo $a_url_frame;
}
?>
