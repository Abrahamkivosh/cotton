<?php /* Smarty version Smarty-3.1.13, created on 2022-06-24 08:52:10
         compiled from "ui/theme/default/ratescommission-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56245940862b550b02c3814-83693632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2eac5a6d790bf424176292e1ad90dfc8d38fe9a5' => 
    array (
      0 => 'ui/theme/default/ratescommission-edit.tpl',
      1 => 1656049928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56245940862b550b02c3814-83693632',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b550b030b343_62139430',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    'village' => 0,
    'cs' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b550b030b343_62139430')) {function content_62b550b030b343_62139430($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Rates & Commission Edit</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ratescommissions/ratescommission-edit-post" >
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">				
                     <div class="form-group">
								<label class="col-md-2 control-label">Village </label>
								<div class="col-md-6">
									<select id="plan" name="village_id" class="form-control">
									<option><?php echo $_smarty_tpl->tpl_vars['d']->value['village_id'];?>
</option>
										<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['village']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['village_name'];?>
</option>
										<?php } ?>
									</select>
								</div>
					</div>
					  <div class="form-group">
						<label class="col-md-2 control-label">Cotton Rate per quantity(Minimum)</label>
						<div class="col-md-6">
							<input name="min_rate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['min_rate'];?>
" required>
						</div>
                    </div>	
					  <div class="form-group">
						<label class="col-md-2 control-label">AMCOS commission rate per quantity %</label>
						<div class="col-md-6">
							<input name="amcos_rate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['amcos_rate'];?>
" required>
						</div>
                    </div>
					  <div class="form-group">
						<label class="col-md-2 control-label">System commission rate %</label>
						<div class="col-md-6">
							<input name="system_rate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['system_rate'];?>
" required>
						</div>
                    </div>

                    
					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ratescommissions/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>