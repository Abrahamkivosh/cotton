<?php /* Smarty version Smarty-3.1.13, created on 2023-01-13 14:50:23
         compiled from "ui/theme/default/compose.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181519793562b9127ebdbb37-77333366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c508ddeab16228f238da0914f306c8a3810d1623' => 
    array (
      0 => 'ui/theme/default/compose.tpl',
      1 => 1668927141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181519793562b9127ebdbb37-77333366',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b9127ec1a8d9_40697019',
  'variables' => 
  array (
    '_url' => 0,
    'c' => 0,
    'cs' => 0,
    'sms' => 0,
    't' => 0,
    'ct' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b9127ec1a8d9_40697019')) {function content_62b9127ec1a8d9_40697019($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Send SMS	</div></div>
			</div>

			<div class="main-card mb-3 card">
				<div class="card-body">
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/sms_send_selected"><button class="btn btn-primary waves-effect waves-light">Send To Selected Customers</button></a>
									<br>
									OR
									<br>
								</div>

							</div>
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/sms_send_post" >

					<div class="form-group">
						<label class="col-md-2 control-label">Agents</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="phone" value="+255"><br>OR<br>
							<select id="personSelect"  name="phonenumber" class="form-control"style="width: 100%" data-placeholder="Select Agents...">
								<option value="ooo">Select Customer</option>
								<option value="all">Send to all</option>
								<option value="active">Send to Active Agents</option>
								<option value="inactive">Send to Inactive Agents</option>
                                                                       
										<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['c']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['phonenumber'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['fullname'];?>
--<?php echo $_smarty_tpl->tpl_vars['cs']->value['username'];?>
</option>
										<?php } ?>
						</select><br>OR
							<br>

							<select id="plan"  name="group_id" class="form-control"style="width: 100%" data-placeholder="Select SMS Group..">
								<option value="">Select SMS Group</option>
								<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sms']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['group_name'];?>
</option>
								<?php } ?>
							</select>
							
						</div>


                    </div>
                                                   <div class="form-group">
						<label class="col-md-2 control-label">Compose Message</label>
						<div class="col-md-6">
                                                    <textarea name="messaga" class="form-control" cols="20" rows="5"></textarea>
                                                    <br>OR
						</div>
                                                   </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Select template</label>
						<div class="col-md-6">
                                                     <select id="template"  name="message" class="form-control" style="width: 100%" data-placeholder="Select SMS template...">
                                                         <option value="">Kindly select Template</option>
										<?php  $_smarty_tpl->tpl_vars['ct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ct']->key => $_smarty_tpl->tpl_vars['ct']->value){
$_smarty_tpl->tpl_vars['ct']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['ct']->value['message'];?>
"><b style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['ct']->value['purpose'];?>
</b>--<?php echo $_smarty_tpl->tpl_vars['ct']->value['message'];?>
</option>
										<?php } ?>
						</select>
						</div>
                    </div>	
                
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Send</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/sms_sent"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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