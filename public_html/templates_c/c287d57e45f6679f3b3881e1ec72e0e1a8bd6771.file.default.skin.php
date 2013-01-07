<?php /* Smarty version Smarty-3.1.12, created on 2013-01-07 19:00:56
         compiled from "/Users/flo/Development/akarat13/feature/com.zuizz.auth/skins/web/default/default.skin" */ ?>
<?php /*%%SmartyHeaderCode:21794563550eb0d58f34ac0-91116634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c287d57e45f6679f3b3881e1ec72e0e1a8bd6771' => 
    array (
      0 => '/Users/flo/Development/akarat13/feature/com.zuizz.auth/skins/web/default/default.skin',
      1 => 1357577028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21794563550eb0d58f34ac0-91116634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ZU_auth_incorrect' => 0,
    'ZU_feature' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50eb0d590378b7_72951737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50eb0d590378b7_72951737')) {function content_50eb0d590378b7_72951737($_smarty_tpl) {?><div class="container login mod mod-auth">
    <div class="page-header">
        <h1<?php if ($_SESSION['ZUIZZ']['AUTH']['is_auth']){?> class="eingeloggt"<?php }?><?php if ($_smarty_tpl->tpl_vars['ZU_auth_incorrect']->value){?> class="loginfehler"<?php }?>>Willkommen</h1>
    </div>
    <div class="row">
        <div class="span12">
            Bitte melden Sie sich mit Ihrem <strong>Benutzername</strong> und <strong>Passwort</strong> an.
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="span12">
            <form method="post" class="form-horizontal">
                <div class="control-group<?php if ($_smarty_tpl->tpl_vars['ZU_feature']->value['data']['auth_failed']){?> error<?php }?>">
                    <label class="control-label" for="f15username">Benutzername</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="f15username" name="f15username" value="<?php echo $_smarty_tpl->tpl_vars['ZU_feature']->value['values']['username'];?>
">
                    </div>
                </div>

                <div class="control-group<?php if ($_smarty_tpl->tpl_vars['ZU_feature']->value['data']['auth_failed']){?> error<?php }?>">
                    <label class="control-label" for="f15credentials">Passwort</label>
                    <div class="controls">
                        <input type="password" class="input-xlarge" id="f15credentials" name="f15credentials">
                    </div>
                </div>

                <div class="control-group<?php if ($_smarty_tpl->tpl_vars['ZU_feature']->value['data']['auth_failed']){?> error<?php }?>">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <?php if ($_smarty_tpl->tpl_vars['ZU_feature']->value['data']['auth_failed']){?>
                        <span class="help-inline error">Anmeldung fehlgeschlagen</span>
                        <?php }?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php }} ?>