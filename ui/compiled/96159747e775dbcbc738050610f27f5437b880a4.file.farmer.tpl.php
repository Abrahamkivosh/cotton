<?php /* Smarty version Smarty-3.1.13, created on 2022-11-21 08:04:55
         compiled from "ui/theme/default/farmer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95188226862b5d4cba074e7-05268812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96159747e775dbcbc738050610f27f5437b880a4' => 
    array (
      0 => 'ui/theme/default/farmer.tpl',
      1 => 1668927108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95188226862b5d4cba074e7-05268812',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b5d4cba55522_54385145',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'rights' => 0,
    '_L' => 0,
    'd' => 0,
    'ds' => 0,
    'amcos' => 0,
    'sub' => 0,
    'amcos_u' => 0,
    '_admin' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b5d4cba55522_54385145')) {function content_62b5d4cba55522_54385145($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Farmers</div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by phonenumber or name">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_add']){?>
										<div class="col-md-4">
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Add farmer</a>
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
											
												<th>FirstName</th>
												<th>MiddleName</th>
												<th>Lastname</th>
												<th>Gender</th>
												<th>Phone Number</th>
												<th>Year of Birth</th>
												<th>Village Name</th>
												<th>Subvillage</th>
												<th>Land Size (Acres)</th>
												<th>Status</th>
												<th>Date Created</th>
												<th>By Who?</th>
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
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['firstname'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['middlename'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['lastname'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['gender'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['idno'];?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('tbl_villages')->find_one($_smarty_tpl->tpl_vars['ds']->value['village_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['amcos']->value->village_name;?>
</td>
												 <td><?php $_smarty_tpl->tpl_vars['sub'] = new Smarty_variable(ORM::for_table('tbl_sub_villages')->find_one($_smarty_tpl->tpl_vars['ds']->value['sub_village_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['sub']->value->name;?>
</td>
												 <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['acre'];?>
</td>
												<td>
												           <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=="on"){?>
																<label class="badge badge-success">Active</label>
															<?php }else{ ?>
																<label class="badge badge-danger">InActive</label>
															<?php }?>
												</td>
												
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['created_at'];?>
</td>

												<td><?php $_smarty_tpl->tpl_vars['amcos_u'] = new Smarty_variable(ORM::for_table('amcos_users')->find_one($_smarty_tpl->tpl_vars['ds']->value['user_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['amcos_u']->value->fullname;?>
</td>
                                                 <td>
												<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_edit']){?>
													<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-warning btn-sm"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_delete']){?>
													<?php if (($_smarty_tpl->tpl_vars['_admin']->value['username'])!=($_smarty_tpl->tpl_vars['ds']->value['username'])){?>
														<a onClick="javascript: return confirm('Please confirm deletion');" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
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