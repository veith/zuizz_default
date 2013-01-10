<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage plugins
 */

/**
 * Zuizz Terrific module element loader for TerrificJs 2.0
 *
 * Type:     modifier
 * Name:     ZU_Tc2
 * Purpose:  Terrific Modul Registrieren und js und css dazu laden
 *
 * @author   Veith
 *
 * @param lsit_of_modules  semicolon separated list of modules
 *
 * @return TC classes
 */


function smarty_modifier_Tc2($list_of_modules, $feature = NULL, $media = "screen,projection")
{
    $modules = array();
    if (is_null($feature)) {
        $feature   = $GLOBALS ['smarty']->tpl_vars ['ZU_feature']->value ['feature'];
        $modules[] = "mod";
    }

    $listarray = explode(";", $list_of_modules);
    foreach ($listarray as $TcModule) {
        $modules[] = $TcModule;

        // js bei existenz injecten
        if (is_file(ZU_DIR_FEATURE . $feature . '/js/' . $TcModule . '.js')) {
            if (empty ($GLOBALS ['ZU_feature_js'] ["{$feature}.{$TcModule}"])) {
                //$GLOBALS ['ZU_feature_js'] ["{$feature}.{$TcModule}"] = '<script src="/js.php?feature=' . $feature . '&js=' . $TcModule . '.js"  type="text/javascript"></script>';
                $GLOBALS ['ZU_feature_js'] ["{$feature}.{$TcModule}"] = '<script src="/zujs/' . $feature . '/' . $TcModule . '.js"  type="text/javascript"></script>';
            }
        }

        // css bei existenz injecten
        if (is_file(ZU_DIR_FEATURE . $feature . '/css/' . $TcModule . '.css')) {
            if (empty ($GLOBALS ['ZU_feature_css'] ["{$feature}.{$TcModule}"])) {
                //$GLOBALS ['ZU_feature_css'] ["{$feature}.{$TcModule}"] = '<link rel="stylesheet" type="text/css" href="/css.php?feature=' . $feature . '&css=' . $TcModule . '" media="' . $media . '">';
                $GLOBALS ['ZU_feature_css'] ["{$feature}.{$TcModule}"] = '<LINK rel="stylesheet" type="text/css" href="/zucss/' . $feature . '/' . $TcModule . '" media="' . $media . '">';
            }
        }

    }
    return implode(" mod-", $modules);
}