<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 15:38:16
         compiled from "ui/theme/default/autoload-subvillage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2106003514631f5594b23a22-54495127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba6989d7828f9f77ae5f3c69b693f4d14bc70db4' => 
    array (
      0 => 'ui/theme/default/autoload-subvillage.tpl',
      1 => 1663070263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2106003514631f5594b23a22-54495127',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_631f5594b569e4_76152412',
  'variables' => 
  array (
    'd' => 0,
    'ds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_631f5594b569e4_76152412')) {function content_631f5594b569e4_76152412($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</option>
<?php } ?><?php }} ?>