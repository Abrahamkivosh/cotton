<?php /* Smarty version Smarty-3.1.13, created on 2023-01-16 17:04:13
         compiled from "ui/theme/default/farmer-gin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17788556562b8a12d948c69-20951966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0bd3f538664496fb35abe62bf5c55597cd4ffaf' => 
    array (
      0 => 'ui/theme/default/farmer-gin.tpl',
      1 => 1668927127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17788556562b8a12d948c69-20951966',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b8a12d975128_30538085',
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
<?php if ($_valid && !is_callable('content_62b8a12d975128_30538085')) {function content_62b8a12d975128_30538085($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
farmer-gin/list/">
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
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['middlename'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['lastname'];?>
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