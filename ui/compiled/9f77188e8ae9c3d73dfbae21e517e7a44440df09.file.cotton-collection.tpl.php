<?php /* Smarty version Smarty-3.1.13, created on 2022-11-17 09:27:21
         compiled from "ui/theme/default/cotton-collection.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76954779362b672650685a4-18999441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f77188e8ae9c3d73dfbae21e517e7a44440df09' => 
    array (
      0 => 'ui/theme/default/cotton-collection.tpl',
      1 => 1668662825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76954779362b672650685a4-18999441',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b672650a3841_03981133',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'farmer' => 0,
    'cs' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b672650a3841_03981133')) {function content_62b672650a3841_03981133($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Add New Collection</div></div>
			</div>

	<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/cotton-add-post" >            
                
				   <div class="form-group">
								<label class="col-md-2 control-label">Farmer Name</label>
								<div class="col-md-6">
									<select id="plan" name="farmer_id" class="form-control" required>
										<option value="0"></option>
										<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['farmer']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['firstname'];?>
-<?php echo $_smarty_tpl->tpl_vars['cs']->value['middlename'];?>
-<?php echo $_smarty_tpl->tpl_vars['cs']->value['lastname'];?>
-<?php echo $_smarty_tpl->tpl_vars['cs']->value['idno'];?>
-<?php echo $_smarty_tpl->tpl_vars['cs']->value['phonenumber'];?>
</option>
										<?php } ?>
									</select>

								</div>
					</div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Cotton Quantity in Kg</label>
						<div class="col-md-6">
							<input type="number" class="form-control"  name="qty" required>
						</div>
                    </div>
                  
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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