<?php /* Smarty version Smarty-3.1.13, created on 2023-01-16 11:13:51
         compiled from "ui/theme/default/inputs-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2142624832631f7bd4c30f83-57089337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3d824d23938c7f824405ac48717175b0764feae' => 
    array (
      0 => 'ui/theme/default/inputs-edit.tpl',
      1 => 1673856432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2142624832631f7bd4c30f83-57089337',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_631f7bd4c52400_73602728',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_631f7bd4c52400_73602728')) {function content_631f7bd4c52400_73602728($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Edit Input</div></div>
			</div>

	<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/inputs-edit-post" >
                     <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <div class="form-group">
						<label class="col-md-2 control-label">Input Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="name" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
">
						</div>
                    </div>

                    <div class="form-group">
						<label class="col-md-2 control-label">Category</label>
						<div class="col-md-6">
						<select name="category" class="form-control" required>
										<option>Seeds</option>
										<option>Fertilizer</option>	
					    </select>
						</div>
                    </div>
					  <div class="form-group">
						<label class="col-md-2 control-label">Unit</label>
						<div class="col-md-6">
						<select name="unit" class="form-control" required>
										<option>pcs</option>
										<option>litres</option>
										<option>grams</option>
										<option>kgs</option>
										<option>bags</option>			
					    </select>
						</div>
                    </div>
					 <div class="form-group">
						<label class="col-md-2 control-label">QTY per Acre</label>
						<div class="col-md-6">
							<input type="number" class="form-control"   name="rate_per_acre"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['rate_per_acre'];?>
" required>
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