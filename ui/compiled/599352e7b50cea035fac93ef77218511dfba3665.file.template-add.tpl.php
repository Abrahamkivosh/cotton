<?php /* Smarty version Smarty-3.1.13, created on 2022-09-13 12:05:46
         compiled from "ui/theme/default/template-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115649877762b9108dba8cf6-63139636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '599352e7b50cea035fac93ef77218511dfba3665' => 
    array (
      0 => 'ui/theme/default/template-add.tpl',
      1 => 1656306282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115649877762b9108dba8cf6-63139636',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b9108dbcf932_40229411',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b9108dbcf932_40229411')) {function content_62b9108dbcf932_40229411($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Template Add</div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/template-post" >            
                    <div class="form-group">
						<label class="col-md-2 control-label">Purpose</label>
						<div class="col-md-6">
                                                    <select id="personSelect" class="form-control" name="purpose">
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
                                                    <textarea class="form-control"  name="message" placeholder="Dear Customer..."></textarea>
						</div>
                    </div>	
                
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
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