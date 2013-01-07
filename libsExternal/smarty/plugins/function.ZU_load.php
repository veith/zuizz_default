<?php
/**
 * Lade ein Feature und lege die Ausgabe in den Puffer ab
 * @param $params Array Load Parameter (feature, [zone:default],[skin:default],[priority:50], [featureeigene])
 * @param $smarty Object Referenz auf die smarty Instanz
 */
function smarty_function_ZU_load($params, $smarty) {

	if (! isset ( $params ['feature'] )) {
		$smarty->trigger_error ( "ZUload: missing 'feature' parameter" );
		return;
	}

	// set zone or default zone
	if (isset ( $params ['zone'] )) {
        $params['zone'] = $params ['zone'] != '' ? $params ['zone'] : 'default';
	} else {
        $params['zone'] = 'default';
	}

	// set default priority to 50 (1=high, 50=normal, 100=low)
	if (isset ( $params ['priority'] )) {
		$priority = $params ['priority'] != '' ? $params ['priority'] : 50;
	} else {
		$priority = 50;
	}

	// parameter speichern, feature queueing
	$GLOBALS ['buffer'] ['feature_stack'] [$priority] [] = $params;
	$GLOBALS ['buffer'] ['zone'] [$params['zone']] = TRUE;

}