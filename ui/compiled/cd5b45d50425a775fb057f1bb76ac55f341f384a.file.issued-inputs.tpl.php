<?php /* Smarty version Smarty-3.1.13, created on 2023-01-16 11:21:11
         compiled from "ui/theme/default/issued-inputs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:870578339631fde7671a705-65157997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd5b45d50425a775fb057f1bb76ac55f341f384a' => 
    array (
      0 => 'ui/theme/default/issued-inputs.tpl',
      1 => 1668927114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '870578339631fde7671a705-65157997',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_631fde7674ced5_29176395',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'rights' => 0,
    'd' => 0,
    'ds' => 0,
    'inu' => 0,
    'amcos' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_631fde7674ced5_29176395')) {function content_631fde7674ced5_29176395($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Issued Inputs</div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/inputs-issued-list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by Username...">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_add']){?>
										<div class="col-md-4">
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/issue_input_sec1" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Issue Inputs</a>
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
												<th>Input Name</th>
												<th>Quantity Issued</th>
												<th>Amcos name</th>
												<th>Date Time</th>

											</tr>
										</thead>
										<tbody>
										<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
											<tr>
												<td><?php $_smarty_tpl->tpl_vars['inu'] = new Smarty_variable(ORM::for_table('inputs')->find_one($_smarty_tpl->tpl_vars['ds']->value['input_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['inu']->value->name;?>
</td>
	                                         	<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['input_qty'];?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->find_one($_smarty_tpl->tpl_vars['ds']->value['amcos_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['amcos']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['amcos']->value->address;?>
</td>
												 <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['created_at'];?>
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