<?php /* Smarty version Smarty-3.1.13, created on 2022-11-19 21:36:50
         compiled from "ui/theme/default/ward-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62945582463792242caeb19-76226130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50ab81c9c5369cc9a61960aec0c3d451cb231cda' => 
    array (
      0 => 'ui/theme/default/ward-edit.tpl',
      1 => 1668840954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62945582463792242caeb19-76226130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    'district' => 0,
    'cs' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63792242cd22e0_78407652',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63792242cd22e0_78407652')) {function content_63792242cd22e0_78407652($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Ward Edit</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ward/ward-edit-post" >
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">				
                   <div class="form-group">
						<label class="col-md-2 control-label">Name</label>
						<div class="col-md-6">
							<input name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
" required>
						</div>
                    </div>	
					 <div class="form-group">
								<label class="col-md-2 control-label"> District</label>
								<div class="col-md-6">
									<select id="personSelect" name="district_id" class="form-control" required>
										<option><option
										<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['district']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
										<?php if ($_smarty_tpl->tpl_vars['d']->value['region_id']==$_smarty_tpl->tpl_vars['cs']->value['id']){?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['cs']->value['name'];?>
</option>
								     	<?php }else{ ?>
											    <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['name'];?>
</option>
										<?php }?>
										<?php } ?>
									</select>

								</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ward/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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