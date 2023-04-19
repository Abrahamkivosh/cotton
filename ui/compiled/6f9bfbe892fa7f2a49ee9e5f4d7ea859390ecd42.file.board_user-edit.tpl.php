<?php /* Smarty version Smarty-3.1.13, created on 2022-06-24 05:43:10
         compiled from "ui/theme/default/board_user-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17914226262b5249b0f5692-32739518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f9bfbe892fa7f2a49ee9e5f4d7ea859390ecd42' => 
    array (
      0 => 'ui/theme/default/board_user-edit.tpl',
      1 => 1656038588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17914226262b5249b0f5692-32739518',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b5249b14a830_85347798',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    '_L' => 0,
    'b' => 0,
    'sms' => 0,
    'cs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b5249b14a830_85347798')) {function content_62b5249b14a830_85347798($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Edit Board Users</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
board_user/board_user-edit-post" enctype="multipart/form-data">
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
						<label class="col-md-2 control-label">Email address</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="email" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
" >
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Other details</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="details"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['details'];?>
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
						<label class="col-md-2 control-label">SMS Group</label>
						<div class="col-md-6">
							<select id="plan" name="sms_group_id" class="form-control">
								<option value="<?php echo $_smarty_tpl->tpl_vars['d']->value['sms_group_id'];?>
">

									<?php ob_start();?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(ORM::for_table('sms_group')->find_one($_smarty_tpl->tpl_vars['d']->value['sms_group_id']), null, 0);?><?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>

									<?php echo $_smarty_tpl->tpl_vars['b']->value->group_name;?>
</option>
								<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sms']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['group_name'];?>
</option>
								<?php } ?>
							</select>

						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
agent/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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