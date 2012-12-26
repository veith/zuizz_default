<?php
/*
* Smarty plugin
* ————————————————————-
* File:     function.recurse_array.php
* Type:     function
* Name:     recurse_array
* Purpose:  prints out elements of an array recursively
* ————————————————————-
*/

function smarty_function_ZU_nested_set($params, &$smarty)
{
	if (is_array($params) && $params['array']->hasChildren()) {
		$markup = '';

		$markup .= '<ul>';

		foreach ($params['array']->getChildren() as $element) {
			$markup .= '<li>';

			$temp_element = $element->getNode();

			$markup .= '<a href="#">' . $element . ' (' . $temp_element->getOuDescription() . ')</a>';

			if ($element->hasChildren()) {
				$markup .= smarty_function_ZU_nested_set($element, $smarty);
			}

			$markup .= '</li>';
		}

		$markup .= '</ul>';

		return $markup;

	} elseif (is_object($params) && $params->hasChildren())  {
		$markup = '';

		$markup .= '<ul>';

		foreach ($params->getChildren() as $element) {
			$markup .= '<li>';

			$temp_element = $element->getNode();

			$markup .= '<a href="#">' . $element . ' (' . $temp_element->getOuDescription() . ')</a>';

			if ($element->hasChildren()) {
				$markup .= smarty_function_ZU_nested_set($element, $smarty);
			}

			$markup .= '</li>';
		}

		$markup .= '</ul>';

		return $markup;
	}
}