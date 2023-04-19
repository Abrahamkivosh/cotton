<?php /* Smarty version Smarty-3.1.13, created on 2022-11-21 09:29:14
         compiled from "ui/theme/default/farmer-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110502589962b5d491580249-36600298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '596bc78f1c48dc9abb9ec544aee0b652892f6fa3' => 
    array (
      0 => 'ui/theme/default/farmer-add.tpl',
      1 => 1668927109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110502589962b5d491580249-36600298',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b5d4915c0a22_10652542',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'sub_village' => 0,
    'cs' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b5d4915c0a22_10652542')) {function content_62b5d4915c0a22_10652542($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Add New farmer </div></div>
			</div>

	<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/farmer-add-post" >            
                
                    <div class="form-group">
						<label class="col-md-2 control-label">First Name *</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="firstname" required>
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Father's Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="middlename">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Family Name *</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="lastname" required>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Gender *</label>
						<div class="col-md-6">
					 <input type="radio" name="gender" value="male" checked> Male<br>
                     <input type="radio" name="gender" value="female"> Female<br>
                     <input type="radio" name="gender" value="other"> Other
					 	</div>
                    </div>

					<div class="form-group">
						<label class="col-md-2 control-label">phonenumber *</label>
						<div class="col-md-6">
							<input type="password" id="phone1"  class="form-control" min="100000000" max="0799999999" name="phonenumber" required>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Confirm phonenumber*</label>
						<div class="col-md-6">
							<input type="number" id="phone1"  class="form-control" min="100000000" max="799999999" name="phonenumber1" required>
						</div>
						<div id="phone_confirm">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Year of Birth</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="idno" >
						</div>
                    </div>
                
                     <div class="form-group">
								<label class="col-md-2 control-label">Sub Village Name</label>
								<div class="col-md-6">
									<select id="personSelect"  name="sub_village_id" class="form-control" required>
										<option></option>
										<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub_village']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['name'];?>
</option>
										<?php } ?>
									</select>

								</div>
					</div>
					<div class="form-group">
								<label class="col-md-2 control-label">No. Acre</label>
								<div class="col-md-6">
									<select id="personSelect"  name="acre" class="form-control" required>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
									</select>

								</div>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>