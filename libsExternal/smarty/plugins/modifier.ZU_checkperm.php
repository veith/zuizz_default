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
 * Name:     ZU_checkperm<br>
 * Purpose:  Rechte prüfen anhand von FeatureID, ID, und permission Bit
 * @author   Veith
 * @param feature_id
 * @param permission_bit
 * @param feature_type // Optional
 * @return boolean
 */


function smarty_modifier_ZU_checkperm($feature_id, $permission_bit, $feature_type) {

		return ZU::check_permission($feature_type, $feature_id, $permission_bit);
}

