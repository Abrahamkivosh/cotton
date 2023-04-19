<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 16:59:17
         compiled from "ui/theme/default/farmer-amcos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138470295662b90c406ee1b1-02958405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '678c19406ace8261fa863db3e341f55a5ce78cb4' => 
    array (
      0 => 'ui/theme/default/farmer-amcos.tpl',
      1 => 1663070272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138470295662b90c406ee1b1-02958405',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b90c40716a57_52027016',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    'dv' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b90c40716a57_52027016')) {function content_62b90c40716a57_52027016($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Farmer Payment </div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payment/farmer-amcos/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by Order No...">
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
											    <th>Order No.</th>
												<th>Farmer name</th>
							                    <th>Phone Number</th>
												<th>Amount Paid</th>
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
										<?php $_smarty_tpl->tpl_vars['ds'] = new Smarty_variable(ORM::for_table('farmer')->find_one($_smarty_tpl->tpl_vars['dv']->value['farmer_id']), null, 0);?>
											<tr>
											    <td><?php echo $_smarty_tpl->tpl_vars['dv']->value['order_no'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['fullname'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['dv']->value['phonenumber'];?>
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
									<?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

								</div>
							</div>
						</div>
					</div>
						</div>
					</div>


<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>