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
 * Name:     ZU_inject_js<br>
 * Purpose:  js files registrieren
 * @author   Veith
 * @param string js_file  js file
 * @param string feature feature name

 * @return void
 */

function smarty_modifier_ZU_load_js($js_file, $feature = NULL) {
	if (is_null ( $feature )) {
		$feature = $GLOBALS ['smarty']->tpl_vars ['ZU_feature']->value ['feature'];
	}

	if (empty ( $GLOBALS ['ZU_feature_js'] [$feature . '.' . $js_file] )) {
		$GLOBALS ['ZU_feature_js'] [$feature . '.' . $js_file]  = '<script src="/zujs/' . $feature . '/' . $js_file . '.js"  type="text/javascript"></script>';
	}
}
