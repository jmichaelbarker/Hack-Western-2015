<?php
session_start();
$price = $_GET['price'];
$btccurrency = file_get_contents('https://blockchain.info/tobtc?currency=CAD&value=1');
	$btcamount = ($btccurrency * $price);
	$secret = '32biwegui23jb3klmas';
	$my_callback_url = 'http://bitfor.me/includes/btc.php?userid='.$_SESSION['ID'].'&cadamount='.$price.'&amount='.$btcamount.'&secret='.$secret.'';
	$root_url = 'https://blockchain.info/api/receive';
	$parameters = 'method=create&address=1HQ3auD4T69KA22Bwk2guzNkKoswpUpnho&callback='.urlencode($my_callback_url);
	$response = file_get_contents($root_url.'?'.$parameters);
	$object = json_decode($response);
	$sendto = $object->input_address;
	echo "<p>Please send <u>$btcamount</u> BTC to <u>$sendto</u><br />If you do not recieve your plan within 4 hours of sending payment, please make a support ticket and notify us!</p>"
        
        ?>