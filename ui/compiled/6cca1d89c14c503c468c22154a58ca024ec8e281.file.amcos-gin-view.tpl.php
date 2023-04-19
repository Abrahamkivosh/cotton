<?php /* Smarty version Smarty-3.1.13, created on 2022-06-26 22:15:48
         compiled from "ui/theme/default/amcos-gin-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110569950162b8b064b4b588-56213159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cca1d89c14c503c468c22154a58ca024ec8e281' => 
    array (
      0 => 'ui/theme/default/amcos-gin-view.tpl',
      1 => 1656269466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110569950162b8b064b4b588-56213159',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stype' => 0,
    'fdate' => 0,
    'tdate' => 0,
    'notify' => 0,
    '_L' => 0,
    'd' => 0,
    'dv' => 0,
    'ds' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b8b064b9da07_31245177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b8b064b9da07_31245177')) {function content_62b8b064b9da07_31245177($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Amcos Payment Report
						<br>

							Amcos Payment Report:
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
											
								  <th>Order No.</th>
								  <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full_Name'];?>
</th>
								  <th>Amount</th>
								  <th>Status</th>
								  <th>Date Created</th>
										</tr>
									</thead>
									<tbody>
										<?php  $_smarty_tpl->tpl_vars['dv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dv']->key => $_smarty_tpl->tpl_vars['dv']->value){
$_smarty_tpl->tpl_vars['dv']->_loop = true;
?>
										<?php $_smarty_tpl->tpl_vars['ds'] = new Smarty_variable(ORM::for_table('amcos')->find_one($_smarty_tpl->tpl_vars['dv']->value['amcos_id']), null, 0);?>
											<tr>
											    <td><?php echo $_smarty_tpl->tpl_vars['dv']->value['order_no'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['fullname'];?>
--<?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
</td>
											    <td><?php echo $_smarty_tpl->tpl_vars['dv']->value['amount'];?>
</td>
												<td>
												           <?php if ($_smarty_tpl->tpl_vars['dv']->value['status']=="1"){?>
																<label class="badge badge-success">Paid</label>
															<?php }else{ ?>
																<label class="badge badge-danger">Pending</label>
															<?php }?>
												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['dv']->value['created_at'];?>
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