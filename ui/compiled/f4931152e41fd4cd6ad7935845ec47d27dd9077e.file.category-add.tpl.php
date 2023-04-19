<?php /* Smarty version Smarty-3.1.13, created on 2022-05-08 22:55:33
         compiled from "ui/theme/default/category-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11200555956278203529ffc5-92007598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4931152e41fd4cd6ad7935845ec47d27dd9077e' => 
    array (
      0 => 'ui/theme/default/category-add.tpl',
      1 => 1650306872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11200555956278203529ffc5-92007598',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62782035300047_26959639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62782035300047_26959639')) {function content_62782035300047_26959639($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Category Add</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
category/category-add-post" >

                    <div class="form-group">
						<label class="col-md-2 control-label">Category Name</label>
						<div class="col-md-6">
							<input name="name" class="form-control" required>

						</div>
                    </div>	
						<div class="form-group">
						<label class="col-md-2 control-label">Top List</label>
						<div class="col-md-6">
						 <select name="top" class="form-control">
						 <option value="0">No</option>
						 <option value="1">Yes</option>
						 </select>
						
						</div>
                    </div>
                
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
category/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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