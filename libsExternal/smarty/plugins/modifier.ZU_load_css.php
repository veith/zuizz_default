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
 * @param string css_file  css file
 * @param string feature feature name
 * @param string media defautl is screen,projection
 * @return void
 */

function smarty_modifier_ZU_load_css($css_file, $feature = NULL, $media = "screen,projection") {
	if (is_null ( $feature )) {
		$feature = $GLOBALS ['smarty']->tpl_vars ['ZU_feature']->value ['feature'];
	}

	if (empty ( $GLOBALS ['ZU_feature_css'] [$feature . '.' . $css_file] )) {
		$GLOBALS ['ZU_feature_css'] [$feature . '.' . $css_file]  = '<LINK rel="stylesheet" type="text/css" href="/css.php?feature=' . $feature . '&css=' . $css_file . '" media="' . $media . '">';
	}
}
