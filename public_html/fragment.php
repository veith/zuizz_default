<?php


if ($_REQUEST ['feature']) {

    define ("ZU_DIR", getcwd());
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Wenn Project Dir in zuizz ist
    //define("PROJECT_DIR",  ZU_DIR . "/zuizz/");

    // wenn Project Dir parent von ZU_DIR ist
    define("PROJECT_DIR",  dirname(ZU_DIR) . "/");

    // Wenn Project Dir gleich ZU_DIR ist
    //define("PROJECT_DIR",  ZU_DIR);


    // load constants
    if (getenv ( 'sysmode' ) != '') {
        include_once PROJECT_DIR . '/config/' . getenv ( 'sysmode' ) . '.main.constants.ini.php';
    } else {
        die("Sysmode not set, refer to your server manual");
    }
    session_save_path(ZU_DIR_SESSION);

    $ZUVALS = array ();
    global $ZUVALS;

    // Wenn das feature nicht existitert
    $feature_array = explode(".", $_REQUEST ['feature']);
    $feature = "{$feature_array[0]}.{$feature_array[1]}.{$feature_array[2]}";

    if (!is_dir(ZU_DIR_FEATURE . $feature)) {
        header('HTTP/1.1 501 Feature ' . $_REQUEST ['feature'] . ' Not Implemented');
        die();
    }
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
    if (isset ($_REQUEST ['p'])) {
        $parameter = $_REQUEST ['p'];
    }
    $parameter ['feature'] = $_REQUEST ['feature'];


    // das Feature aktivieren

    $GLOBALS['buffer'] ['zonecontent'] ['default'] = $ZUIZZ->create_ajax_feature_objects($parameter);
    $smarty->process_feature_stack (0,true);

} else {
    header('HTTP/1.1 422 no feature specified');
}