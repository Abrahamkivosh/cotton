<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 11:59:18
         compiled from "ui/theme/default/template-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117891373862b91110633727-12512329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '345b2551bbdb92991bd4c1316219d0e6386c9443' => 
    array (
      0 => 'ui/theme/default/template-edit.tpl',
      1 => 1656306358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117891373862b91110633727-12512329',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b9111065ce98_10764610',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b9111065ce98_10764610')) {function content_62b9111065ce98_10764610($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>SMS Template Edit</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/template-edit-post" > 
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">				
                    <div class="form-group">
						<label class="col-md-2 control-label">Purpose</label>
						<div class="col-md-6">
                                                    <select id="personSelect" class="form-control" name="purpose">
                                                        <option><?php echo $_smarty_tpl->tpl_vars['d']->value['purpose'];?>
</option>
													 <option>newfarmer</option>
														<option>farmercottoncollection</option>
														<option>amcosorderacceptance</option>
														<option>ginnerorderacceptance</option>
														<option>ginnerorderrejection</option>
														<option>ginnerorderapproval</option>
														<option>farmerpaymentsuccess</option>
														<option>amcospaymentsuccess</option>
														<option>systempaymentsuccess</option>
                                                    </select>
							
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Message</label>
						<div class="col-md-6">
                                                    <textarea class="form-control"  name="message" ><?php echo $_smarty_tpl->tpl_vars['d']->value['message'];?>
</textarea>
						</div>
                    </div>	
                

                    
					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/template"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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