<?php /* Smarty version Smarty-3.1.13, created on 2023-01-16 13:35:53
         compiled from "ui/theme/default/amcos-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160398969662b559b81d1af2-40312571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c77baba03f567e1a3e10d01c1653e9b32b24393' => 
    array (
      0 => 'ui/theme/default/amcos-edit.tpl',
      1 => 1668927113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160398969662b559b81d1af2-40312571',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b559b8232fc3_08378215',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    'b' => 0,
    'village' => 0,
    'cs' => 0,
    'amcos_user' => 0,
    'ke' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b559b8232fc3_08378215')) {function content_62b559b8232fc3_08378215($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
amcos/amcos-edit-post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    
					<div class="form-group">
						<label class="col-md-2 control-label">Village Name</label>
						<div class="col-md-6">
							<select id="plan" name="village_id" class="form-control">
								<option value="<?php echo $_smarty_tpl->tpl_vars['d']->value['village_id'];?>
">

									<?php ob_start();?><?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(ORM::for_table('tbl_villages')->find_one($_smarty_tpl->tpl_vars['d']->value['village_id']), null, 0);?><?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>

									<?php echo $_smarty_tpl->tpl_vars['b']->value->village_name;?>
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
						<label class="col-md-2 control-label">Amcos Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="fullname" name="name" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Physical Address</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="address" name="address" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['address'];?>
">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Phone number</label>
						<div class="col-md-6">
							<input type="number"  class="form-control" min="100000000"  name="phonenumber" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['phonenumber'];?>
" required>
						</div>
                    </div>
                     <div class="form-group">
						<label class="col-md-2 control-label">Amcos Users</label>
					
                    </div>
				   <table>
				  <?php  $_smarty_tpl->tpl_vars['ke'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ke']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos_user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ke']->key => $_smarty_tpl->tpl_vars['ke']->value){
$_smarty_tpl->tpl_vars['ke']->_loop = true;
?>
				  <input type="hidden" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ke']->value['id'];?>
" name="idv[]">
				   <tr><td> <div class="form-group">
						<label class="col-md-12 control-label">Fullnames</label>
						<div class="col-md-12">
							<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ke']->value['fullname'];?>
" name="fullname[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Username</label>
						<div class="col-md-12">
							<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ke']->value['username'];?>
"  name="username[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">phonenumber</label>
						<div class="col-md-12">
							<input type="number" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ke']->value['phonenumber'];?>
" name="phonenumberv[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Password</label>
						<div class="col-md-12">
							<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ke']->value['password'];?>
" name="password[]">
						</div>
                    </div></td><tr>
				 <?php } ?>  
				   </table>
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