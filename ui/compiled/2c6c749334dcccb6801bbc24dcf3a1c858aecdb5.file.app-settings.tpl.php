<?php /* Smarty version Smarty-3.1.13, created on 2022-11-17 08:33:43
         compiled from "ui/theme/default/app-settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1408047133627ea6c966ae76-49419610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c6c749334dcccb6801bbc24dcf3a1c858aecdb5' => 
    array (
      0 => 'ui/theme/default/app-settings.tpl',
      1 => 1668662887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1408047133627ea6c966ae76-49419610',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_627ea6c96afa16_04753149',
  'variables' => 
  array (
    '_L' => 0,
    'notify' => 0,
    '_url' => 0,
    '_c' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_627ea6c96afa16_04753149')) {function content_627ea6c96afa16_04753149($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div><?php echo $_smarty_tpl->tpl_vars['_L']->value['General_Settings'];?>
</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/app-post" enctype="multipart/form-data">
                    <div class="form-group">
						<label class="col-md-2 control-label">Company Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="company" name="company" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
">
							<span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['App_Name_Help_Text'];?>
</span>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>
						<div class="col-md-6">
							<textarea class="form-control" id="address" name="address" rows="3"><?php echo $_smarty_tpl->tpl_vars['_c']->value['address'];?>
</textarea>
							<span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['You_can_use_html_tag'];?>
</span>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Admin <?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone_Number'];?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['phone'];?>
">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Company Logo</label>
						<div class="col-md-6">
							<input type="file" name="file" id="file" >
							<img width="100" class="rounded-circle" src="<?php echo $_smarty_tpl->tpl_vars['_c']->value['company_logo'];?>
" alt="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Background client login Image</label>
						<div class="col-md-6">
							<input type="file" name="file_b" id="file" >
							<img width="100" class="rounded-circle" src="<?php echo $_smarty_tpl->tpl_vars['_c']->value['background_image'];?>
" alt="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Account Prefix</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="prefix" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['prefix'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Scheduler Time (Reminders, disconnection client time)</label>
						<div class="col-md-6">
							<input type="time" class="form-control"  name="time_scheduler" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['time_scheduler'];?>
">
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
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