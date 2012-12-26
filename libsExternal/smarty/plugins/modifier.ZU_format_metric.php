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
 * Name:     ZU_format_metric<br>
 * Purpose:  Meter in menschenlsebares Format umwandeln
 * @author   Veith
 * @param array
 * @return string
 */
function smarty_modifier_ZU_format_metric($m, $show_unit = TRUE, $dimension = 1) {

	if ($dimension > 1) {
		$res = $m * 1;
		if ($show_unit) {
			return "{$res} m<sup>{$dimension}</sup>";
		} else {
			return $res;
		}
	}

	$units ['t'] = 0.000001;
	$units ['km'] = 0.001;
	$units ['m'] = 1;
	$units ['dm'] = 10;
	$units ['cm'] = 100;
	$units ['mm'] = 1000;
	$units ['µm'] = 1000000;
	$units ['nm'] = 1000000000;

	if (! isset ( $GLOBALS ['ZUIZZ']->config->locale ['measuring_unit'] )) {
		$GLOBALS ['ZUIZZ']->config->locale ['measuring_unit'] = 'auto';
	}

	switch ($GLOBALS ['ZUIZZ']->config->locale ['measuring_unit']) {
		case 'auto' :
			foreach ( $units as $masseinheit => $factor ) {
				$res = $m * $factor;
				if ($res > 1) {
					if ($show_unit) {
						return "{$res} {$masseinheit}";
					} else {
						return $res;
					}
				}
			}
			break;
		case 'm' :
			$res = $m * $units ['m'];
			if ($show_unit) {
				return "{$res} m";
			} else {
				return $res;
			}
			break;
		case 'dm' :
			$res = $m * $units ['dm'];
			if ($show_unit) {
				return "{$res} dm";
			} else {
				return $res;
			}
			break;
		case 'cm' :
			$res = $m * $units ['cm'];
			if ($show_unit) {
				return "{$res} cm";
			} else {
				return $res;
			}
			break;
		case 'mm' :
			$res = $m * $units ['mm'];
			if ($show_unit) {
				return "{$res} mm";
			} else {
				return $res;
			}
			break;
		case 'µm' :
			$res = $m * $units ['µm'];
			if ($show_unit) {
				return "{$res} µm";
			} else {
				return $res;
			}
			break;
		case 'nm' :
			$res = $m * $units ['nm'];
			if ($show_unit) {
				return "{$res} nm";
			} else {
				return $res;
			}
			break;

		default :
			// fallback
			$m = $m * 1;
			return "{$m} m";
			break;

	}

}
