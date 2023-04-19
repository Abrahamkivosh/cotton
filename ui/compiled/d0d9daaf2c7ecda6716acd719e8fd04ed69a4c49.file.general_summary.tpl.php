<?php /* Smarty version Smarty-3.1.13, created on 2023-01-24 13:16:19
         compiled from "ui/theme/default/general_summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8111736796379cf94db28c1-76145176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0d9daaf2c7ecda6716acd719e8fd04ed69a4c49' => 
    array (
      0 => 'ui/theme/default/general_summary.tpl',
      1 => 1674555377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8111736796379cf94db28c1-76145176',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6379cf94dd65f3_87437843',
  'variables' => 
  array (
    'notify' => 0,
    'total_region' => 0,
    'total_district' => 0,
    'total_ward' => 0,
    'total_villages' => 0,
    'total_sub_villages' => 0,
    'total_farmers_b_today' => 0,
    'total_farmers' => 0,
    'total_acreage_b_today' => 0,
    'total_acreage' => 0,
    'inputs' => 0,
    'in' => 0,
    'input_t' => 0,
    'input_tod' => 0,
    'input_qty' => 0,
    'input_used' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6379cf94dd65f3_87437843')) {function content_6379cf94dd65f3_87437843($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>General Summary Report
						 <br>
							Summary Report:
						</div>
					</div></div>
			</div>


	<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>


	<?php }?>
	<div class="panel-body">
				<br>
							<div class="col-lg-12">
								<div class="main-card mb-3 card">
									<div class="card-body">

                                 <h1>General Summary Report</h1>

         <table class="mb-0 table table-hover">
                                <thead>
                                 <tr><th>Date</th><th><?php echo date("Y-m-d");?>
</th><th>Region</th><th>District</th><th>Wards</th><th>Villages</th><th>Sub-Villages</th><th>Total B/F</th><th>Todays</th><th>Total C/F</th><tr>
                                 <tr><th></th><th></th><th><?php echo $_smarty_tpl->tpl_vars['total_region']->value;?>
</th><th><?php echo $_smarty_tpl->tpl_vars['total_district']->value;?>
</th><th><?php echo $_smarty_tpl->tpl_vars['total_ward']->value;?>
</th><th><?php echo $_smarty_tpl->tpl_vars['total_villages']->value;?>
</th><th><?php echo $_smarty_tpl->tpl_vars['total_sub_villages']->value;?>
</th><th></th><th></th><th></th><tr>
                                </thead>
                                <tbody> 
                                <tr><td>Farmers</td><td></td><td></td><td></td><td></td><td></td><td></td><td><?php echo number_format($_smarty_tpl->tpl_vars['total_farmers_b_today']->value,0);?>
</td><td><?php echo number_format($_smarty_tpl->tpl_vars['total_farmers']->value-$_smarty_tpl->tpl_vars['total_farmers_b_today']->value,0);?>
</td><td><?php echo number_format($_smarty_tpl->tpl_vars['total_farmers']->value,0);?>
</td></tr>
                                <tr><td>Acreage</td><td></td><td></td><td></td><td></td><td></td><td></td><td><?php echo number_format($_smarty_tpl->tpl_vars['total_acreage_b_today']->value,0);?>
</td><td><?php echo number_format($_smarty_tpl->tpl_vars['total_acreage']->value-$_smarty_tpl->tpl_vars['total_acreage_b_today']->value,0);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['total_acreage']->value;?>
</td></tr>
                                <tr><td>Inputs</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                <?php  $_smarty_tpl->tpl_vars['in'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['in']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inputs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['in']->key => $_smarty_tpl->tpl_vars['in']->value){
$_smarty_tpl->tpl_vars['in']->_loop = true;
?>
                                <tr><td></td><td><?php echo $_smarty_tpl->tpl_vars['in']->value['name'];?>
</td><td></td><td></td><td></td><td></td><td></td><td>
                                <?php $_smarty_tpl->tpl_vars['input_t'] = new Smarty_variable(ORM::for_table('input_order')->where('input_id',$_smarty_tpl->tpl_vars['in']->value['id'])->sum('used_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['input_tod'] = new Smarty_variable(ORM::for_table('amcos_input_order')->where('input_id',$_smarty_tpl->tpl_vars['in']->value['id'])->where('date',date('Y-m-d'))->sum('input_qty'), null, 0);?>
                             
                                <?php echo number_format($_smarty_tpl->tpl_vars['input_t']->value-$_smarty_tpl->tpl_vars['input_tod']->value,0);?>
 <?php echo $_smarty_tpl->tpl_vars['in']->value['unit'];?>

                                </td><td>
                                <?php echo number_format($_smarty_tpl->tpl_vars['input_tod']->value,0);?>
 <?php echo $_smarty_tpl->tpl_vars['in']->value['unit'];?>

                                </td><td> 
                                <?php echo number_format($_smarty_tpl->tpl_vars['input_t']->value,0);?>
 <?php echo $_smarty_tpl->tpl_vars['in']->value['unit'];?>

                               </td></tr>
                                <?php } ?>

                              
                                </tbody>
         </table>
<table class="mb-0 table table-hover" style="width:50%;">
<thead>
<tr><th>Date</th><th><?php echo date("Y-m-d");?>
</th><th colspan="3">Cummulative</th></tr>
<tr><th>Inputs</th><th>Unit</th><th>To Amcos</th><th>To Farmers</th><th>Stock with Amcos</th></tr>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['in'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['in']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inputs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['in']->key => $_smarty_tpl->tpl_vars['in']->value){
$_smarty_tpl->tpl_vars['in']->_loop = true;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['in']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['in']->value['unit'];?>
</td><td>
 <?php $_smarty_tpl->tpl_vars['input_qty'] = new Smarty_variable(ORM::for_table('input_order')->where('input_id',$_smarty_tpl->tpl_vars['in']->value['id'])->sum('input_qty'), null, 0);?>

 <?php $_smarty_tpl->tpl_vars['input_used'] = new Smarty_variable(ORM::for_table('input_order')->where('input_id',$_smarty_tpl->tpl_vars['in']->value['id'])->sum('used_qty'), null, 0);?>
 <?php echo number_format($_smarty_tpl->tpl_vars['input_qty']->value,0);?>

</td><td><?php echo number_format($_smarty_tpl->tpl_vars['input_used']->value,0);?>
</td><td><?php echo number_format($_smarty_tpl->tpl_vars['input_qty']->value-$_smarty_tpl->tpl_vars['input_used']->value,0);?>
</td></tr>
<?php } ?>
</tbody>
</thead>

							</div>
						</div>
					</div>
						</div>
					</div>
				</div>
			</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>
    window.onload(function() {
        // initiate layout and plugins

            window.print();
            //return false;

    });
</script>
<?php }} ?>