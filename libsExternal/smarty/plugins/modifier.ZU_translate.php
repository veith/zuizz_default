<?php

/**
 * Smarty ZU translate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     ZU_translate<br>
 * Purpose:  Translate strings
 * @author   Veith
 * @element	string filename
 * @type	string type of static content defined in main.config.ini
 * @return string	with builded url for content
 */
function smarty_modifier_ZU_translate($string) {
	return ZU::translate_string($string);

}