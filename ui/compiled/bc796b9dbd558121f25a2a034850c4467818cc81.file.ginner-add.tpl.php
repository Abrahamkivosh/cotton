<?php /* Smarty version Smarty-3.1.13, created on 2022-11-17 12:03:37
         compiled from "ui/theme/default/ginner-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59931393062b5623d240477-51770061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc796b9dbd558121f25a2a034850c4467818cc81' => 
    array (
      0 => 'ui/theme/default/ginner-add.tpl',
      1 => 1668662818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59931393062b5623d240477-51770061',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62b5623d26a932_80868164',
  'variables' => 
  array (
    'notify' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b5623d26a932_80868164')) {function content_62b5623d26a932_80868164($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Add Ginner</div></div>
			</div>

	<div class="main-card mb-3 card">
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

	<?php }?>
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ginner/ginner-add-post" >            
                     <div class="form-group">
						<label class="col-md-2 control-label">Ginner Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Ginner Address</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="address">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Phone number</label>
						<div class="col-md-6">
							<input type="number" value="255" class="form-control" min="100000000"  name="phonenumber" required>
						</div>
                    </div>
                 
					<div class="form-group">
						<label class="col-md-2 control-label">Email</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="email" >
						</div>
                    </div>
                     <div class="form-group">
						<label class="col-md-2 control-label">Location</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="location" >
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Paybill Account</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="paybill" >
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">B2C Paybill callback url</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="paybill_url" >
						</div>
                    </div>
                       <div class="form-group">
						<label class="col-md-2 control-label">Ginner Users</label>
					
                    </div>
				   <table>
				  
				   <tr><td> <div class="form-group">
						<label class="col-md-12 control-label">Fullnames</label>
						<div class="col-md-12">
							<input type="text" class="form-control"  name="fullname[]">
						</div>
                    </div></td>
					
			
					<td><div class="form-group">
						<label class="col-md-12 control-label">Email Address</label>
						<div class="col-md-12">
							<input type="text" class="form-control" placeholder="abc@abc.com"  name="emailv[]">
						</div>
                    </div></td>
					<td><div class="form-group">
						<label class="col-md-12 control-label">phonenumber</label>
						<div class="col-md-12">
							<input type="number" class="form-control"  name="phonenumberv[]">
						</div>
                    </div></td>
					<td><div class="form-group">
						<label class="col-md-12 control-label">Role</label>
						<div class="col-md-12">
                            <select id="plan" name="role[]" class="form-control" required>
										<option>admin</option>
										<option>entrypoint</option>
										<option>manager</option>
						 </select>
							
						</div>
                    </div></td>
					
					<tr>
					
				   </table>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
							Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ginner/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
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