<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 16:39:55
         compiled from "ui/theme/default/receive-cotton.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135359972762b81c1e9e28f4-99272720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7a590aa0753c4882f760e2a68638bab7061246d' => 
    array (
      0 => 'ui/theme/default/receive-cotton.tpl',
      1 => 1663070282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135359972762b81c1e9e28f4-99272720',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b81c1ea153d2_15185440',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'id' => 0,
    'qty' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b81c1ea153d2_15185440')) {function content_62b81c1ea153d2_15185440($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Receive Order</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/receivea-gin"  onSubmit="return confirm('Are you sure to confirm?')" >
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">				
                    <div class="form-group">
						<label class="col-md-2 control-label">Received QTY</label>
							<div class="col-md-3">
							<input type="number" name="received_qty" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['qty']->value;?>
" required>
							</div>
                    </div>	

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list-gin"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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