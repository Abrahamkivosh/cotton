<?php /* Smarty version Smarty-3.1.13, created on 2022-06-26 22:16:16
         compiled from "ui/theme/default/system-gin-before.tpl" */ ?>
<?php /*%%SmartyHeaderCode:122816594562b8b080ac7073-52927738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd52bcd06cb09baaadce924fe6815fe9dad29539d' => 
    array (
      0 => 'ui/theme/default/system-gin-before.tpl',
      1 => 1656269361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122816594562b8b080ac7073-52927738',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_L' => 0,
    'tdate' => 0,
    'mdate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b8b080ae6b75_67503074',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b8b080ae6b75_67503074')) {function content_62b8b080ae6b75_67503074($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>System Payment Report</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/system-gin-after">
									<div class="form-group">
										<label class="col-md-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['From_Date'];?>
</label>
										<div class="col-md-6">
											<div class="input-group date" id="datepicker1">
												<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['tdate']->value;?>
" name="fdate" id="fdate">
												<span class="input-group-addon ion ion-calendar"></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['To_Date'];?>
</label>
										<div class="col-md-6">
											<div class="input-group date" id="datepicker2">
												<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['mdate']->value;?>
" name="tdate" id="tdate">
												<span class="input-group-addon ion ion-calendar"></span>
											</div>
										</div>
									</div>
				  

									<div class="form-group">
										<label class="col-md-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>
										<div class="col-md-6">
											<select id="personSelect" class="form-control"  name="stype">
												<option value="all">ALL</option>
													<option value="1">paid</option>
														<option value="2">pending</option>
														<option value="3">rejected</option>
														
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<button type="submit" id="submit" class="btn btn-primary">System Payment Report</button>
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