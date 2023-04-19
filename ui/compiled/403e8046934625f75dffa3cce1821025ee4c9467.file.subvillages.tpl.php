<?php /* Smarty version Smarty-3.1.13, created on 2022-11-22 15:22:44
         compiled from "ui/theme/default/subvillages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2202350726375c9328e8c52-20186704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '403e8046934625f75dffa3cce1821025ee4c9467' => 
    array (
      0 => 'ui/theme/default/subvillages.tpl',
      1 => 1668927113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2202350726375c9328e8c52-20186704',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6375c93291e5b3_16181470',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_L' => 0,
    'd' => 0,
    'no' => 0,
    'ds' => 0,
    'amcos' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6375c93291e5b3_16181470')) {function content_6375c93291e5b3_16181470($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>SubVillages</div></div>
			</div>


				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
subvillages/list/">
											<div class="input-group">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="name" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search_by_Name'];?>
...">
												<div class="input-group-btn">
													<button class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
												</div>
											</div>
											</div>
											</form>
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
subvillages/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i>Add Sub Village</a>
						</div>&nbsp;
					</div>
				</div>

				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Sub Village Name</th>
												<th>Village Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, 0);?>
										<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
											<tr>
												<td align="center"><?php echo $_smarty_tpl->tpl_vars['no']->value++;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</td>
												<td><?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('tbl_villages')->find_one($_smarty_tpl->tpl_vars['ds']->value['village_id']), null, 0);?>
		                                         <?php echo $_smarty_tpl->tpl_vars['amcos']->value->village_name;?>
</td>
												
												<td>
													<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
subvillages/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-warning btn-sm"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
													<a onClick="javascript: return confirm('Please confirm deletion');" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
subvillages/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-danger btn-sm delete"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
									<?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

								</div>
							</div>
						</div>
					</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>