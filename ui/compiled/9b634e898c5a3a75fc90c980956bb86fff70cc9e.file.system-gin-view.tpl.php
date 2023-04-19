<?php /* Smarty version Smarty-3.1.13, created on 2022-06-26 22:16:18
         compiled from "ui/theme/default/system-gin-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186745090262b8b0828ac754-45198947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b634e898c5a3a75fc90c980956bb86fff70cc9e' => 
    array (
      0 => 'ui/theme/default/system-gin-view.tpl',
      1 => 1656269636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186745090262b8b0828ac754-45198947',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b8b0828e6159_18059232',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b8b0828e6159_18059232')) {function content_62b8b0828e6159_18059232($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>System Payment Report
						<br>

							System Payment Report:
							<?php if ($_smarty_tpl->tpl_vars['stype']->value==1){?>
                            Success Payments From
							<?php }elseif($_smarty_tpl->tpl_vars['stype']->value==2){?>
                            Pendind Payments From
							<?php }elseif($_smarty_tpl->tpl_vars['stype']->value==3){?>
							Rejected Payments From
							<?php }else{ ?>
                            All Payments From
							<?php }?>
							
							
							 [ <?php echo $_smarty_tpl->tpl_vars['fdate']->value;?>
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
											
								  
												<th>Order no.</th>
												<th>Amount Paid</th>
												<th>Status</th>
												<th>Date </th>
										</tr>
									</thead>
									<tbody>
									    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>

											<tr>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['order_no'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>
</td>
												
												<td>
												           <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=="1"){?>
																<label class="badge badge-success">Paid</label>
															<?php }else{ ?>
																<label class="badge badge-danger">Pending</label>
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