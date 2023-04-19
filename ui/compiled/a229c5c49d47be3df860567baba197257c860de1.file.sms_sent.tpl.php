<?php /* Smarty version Smarty-3.1.13, created on 2023-01-13 14:50:36
         compiled from "ui/theme/default/sms_sent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113063419062b91288615fe6-79607285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a229c5c49d47be3df860567baba197257c860de1' => 
    array (
      0 => 'ui/theme/default/sms_sent.tpl',
      1 => 1668927213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113063419062b91288615fe6-79607285',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b9128863f890_13377521',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_L' => 0,
    'rights' => 0,
    't' => 0,
    'no' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b9128863f890_13377521')) {function content_62b9128863f890_13377521($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Send Messages</div></div>
			</div>


			<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
				<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

			<?php }?>
			<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
							<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/sent_sms/">
								<div class="input-group">
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
										<input type="text" name="phonenumber" class="form-control" placeholder="Search by phone number...">
										<div class="input-group-btn">
											<button class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['rights']->value['compose']){?>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/compose" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i>Compose SMS</a>
						</div>&nbsp;
						<?php }?>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
								<thead>
								<tr>
									<th>#</th>
									<th>Phone</th>
									<th>Message</th>
									<th>Time</th>
								</tr>
								</thead>
								<tbody>
								<?php $_smarty_tpl->tpl_vars['no'] = new Smarty_variable(1, null, 0);?>
								<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
									<tr>
										<td align="center"><?php echo $_smarty_tpl->tpl_vars['no']->value++;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['phone'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['message'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['datet'];?>
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