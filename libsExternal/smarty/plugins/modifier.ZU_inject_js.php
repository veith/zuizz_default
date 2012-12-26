<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty upper modifier plugin
 *
 * Type:     modifier
 * Name:     ZU_inject_js
 * Purpose:  js files registrieren
 * @author   Veith
 * @param lsit_of_js_files  semicolon separated list of js files to load
 * @return void
 */
function smarty_modifier_ZU_inject_js($list_of_js_files) {
		$listarray = explode(";",$list_of_js_files);
		
		foreach ($listarray as $js) {
			// js registrieren default
			
			if(empty($GLOBALS['ZU_js'][trim($js)]) && !empty($js)){
				$GLOBALS['ZU_js'][trim($js)] = '<script src="' . $GLOBALS['ZUIZZ']->config->web['static_path']['jslibs'] . trim($js) .'" type="text/javascript"></script> ';
			}
		}
}

?>
