<?php /* Smarty version Smarty-3.1.13, created on 2022-11-22 14:26:45
         compiled from "ui/theme/default/amcos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40140964662b559658a7af5-52790960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5385aff940bcc4ec8f9e87ea69442f8adf3b285' => 
    array (
      0 => 'ui/theme/default/amcos.tpl',
      1 => 1668927127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40140964662b559658a7af5-52790960',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b559658eb412_17490097',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'rights' => 0,
    '_L' => 0,
    'd' => 0,
    'ds' => 0,
    'amcos' => 0,
    'amcos_users' => 0,
    'am' => 0,
    '_admin' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b559658eb412_17490097')) {function content_62b559658eb412_17490097($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Amcos Users </div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by Username...">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_add']){?>
										<div class="col-md-4">
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Add Amcos</a>
										</div>&nbsp;
<?php }?>										
					</div>
									</div>
									<div class="col-lg-12">
										<div class="main-card mb-3 card">
											<div class="card-body">

												<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Amcos Name</th>
												<th>Address</th>
												<th>Contact</th>
												<th>Village Name</th>
												<th>Status</th>
												<th>Amcos Users</th>
												<th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
											</tr>
										</thead>
										<tbody>
										<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
											<tr>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['address'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('tbl_villages')->find_one($_smarty_tpl->tpl_vars['ds']->value['village_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['amcos']->value->village_name;?>
</td>
												
												<td>
												           <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=="on"){?>
																<label class="badge badge-success">Active</label>
																<br>
																<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/deactivate/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-warning btn-sm">Deactivate</a>
															<?php }else{ ?>
																<label class="badge badge-danger">InActive</label>
																<br>
																<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/activate/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-success btn-sm">Activate</a>
															<?php }?>
												</td>
                                                <td>
												<table>
												<tr><th>Full names</th><th>Username</th><th>phonenumber</th></tr>
												<?php $_smarty_tpl->tpl_vars['amcos_users'] = new Smarty_variable(ORM::for_table('amcos_users')->where('amcos_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
												<?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos_users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                                <tr><td><?php echo $_smarty_tpl->tpl_vars['am']->value['fullname'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['am']->value['username'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['am']->value['phonenumber'];?>
</td></tr>
												<?php } ?>
												</table>
												</td>       
												<td>
												<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_edit']){?>
													<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-warning btn-sm"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_delete']){?>
													<?php if (($_smarty_tpl->tpl_vars['_admin']->value['username'])!=($_smarty_tpl->tpl_vars['ds']->value['username'])){?>
														<a onClick="javascript: return confirm('Please confirm deletion');" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-danger btn-sm delete"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
													<?php }?>
												<?php }?>
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
									</div>
									<?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

								</div>
							</div>
						</div>
					</div>
						</div>
					</div>


<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>