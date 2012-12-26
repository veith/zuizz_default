<?php

// Session setzen per Request, Cookie übersteuern
if (isset($_REQUEST['session_token'])) {
    session_id($_REQUEST['session_token']);
}

if (!function_exists('apache_request_headers')) {
    function apache_request_headers()
    {
        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) == "HTTP_") {
                $key = str_replace(" ", "-", ucwords(strtolower(str_replace("_", " ", substr($key, 5)))));
                $out[$key] = $value;
            } else {
                $out[$key] = $value;
            }
        }
        return $out;
    }
}

$request_header = apache_request_headers();

// Session setzen per header
if (isset($request_header['session_token'])) {
    session_id($request_header['session_token']);
}


// PUT und DELETE abfangen, php kennt die dinger nicht von Haus aus
switch ($_SERVER['REQUEST_METHOD']) {
    case !strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE'):
        parse_str(file_get_contents('php://input'), $_DELETE);
        global $_DELETE;
        break;

    case !strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT'):
        parse_str(file_get_contents('php://input'), $_PUT);
        global $_PUT;
        break;
}


if ($_REQUEST ['feature']) {

    //header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    //header("Cache-Control: no-store, no-cache, must-revalidate");
    //header("Cache-Control: post-check=0, pre-check=0", false);
    //header("Pragma: no-cache");

    define ("ZU_DIR", getcwd());
    define("PROJECT_DIR", dirname(ZU_DIR) . "/");

    // load constants
    if (getenv('sysmode') != '') {
        include_once PROJECT_DIR . '/config/' . getenv('sysmode') . '.main.constants.ini.php';
    } else {
        die("Sysmode not set, refer to your server manual");
    }
    session_save_path(ZU_DIR_TMP);

    $ZUVALS = array();
    global $ZUVALS;

    // set error reporting
    error_reporting(E_ALL);

    ini_set("display_errors", "On");


    // load ZUIZZ static class
    require_once ZU_DIR_LIBS . 'core/class.zuizz.static.php';

    // build zuizz core object for queries, config
    ZU::load_class('zuizz', 'core');

    global $DB; // ZUDB object


    global $ZUIZZ; // ZUIZZ object


    $ZUIZZ = new ZUIZZ ();


    // init smarty
    global $smarty; // smarty object
    $ZUIZZ->init_smarty();

    $ZUIZZ->init_lang();
    $ZUIZZ->init_permissions();

    // set output and charset
    header('Content-Type:text/html; charset=' . $ZUIZZ->config->system ['charset']);

    // build process
    $buffer = array();
    global $buffer;

    $parameter ['feature'] = $_REQUEST ['feature'];

    // das Feature aktivieren
    echo $ZUIZZ->create_rest_feature_objects($parameter);

} else {
    header('HTTP/1.1 403 Forbidden');
}