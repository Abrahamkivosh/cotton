<?php /* Smarty version Smarty-3.1.13, created on 2022-06-24 10:08:09
         compiled from "ui/theme/default/ginner-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182514474262b562a1538e32-24682243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e6e0ae8019c1aa8bde6e73cf1d69391a1a667b5' => 
    array (
      0 => 'ui/theme/default/ginner-edit.tpl',
      1 => 1656054487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182514474262b562a1538e32-24682243',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b562a15a89f4_78815700',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b562a15a89f4_78815700')) {function content_62b562a15a89f4_78815700($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Edit Amcos User</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ginner/ginner-edit-post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <div class="form-group">
						<label class="col-md-2 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
">
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full_Name'];?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Phone number</label>
						<div class="col-md-6">
							<input type="number" class="form-control"  name="phonenumber"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['phonenumber'];?>
">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
" name="email" >
						</div>
                    </div>
                     <div class="form-group">
						<label class="col-md-2 control-label">Location</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="location"   value="<?php echo $_smarty_tpl->tpl_vars['d']->value['location'];?>
">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Paybill Account</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="paybill"   value="<?php echo $_smarty_tpl->tpl_vars['d']->value['paybill'];?>
">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">B2C Paybill callback url</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="paybill_url"   value="<?php echo $_smarty_tpl->tpl_vars['d']->value['paybill_url'];?>
">
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>
						<div class="col-md-6">
							<input type="password" class="form-control" id="password" name="password">
							<span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['password_change_help'];?>
</span>
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm_Password'];?>
</label>
						<div class="col-md-6">
							<input type="password" class="form-control" id="cpassword" name="cpassword">
						</div>
                    </div>
					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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