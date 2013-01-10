<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage plugins
 */

/**
 * Zuizz Terrificskin for module element loader
 *
 * Type:     skinifier
 * Name:     ZU_TcSkin
 * Purpose:  Terrific skin Registrieren und js und css dazu laden
 *
 * @author   Veith
 *
 * @param lsit_of_skinules  semicolon separated list of skiny for modules
 *
 * @return TcSkin classes
 */


function smarty_modifier_Tcskin($tcskin, $feature = NULL, $media = "screen,projection")
{
    $tcskin = 'skin' . $tcskin;

    if (is_null($feature)) {
        $feature = $GLOBALS ['smarty']->tpl_vars ['ZU_feature']->value ['feature'];
    }


    // js bei existenz injecten
    if (is_file(ZU_DIR_FEATURE . $feature . '/js/' . $tcskin . '.js')) {
        if (empty ($GLOBALS ['ZU_feature_js'] ["{$feature}.{$tcskin}"])) {
            //$GLOBALS ['ZU_feature_js'] ["{$feature}.{$tcskin}"] = '<script src="/js.php?feature=' . $feature . '&js=' . $tcskin . '.js"  type="text/javascript"></script>';
            $GLOBALS ['ZU_feature_js'] ["{$feature}.{$tcskin}"] = '<script src="/zujs/' . $feature . '/' . $tcskin . '.js"  type="text/javascript"></script>';
        }
    }

    // css bei existenz injecten
    if (is_file(ZU_DIR_FEATURE . $feature . '/css/' . $tcskin . '.css')) {
        if (empty ($GLOBALS ['ZU_feature_css'] ["{$feature}.{$tcskin}"])) {
            //$GLOBALS ['ZU_feature_css'] ["{$feature}.{$tcskin}"] = '<LINK rel="stylesheet" type="text/css" href="/css.php?feature=' . $feature . '&css=' . $tcskin . '" media="' . $media . '">';
            $GLOBALS ['ZU_feature_css'] ["{$feature}.{$tcskin}"] = '<LINK rel="stylesheet" type="text/css" href="/zucss/' . $feature . '/' . $tcskin . '" media="' . $media . '">';
        }
    }



return $tcskin;
}

?>
