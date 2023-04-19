<?php /* Smarty version Smarty-3.1.13, created on 2022-05-10 16:35:26
         compiled from "ui/theme/default/sub-category-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:647598886627a6a1e70c114-26621600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '374973c3e0e6c56002d9f335ffde67c8c01d6f78' => 
    array (
      0 => 'ui/theme/default/sub-category-add.tpl',
      1 => 1650306900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '647598886627a6a1e70c114-26621600',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'main' => 0,
    'cs' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_627a6a1e7584b7_80979920',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_627a6a1e7584b7_80979920')) {function content_627a6a1e7584b7_80979920($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Sub Category Add</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
category/sub-category-add-post" >

                    <div class="form-group">
						<label class="col-md-2 control-label">Sub Category Name</label>
						<div class="col-md-6">
							<input name="name" class="form-control" required>

						</div>
                    </div>	

					<div class="form-group">
								<label class="col-md-2 control-label">Main Category</label>
								<div class="col-md-6">
									<select id="plan" name="main_category_id" class="form-control">
										<option value="0"></option>
										<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
category/sub-list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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