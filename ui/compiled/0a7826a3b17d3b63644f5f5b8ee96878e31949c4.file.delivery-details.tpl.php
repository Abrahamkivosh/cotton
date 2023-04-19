<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 16:33:58
         compiled from "ui/theme/default/delivery-details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59997212662b6bdd924a353-10292619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a7826a3b17d3b63644f5f5b8ee96878e31949c4' => 
    array (
      0 => 'ui/theme/default/delivery-details.tpl',
      1 => 1663070283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59997212662b6bdd924a353-10292619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b6bdd926e807_34484058',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'id' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b6bdd926e807_34484058')) {function content_62b6bdd926e807_34484058($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Delivery Details</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/deliverya-gin" >
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">				

                    <div class="form-group">
						<label class="col-md-2 control-label">Delivery details</label>
						<div class="col-md-6">
						  <textarea cols="10" rows="5" name="delivery_details" class="form-control" required><?php echo $_smarty_tpl->tpl_vars['d']->value['delivery_details'];?>
</textarea>
							
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