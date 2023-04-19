<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 14:40:16
         compiled from "ui/theme/default/input-board-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9412514936320066c1e53a8-36737486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e96bce4d6873c975a4bb1554b66ec6ed91417cf' => 
    array (
      0 => 'ui/theme/default/input-board-view.tpl',
      1 => 1663053908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9412514936320066c1e53a8-36737486',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6320066c21aa15_85946345',
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
<?php if ($_valid && !is_callable('content_6320066c21aa15_85946345')) {function content_6320066c21aa15_85946345($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Amcos Input Issue Report
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
												<td><?php $_smarty_tpl->tpl_vars['inu'] = new Smarty_variable(ORM::for_table('inputs')->find_one($_smarty_tpl->tpl_vars['ds']->value['input_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['inu']->value->name;?>
</td>
	                                         	<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['input_qty'];?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['farmer'] = new Smarty_variable(ORM::for_table('amcos')->find_one($_smarty_tpl->tpl_vars['ds']->value['farmer_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['farmer']->value->fullname;?>
 <?php echo $_smarty_tpl->tpl_vars['farmer']->value->lastname;?>

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