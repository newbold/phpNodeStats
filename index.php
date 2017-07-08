<?php

/*         __          _   __          __    _____ __        __      
    ____  / /_  ____  / | / /___  ____/ /__ / ___// /_____ _/ /______
   / __ \/ __ \/ __ \/  |/ / __ \/ __  / _ \\__ \/ __/ __ `/ __/ ___/
  / /_/ / / / / /_/ / /|  / /_/ / /_/ /  __/__/ / /_/ /_/ / /_(__  ) 
 / .___/_/ /_/ .___/_/ |_/\____/\__,_/\___/____/\__/\__,_/\__/____/  
/_/         /_/                                                      
                  Bitcoin node statistics for everyone!

                    Project: https://github.com/newbold/phpNodeStats
                    License: https://opensource.org/licenses/MIT
                  Donations: 16crzU7ogpqLp6CvbVrgXWrGrYjgzhtTLx

  Get started:
  
  1. Customize the values in the configuration section.
  2. Upload the PHP file to your web server.
  3. Ensure that PHP can write to the directory containing the file.
  
  That's it!
  
*/

define('RPC_ADDR', '127.0.0.1');
define('RPC_PORT', '8332');
define('RPC_USER', 'rpcuser');
define('RPC_PASS', 'changeme');
define('NODE_NAME', 'My Bitcoin Node');
define('NODE_INFO', 'Welcome to my node!');

// That's the end of the configuration.

$country_iso = '{"BD": "BGD", "BE": "BEL", "BF": "BFA", "BG": "BGR", "BA": "BIH", "BB": "BRB", "WF": "WLF", "BL": "BLM", "BM": "BMU", "BN": "BRN", "BO": "BOL", "BH": "BHR", "BI": "BDI", "BJ": "BEN", "BT": "BTN", "JM": "JAM", "BV": "BVT", "BW": "BWA", "WS": "WSM", "BQ": "BES", "BR": "BRA", "BS": "BHS", "JE": "JEY", "BY": "BLR", "BZ": "BLZ", "RU": "RUS", "RW": "RWA", "RS": "SRB", "TL": "TLS", "RE": "REU", "TM": "TKM", "TJ": "TJK", "RO": "ROU", "TK": "TKL", "GW": "GNB", "GU": "GUM", "GT": "GTM", "GS": "SGS", "GR": "GRC", "GQ": "GNQ", "GP": "GLP", "JP": "JPN", "GY": "GUY", "GG": "GGY", "GF": "GUF", "GE": "GEO", "GD": "GRD", "GB": "GBR", "GA": "GAB", "SV": "SLV", "GN": "GIN", "GM": "GMB", "GL": "GRL", "GI": "GIB", "GH": "GHA", "OM": "OMN", "TN": "TUN", "JO": "JOR", "HR": "HRV", "HT": "HTI", "HU": "HUN", "HK": "HKG", "HN": "HND", "HM": "HMD", "VE": "VEN", "PR": "PRI", "PS": "PSE", "PW": "PLW", "PT": "PRT", "SJ": "SJM", "PY": "PRY", "IQ": "IRQ", "PA": "PAN", "PF": "PYF", "PG": "PNG", "PE": "PER", "PK": "PAK", "PH": "PHL", "PN": "PCN", "PL": "POL", "PM": "SPM", "ZM": "ZMB", "EH": "ESH", "EE": "EST", "EG": "EGY", "ZA": "ZAF", "EC": "ECU", "IT": "ITA", "VN": "VNM", "SB": "SLB", "ET": "ETH", "SO": "SOM", "ZW": "ZWE", "SA": "SAU", "ES": "ESP", "ER": "ERI", "ME": "MNE", "MD": "MDA", "MG": "MDG", "MF": "MAF", "MA": "MAR", "MC": "MCO", "UZ": "UZB", "MM": "MMR", "ML": "MLI", "MO": "MAC", "MN": "MNG", "MH": "MHL", "MK": "MKD", "MU": "MUS", "MT": "MLT", "MW": "MWI", "MV": "MDV", "MQ": "MTQ", "MP": "MNP", "MS": "MSR", "MR": "MRT", "IM": "IMN", "UG": "UGA", "TZ": "TZA", "MY": "MYS", "MX": "MEX", "IL": "ISR", "FR": "FRA", "IO": "IOT", "SH": "SHN", "FI": "FIN", "FJ": "FJI", "FK": "FLK", "FM": "FSM", "FO": "FRO", "NI": "NIC", "NL": "NLD", "NO": "NOR", "NA": "NAM", "VU": "VUT", "NC": "NCL", "NE": "NER", "NF": "NFK", "NG": "NGA", "NZ": "NZL", "NP": "NPL", "NR": "NRU", "NU": "NIU", "CK": "COK", "XK": "XKX", "CI": "CIV", "CH": "CHE", "CO": "COL", "CN": "CHN", "CM": "CMR", "CL": "CHL", "CC": "CCK", "CA": "CAN", "CG": "COG", "CF": "CAF", "CD": "COD", "CZ": "CZE", "CY": "CYP", "CX": "CXR", "CR": "CRI", "CW": "CUW", "CV": "CPV", "CU": "CUB", "SZ": "SWZ", "SY": "SYR", "SX": "SXM", "KG": "KGZ", "KE": "KEN", "SS": "SSD", "SR": "SUR", "KI": "KIR", "KH": "KHM", "KN": "KNA", "KM": "COM", "ST": "STP", "SK": "SVK", "KR": "KOR", "SI": "SVN", "KP": "PRK", "KW": "KWT", "SN": "SEN", "SM": "SMR", "SL": "SLE", "SC": "SYC", "KZ": "KAZ", "KY": "CYM", "SG": "SGP", "SE": "SWE", "SD": "SDN", "DO": "DOM", "DM": "DMA", "DJ": "DJI", "DK": "DNK", "VG": "VGB", "DE": "DEU", "YE": "YEM", "DZ": "DZA", "US": "USA", "UY": "URY", "YT": "MYT", "UM": "UMI", "LB": "LBN", "LC": "LCA", "LA": "LAO", "TV": "TUV", "TW": "TWN", "TT": "TTO", "TR": "TUR", "LK": "LKA", "LI": "LIE", "LV": "LVA", "TO": "TON", "LT": "LTU", "LU": "LUX", "LR": "LBR", "LS": "LSO", "TH": "THA", "TF": "ATF", "TG": "TGO", "TD": "TCD", "TC": "TCA", "LY": "LBY", "VA": "VAT", "VC": "VCT", "AE": "ARE", "AD": "AND", "AG": "ATG", "AF": "AFG", "AI": "AIA", "VI": "VIR", "IS": "ISL", "IR": "IRN", "AM": "ARM", "AL": "ALB", "AO": "AGO", "AQ": "ATA", "AS": "ASM", "AR": "ARG", "AU": "AUS", "AT": "AUT", "AW": "ABW", "IN": "IND", "AX": "ALA", "AZ": "AZE", "IE": "IRL", "ID": "IDN", "UA": "UKR", "QA": "QAT", "MZ": "MOZ"}';
$country_iso = json_decode($country_iso);

