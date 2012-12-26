<?php
// rewrite string aus hauptconfig verwenden, ansonsten default verwenden
function smarty_function_ZU_URL($params, $smarty, $template) {

	if (isset ( $GLOBALS ['ZUIZZ']->config->system ['rewrite_string'] )) {
		return $GLOBALS ['ZUIZZ']->config->system ['rewrite_string'];
	} else {
		return "/index.php?route=";
	}

}