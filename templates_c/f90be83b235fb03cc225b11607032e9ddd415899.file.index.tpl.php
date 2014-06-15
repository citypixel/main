<?php /* Smarty version Smarty-3.1.14, created on 2014-06-01 11:39:22
         compiled from "templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7421538a2124c1ee33-27130904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f90be83b235fb03cc225b11607032e9ddd415899' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1401615560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7421538a2124c1ee33-27130904',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_538a21252bd229_47621858',
  'variables' => 
  array (
    'css_kieg' => 0,
    'css_valaszto' => 0,
    'slider' => 0,
    'slider_x' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538a21252bd229_47621858')) {function content_538a21252bd229_47621858($_smarty_tpl) {?><!DOCTYPE html>
<html lang="hu-HU">
<head>
   <meta charset="utf-8" />
   <title>Metripond</title>
   <meta name="description" content="" />
   <meta name="keywords" content="" />
   <meta name="robots" content="index, follow" />
   <script type="text/javascript" src="highslide-full.js"></script>
   <script type="text/javascript">hs.graphicsDir = "highslide/graphics/";</script>
   <link rel="stylesheet" type="text/CSS" href="highslide.css" />
   <link rel="stylesheet" type="text/CSS" href="style.css" />
   <link rel="shortcut icon" href="favicon.ico" />
   <link rel="stylesheet" href="my_content.css" />
<?php if ($_smarty_tpl->tpl_vars['css_kieg']->value){?><?php echo $_smarty_tpl->tpl_vars['css_kieg']->value;?>
<?php }?>
   <link rel="stylesheet" href="slider/css/rhinoslider-1.05.css" />
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['css_valaszto']->value){?><?php echo $_smarty_tpl->tpl_vars['css_valaszto']->value;?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['slider']->value){?><?php echo $_smarty_tpl->tpl_vars['slider_x']->value;?>
<?php }?>

   <script type="text/javascript" src="js/jquery.1.7.1.min.js"></script>
   <script type="text/javascript" src="slider/js/rhinoslider-1.05.min.js"></script>
   <script type="text/javascript" src="slider/js/mousewheel.js"></script>
   <script type="text/javascript" src="slider/js/easing.js"></script>
   <script type="text/javascript" src="slider/parameters.js"></script>
   <script type="text/javascript" src="js/check.js"></script>
   <script type="text/javascript" src="js/events.js"></script>
</body>
</html><?php }} ?>