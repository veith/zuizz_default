<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {ZU_dropdown} function plugin
 *
 * Type:     function<br>
 * Name:     ZU_dropdown<br>
 * Input:<br>
 *           - name       (optional) - string default "select"
 *           - values     (required if no options supplied) - array
 *           - options    (required if no values supplied) - associative array
 *           - selected   (optional) - string default not set
 *           - output     (required if not options supplied) - array
 * Purpose:  Prints the list of <option> tags generated from
 *           the passed parameters
 * @link http://smarty.php.net/manual/en/language.function.html.options.php {html_image}
 *      (Smarty online manual)
 * @author Monte Ohrt <monte at ohrt dot com>
 * @param array
 * @param Smarty
 * @param type string Typen: ohne Angabe default mit übergebenem Array, countrylist und
 * @return string
 * @uses smarty_function_escape_special_chars()
 */
function smarty_function_ZU_dropdown($params, $smarty, $template) {
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
	//require_once $smarty->_get_plugin_filepath ( 'shared', 'escape_special_chars' );

	$name = null;
	$values = null;
	$options = null;
	$selected = array ();
	$output = null;
	$class = '';
	$extra = '';




	foreach ( $params as $_key => $_val ) {
		switch ($_key) {
			case 'name' :
				$$_key = ( string ) $_val;
				break;

			case 'options' :
				$$_key = ( array ) $_val;
				break;

			case 'values' :
			case 'output' :
				$$_key = array_values ( ( array ) $_val );
				break;

			case 'selected' :
				$$_key = array_map ( 'strval', array_values ( ( array ) $_val ) );
				break;

			default :
				if (! is_array ( $_val )) {
					$extra .= ' ' . $_key . '="' . smarty_function_escape_special_chars ( $_val ) . '"';
				} else {
					$smarty->trigger_error ( "ZU_dropdown: extra attribute '$_key' cannot be an array", E_USER_NOTICE );
				}
				break;
		}
	}

	if (! isset ( $options ) && ! isset ( $values ))
		return ''; /* raise error here? */

	$_html_result = '';

	if (isset ( $options )) {

		foreach ( $options as $_key => $_val )
			$_html_result .= smarty_function_ZU_dropdown_optoutput ( $_key, $_val, $selected );

	} else {

		foreach ( $values as $_i => $_key ) {
			$_val = isset ( $output [$_i] ) ? $output [$_i] : '';
			$_html_result .= smarty_function_ZU_dropdown_optoutput ( $_key, $_val, $selected );
		}

	}

	if (! empty ( $name )) {
		$_html_result = '<select name="' . $name . '"' . $extra . $class . '>' . "\n" . $_html_result . '</select>' . "\n";
	}

	return $_html_result;

}



function smarty_function_ZU_dropdown_optoutput($key, $value, $selected) {
	if (! is_array ( $value )) {
		$_html_result = '<option label="' . smarty_function_escape_special_chars ( $value ) . '" value="' . smarty_function_escape_special_chars ( $key ) . '"';
		if (in_array ( ( string ) $key, $selected ))
			$_html_result .= ' selected="selected"';
		$_html_result .= '>' . smarty_function_escape_special_chars ( $value ) . '</option>' . "\n";
	} else {
		$_html_result = smarty_function_ZU_dropdown_optgroup ( $key, $value, $selected );
	}
	return $_html_result;
}

function smarty_function_ZU_dropdown_optgroup($key, $values, $selected) {
	$optgroup_html = '<optgroup label="' . smarty_function_escape_special_chars ( $key ) . '">' . "\n";
	foreach ( $values as $key => $value ) {
		$optgroup_html .= smarty_function_ZU_dropdown_optoutput ( $key, $value, $selected );
	}
	$optgroup_html .= "</optgroup>\n";
	return $optgroup_html;
}
