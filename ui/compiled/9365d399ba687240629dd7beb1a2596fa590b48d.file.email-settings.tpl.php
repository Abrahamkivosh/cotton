<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 10:55:59
         compiled from "ui/theme/default/email-settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:729702586320378f42c3d6-08634556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9365d399ba687240629dd7beb1a2596fa590b48d' => 
    array (
      0 => 'ui/theme/default/email-settings.tpl',
      1 => 1645992104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '729702586320378f42c3d6-08634556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_c' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6320378f45fac4_21651486',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6320378f45fac4_21651486')) {function content_6320378f45fac4_21651486($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Email Settings</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/email-post" >
					<div class="form-group">
						<label class="col-md-2 control-label">Enable/Disable Email</label>
						<div class="col-md-6">
							<select id="other" name="invoice_enabled" class="form-control" required>
								<option value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['invoice_enabled'];?>
"><?php if ($_smarty_tpl->tpl_vars['_c']->value['invoice_enabled']=="1"){?>
								Enabled
									<?php }else{ ?>
									Disabled
									<?php }?>
								</option>
								<option value="1">Enable</option>
								<option value="0">Disabled</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Domain</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="domain.com"    name="domain" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['domain'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email SMTP host</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="smtp.domain.com" name="smtp" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['smtp'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Encryption</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="ssl" name="security" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['security'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Port</label>
						<div class="col-md-6">
							<input type="number" class="form-control" placeholder="587" name="port" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['port'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Address</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="yourmail@domain.com"  name="email" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['email'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Password</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="password" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['password'];?>
">
						</div>
					</div>
						<div class="form-group">
						<label class="col-md-2 control-label">Email Subject</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="subject" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['subject'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email body </label>
						<div class="col-md-6">
							<textarea class="form-control" id="note" name="note" rows="3"><?php echo $_smarty_tpl->tpl_vars['_c']->value['note'];?>
</textarea>
							<span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['You_can_use_html_tag'];?>
</span>
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