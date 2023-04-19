<?php /* Smarty version Smarty-3.1.13, created on 2022-11-17 10:45:36
         compiled from "ui/theme/default/ratescommission-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181999400362b54fa48ae405-56379809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b8879d78dfddd47321cce6927014820961f7d65' => 
    array (
      0 => 'ui/theme/default/ratescommission-add.tpl',
      1 => 1668662818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181999400362b54fa48ae405-56379809',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b54fa48ecca9_78026875',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'district' => 0,
    'cs' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b54fa48ecca9_78026875')) {function content_62b54fa48ecca9_78026875($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div> Add Rates & Commission </div></div>
			</div>

			<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ratescommissions/ratescommission-add-post" >

                  
				 <div class="form-group">
								<label class="col-md-2 control-label">District </label>
								<div class="col-md-6">
									<select id="plan" name="district_id" class="form-control">
										<?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['district']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
						<label class="col-md-2 control-label">Cotton Rate @ Tshs/Kg</label>
						<div class="col-md-6">
							<input name="min_rate" class="form-control" required>
						</div>
                    </div>
					  <div class="form-group">
						<label class="col-md-2 control-label">Cess /Buying price %</label>
						<div class="col-md-6">
							<input name="cess" class="form-control" required>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">CDTF @ Tshs/Kg</label>
						<div class="col-md-6">
							<input name="cdtf" class="form-control" required>
						</div>
                    </div>	
					  <div class="form-group">
						<label class="col-md-2 control-label">AMCOS commission @ Tshs/Kg</label>
						<div class="col-md-6">
							<input name="amcos_rate" class="form-control" required>
						</div>
                    </div>
					 <div class="form-group">
						<label class="col-md-2 control-label">Educational levy @ Tshs/Kg</label>
						<div class="col-md-6">
							<input name="educational" class="form-control" required>
						</div>
                    </div>
					 <!-- <div class="form-group">
						<label class="col-md-2 control-label">System commission rate %</label>
						<div class="col-md-6">
							<input name="system_rate" class="form-control" required>
						</div>
                    </div>	
                    -->

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ratescommissions/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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