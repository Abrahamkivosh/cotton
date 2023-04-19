<?php /* Smarty version Smarty-3.1.13, created on 2022-06-27 04:53:25
         compiled from "ui/theme/default/order-amcos-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93831725362b90d95c50956-06710943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '420891bd6cd9dff1ecb15e588d063dea98bb4e3e' => 
    array (
      0 => 'ui/theme/default/order-amcos-view.tpl',
      1 => 1656294751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93831725362b90d95c50956-06710943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stype' => 0,
    'fdate' => 0,
    'tdate' => 0,
    'notify' => 0,
    'd' => 0,
    'ds' => 0,
    'fm' => 0,
    'amcos' => 0,
    'rates' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b90d95caa5c5_37533762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b90d95caa5c5_37533762')) {function content_62b90d95caa5c5_37533762($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Order Report
						<br>

						[	Order Report:
							<?php if ($_smarty_tpl->tpl_vars['stype']->value==1){?>
                            Pending From
							<?php }elseif($_smarty_tpl->tpl_vars['stype']->value==3){?>
                            Order Paid and Approved From
							<?php }else{ ?>
                            All From
							<?php }?>
							
							<?php echo $_smarty_tpl->tpl_vars['fdate']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['tdate']->value;?>
]
						</div>
					</div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<br>
							<div class="col-lg-12">
								<div class="main-card mb-3 card">
									<div class="card-body">

										<table class="mb-0 table table-hover">
									<thead>
										<tr>
											
							                 	<th>Order Number</th>
												<th>AMCOS user</th>
												<th>Requested QTY</th>
												<th>Price Per QTY</th>
												<th>Received QTY</th>
												<th>Payable Amount (System fee inclusive)</th>
												<th>Delivery Details</th>
												<th>Status</th>
												<th>Created At</th>
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
												  <?php $_smarty_tpl->tpl_vars['fm'] = new Smarty_variable(ORM::for_table('amcos')->find_one($_smarty_tpl->tpl_vars['ds']->value['amcos_id']), null, 0);?>
												  <?php echo $_smarty_tpl->tpl_vars['fm']->value->fullname;?>
  <?php echo $_smarty_tpl->tpl_vars['fm']->value->phonenumber;?>

												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->qty;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->price;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->verified_qty;?>
</td>
												<td>
												<?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->find_one($_smarty_tpl->tpl_vars['ds']->value->amcos_id), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['rates'] = new Smarty_variable(ORM::for_table('tbl_ratescommissions')->where('village_id',$_smarty_tpl->tpl_vars['amcos']->value->village_id)->order_by_desc('id')->find_one(), null, 0);?>
             
                        <?php echo ((int)($_smarty_tpl->tpl_vars['rates']->value->system_rate*$_smarty_tpl->tpl_vars['ds']->value->verified_qty*$_smarty_tpl->tpl_vars['ds']->value->price)/100)+$_smarty_tpl->tpl_vars['ds']->value->verified_qty*$_smarty_tpl->tpl_vars['ds']->value->price;?>

												
												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value->delivery_details;?>
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
order/approve-order/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
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
												
											</tr>
										<?php } ?>
									</tbody>
								</table>

							</div>
						</div>
					</div>
						</div>
					</div>
				</div>
			</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>