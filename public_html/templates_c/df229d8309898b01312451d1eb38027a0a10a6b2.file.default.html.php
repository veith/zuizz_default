<?php /* Smarty version Smarty-3.1.12, created on 2013-01-07 18:59:48
         compiled from "/Users/flo/Development/akarat13/custom/skins/web.perspective.pagelayout/default.html" */ ?>
<?php /*%%SmartyHeaderCode:54708442550eb0d04162e93-59577888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df229d8309898b01312451d1eb38027a0a10a6b2' => 
    array (
      0 => '/Users/flo/Development/akarat13/custom/skins/web.perspective.pagelayout/default.html',
      1 => 1357581585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54708442550eb0d04162e93-59577888',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50eb0d041a2790_14271053',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50eb0d041a2790_14271053')) {function content_50eb0d041a2790_14271053($_smarty_tpl) {?><!DOCTYPE html>
<html lang="<?php echo $_SESSION['ZUIZZ']['LANG']['interface_lang'];?>
">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- [head:tags] -->
    <!-- [head:metatags] -->
    <!-- [head:css] -->
    <title><!-- [head:title] --></title>

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="/jslibs/utils/html5shiv.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link type="text/css" href="/css/jquery-ui-1.8.16.custom.css" rel="stylesheet"/>
    <link type="text/css" href="/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="/css/print.css" rel="stylesheet" media="print">
    <link type="text/css" href="/css/select2.css" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/media/favicon.ico">
    <link rel="apple-touch-icon" href="/media/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/media/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/media/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/media/apple-touch-icon-144x144.png" />
</head>

<body>

<div id="zu_container" class="container-fluid">
    <!-- [zone:default] -->
</div>



<script src="/jslibs/jquery-1.8.3.min.js"></script>
<script src="/jslibs/plugins/twitter/bootstrap.min.js"></script>
<script src="/jslibs/terrific-2.0.1.min.js"></script>
<script src="/jslibs/libraries/doT.min.js"></script>

<!-- [head:js] -->

<!-- Terri -->
<script type="text/javascript">

    (function($) {
        // Tc2
        $(document).ready(function() {
            var $page = $('body'),
                    config = {
                        dependencyPath: {
                            library: '/jslibs/libraries/',
                            plugin: '/jslibs/plugins/',
                            util: '/jslibs/utils/'
                        }
                    },
                    application = new Tc.Application($page, config);

            application.registerModules();
            application.start();

        });
    })(Tc.$);
</script>
</body>
</html><?php }} ?>