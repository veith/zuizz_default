<?php

/**
 * Translate String in interface
 *
 * Type:     modifier<br>
 * Name:     ZU_tl<br>
 * Purpose:  String in andere Sprache übersetzen
 * @author   Veith
 * @content	string string Quelltext
 * @lang	string definierte Sprache, i für interface lang sonst content_lang
 * @return string übersetzeter string
 */
function smarty_modifier_ZU_tl($string, $lang) {
	if(isset($lang)){
		if($lang == "i"){
			$sprache = ZU::get_interface_lang();
		}else {
			$sprache = $lang;
		}
	}
	return ZU::translate_string((string)$string,(string)$sprache);
}