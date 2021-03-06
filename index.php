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
                  Donations: 1EBKdLhTva2By8tbNZxwqTAoLQoAiA5Mky

  Get started:
  
  1. Customize the values in the configuration section.
  2. Upload the PHP file to your web server.
  3. Ensure that PHP can write to the directory containing the file.
  
  That's it!
  
*/

// Here's the configuration section.

define('RPC_ADDR', '127.0.0.1');
define('RPC_PORT', '8332');
define('RPC_USER', 'rpcuser');
define('RPC_PASS', 'changeme');
define('NODE_NAME', 'My Bitcoin Node');
define('NODE_INFO', '<p>Welcome to my node!</p>');

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
	
	# NO2X
		if(stripos($ua[1], 'no2x') !== false) $two = '<span class="version no2x"><a href="http://nob2x.org">NO2X</a></span>';
	
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
	return $one.' '.$two;
}

function time_elapsed_string($datetime, $full=true) {
	$datetime = '@'.$datetime;
	$now = new DateTime();
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);
	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;
	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		else unset($string[$k]);
	}
	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) : 'just now';
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
<style type="text/css">
@import url('//brick.a.ssl.fastly.net/Fira+Mono:400');
body {
	margin: 1.5em 1em;
	font-family: 'Fira Mono', monospace;
	font-size: 1em;
	background: #222;
	color: #e8973d;
}
* {
	font-size: 1em;
	font-weight: 400;
}
h1, h2, p {
	padding: 0 .5em;
}
h1 {
	background: #e8973d;
	color: #222;
	padding: .25em .5em;
	text-transform: uppercase;
}
h2 {
	padding: .25em .5em .5em .25em;
	text-transform: uppercase;
	border-bottom: 1px dotted;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
td {
	padding-left: .5em;
	padding-right: 1em;
	white-space: nowrap;
}
tr:nth-child(even){background-color: #242424; }
footer, footer a:link, footer a:visited, footer a:hover, footer a:active { color: #444 !important; }
footer { margin: 2em .5em; padding-top: .5em; border-top: 1px dotted #444; }
footer p { margin: 0; padding: 0; font-size: 80% !important; }
a:link, a:visited, a:hover, a:active { color: #e8973d; }
small { font-size: 80% !important; }
</style>
<?php

echo '<h1>'.NODE_NAME.'</h1>'.NODE_INFO;

$jsonobj = rpc('getnetworkinfo');
$this_version = @$jsonobj->result->subversion;

$jsonobj = rpc('getblockchaininfo');
$height = @$jsonobj->result->headers;

$jsonobj = rpc('getinfo');
if(!isset($jsonobj->result->version)) die('<p>The node is currently down for maintenance.</p><div style="display: block; white-space: pre;">'.print_r($jsonobj, 1).'</div>');

$local_height = $jsonobj->result->blocks;
$connections = file('connections.txt', FILE_IGNORE_NEW_LINES);
$connections_15 = number_format(array_sum(array_slice($connections, -15)) / count(array_slice($connections, -15)), 2);
$connections_5 = number_format(array_sum(array_slice($connections, -5)) / count(array_slice($connections, -5)), 2);
$connections_1 = number_format(array_sum(array_slice($connections, -1)) / count(array_slice($connections, -1)), 2);

echo '<h2>Status</h2>';
echo '<p>Version: '.version($this_version).' '.$this_version;
$blockpct = round(($local_height / $height)*100, 2);
echo ' &#183; Height: '.number_format($local_height).' ('.$blockpct.'%)</p>';

// Log the current peer connection count no more than once per minute
if(time() - filemtime('connections.txt') > 60) {
	file_put_contents('connections.txt', $jsonobj->result->connections."\n", FILE_APPEND);
}

?>

<h2>Peers</h2>
<p>Average peer count: <?php echo $connections_1.', '.$connections_5.', '.$connections_15; ?> <small>(1m, 5m, 15m)</small></p>
<div style="overflow-x: auto;">
<table>

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
	if(isset($geodata[$ip])) $country = $geodata[$ip];
	else {
		$geo = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));
		$country = $geo->country_code;
		file_put_contents('geodata.txt', $ip."\t".$country."\n", FILE_APPEND);
	}
	echo '<tr>';
	$subver = strip_tags($val->subver);
	if($subver == '') $subver = '--';
	echo '<td>'.version($val->subver).'</td><td>'.$subver.'</td><td>'.$addr.'</td><td>'.$country_iso->$country.'</td><td>'.time_elapsed_string($val->conntime).'</td>';
	echo '</tr>';
}

?></table></div><footer><p>Enjoy this? <a href="bitcoin:1EBKdLhTva2By8tbNZxwqTAoLQoAiA5Mky">1EBKdLhTva2By8tbNZxwqTAoLQoAiA5Mky</a> &#183; Rendered by <a href="https://github.com/newbold/phpNodeStats">phpNodeStats</a></p></footer>