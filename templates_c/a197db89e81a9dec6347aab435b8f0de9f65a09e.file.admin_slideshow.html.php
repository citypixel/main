<?php /* Smarty version Smarty-3.1.14, created on 2014-06-13 21:36:30
         compiled from ".\templates\admin_slideshow.html" */ ?>
<?php /*%%SmartyHeaderCode:8234539b52be476e66-63669724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a197db89e81a9dec6347aab435b8f0de9f65a09e' => 
    array (
      0 => '.\\templates\\admin_slideshow.html',
      1 => 1396899611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8234539b52be476e66-63669724',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slide_array' => 0,
    'sor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_539b52be6b4e52_11263886',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539b52be6b4e52_11263886')) {function content_539b52be6b4e52_11263886($_smarty_tpl) {?><div>
	<form method="post" action="" name="szoveg" enctype="multipart/form-data" class="admin_form">
		<div class="a_form_fej">Slideshow szerkesztés<input type="submit" name="submit" value="Mentés" class="a_form_mentes" /></div>
		
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['obj'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['obj']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['name'] = 'obj';
$_smarty_tpl->tpl_vars['smarty']->value['section']['obj']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['slide_array']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<?php $_smarty_tpl->tpl_vars['sor'] = new Smarty_variable($_smarty_tpl->tpl_vars['slide_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['obj']['index']], null, 0);?>
		<div style="width: 600px;" class="uj_form">
			<img src="slider/<?php echo $_smarty_tpl->tpl_vars['sor']->value->slide;?>
" style="width: 600px; margin: 30px 0px 10px 0px;" />
			<input type="hidden" name="sorszam_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" />
			<label>magyar cím:</label><input type="text" name="focim_hu_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sor']->value->focim_hu;?>
" />
			<!--
			<label>angol cím:</label><input type="text" name="focim_en_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sor']->value->focim_en;?>
" />
			<label>német cím:</label><input type="text" name="focim_de_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sor']->value->focim_de;?>
" />
			<label>magyar alcím:</label><input type="text" name="leiras_hu_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sor']->value->leiras_hu;?>
" />
			<label>angol alcím:</label><input type="text" name="leiras_en_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sor']->value->leiras_en;?>
" />
			<label>német alcím:</label><input type="text" name="leiras_de_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sor']->value->leiras_de;?>
" />
			-->
			<label>link:</label><input type="text" name="link_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sor']->value->link;?>
" />
			<label>sorrend:</label><input type="text" name="sorrend_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorrend;?>
" />
			<!--
			<label>profil</label>
			<select name="profil_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
">
					<option <?php if ($_smarty_tpl->tpl_vars['sor']->value->profil=='cnc'){?>selected="selected"<?php }?><?php if ($_smarty_tpl->tpl_vars['sor']->value->profil==''){?>selected="selected"<?php }?> value="cnc">cnc</option>
					<option <?php if ($_smarty_tpl->tpl_vars['sor']->value->profil=='felépítmény'){?>selected="selected"<?php }?> value="felépítmény">felépítmény</option>
			</select>
			-->
			<label>aktív:</label><input type="checkbox" name="aktiv_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" <?php if ($_smarty_tpl->tpl_vars['sor']->value->aktiv==1){?>checked="checked"<?php }?> />
			<label>törlés:</label><input type="checkbox" name="torol_<?php echo $_smarty_tpl->tpl_vars['sor']->value->sorszam;?>
" />
		</div>
		<?php endfor; endif; ?>
		
		<div style="float:left; height: 40px; margin: 16px 0px 6px 36px;">
			Új kép feltöltése:<input name="file" type="file" size="30" accept="image/*" maxlength="150" /><br style="clear:both;" />
			<input type="submit" name="upload" value="Feltölt" />
		</div>
		<br style="clear: both;" />
		
	</form>
</div><?php }} ?>