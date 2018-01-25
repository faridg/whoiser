<?php
session_start();

$domain = $_POST['domain'];

class Whois{
	private $WHOIS_SERVERS = array(
		"com"               =>  array("whois.verisign-grs.com","whois.crsnic.net"),
		"net"               =>  array("whois.verisign-grs.com","whois.crsnic.net"),
		"org"               =>  array("whois.pir.org","whois.publicinterestregistry.net")
		);
	public function whoislookup($domain)
	{
	$domain = trim($domain);
	if(substr(strtolower($domain), 0, 7) == "http://") $domain = substr($domain, 7);
	if(substr(strtolower($domain), 0, 4) == "www.") $domain = substr($domain, 4);
	if(preg_match("/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/",$domain))
		return $this->queryWhois("whois.lacnic.net",$domain);
	elseif(preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i",$domain))
	{
$domain_parts = explode(".", $domain);
$tld = strtolower(array_pop($domain_parts));
$server = $this->WHOIS_SERVERS[$tld][0];
if(!$server) {
	return "Error: No Whois server found for $domain";
	}
$res=$this->queryWhois($server,$domain);
while(preg_match_all("/Whois Server: (.*)/", $res, $matches))
{
$server=array_pop($matches[1]);
$res=$this->queryWhois($server,$domain);
}
return $res;
}
else
return "Invalid Entry";
}
private function queryWhois($server,$domain)
{
$fp = @fsockopen($server, 43, $errno, $errstr, 20) or die("Sockerror " . $errno . " - " . $errstr);
if($server=="whois.verisign-grs.com")
$domain="=".$domain;
fputs($fp, $domain . "\r\n");
$out = "";
while(!feof($fp)){
$out .= fgets($fp);
}
fclose($fp);
return $out;
}
}

$whois=new Whois;

//echo '<pre>'. $whois->whoislookup($domain) .'</pre>';

?>