function version($ua) {
	if($ua == '') return '<span class="version unknown">Unknown</span>';
	$ua = explode('/', $ua);
	unset($ua[0]);
	unset($ua[count($ua)]);
	
	$one = null;
	$two = null;
	
	if(isset($ua[2])) {
		
		# BIP148
		if(strtolower(substr($ua[2], 0, strpos($ua[2], ':'))) == 'uasf-segwit') $two = '<span class="version uasf"><a href="http://www.uasf.co">BIP148</a></span>';
		
		# BitcoinKnots
		if(strtolower(substr($ua[2], 0, strpos($ua[2], ':'))) == 'knots') {
			$one = '<span class="version knots"><a href="https://bitcoinknots.org">Bitcoin Knots</a></span>';
			
			/* per Luke-Jr:
			/Satoshi:0.14.2(+BIP148=)/Knots:20170618/
			/Satoshi:0.14.2(-BIP148=)/Knots:20170618/
			/Satoshi:0.14.2(+BIP148)/Knots:20170618/
			/Satoshi:0.14.2(-BIP148)/Knots:20170618/
			+ means BIP148 supported; - means NOT supported; = means default setting */
			
			if(stripos($ua[1], '+bip148') !== false) $two = '<span class="version uasf"><a href="http://www.uasf.co">BIP148</a></span>';
			
			return $one.$two;
		}
		
		# btcd
		if(strtolower(substr($ua[2], 0, strpos($ua[2], ':'))) == 'btcd') $two = '<span class="version btcd"><a href="https://github.com/btcsuite/btcd">btcd</a></span>';
		
		# OpenBazaar
		if(strtolower(substr($ua[2], 0, strpos($ua[2], ':'))) == 'openbazaar') $two = '<span class="version openbazaar"><a href="https://www.openbazaar.org">OpenBazaar</a></span>';
	}
	
	# Bitcoin ABC
	if(stripos($ua[1], 'bitcoin abc') !== false) $one = '<span class="version bitcoinabc"><a href="https://www.bitcoinabc.org">Bitcoin ABC</a></span>';
	
	# Bitcoin Unlimited
	if(strtolower(substr($ua[1], 0, strpos($ua[1], ':'))) == 'bitcoinunlimited') $one = '<span class="version bitcoinunlimited"><a href="https://www.bitcoinunlimited.info">Bitcoin Unlimited</a></span>';
	
	# bitcoin-seeder
	if(strtolower(substr($ua[1], 0, strpos($ua[1], ':'))) == 'bitcoin-seeder') $one = '<span class="version bitcoinseeder"><a href="https://github.com/sipa/bitcoin-seeder">bitcoin-seeder</a></span>';
	
	# bitcoinj
	if(strtolower(substr($ua[1], 0, strpos($ua[1], ':'))) == 'bitcoinj') $one = '<span class="version bitcoinj"><a href="https://bitcoinj.github.io">bitcoinj</a></span>';
	
	# BitcoinRussia
	if(stripos($ua[1], 'bitcoin-russia.ru') !== false) $one = '<span class="version bitcoinrussia"><a href="https://bitcoin-russia.ru">BitcoinRussia</a></span>';
	
	# Bitcore
	if(strtolower(substr($ua[1], 0, strpos($ua[1], ':'))) == 'bitcore') $one = '<span class="version bitcore"><a href="https://bitcore.io">Bitcore</a></span>';
	
	# Bither
	if(stripos($ua[1], 'bither') !== false) $one = '<span class="version bither"><a href="https://bither.net">Bither</a></span>';
	
	# Bitnodes (21.co)
	if(stripos($ua[1], 'bitnodes.21.co') !== false) $one = '<span class="version bitnodes"><a href="https://bitnodes.21.co">Bitnodes</a></span>';
	if(!isset($one)) {
		if(stripos($ua[1], 'bitnodes.') !== false) $one = '<span class="version bitnodes"><a href="https://21.co/buy/">21 Computer</a></span>';
	}
	
	# breadwallet
	if(strtolower(substr($ua[1], 0, strpos($ua[1], ':'))) == 'breadwallet') $one = '<span class="version breadwallet"><a href="https://breadwallet.com">breadwallet</a></span>';
	
	# btcwire
	if(strtolower(substr($ua[1], 0, strpos($ua[1], ':'))) == 'btcwire') $one = '<span class="version btcwire"><a href="https://github.com/btcsuite/btcd/tree/master/wire">btcwire</a></span>';
	
	# Coinscope
	if(stripos($ua[1], 'coinscope') !== false) $one = '<span class="version coinscope"><a href="http://cs.umd.edu/projects/coinscope/">Coinscope</a></span>';
	
	# Core
	if(strtolower(substr($ua[1], 0, strpos($ua[1], ':'))) == 'satoshi') $one = '<span class="version core"><a href="https://bitcoin.org/en/bitcoin-core/">Core</a></span>';
	
	# Classic
	if(strtolower(substr($ua[1], 0, strpos($ua[1], ':'))) == 'classic') $one = '<span class="version classic"><a href="https://bitcoinclassic.com">Classic</a></span>';
	
	# Libbitcoin
	if(stripos($ua[1], 'libbitcoin') !== false) $one = '<span class="version libbitcoin"><a href="https://libbitcoin.org">Libbitcoin</a></span>';
	
	# Perone
	if(stripos($ua[1], 'perone') !== false) $one = '<span class="version perone"><a href="https://github.com/perone/protocoin">Perone</a></span>';	
	
	# ViaBTC
	if(strtolower(substr($ua[1], 0, strpos($ua[1], ':'))) == 'viabtc') $one = '<span class="version viabtc"><a href="https://www.viabtc.com">ViaBTC</a></span>';
	
	# Snoopy/pycoin
	if(stripos($ua[1], 'snoopy') !== false) $one = '<span class="version snoopy"><a href="https://github.com/cdecker/pycoin">Snoopy</a></span>';
	
	# Default
	if($one == '' && $two == '') return '<span class="version unknown">Unknown</span>';
	return $one.$two;
}

