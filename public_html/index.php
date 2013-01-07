<?php
  /*
header ( "Last-Modified: " . gmdate ( "D, d M Y H:i:s" ) . " GMT" );
header ( "Cache-Control: no-store, no-cache, must-revalidate" );
header ( "Cache-Control: post-check=0, pre-check=0", false );
header ( "Pragma: no-cache" );
  */

define ( "ZU_DIR", getcwd () );

// Wenn Project Dir in zuizz ist
//define("PROJECT_DIR",  ZU_DIR . "/zuizz/");

// wenn Project Dir parent von ZU_DIR ist
define("PROJECT_DIR",  dirname(ZU_DIR) . "/");

// Wenn Project Dir gleich ZU_DIR ist
//define("PROJECT_DIR",  ZU_DIR);

date_default_timezone_set('MET');

// load constants
if (getenv ( 'sysmode' ) != '') {
	include_once PROJECT_DIR . '/config/' . getenv ( 'sysmode' ) . '.main.constants.ini.php';
} else {
	die("Sysmode not set, refer to your server manual");
}
session_save_path(ZU_DIR_SESSION);

$ZUVALS = array ();
global $ZUVALS;

// set error reporting
error_reporting ( E_ALL );

// load ZUIZZ static class
require_once ZU_DIR_LIBS . 'core/class.zuizz.static.php';


// build zuizz core object for queries, config
ZU::load_class ( 'zuizz', 'core' );


global $ZUIZZ; // ZUIZZ object
$ZUIZZ = new ZUIZZ ();
// init smarty
global $smarty; // smarty object
$ZUIZZ->init_smarty ();



$ZUIZZ->init_lang ();
$ZUIZZ->init_permissions ();

// set output and charset
header ( 'Content-Type:text/html; charset=' . $ZUIZZ->config->system ['charset'] );

// build process
$buffer = array ();
global $buffer;

// das Feature Pages aktivieren
$ZUIZZ->init_feature ( 'com.zuizz.pages' );

isset ( $_REQUEST ['route'] ) ? $route = $_REQUEST ['route'] : $route = $ZUIZZ->config->system ['default_route'];
$page = ORM::for_table('pages_tree')->raw_query("SELECT page.page_id,page.page_layout,page.page_contents,  details.page_title, details.nav_title FROM pages_tree page left join pages_tree_details details on details.page_id = page.page_id and details.lang=:lang WHERE page.route=:route",
    array('route' => $route, 'lang' => $_SESSION ['ZUIZZ'] ['LANG'] ['interface_lang']))->find_one();

// 404 without existing page
if (! is_object ( $page )) {
	header ( "HTTP/1.0 404 Not Found" );
	echo "404 {$route} in lang {$_SESSION ['ZUIZZ'] ['LANG'] ['interface_lang']} Not Found";
	die ();
} else {

	$page = $page->as_array ();

	// check Permissions
	if (!ZU::check_permission ( 100, $page ['page_id'], 1 )) {
        if(!isset($_SESSION['loopcounter'])){
            $_SESSION['loopcounter']=1;
        }
        $_SESSION['loopcounter']++;
        // endlose redirect verhindern
        if($_SESSION['loopcounter'] > 10){
            header ( 'HTTP/1.1 403 Forbidden' );
            $_SESSION['loopcounter']=1;
            echo "infinite loop for route " . $route;
            die();
        }
		header ( 'HTTP/1.1 403 Forbidden' );
		ZU::log ( "access on forbiden page", E_USER_WARNING, "403 Access", __FILE__, __LINE__, 100, $page ['page_id'] );
		$_SESSION ['ZUIZZ'] ['AUTH'] ['TARGET'] = $_SERVER ['QUERY_STRING'];
        header ( 'Location: /' . $ZUIZZ->config->system ['default_auth_route'] );
		die ();
	}

	// Seitentitel default setzen
	$GLOBALS ['ZUVALS'] ['pagetitle'] = $page ['page_title'];


	// pagelayout puffern
	$buffer ['zone'] ['default'] = true;
	if (is_file ( ZU_DIR_PERSPECIVE_WEB_CUSTOM . $page ['page_layout'] )) {
		$buffer ['page'] = $smarty->fetchpage ( ZU_DIR_PERSPECIVE_WEB_CUSTOM . $page ['page_layout'] );
	} else {
		if (is_file ( ZU_DIR_PERSPECIVE_WEB . $page ['page_layout'] )) {
			$buffer ['page'] = $smarty->fetchpage ( ZU_DIR_PERSPECIVE_WEB . $page ['page_layout'] );
		} else {
			die ( "Pagelayout {$page ['pageLayout']} not found" );
		}

	}

	// pagecontent laden
	$buffer ['zonecontent'] ['default'] = $smarty->fetchpage ( ZU_DIR_PAGES . $page ['page_contents'] );

	// pagecontent verarbeiten und mit pagelayout zusammenführen
	$smarty->process_feature_stack ();
}