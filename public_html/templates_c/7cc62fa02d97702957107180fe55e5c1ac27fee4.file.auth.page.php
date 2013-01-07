<?php /* Smarty version Smarty-3.1.12, created on 2013-01-07 19:00:56
         compiled from "/Users/flo/Development/akarat13/custom/pages/auth.page" */ ?>
<?php /*%%SmartyHeaderCode:59061500250eb0d58ef6717-78187121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cc62fa02d97702957107180fe55e5c1ac27fee4' => 
    array (
      0 => '/Users/flo/Development/akarat13/custom/pages/auth.page',
      1 => 1356547770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59061500250eb0d58ef6717-78187121',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50eb0d58f2b1f6_31919616',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50eb0d58f2b1f6_31919616')) {function content_50eb0d58f2b1f6_31919616($_smarty_tpl) {?><?php if (!is_callable('smarty_function_ZU_load')) include '/Users/flo/Development/akarat13/libsExternal/smarty/plugins/function.ZU_load.php';
?>
<?php echo smarty_function_ZU_load(array('feature'=>"com.zuizz.auth.default",'zone'=>"default"),$_smarty_tpl);?>

<?php echo smarty_function_ZU_load(array('feature'=>"com.zuizz.auth.redirect",'zone'=>"default",'priority'=>100),$_smarty_tpl);?>
<?php }} ?>