function ago($tm, $rcs = 0) {
	$cur_tm = time(); $dif = $cur_tm-$tm;
	$pds = array('second','minute','hour','day','week','month','year','decade');
	$lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
	$no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
	if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
	return $x;
}

function rpc($method) {
	$shell_command = "curl --data-binary '{\"jsonrpc\":\"1.0\",\"id\":\"curltext\",\"method\":\"$method\",\"params\":[]}' -H 'content-type:text/plain;' http://".RPC_USER.":".RPC_PASS."@".RPC_ADDR.":".RPC_PORT."/";
	$jsonobj = json_decode(`$shell_command`);
	return($jsonobj);
}

?><!DOCTYPE html>
<title><?php echo NODE_NAME; ?></title>
<meta name="viewport" content="width=device-width">
<meta name="robots" content="noindex, nofollow">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
$(function() {
	$('.peer_info_request').click(function(event) {
		event.preventDefault();
		if($(this).data('flag') == 1) {
			$(this).parent().css('background-color', '#efefef');
			$(this).parent().find('.extra_node_info').hide();
			$(this).data('flag', 0);
		}
		else {
			$(this).parent().css('background-color', '#7cd97d');
			$(this).parent().find('.extra_node_info').show();
			$(this).data('flag', 1);
		}
	});
});
</script>
<style type="text/css">
@import url('//brick.a.ssl.fastly.net/Fira+Mono:400,500,700');
@import url('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
body {
	margin: 1em;
	font-family: 'Fira Mono', monospace;
	font-size: 1em;
	color: #2f4061;
}

#masthead {
	background: #cfecea;
	border-radius: .5em;
	padding: 1em;
	margin-bottom: 1em;
}

