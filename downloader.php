<style>* {	font-size: 10px;	font-family: verdana;}</style><?php$base_url = "http://www.eve-kill.net/?a=kill_detail&kll_id=";$folder = "./cache/" . getDomain($base_url) . "/";$ch = curl_init();for ($i = 1; $i <= 3237300; $i++) {	$url = $base_url . $i;	echo "$url<br />\n";	curl_setopt ($ch, CURLOPT_URL,$url);	curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)"); #pretend we're IE	curl_setopt ($ch, CURLOPT_TIMEOUT, 20);	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,1);	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);	$page = curl_exec ($ch);	echo strlen($page) . " bytes<br />\n";	$filename = "$folder$i.htm";	echo "$filename<br />\n";	$fp = fopen($filename, 'w');	fwrite($fp, $page);	fclose($fp);	echo "<br />\n";	if ($i > 100)		exit();}function getDomain($url) {    if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE) {        return false;    }    /*** get the url parts ***/    $parts = parse_url($url);    /*** return the host domain ***/    return str_replace("www.", "", $parts['host']);}