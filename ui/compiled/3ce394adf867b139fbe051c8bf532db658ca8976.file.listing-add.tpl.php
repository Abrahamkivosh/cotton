<?php /* Smarty version Smarty-3.1.13, created on 2022-09-09 07:36:11
         compiled from "ui/theme/default/listing-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314892991627a6a53797ce7-83781783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ce394adf867b139fbe051c8bf532db658ca8976' => 
    array (
      0 => 'ui/theme/default/listing-add.tpl',
      1 => 1651044656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314892991627a6a53797ce7-83781783',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_627a6a537eade9_64892415',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'main' => 0,
    'cs' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_627a6a537eade9_64892415')) {function content_627a6a537eade9_64892415($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Directory Lising Add</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
listing/listing-add-post" >

                    <div class="form-group">
						<label class="col-md-2 control-label"> Name *</label>
						<div class="col-md-6">
							<input name="name" class="form-control" required>

						</div>
                    </div>	
					<div class="form-group">
						<label class="col-md-2 control-label"> Description (optional)</label>
						<div class="col-md-6">
							<input name="description" class="form-control" >

						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label"> Location (optional)</label>
						<div class="col-md-6">
							<input type="text" name="location" class="form-control" id="searchTextField" />

						</div>
                    </div>	
					<div class="form-group">
						<label class="col-md-2 control-label"> Contact(s)*</label>
						<div class="col-md-6">
							<input name="contact" value="+251" class="form-control" required>

						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label"> Email (optional)</label>
						<div class="col-md-6">
							<input name="email" class="form-control" >

						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label"> Address (optional)</label>
						<div class="col-md-6">
							<input name="address" class="form-control" >

						</div>
                    </div>	
                 
					<div class="form-group">
								<label class="col-md-2 control-label">Listing Sub Category *</label>
								<div class="col-md-6">
									<select id="plan" name="sub_category_id" class="form-control" required>
										<option></option>
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