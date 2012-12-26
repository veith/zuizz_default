<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage plugins
 */

/**
 * Zuizz Terrific fragment loader
 *
 * Type:     modifier
 * Name:     ZU_Tc
 * Purpose:  Terrific Modul Registrieren und js und css dazu laden
 *
 * @author   Veith
 *
 * @param lsit_of_modules  semicolon separated list of modules
 *
 * @return TC classes
 */


function smarty_modifier_Tc_Fragment($list_of_modules, $js = null)
{
    $modules = array();

    $feature = $GLOBALS ['smarty']->tpl_vars ['ZU_feature']->value ['feature'];
    $modules[] = "mod";

    $listarray = explode(";", $list_of_modules);

    foreach ($listarray as $TcModule) {
        $modules[] = ucwords($TcModule);

        if ($js != null) {
            if (is_file(ZU_DIR_FEATURE . $feature . '/js/' . $TcModule . '.js')) {
                return '<script src="/js.php?feature=co.akarat.export&js=' . $TcModule . '.js"  type="text/javascript"></script>';
            }
        }

    }
    return implode(" mod", $modules);
}