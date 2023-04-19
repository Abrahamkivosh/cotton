<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 16:30:32
         compiled from "ui/theme/default/orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212016781062b68777ea2012-99959799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6246a77e5c680f6561aa0828023a39e9f30fd442' => 
    array (
      0 => 'ui/theme/default/orders.tpl',
      1 => 1663070273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212016781062b68777ea2012-99959799',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b68777f12d86_79245348',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'rights' => 0,
    '_L' => 0,
    'd' => 0,
    'ds' => 0,
    'fm' => 0,
    '_admin' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b68777f12d86_79245348')) {function content_62b68777f12d86_79245348($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Order to Order list</div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by order number...">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_add']){?>
										<div class="col-md-4">
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/create-order" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Add Order</a>
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
												<th>Order Number</th>
												<th>Ginner Name</th>
												<th>Requested QTY</th>
												<th>Price Per QTY</th>
												<th>Delivery Details</th>
												<th>Verified QTY</th>
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
											    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value->order_no;?>
</td>
												<td>
												  <?php $_smarty_tpl->tpl_vars['fm'] = new Smarty_variable(ORM::for_table('ginner')->find_one($_smarty_tpl->tpl_vars['ds']->value['ginner_id']), null, 0);?>
												  <?php echo $_smarty_tpl->tpl_vars['fm']->value->fullname;?>
  <?php echo $_smarty_tpl->tpl_vars['fm']->value->phonenumber;?>

												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->qty;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->price;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->delivery_details;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->verified_qty;?>
</td>
											
												<td>
												           <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=="1"){?>
																<label class="badge badge-warning">Approved by You <br>Pending Approval from Ginner</label>
														
															<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['status']=="2"){?>
                                                                 <label class="badge badge-success">Approved by Ginner</label>
															<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['status']=="3"){?>
                                                                 <label class="badge badge-success">Paid Off</label>	 
															<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['status']=="4"){?>
                                                                 <label class="badge badge-danger">Rejected by Ginner</label>
															<?php }else{ ?>
																<label class="badge badge-danger">Pending Approval by you </label>
																<br>
																<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/verify/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-success btn-sm">Verify Order</a>
															<?php }?>
												</td>
												
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['created_at'];?>
</td>
												<td>
												<?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=="0"){?>
												<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_edit']){?>
													<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
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