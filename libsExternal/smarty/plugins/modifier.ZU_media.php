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
function smarty_modifier_ZU_media($file, $alt_tag = NULL, $theme = NULL, $css_class = NULL) {

	// alt und title

		$output [] = 'alt="' . $alt_tag . '"';
		$output [] = 'title="' . $alt_tag . '"';


	// css klasse
	if ($css_class != NULL) {
		$output [] = 'class="' . $css_class . '"';
	}

	// wenn kein theme angegeben, default theme verwenden
	if ($theme != NULL) {
		$output [] = 'src="' . ZU_DIR_MEDIA . $theme . '/' . $file . '"';
	} else {
		$output [] = 'src="' . ZU_DIR_MEDIA . $GLOBALS ['ZUIZZ']->config->system ['theme'] . '/' . $file . '"';
	}

	return "<img " . implode ( " ", $output ) . " />";
}
