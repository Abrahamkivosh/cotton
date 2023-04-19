<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 16:29:45
         compiled from "ui/theme/default/create-order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120182181662b680a522ab32-63111592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8fe279f7c021699cba720ebdb2d52e5dc1b5260' => 
    array (
      0 => 'ui/theme/default/create-order.tpl',
      1 => 1663070268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120182181662b680a522ab32-63111592',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b680a52509c3_96976346',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'ginner' => 0,
    'cs' => 0,
    'qty' => 0,
    'min' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b680a52509c3_96976346')) {function content_62b680a52509c3_96976346($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Create Order</div></div>
			</div>

	<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/order-add-post" >            
                
				   <div class="form-group">
								<label class="col-md-2 control-label">Ginner Name</label>
								<div class="col-md-6">
									<select id="plan" name="ginner_id" class="form-control" required>
										<option value="0"></option>
										<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ginner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['fullname'];?>
-<?php echo $_smarty_tpl->tpl_vars['cs']->value['phonenumber'];?>
</option>
										<?php } ?>
									</select>

								</div>
					</div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Cotton Quantity</label>
						<div class="col-md-6">
							<input type="number" class="form-control"  name="qty" max="<?php echo $_smarty_tpl->tpl_vars['qty']->value;?>
" value="1" required>
						</div>
                    </div>
					 <div class="form-group">
						<label class="col-md-2 control-label">Price per qty</label>
						<div class="col-md-6">
							<input type="number" class="form-control" min="<?php echo $_smarty_tpl->tpl_vars['min']->value;?>
"  name="price" required>
						</div>
                    </div>
                  
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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