<?php
/**
 * Lade ein Feature und gibt die Ausgabe direkt zurück
 * @param $params Array Load Parameter (feature, [zone:default],[skin:default], [featureeigene])
 * @param $smarty Object Referenz auf die smarty Instanz
 * returns string Html oder andere Ausgabe des Features
 */

function smarty_function_ZU_load_direct($params, $smarty) {
    // erstelle eine dynamic zone um dann das selbe zu machen wie der normale load aufruf

    if(!isset($GLOBALS['buffer']['dynamiczoneindex'])){
        $GLOBALS['buffer']['dynamiczoneindex'] = 0;
    }

    $GLOBALS['buffer']['dynamiczoneindex']++;
    $zone = "dynamic" . $GLOBALS['buffer']['dynamiczoneindex'];
    $params['zone'] = $zone;
    if (! isset ( $params ['feature'] )) {
        $smarty->trigger_error ( "ZUload: missing 'feature' parameter" );
        return;
    }



    // set default priority to 50 (1=high, 50=normal, 100=low)
    if (isset ( $params ['priority'] )) {
        $priority = $params ['priority'] != '' ? $params ['priority'] : 50;
    } else {
        $priority = 50;
    }

    // parameter speichern, feature queueing
    $GLOBALS ['buffer'] ['feature_stack'] [$priority] [] = $params;
    $GLOBALS ['buffer'] ['zone'] [$zone] = TRUE;


    return "<!-- [zone:{$zone}] -->";
}
