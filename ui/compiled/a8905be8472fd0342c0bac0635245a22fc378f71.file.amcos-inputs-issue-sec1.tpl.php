<?php /* Smarty version Smarty-3.1.13, created on 2022-11-21 09:38:32
         compiled from "ui/theme/default/amcos-inputs-issue-sec1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1522745849631fe38f765b70-11770088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8905be8472fd0342c0bac0635245a22fc378f71' => 
    array (
      0 => 'ui/theme/default/amcos-inputs-issue-sec1.tpl',
      1 => 1668927107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1522745849631fe38f765b70-11770088',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_631fe38f78a0f1_89000509',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    'ref_id' => 0,
    'farmer' => 0,
    'ac' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_631fe38f78a0f1_89000509')) {function content_631fe38f78a0f1_89000509($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Issue Inputs to Farmer</div></div>
			</div>

	<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input_amcos/issue_input_sec2" >            
                      
					   <input type="hidden" name="ref_id" value="<?php echo $_smarty_tpl->tpl_vars['ref_id']->value;?>
" >
                   
					  <div class="form-group">
						<label class="col-md-2 control-label">Select Farmer</label>
						<div class="col-md-6">
						<select id="personSelect" name="farmer_id" class="form-control" required>
							<?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ac']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['farmer']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
$_smarty_tpl->tpl_vars['ac']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['ac']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ac']->value['firstname'];?>
--<?php echo $_smarty_tpl->tpl_vars['ac']->value['middlename'];?>
--<?php echo $_smarty_tpl->tpl_vars['ac']->value['lastname'];?>
--<?php echo $_smarty_tpl->tpl_vars['ac']->value['phonenumber'];?>
</option>
							<?php ob_start();?><?php } ?><?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
					
					    </select>
						</div>
                       </div>
			
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Next..</button>
					
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