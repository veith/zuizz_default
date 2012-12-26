<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty upper modifier plugin
 *
 * Type:     modifier<br>
 * Name:     ZU_print_data<br>
 * Purpose:  Einen Array ausgeben
 * @author   Veith
 * @param array
 * @return string
 */
function smarty_modifier_ZU_mediasrc($file, $theme = NULL) {



	// wenn kein theme angegeben, default theme verwenden
	if ($theme != NULL) {
		return ZU_DIR_MEDIA . $theme . '/' . $file ;
	} else {
		return ZU_DIR_MEDIA . $GLOBALS ['ZUIZZ']->config->system ['theme'] . '/' . $file;
	}

}

?>
