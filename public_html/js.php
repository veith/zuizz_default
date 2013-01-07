<?php
define ("ZU_DIR", getcwd());

// Wenn Project Dir in zuizz ist
//define("PROJECT_DIR",  ZU_DIR . "/zuizz/");

// wenn Project Dir parent von ZU_DIR ist
define("PROJECT_DIR", dirname(ZU_DIR) . "/");

// Wenn Project Dir gleich ZU_DIR ist
//define("PROJECT_DIR",  ZU_DIR);


// load constants
if (getenv('sysmode') != '') {
    include_once PROJECT_DIR . '/config/' . getenv('sysmode') . '.main.constants.ini.php';
} else {
    die("Sysmode not set, refer to your server manual");
}
session_save_path(ZU_DIR_SESSION);


//IDEA:: Themed js files

$jsfile = ZU_DIR_FEATURE . basename($_REQUEST ['feature']) . '/js/' . basename($_REQUEST ['js']);
$lastmod =filemtime($jsfile);
// Inode
$ETag = dechex(fileinode($jsfile));
// Size
$ETag .= "-" . dechex(filesize($jsfile));
// Modification time in useconds & (2^33-1)
$ETag .= "-" . dechex((($lastmod . str_repeat("0", 6) + 0) & (8589934591)));


if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] == $ETag) {
    header("HTTP/1.1 304 Not Modified");
    die();
}

header("Connection: Keep-Alive");
header("Date: ".gmdate("D, d M Y H:i:s", time())." GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s", $lastmod)." GMT");
header("ETag: $ETag");
header("Keep-Alive: timeout=300");

if (is_file($jsfile)) {


    // open the file in a binary mode
    $fp = fopen($jsfile, 'rb');

    // send the right headers
    header('Content-Type: application/javascript; charset=utf-8');
    header("Content-Length: " . filesize($jsfile));
    // send file
    fpassthru($fp);
} else {
    header("HTTP/1.0 404 Not Found");
    echo "file not available";
}
exit ();