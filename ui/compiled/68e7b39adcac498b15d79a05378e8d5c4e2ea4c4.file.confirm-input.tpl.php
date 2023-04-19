<?php /* Smarty version Smarty-3.1.13, created on 2022-11-21 09:39:05
         compiled from "ui/theme/default/confirm-input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6196174496375d5b0ae2421-95009608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68e7b39adcac498b15d79a05378e8d5c4e2ea4c4' => 
    array (
      0 => 'ui/theme/default/confirm-input.tpl',
      1 => 1668927111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6196174496375d5b0ae2421-95009608',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6375d5b0b03187_73311131',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'farmer_id' => 0,
    'ref_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6375d5b0b03187_73311131')) {function content_6375d5b0b03187_73311131($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Confirm OTP Code to Issue input</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input_amcos/issue_input_order_post2"  >
				<input type="hidden" name="farmer_id" value="<?php echo $_smarty_tpl->tpl_vars['farmer_id']->value;?>
">
				<input type="hidden" name="ref_id" value="<?php echo $_smarty_tpl->tpl_vars['ref_id']->value;?>
">	
					
                    <div class="form-group">
						<label class="col-md-2 control-label">OTP Code</label>
							<div class="col-md-3">
							<input type="number" name="code" class="form-control"  value="" required>
							</div>
                    </div>	

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit">Confirm OTP</button>
			
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