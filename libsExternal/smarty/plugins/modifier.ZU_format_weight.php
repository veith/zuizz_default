<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty metric format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     ZU_format_weight<br>
 * Purpose:  gramm in menschenlsebares Format umwandeln
 * @author   Veith
 * @param array
 * @return string
 */
function smarty_modifier_ZU_format_weight($g, $show_unit = TRUE) {

	$units ['t'] = 0.000001;
	$units ['kg'] = 0.001;
	$units ['g'] = 1;
	$units ['dg'] = 10;
	$units ['mg'] = 1000;
	$units ['µg'] = 1000000;

	if (! isset ( $GLOBALS ['ZUIZZ']->config->locale ['weight_unit'] )) {
		$GLOBALS ['ZUIZZ']->config->locale ['weight_unit'] = 'auto';
	}

	switch ($GLOBALS ['ZUIZZ']->config->locale ['weight_unit']) {
		case 'auto' :
			foreach ( $units as $masseinheit => $factor ) {
				$res = $g * $factor;
				if ($res > 1) {
					if ($show_unit) {
						return "{$res} {$masseinheit}";
					} else {
						return $res;
					}
				}
			}
			break;
		case 'g' :
			$res = $g * $units ['g'];
			if ($show_unit) {
				return "{$res} g";
			} else {
				return $res;
			}
			break;
		case 'dg' :
			$res = $g * $units ['dg'];
			if ($show_unit) {
				return "{$res} dg";
			} else {
				return $res;
			}
			break;
		case 'mg' :
			$res = $g * $units ['mg'];
			if ($show_unit) {
				return "{$res} mg";
			} else {
				return $res;
			}
			break;
		case 'µg' :
			$res = $g * $units ['µg'];
			if ($show_unit) {
				return "{$res} µg";
			} else {
				return $res;
			}
			break;
		case 'ng' :
			$res = $g * $units ['ng'];
			if ($show_unit) {
				return "{$res} ng";
			} else {
				return $res;
			}
			break;

		default :
			// fallback
			$g = $g * 1;
			return "{$g} g";
			break;
	}

}