#masthead h1 {
	margin: 0;
}

#masthead p {
	margin: 0;
}

.version {
	border-radius: .5em;
	color: #fff;
	padding: .25em .5em;
	margin-right: .25em;
}

.version a:link, .version a:visited, .version a:hover, .version a:active {
	color: #fff;
	text-decoration: none;
}

.bitcoinabc { background: #8e0e0e; }
.bitcoinj { background: #397765; }
.bitcoinrussia { background: #5681b0; }
.bitcoinseeder { background: #a53131; }
.bitcoinunlimited { background: #6c5f1f; }
.bitcore { background: #a8a14a; }
.bither { background: #61a8cd; }
.bitnodes { background: #555; }
.breadwallet { background: #ed935d; }
.btcd { background: #415ea6; }
.btcwire { background: #0b2f8a; }
.classic { background: #b27428; }
.coinscope { background: #d34f9f; }
.core { background: #f7931a; }
.knots { background: #2d663c; }
.libbitcoin { background: #b95c40; }
.openbazaar { background: #1a252c; }
.perone { background: #1f957a; }
.snoopy { background: #2d7456; }
.uasf { background: #39ad4b; }
.unknown { background: #444; }
.viabtc { background: #63b9d1; }

.infobox {
	margin: 0 0 1em 0;
	vertical-align: top;
	display: inline-block;
	width: 100%;
	text-align: center;
	border-radius: .5em;
}

.infobox p {
	border: 0px solid red;
	font-size: 2em;
	line-height: 3em;
	height: 3em;
	margin: 0 0 .5em 0;
}

.infobox h3 {
	font-size: 1.5em;
	border: 0px solid blue;
	margin: 1em 0 .5em 0;
}

.status { background: #cfe1eb; }
.type { background: #d8debc; }
.blocks { background: #e2d5bb; }
.connections { background: #e6d1ca; }

.node_type {
	display: block;
	font-size: .4em;
	margin-top: -1em;
	line-height: 1.2em;
}

.type .version {
	font-size: .65em !important;
}

.type p {
	line-height: 2em;
}

a:link, a:visited, a:hover, a:active {
	color: #3773ed;
}

h1, h2 {
	font-weight: 700;
	clear: left;
}

strong {
	font-weight: 500;
}

p, li, th, td {
	font-size: 1em;
}

footer {
	margin: 0;
}

footer p {
	background: #9c58af;
	color: #fff;
	padding: 1em;
	border-radius: .5em;
}

footer a:link, footer a:visited, footer a:hover, footer a:active { color: #fff; }

.extra_node_info {
	display: none;
	word-wrap: break-word;
	line-height: 1.2em;
}

.peer {
	vertical-align: top;
	position: relative;
	margin: 0 0 .5em 0;
	background: #efefef;
	border-radius: .5em;
	padding: 1em;
	line-height: 200%;
}

#current_peers {
	background: #f5f5ec;
	padding: .5em 1em;
	margin: 0 0 .5em 0;
	border-radius: .5em;
}

.fa-info-circle {
	font-size: 1.2em;
	color: #888;
	position: absolute;
	top: .5em;
	right: .5em;
}

.flag {
	width: 1.4em;
}

@media only screen and (min-width: 580px) { .peer { display: inline-block; margin-right: .5em; width: calc(50% - 2.5em); }}
@media only screen and (min-width: 890px) { .peer { display: inline-block; margin-right: .5em; width: calc(33% - 2.5em); }}
@media only screen and (min-width: 1120px) { .peer { display: inline-block; margin-right: .5em; width: calc(25% - 2.5em); }}
@media only screen and (min-width: 1400px) { .peer { display: inline-block; margin-right: .5em; width: calc(20% - 2.5em); }}
@media only screen and (min-width: 620px) { .infobox { display: inline-block; margin-right: 1em; width: calc(50% - 1em); }}
@media only screen and (min-width: 1250px) { .infobox { display: inline-block; margin-right: 1em; width: calc(25% - 1em); }}

</style>

<div id="masthead">
<h1><?php echo NODE_NAME; ?></h1>

<?php echo NODE_INFO; ?>
</div>

<?php

$jsonobj = rpc('getnetworkinfo');

$this_version = @$jsonobj->result->subversion;

$jsonobj = rpc('getblockchaininfo');
$height = @$jsonobj->result->headers;

$jsonobj = rpc('getinfo');

if(!isset($jsonobj->result->version)) {
	echo '<h2>The node is currently down for maintenance.</h2>';
	print_r($jsonobj);
	if(isset($jsonobj->error->message)) echo '<p>'.$jsonobj->error->message.'</p>';
	exit;
}

if(@$jsonobj->result->blocks == 0) {
	echo '<h2>The node is reindexing.</h2>';
	exit;
}

$local_height = $jsonobj->result->blocks;

$connections = null;
$connections_data = file('connections.txt', FILE_IGNORE_NEW_LINES);
$connections_data = array_slice($connections_data, -60);
$connections_data_tmp = implode("\n", $connections_data);
file_put_contents('connections.txt', $connections_data_tmp);

foreach($connections_data as $line) {
	$tmp = explode("\t", $line);
	$connections .= $tmp[1].',';
}
$connections = substr($connections, 0, -1);

echo '<div class="infobox status"><h3>Status</h3><p>Running</p></div>';

echo '<div class="infobox type"><h3>Node Type</h3><p>'.version($this_version).'<span class="node_type"><br>'.$this_version.'</span></p></div>';

echo '<div class="infobox blocks"><h3>Blocks</h3><p>'.number_format($local_height).' ('.round(($local_height / $height)*100, 2).'%)</p></div>';

echo '<div class="infobox connections"><h3>Peers, Past Hour</h3><p><embed style="width: 7em; height: 1em;" src="//sparksvg.me/line.svg?'.$connections.'&current" type="image/svg+xml">'.$jsonobj->result->connections.'</p></div>';

// Log the current peer connection count no more than once per minute
$connection_last_updated = filemtime('connections.txt');
if(time() - $connection_last_updated > 60) {
	file_put_contents('connections.txt', time()."\t".$jsonobj->result->connections."\n", FILE_APPEND);
}

?>

<h2 id="current_peers">Current Peers</h2>

<?php
$jsonobj = rpc('getpeerinfo');

$geodata = file('geodata.txt', FILE_IGNORE_NEW_LINES);
foreach($geodata as $line) {
	$bits = explode("\t", $line);
	$ip = $bits[0];
	$country = $bits[1];
	$geodata[$ip] = $country;
}

foreach($jsonobj->result as $key => $val) {
	$addr = $val->addr;
	$port = substr($addr, strrpos($addr,':')+1);
	$ip = str_replace(array('[',']',':'.$port), '', $addr);
	$addr = '<a href="https://bitnodes.21.co/nodes/'.$ip.'-'.$port.'/">'.$addr.'</a>';
	
	if(isset($geodata[$ip])) $country = $geodata[$ip];
	else {
		$geo = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));
		$country = $geo->country_code;
		file_put_contents('geodata.txt', $ip."\t".$country."\n", FILE_APPEND);
	}
	
	echo '<div class="peer">';
	echo version($val->subver).' <img class="flag" src="https://restcountries.eu/data/'.strtolower($country_iso->$country).'.svg" title="'.$country_iso->$country.'’s flag" alt="'.$country_iso->$country.'’s flag"><a class="peer_info_request" href="#"><i class="fa fa-info-circle" aria-hidden="true"></a></i><br><i class="fa fa-clock-o" aria-hidden="true"></i> '.ago($val->conntime);
	echo '<p class="extra_node_info">'.$val->subver.'<br>'.$addr.'</p>';
	echo '</div>';
}

?>
<footer>
	<p>Powered by <a href="https://github.com/newbold/phpNodeStats">phpNodeStats</a> &#183; Donations: <a href="bitcoin:16crzU7ogpqLp6CvbVrgXWrGrYjgzhtTLx">16crzU7ogpqLp6CvbVrgXWrGrYjgzhtTLx</a></p>
</footer>