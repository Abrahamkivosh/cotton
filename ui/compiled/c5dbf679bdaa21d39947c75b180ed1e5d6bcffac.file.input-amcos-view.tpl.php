<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 09:33:47
         compiled from "ui/theme/default/input-amcos-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17542430416320049e43b510-89573001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5dbf679bdaa21d39947c75b180ed1e5d6bcffac' => 
    array (
      0 => 'ui/theme/default/input-amcos-view.tpl',
      1 => 1663050822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17542430416320049e43b510-89573001',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6320049e46d690_65254426',
  'variables' => 
  array (
    'fdate' => 0,
    'tdate' => 0,
    'notify' => 0,
    'd' => 0,
    'ds' => 0,
    'inu' => 0,
    'farmer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6320049e46d690_65254426')) {function content_6320049e46d690_65254426($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Farmer Input Issue Report
						<br>
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
											
												<th>Date</th>
												<th>Ref. ID</th>
							                    <th>Input Name</th>
												<th>Quantity</th>
												<th>Farmer Name</th>
												
								
										</tr>
									</thead>
									<tbody>
										<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
										<tr>
										        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['created_at'];?>
</td>
												<td>Ref. <?php echo $_smarty_tpl->tpl_vars['ds']->value['ref_id'];?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['inu'] = new Smarty_variable(ORM::for_table('inputs')->find_one($_smarty_tpl->tpl_vars['ds']->value['input_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['inu']->value->name;?>
</td>
	                                         	<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['input_qty'];?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['farmer'] = new Smarty_variable(ORM::for_table('farmer')->find_one($_smarty_tpl->tpl_vars['ds']->value['farmer_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['farmer']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['farmer']->value->lastname;?>
 <?php echo $_smarty_tpl->tpl_vars['farmer']->value->phonenumber;?>
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