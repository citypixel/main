<?php /* Smarty version Smarty-3.1.14, created on 2014-06-13 21:32:30
         compiled from ".\templates\admin_cimlap.html" */ ?>
<?php /*%%SmartyHeaderCode:25877539b51ce222170-76359925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49495210af6b0d2004c0cf803d158463c290d184' => 
    array (
      0 => '.\\templates\\admin_cimlap.html',
      1 => 1399115360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25877539b51ce222170-76359925',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_539b51ce2f5626_45130051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539b51ce2f5626_45130051')) {function content_539b51ce2f5626_45130051($_smarty_tpl) {?><form action="" method="post" style="float: right; margin-right: 20px; font-size: 14px;">
			Nyelv:
			<select name="lang">
				<option value="" <?php if ($_SESSION['lang']==''){?><?php }?>></option>
				<option value="hu" <?php if ($_SESSION['lang']=='hu'){?>selected="selected"<?php }?>>hu</option>
				<option value="en" <?php if ($_SESSION['lang']=='en'){?>selected="selected"<?php }?>>en</option>
				<option value="ro" <?php if ($_SESSION['lang']=='ro'){?>selected="selected"<?php }?>>ro</option>
			</select>
			<input type="submit" name="submit" value="OK" />
</form><?php }} ?>