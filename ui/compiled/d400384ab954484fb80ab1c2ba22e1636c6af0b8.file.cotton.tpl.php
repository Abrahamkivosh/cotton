<?php /* Smarty version Smarty-3.1.13, created on 2022-11-17 16:30:16
         compiled from "ui/theme/default/cotton.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155347662162b67406e31746-11714759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd400384ab954484fb80ab1c2ba22e1636c6af0b8' => 
    array (
      0 => 'ui/theme/default/cotton.tpl',
      1 => 1668662845,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155347662162b67406e31746-11714759',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b67406e6aaf5_82883229',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'rights' => 0,
    '_L' => 0,
    'd' => 0,
    'ds' => 0,
    'fm' => 0,
    'vl' => 0,
    '_admin' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b67406e6aaf5_82883229')) {function content_62b67406e6aaf5_82883229($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Cotton collection list</div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by famer name...">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_add']){?>
										<div class="col-md-4">
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/collect" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Add Collection</a>
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
												<th>Farmer Name</th>
												<th>Village Name</th>
												<th>Collected QTY</th>
												<th>Paid QTY</th>
												<th>Status</th>
												<th>Created At</th>
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
												<td>
												  <?php $_smarty_tpl->tpl_vars['fm'] = new Smarty_variable(ORM::for_table('farmer')->find_one($_smarty_tpl->tpl_vars['ds']->value['farmer_id']), null, 0);?>
												  <?php echo $_smarty_tpl->tpl_vars['fm']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['fm']->value->middlename;?>
 <?php echo $_smarty_tpl->tpl_vars['fm']->value->lastname;?>
 <?php echo $_smarty_tpl->tpl_vars['fm']->value->phonenumber;?>

												</td>
												<td>
												 <?php $_smarty_tpl->tpl_vars['vl'] = new Smarty_variable(ORM::for_table('tbl_villages')->find_one($_smarty_tpl->tpl_vars['ds']->value['village_id']), null, 0);?>
												  <?php echo $_smarty_tpl->tpl_vars['vl']->value->village_name;?>
 
												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['qty'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_paid'];?>
</td>
											
												<td>
												            <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=="2"){?>
																<label class="badge badge-success">Verified</label>
														    <?php }elseif($_smarty_tpl->tpl_vars['ds']->value['status']=="1"){?>
																<label class="badge badge-success">Paid Off</label>
															<?php }else{ ?>
																<label class="badge badge-danger">Pending Verification</label>
																<br>
																<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/verify/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-success btn-sm">Resend verification</a>
															<?php }?>
												</td>
												
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['created_at'];?>
</td>
												<td>
												 <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=="1"){?>
												 <?php }else{ ?>
												<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_edit']){?>
													<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-warning btn-sm"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
 Collection</a>
												<?php }?>
												<?php }?>
												<!--
												<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_delete']){?>
													<?php if (($_smarty_tpl->tpl_vars['_admin']->value['username'])!=($_smarty_tpl->tpl_vars['ds']->value['username'])){?>
														<a onClick="javascript: return confirm('Please confirm deletion');" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-danger btn-sm delete"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
													<?php }?>
												<?php }?>
												-->
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