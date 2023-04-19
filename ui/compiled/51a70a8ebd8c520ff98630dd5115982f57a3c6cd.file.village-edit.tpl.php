<?php /* Smarty version Smarty-3.1.13, created on 2022-06-24 05:12:13
         compiled from "ui/theme/default/village-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102322896962b51d7dedca67-60915993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51a70a8ebd8c520ff98630dd5115982f57a3c6cd' => 
    array (
      0 => 'ui/theme/default/village-edit.tpl',
      1 => 1656036678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102322896962b51d7dedca67-60915993',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b51d7df14327_51976743',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b51d7df14327_51976743')) {function content_62b51d7df14327_51976743($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Village Edit</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
villages/village-edit-post" >
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">				
                   <div class="form-group">
						<label class="col-md-2 control-label">Village Name</label>
						<div class="col-md-6">
							<input name="village_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['village_name'];?>
" required>
						</div>
                    </div>	
					  <div class="form-group">
						<label class="col-md-2 control-label">District (optional)</label>
						<div class="col-md-6">
							<input name="district" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['district'];?>
" required>
						</div>
                    </div>	
					  <div class="form-group">
						<label class="col-md-2 control-label">County (optional)</label>
						<div class="col-md-6">
							<input name="county" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['county'];?>
" required>
						</div>
                    </div>	


                    
					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
villages/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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