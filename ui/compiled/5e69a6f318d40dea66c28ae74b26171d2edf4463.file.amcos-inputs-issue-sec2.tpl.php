<?php /* Smarty version Smarty-3.1.13, created on 2022-11-21 09:38:36
         compiled from "ui/theme/default/amcos-inputs-issue-sec2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:828003818631fe4a922d4c0-48456351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e69a6f318d40dea66c28ae74b26171d2edf4463' => 
    array (
      0 => 'ui/theme/default/amcos-inputs-issue-sec2.tpl',
      1 => 1668927107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '828003818631fe4a922d4c0-48456351',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_631fe4a9268c14_83702342',
  'variables' => 
  array (
    'notify' => 0,
    'farmer' => 0,
    '_url' => 0,
    'farmer_id' => 0,
    'ref_id' => 0,
    'inputs' => 0,
    'ac' => 0,
    'inu' => 0,
    '_L' => 0,
    'input_order' => 0,
    'ds' => 0,
    'check' => 0,
    'rights' => 0,
    '_admin' => 0,
    'paginator' => 0,
    'input_issued' => 0,
    'dsk' => 0,
    'amcos_u' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_631fe4a9268c14_83702342')) {function content_631fe4a9268c14_83702342($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Issue Input to Farmer</div></div>
			</div>


	<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
					
					<div class="col-md-8">
					   <h1>Issue Inputs to <?php echo $_smarty_tpl->tpl_vars['farmer']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['farmer']->value->lastname;?>
</h1><br>
											<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input_amcos/issue_input_order/">
											<input type="hidden" name="farmer_id" value="<?php echo $_smarty_tpl->tpl_vars['farmer_id']->value;?>
">
											<input type="hidden" name="ref_id" value="<?php echo $_smarty_tpl->tpl_vars['ref_id']->value;?>
">

												<div class="form-group">
										     	<select id="personSelect" name="input_id" class="form-control" required>
													<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ac']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inputs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
$_smarty_tpl->tpl_vars['ac']->_loop = true;
?>

													<option value="<?php echo $_smarty_tpl->tpl_vars['ac']->value['input_id'];?>
"><?php $_smarty_tpl->tpl_vars['inu'] = new Smarty_variable(ORM::for_table('inputs')->find_one($_smarty_tpl->tpl_vars['ac']->value['input_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['inu']->value->name;?>
--Available QTY: <?php echo $_smarty_tpl->tpl_vars['ac']->value['input_qty']-$_smarty_tpl->tpl_vars['ac']->value['used_qty'];?>
</option>
													<?php ob_start();?><?php } ?><?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
					
												</select>
												<input type="number" name="input_qty" value="20" placeholder="QTY" class="form-control" required> 
												<div class="form-group-btn">
													<button class="btn btn-success">Confim</button>
												</div>
											    </div>
											
											</form>



					</div>

									

							<div class="col-lg-8">
							<div class="main-card mb-3 card">
								<div class="card-body">
                                
									<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Input Name</th>
												<th>qty</th>
												<th>Unit</th>
												<th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
											</tr>
										</thead>
										<tbody>
										<?php $_smarty_tpl->tpl_vars['check'] = new Smarty_variable(0, null, 0);?>
										<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input_order']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
											<tr>
												<td><?php $_smarty_tpl->tpl_vars['inu'] = new Smarty_variable(ORM::for_table('inputs')->find_one($_smarty_tpl->tpl_vars['ds']->value['input_id']), null, 0);?>
												    <?php echo $_smarty_tpl->tpl_vars['inu']->value->name;?>

												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['inu']->value->unit;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['input_qty'];?>

												<?php $_smarty_tpl->tpl_vars['check'] = new Smarty_variable($_smarty_tpl->tpl_vars['ds']->value['input_qty']+$_smarty_tpl->tpl_vars['check']->value, null, 0);?>
												</td>
												<td>
												<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_delete']){?>
													<?php if (($_smarty_tpl->tpl_vars['_admin']->value['username'])!=($_smarty_tpl->tpl_vars['ds']->value['username'])){?>
														<a  href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input_amcos/issue_input_delete/<?php echo $_smarty_tpl->tpl_vars['farmer_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ref_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-danger btn-sm delete"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
													<?php }?>
												<?php }?>
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
									<?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

									<?php if ($_smarty_tpl->tpl_vars['check']->value>0){?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input_amcos/issue_input_order_post/<?php echo $_smarty_tpl->tpl_vars['farmer_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ref_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"  class="btn btn-success">Confirm Issued Input</a>
							        <?php }?>
							</div>
							</div>

								<div class="col-lg-8">
							<div class="main-card mb-3 card">
								<div class="card-body">
                                <h1>Previously Issued Inputs </h1>
									<table class="mb-0 table table-hover">
										<thead>
											<tr>
											    <th>Ref ID</th>
												<th>Input Name</th>
												<th>qty</th>
												<th>Unit</th>
												<th>Issued By?</th>
												<th>Date & Time</th>
											</tr>
										</thead>
										<tbody>
										<?php  $_smarty_tpl->tpl_vars['dsk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dsk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input_issued']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dsk']->key => $_smarty_tpl->tpl_vars['dsk']->value){
$_smarty_tpl->tpl_vars['dsk']->_loop = true;
?>
											<tr>
											    <td><?php echo $_smarty_tpl->tpl_vars['dsk']->value['ref_id'];?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['inu'] = new Smarty_variable(ORM::for_table('inputs')->find_one($_smarty_tpl->tpl_vars['dsk']->value['input_id']), null, 0);?>
												    <?php echo $_smarty_tpl->tpl_vars['inu']->value->name;?>

												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['dsk']->value['input_qty'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['inu']->value->unit;?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['amcos_u'] = new Smarty_variable(ORM::for_table('amcos_users')->find_one($_smarty_tpl->tpl_vars['dsk']->value['user_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['amcos_u']->value->fullname;?>
</td>
                                               
												 <td><?php echo $_smarty_tpl->tpl_vars['dsk']->value['created_at'];?>
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