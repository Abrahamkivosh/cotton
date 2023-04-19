<?php /* Smarty version Smarty-3.1.13, created on 2022-11-17 11:20:28
         compiled from "ui/theme/default/orders-gin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93053888762b691fa6e5f74-33884015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d1b3e9b39bb2973347108c122ad80e863db4095' => 
    array (
      0 => 'ui/theme/default/orders-gin.tpl',
      1 => 1668662816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93053888762b691fa6e5f74-33884015',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b691fa71ae80_47939981',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_L' => 0,
    'd' => 0,
    'ds' => 0,
    'fm' => 0,
    'amcos' => 0,
    'villages' => 0,
    'ward' => 0,
    'rates' => 0,
    'rights' => 0,
    '_admin' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b691fa71ae80_47939981')) {function content_62b691fa71ae80_47939981($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Your Order list</div></div>
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
										
					</div>
									</div>
									<div class="col-lg-12">
										<div class="main-card mb-3 card">
											<div class="card-body">

												<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Order Number</th>
												<th>AMCOS user</th>
												<th>Requested QTY(Kgs)</th>
												<th>Price Per QTY(Kgs) </th>
												<th>Received QTY (Kgs)</th>
												<th>Empty weight (Kgs)</th>
												<th>Payable Amount (System fee inclusive)</th>
												<th>Delivery Details</th>
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
												
												  <?php $_smarty_tpl->tpl_vars['fm'] = new Smarty_variable(ORM::for_table('amcos')->find_one($_smarty_tpl->tpl_vars['ds']->value->amcos_id), null, 0);?>
												  <?php echo $_smarty_tpl->tpl_vars['fm']->value->name;?>
  <?php echo $_smarty_tpl->tpl_vars['fm']->value->phonenumber;?>

												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->qty;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->price;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->verified_qty;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->empty_weight;?>
</td>
												<td>
								
												<?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->find_one($_smarty_tpl->tpl_vars['ds']->value->amcos_id), null, 0);?>
												<?php $_smarty_tpl->tpl_vars['villages'] = new Smarty_variable(ORM::for_table('tbl_villages')->find_one($_smarty_tpl->tpl_vars['amcos']->value->village_id), null, 0);?>
												<?php $_smarty_tpl->tpl_vars['ward'] = new Smarty_variable(ORM::for_table('tbl_ward')->find_one($_smarty_tpl->tpl_vars['villages']->value->ward_id), null, 0);?>
                    							<?php $_smarty_tpl->tpl_vars['rates'] = new Smarty_variable(ORM::for_table('tbl_ratescommissions')->where('district_id',$_smarty_tpl->tpl_vars['ward']->value->district_id)->order_by_desc('id')->find_one(), null, 0);?>
                      						  	<?php echo ((int)($_smarty_tpl->tpl_vars['rates']->value->system_rate*($_smarty_tpl->tpl_vars['ds']->value->verified_qty-$_smarty_tpl->tpl_vars['ds']->value->empty_weight)*$_smarty_tpl->tpl_vars['ds']->value->price)/100)+($_smarty_tpl->tpl_vars['ds']->value->verified_qty-$_smarty_tpl->tpl_vars['ds']->value->empty_weight)*$_smarty_tpl->tpl_vars['ds']->value->price;?>

												</td>
												<td>
												<?php if ($_smarty_tpl->tpl_vars['ds']->value->trans_name){?>
												Transporter Name: <?php echo $_smarty_tpl->tpl_vars['ds']->value->trans_name;?>
 <br>
												    Telephone Number: <?php echo $_smarty_tpl->tpl_vars['ds']->value->trans_phonenumber;?>
<br>
													Truck Registration: <?php echo $_smarty_tpl->tpl_vars['ds']->value->trans_truck;?>
<br>
													Trailer Registration: <?php echo $_smarty_tpl->tpl_vars['ds']->value->trans_trailer;?>

												<?php }?>	
												</td>
												<td>
												           <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=="1"){?>
													       	<label class="badge badge-danger">Pending Approval by you </label>
																<br>
																<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/verify-gin/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-success btn-sm">Accept Order</a>
															<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['status']=="2"){?>
															<?php if ($_smarty_tpl->tpl_vars['ds']->value->verified_qty>0){?>
																<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/approve-ordera/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-success btn-sm" onClick="return confirm('Are yo sure you want to Pay?')" >Approve Order and Pay</a>
														    <?php }else{ ?>
                                                                 <label class="badge badge-warning">Not delivered yet!</label>
															<?php }?>
														    <?php }elseif($_smarty_tpl->tpl_vars['ds']->value['status']=="3"){?>
														        <label class="badge badge-success">Order Paid</label>
															<?php }else{ ?>
																<label class="badge badge-danger">Pending Approval by Amcos </label>
															<?php }?>
												</td>
												
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['created_at'];?>
</td>
												<td>
											    <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=="2"){?>
												<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_edit']){?>
												    <?php if ($_smarty_tpl->tpl_vars['ds']->value->verified_qty){?>
													<?php }else{ ?>
													<?php if ($_smarty_tpl->tpl_vars['ds']->value->trans_name){?>
													<?php if ($_smarty_tpl->tpl_vars['ds']->value->rec_name){?>
													<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/receiveb-gin/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-success btn-sm">Update Received Order</a>
													<?php }else{ ?>
													<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/receiveb-gin/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-success btn-sm">Receive Order</a>
													<?php }?>
													<br><br>
													<!--<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/deliveryb-gin/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-warning btn-sm">Update Delivery Details</a>-->
													<?php }else{ ?>
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/deliveryb-gin/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-warning btn-sm">Add Delivery Details</a>

													<?php }?>
													<?php }?>
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