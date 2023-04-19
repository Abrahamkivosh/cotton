<?php /* Smarty version Smarty-3.1.13, created on 2022-11-19 21:35:51
         compiled from "ui/theme/default/region-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14383263566375c85cd1a3a6-80128165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76fb6aecdca9c19652d95cad8bca1970313ba1f2' => 
    array (
      0 => 'ui/theme/default/region-add.tpl',
      1 => 1668840957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14383263566375c85cd1a3a6-80128165',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6375c85cd3b0e1_15409885',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6375c85cd3b0e1_15409885')) {function content_6375c85cd3b0e1_15409885($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div> Add Region</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
region/region-add-post" >

                    <div class="form-group">
						<label class="col-md-2 control-label"> Name</label>
						<div class="col-md-6">
							<input name="name" class="form-control" required>
						</div>
                    </div>	
			
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
region/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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