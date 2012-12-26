<?php

/**
 * Smarty ZU static content modifier plugin
 *
 * Type:     modifier<br>
 * Name:     ZU_static<br>
 * Purpose:  Url für static content zurückgeben
 * @author   Veith
 * @content	string filename
 * @type	string type of static content defined in main.config.ini
 * @return string	with builded url for content
 */
function smarty_modifier_ZU_static($content, $type) {
	return $GLOBALS['ZUIZZ']->config->web['static_path'][$type] . $content ;
}