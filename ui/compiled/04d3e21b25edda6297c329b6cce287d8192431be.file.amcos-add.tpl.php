<?php /* Smarty version Smarty-3.1.13, created on 2022-11-22 14:30:30
         compiled from "ui/theme/default/amcos-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82849689862b55916665951-99222735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04d3e21b25edda6297c329b6cce287d8192431be' => 
    array (
      0 => 'ui/theme/default/amcos-add.tpl',
      1 => 1668927112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82849689862b55916665951-99222735',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b55916690036_09720576',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'village' => 0,
    'cs' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b55916690036_09720576')) {function content_62b55916690036_09720576($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Add Amcos</div></div>
			</div>
	<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/amcos-add-post" >            
                        <div class="form-group">
						<label class="col-md-2 control-label">Amcos Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="fullname" name="name">
						</div>
                    </div>
					  <div class="form-group">
								<label class="col-md-2 control-label">Amcos Village & Location</label>
								<div class="col-md-6">
									<select id="plan" name="village_id" class="form-control" required>
										<option value="0"></option>
										<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['village']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['village_name'];?>
</option>
										<?php } ?>
									</select>

								</div>
						<div class="form-group">
						<label class="col-md-2 control-label">Physical location</label>
						<div class="col-md-6">
							<input type="text"  class="form-control"name="address" required>
						</div>
                    </div>
								
							
                 
					
					<div class="form-group">
						<label class="col-md-2 control-label">Phone number</label>
						<div class="col-md-6">
							<input type="number" value="255" class="form-control" min="100000000"  name="phonenumber" required>
						</div>
                    </div>
                     <div class="form-group">
						<label class="col-md-2 control-label">Amcos Users</label>
					
                    </div>
				   <table>
				  
				   <tr><td> <div class="form-group">
						<label class="col-md-12 control-label">Fullnames</label>
						<div class="col-md-12">
							<input type="text" class="form-control"  name="fullname[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Username</label>
						<div class="col-md-12">
							<input type="text" class="form-control"  name="username[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">phonenumber</label>
						<div class="col-md-12">
							<input type="number" class="form-control"  name="phonenumberv[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Password</label>
						<div class="col-md-12">
							<input type="text" class="form-control" value="<?php echo rand(12312,78792);?>
"  name="password[]">
						</div>
                    </div></td><tr>
					 <tr><td> <div class="form-group">
						<label class="col-md-12 control-label">Fullnames</label>
						<div class="col-md-12">
							<input type="text" class="form-control"  name="fullname[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Username</label>
						<div class="col-md-12">
							<input type="text" class="form-control"  name="username[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">phonenumber</label>
						<div class="col-md-12">
							<input type="number" class="form-control"  name="phonenumberv[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Password</label>
						<div class="col-md-12">
							<input type="text" class="form-control" value="<?php echo rand(12312,78792);?>
" name="password[]">
						</div>
                    </div></td><tr>
					 <tr><td> <div class="form-group">
						<label class="col-md-12 control-label">Fullnames</label>
						<div class="col-md-12">
							<input type="text" class="form-control"  name="fullname[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Username</label>
						<div class="col-md-12">
							<input type="text" class="form-control"  name="username[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">phonenumber</label>
						<div class="col-md-12">
							<input type="number" class="form-control"  name="phonenumberv[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Password</label>
						<div class="col-md-12">
							<input type="text" class="form-control" value="<?php echo rand(12312,78792);?>
" name="password[]">
						</div>
                    </div></td><tr>
				   </table>
                   
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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