<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 20:35:41
         compiled from "ui/theme/default/sms-settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149381337162b9127744a7f3-43405000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adb41d126a4de03eacbaf9a4383948aee37c52e8' => 
    array (
      0 => 'ui/theme/default/sms-settings.tpl',
      1 => 1663070307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149381337162b9127744a7f3-43405000',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b9127747d161_64217540',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_c' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b9127747d161_64217540')) {function content_62b9127747d161_64217540($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>SMS Settings</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/sms-post" >

					<div class="form-group">
						<label class="col-md-2 control-label">Gateway</label>
						<div class="col-md-6">
							<select id="other" name="sms_gateway" class="form-control" required>
								<option value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['sms_gateway'];?>
"><?php echo $_smarty_tpl->tpl_vars['_c']->value['sms_gateway'];?>
</option>
								<option value="kibabasms">Kibaba SMS</option>
								<option value="africantalkings">AfricanTalkings</option>
								<option value="ujumbesms">Ujumbe SMS</option>
								<option value="movesms">Move SMS</option>
								<option value="mspace">MSpace</option>
								<option value="phitech">Phitech SMS</option>
								<option value="juamobile">Jua Mobile</option>
								<option value="advanta">Advanta</option>
                                <option value="smsonlinegh">smsonlinegh</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">username</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="sms_username" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['sms_username'];?>
"  >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Sender ID Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="sms_sender_id" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['sms_sender_id'];?>
" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Api Key</label>
						<div class="col-md-6">
							<textarea class="form-control"  name="sms_api_key" rows="3"><?php echo $_smarty_tpl->tpl_vars['_c']->value['sms_api_key'];?>
</textarea>

						</div>

					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Password(optional)</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="sms_password" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['sms_password'];?>
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