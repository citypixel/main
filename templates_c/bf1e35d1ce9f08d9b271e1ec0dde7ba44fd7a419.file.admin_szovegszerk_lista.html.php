<?php /* Smarty version Smarty-3.1.14, created on 2014-06-13 21:33:38
         compiled from ".\templates\admin_szovegszerk_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:7254539b5212c801d8-14119296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf1e35d1ce9f08d9b271e1ec0dde7ba44fd7a419' => 
    array (
      0 => '.\\templates\\admin_szovegszerk_lista.html',
      1 => 1396782144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7254539b5212c801d8-14119296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lapszamsor' => 0,
    'obj_array' => 0,
    'sor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_539b5212d9b509_20305526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539b5212d9b509_20305526')) {function content_539b5212d9b509_20305526($_smarty_tpl) {?><div>
	<form method="post" action="?tartalom=szovegszerk" name="szoveg" class="admin_form">
		<div class="a_form_fej">Cikkszerkesztő
		   
		</div>
		<?php echo $_smarty_tpl->tpl_vars['lapszamsor']->value;?>

        <div style="width: 630px; height: 20px; color: #444444; font-weight: bold; font-size: 12px; margin: 0px auto 0px auto;">
			<span style="width: 26px;">&nbsp;</span>
			<span style="width: 320px; text-align: center;">cím</span>
			<span style="width: 50px; text-align: center;">id</span>
			<span style="width: 50px; text-align: center;">aktív</span>
            <span style="width: 50px; text-align: center;">nyelv</span>
			<span style="width: 50px; text-align: center;">sorrend</span>
		</div>
		
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['obj'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['name'] = 'obj';
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj_array']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['total']);
?>
		<?php $_smarty_tpl->tpl_vars['sor'] = new Smarty_variable($_smarty_tpl->tpl_vars['obj_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['obj']['index']], null, 0);?>
		<a href="?tartalom=szovegszerk&valaszt=<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" class="cedula_admintermeklista" <?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszin;?>
>
			<span style="width: 26px;"><?php echo $_smarty_tpl->tpl_vars['sor']->value->sor;?>
</span>
			<span style="width: 320px; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['sor']->value->cim;?>
</span>
			<span style="width: 50px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
</span>
			<span style="width: 50px; text-align: center;"><?php if ($_smarty_tpl->tpl_vars['sor']->value->archiv==0){?>x<?php }?></span>
			<span style="width: 50px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['sor']->value->nyelv;?>
</span>
			<span style="width: 50px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['sor']->value->sorrend;?>
</span>
		</a>
		<?php endfor; endif; ?>
		
		
		<div style="float:left; height: 40px; margin: 16px 0px 6px 36px;">
			Új szöveg címe:<input name="ujcim" type="text" value="" />
			<input type="submit" value="Létrehoz" />
		</div>
		<br style="clear: both;" />
		</div>
	</form>
</div><?php }} ?>