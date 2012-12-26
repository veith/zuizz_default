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
 * Name:     ZU_inject_css<br>
 * Purpose:  css files registrieren
 * @author   Veith
 * @param lsit_of_css_files  semicolon separated list of css files to load css_file:media;other_css:media
 * @return void
 */

// TODO:: CDN verwenden
function smarty_modifier_ZU_inject_css($list_of_css_files) {
		$listarray = explode(";",$list_of_css_files);
		foreach ($listarray as $css) {
			// css registrieren default media screen
			$css = explode(":",$css);
			if(!isset($css[1])){
				$css[1] = "screen";
			}
			if(empty($GLOBALS['ZU_css'][trim($css[0])])){
				$GLOBALS['ZU_css'][trim($css[0])] = '<LINK rel="stylesheet" type="text/css" href="' . $GLOBALS['ZUIZZ']->config->web['static_path']['css'] . trim($css[0]) . '" media="' . $css[1] . '">';
			}
		}
}

?>
