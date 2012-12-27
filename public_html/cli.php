#!/usr/bin/env php
<?php
// set path to your php cli bin
// ----- do not change below
define ( "ZU_DIR", getcwd () );
define("PROJECT_DIR",  dirname(ZU_DIR) . "/");

// Sysmode für configs und DB setzen
if (getenv ( "sysmode" ) == "") {
	echo "environment variable sysmode not set";
	die ();
}

$_CLI = parseArgs ( $argv );
global $_CLI;

if (isset ( $_CLI ['lang'] )) {
	$_SERVER ['HTTP_ACCEPT_LANGUAGE'] = $_CLI ['lang'];
} else {
	$_SERVER ['HTTP_ACCEPT_LANGUAGE'] = 'de';
}

$_SERVER ['DOCUMENT_ROOT'] = getcwd ();

if ($_REQUEST ['feature']) {

	define ( "ZU_DIR", dirname ( __FILE__ ) );

// load constants
if (getenv ( 'sysmode' ) != '') {
	include_once PROJECT_DIR . '/config/' . getenv ( 'sysmode' ) . '.main.constants.ini.php';
} else {
	echo ("Sysmode not set, refer to your server manual\n");
    exit ( 1 );
}
    session_save_path(ZU_DIR_SESSION);

	// set error reporting
	error_reporting ( E_ALL );

	// load ZUIZZ static class
	require_once ZU_DIR_LIBS . 'core/class.zuizz.static.php';
	require_once ZU_DIR_LIBS . 'core/class.zuizz.cli.static.php';

	// build zuizz core object for queries, config
	ZU::load_class ( 'zuizz', 'core' );

	global $DB; // ZUDB object


	global $ZUIZZ; // ZUIZZ object


	$ZUIZZ = new ZUIZZ ();
	$ZUIZZ->init_lang ();
	$ZUIZZ->init_permissions ();

	// servername
	if (isset ( $ZUIZZ->config->system ['system_hostname'] )) {
		$_SERVER ['SERVER_NAME'] = $ZUIZZ->config->system ['system_hostname'];
	} else {
		$_SERVER ['SERVER_NAME'] = getenv ( "servername" );
	}

	if (empty ( $_SERVER ['SERVER_NAME'] )) {
		echo "Servername not given, please set servername in your env or add in main.config.ini section system item system_hostname
	example:
	export servername=localhost";
		die ();
	}

	// build process
	$buffer = array ();
	global $buffer;

	$parameter ['feature'] = $_REQUEST ['feature'];

	// das Feature aktivieren
	echo $ZUIZZ->create_cli_feature_objects ( $parameter );

	exit ( 0 );

} else {
    echo "ussage: cli.php --feature=com.zuizz.???.???\n";
	exit ( 1 );
}

function parseArgs($argv) {
	array_shift ( $argv );
	$out = array ();
	foreach ( $argv as $arg ) {
		if (substr ( $arg, 0, 2 ) == '--') {
			$eqPos = strpos ( $arg, '=' );
			if ($eqPos === false) {
				$key = substr ( $arg, 2 );
				$out [$key] = isset ( $out [$key] ) ? $out [$key] : true;
			} else {
				$key = substr ( $arg, 2, $eqPos - 2 );
				$out [$key] = substr ( $arg, $eqPos + 1 );
			}
		} else if (substr ( $arg, 0, 1 ) == '-') {
			if (substr ( $arg, 2, 1 ) == '=') {
				$key = substr ( $arg, 1, 1 );
				$out [$key] = substr ( $arg, 3 );
			} else {
				$chars = str_split ( substr ( $arg, 1 ) );
				foreach ( $chars as $char ) {
					$key = $char;
					$out [$key] = isset ( $out [$key] ) ? $out [$key] : true;
				}
			}
		} else {
			$out [] = $arg;
		}
	}
	$_REQUEST = array_merge ( $_REQUEST, $out );
	return $out;
}