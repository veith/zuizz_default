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
function smarty_modifier_ZU_print_array($array) {
	return "<pre>" . ZU::print_array ( $array, TRUE ) . "</pre>";
}

?>
