<?php /* Smarty version Smarty-3.1.13, created on 2023-01-16 11:13:04
         compiled from "ui/theme/default/inputs-add-stock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:728003199631f7cea234a22-99838046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c840cdc70b59dc9355ec991233017a6a7984f86' => 
    array (
      0 => 'ui/theme/default/inputs-add-stock.tpl',
      1 => 1668927146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '728003199631f7cea234a22-99838046',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_631f7cea2734e9_68317523',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'inputs' => 0,
    'ac' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_631f7cea2734e9_68317523')) {function content_631f7cea2734e9_68317523($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Stock Input Stock</div></div>
			</div>

	<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/inputs-stock-post" >            
                
                   
					  <div class="form-group">
						<label class="col-md-2 control-label">Select Input</label>
						<div class="col-md-6">
						<select id="personSelect" name="id" class="form-control" required>
							<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ac']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inputs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
$_smarty_tpl->tpl_vars['ac']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['ac']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ac']->value['name'];?>
</option>

							<?php ob_start();?><?php } ?><?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
					
					    </select>
						</div>
                       </div>
					<div class="form-group">
						<label class="col-md-2 control-label">QTY</label>
						<div class="col-md-6">
							<input type="number" class="form-control"  name="qty" required>
						</div>
                    </div>

					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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