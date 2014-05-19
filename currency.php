<?php

$currencySymbols = array(
	'usd' => '$',
	'gbp' => '£',
	'eur' => '€',
);

// default currency if lookup fails
$currency = 'usd';

$countryCurrencies = array(
	// country code => currency code
	'GB' => 'gbp',
	'US' => 'usd',
	'AT' => 'eur',
	'BE' => 'eur',
	'BG' => 'eur',
	'HR' => 'eur',
	'CY' => 'eur',
	'CZ' => 'eur',
	'DK' => 'eur',
	'EE' => 'eur',
	'FI' => 'eur',
	'FR' => 'eur',
	'DE' => 'eur',
	'EL' => 'eur',
	'HU' => 'eur',
	'IE' => 'eur',
	'IT' => 'eur',
	'LV' => 'eur',
	'LT' => 'eur',
	'LU' => 'eur',
	'MT' => 'eur',
	'NL' => 'eur',
	'PL' => 'eur',
	'PT' => 'eur',
	'RO' => 'eur',
	'SK' => 'eur',
	'SI' => 'eur',
	'ES' => 'eur',
	'SE' => 'eur',
);

$ip = $_SERVER['REMOTE_ADDR'];
$lookup = file_get_contents('http://freegeoip.net/json/' . $ip);

if (!empty($lookup)) {
	$lookup = json_decode($lookup, true);

	if (!empty($lookup['country_code']) && isset($countryCurrencies[$lookup['country_code']])) {
		$currency = $countryCurrencies[$lookup['country_code']];
	}
}

?>