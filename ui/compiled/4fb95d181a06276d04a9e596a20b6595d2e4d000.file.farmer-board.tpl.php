<?php /* Smarty version Smarty-3.1.13, created on 2022-11-20 10:21:05
         compiled from "ui/theme/default/farmer-board.tpl" */ ?>
<?php /*%%SmartyHeaderCode:283611426320311ba0aaf4-76894869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fb95d181a06276d04a9e596a20b6595d2e4d000' => 
    array (
      0 => 'ui/theme/default/farmer-board.tpl',
      1 => 1668927110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283611426320311ba0aaf4-76894869',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6320311ba3da52_98720019',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    'ds' => 0,
    'inu' => 0,
    'insu' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6320311ba3da52_98720019')) {function content_6320311ba3da52_98720019($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>All Farmers</div></div>
			</div>
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-12">
											<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/list-board/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by phonenumber...">
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
											
												<th>FirstName</th>
												<th>MiddleName</th>
												<th>Lastname</th>
												<th>Phone Number</th>
												<th>Year of Birth</th>
												<th>Village Name</th>
												<th>Subvillage</th>
												<th>Land Size (Acres)</th>
												<th>Status</th>
										
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
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['idno'];?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['inu'] = new Smarty_variable(ORM::for_table('tbl_villages')->find_one($_smarty_tpl->tpl_vars['ds']->value['village_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['inu']->value->village_name;?>
</td>
												 <td><?php $_smarty_tpl->tpl_vars['insu'] = new Smarty_variable(ORM::for_table('tbl_sub_villages')->find_one($_smarty_tpl->tpl_vars['ds']->value['sub_village_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['insu']->value->name;?>
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