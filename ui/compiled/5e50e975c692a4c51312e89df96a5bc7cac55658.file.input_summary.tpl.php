<?php /* Smarty version Smarty-3.1.13, created on 2022-11-23 06:48:10
         compiled from "ui/theme/default/input_summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12287781196379cfbd8741f3-49673586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e50e975c692a4c51312e89df96a5bc7cac55658' => 
    array (
      0 => 'ui/theme/default/input_summary.tpl',
      1 => 1669113267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12287781196379cfbd8741f3-49673586',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6379cfbd8ae655_10656053',
  'variables' => 
  array (
    'notify' => 0,
    'issued_input' => 0,
    'amcos_input' => 0,
    'remaining_input' => 0,
    'regions' => 0,
    'ds' => 0,
    'districtz' => 0,
    'ad' => 0,
    'wardz' => 0,
    'aw' => 0,
    'villagez' => 0,
    'az' => 0,
    'amcos' => 0,
    'am' => 0,
    'farm_count' => 0,
    'farm_coun' => 0,
    'farm_counv' => 0,
    'districts' => 0,
    'wards' => 0,
    'villages' => 0,
    'sub_villages' => 0,
    'amcos_i' => 0,
    'farm_count_u' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6379cfbd8ae655_10656053')) {function content_6379cfbd8ae655_10656053($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Input Distribution Summary Report
						<br>
							Input Distribution Report:
							
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

										<table class="mb-0 table table-hover">
									
									<tbody>
										
                                        <tr>
										<td><div class="main-card mb-3 card">
                <div class="no-gutters row">
              
                   <div class="col-md-4">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success"><b style="color:black;font-size:20px;">Issued Seeds  to Farmers</b> <?php echo number_format($_smarty_tpl->tpl_vars['issued_input']->value,0);?>
 Kgs</div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                           <div class="col-md-4">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success"><b style="color:black;font-size:20px;">Issued Inputs to Amcos</b> <?php echo number_format($_smarty_tpl->tpl_vars['amcos_input']->value,0);?>
 Kgs</div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
            
                       <div class="col-md-4">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess"><b style="color:black;font-size:20px;">Seeds in Amcos Warehouses</b> <?php echo number_format($_smarty_tpl->tpl_vars['remaining_input']->value,0);?>
 Kgs</div>
                                </div>

                            </div>
                        </div>
                    </div>
                     
					
					
					
   
                  
                </div>
            </div>
			
			</td>
										</tr>

										
									</tbody>
								</table>
                                  <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <b>Seeds distribution By Region</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Region Name</th><th>Seeds Delivered to Amcos' (Kg)</th><th>Seeds Issued to Farmers (Kg)</th><th>Remaining Seeds (Kg)</th><tr>

                                </thead>
                                <tbody>
                                <?php $_smarty_tpl->tpl_vars['seeds_delivered_r'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['seeds_issued_r'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['regions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</td><td>

                                <?php $_smarty_tpl->tpl_vars['districtz'] = new Smarty_variable(ORM::for_table('tbl_district')->where('region_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['ad'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ad']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['districtz']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ad']->key => $_smarty_tpl->tpl_vars['ad']->value){
$_smarty_tpl->tpl_vars['ad']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['wardz'] = new Smarty_variable(ORM::for_table('tbl_ward')->where('district_id',$_smarty_tpl->tpl_vars['ad']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['aw'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aw']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wardz']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aw']->key => $_smarty_tpl->tpl_vars['aw']->value){
$_smarty_tpl->tpl_vars['aw']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['villagez'] = new Smarty_variable(ORM::for_table('tbl_villages')->where('ward_id',$_smarty_tpl->tpl_vars['aw']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['az'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['az']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['villagez']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['az']->key => $_smarty_tpl->tpl_vars['az']->value){
$_smarty_tpl->tpl_vars['az']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['am']->value['id'])->sum('input_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable($_smarty_tpl->tpl_vars['farm_count']->value+$_smarty_tpl->tpl_vars['farm_coun']->value, null, 0);?>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_coun']->value,0);?>

                                </td>
                                <td>
                                 <?php $_smarty_tpl->tpl_vars['districtz'] = new Smarty_variable(ORM::for_table('tbl_district')->where('region_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_counv'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['ad'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ad']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['districtz']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ad']->key => $_smarty_tpl->tpl_vars['ad']->value){
$_smarty_tpl->tpl_vars['ad']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['wardz'] = new Smarty_variable(ORM::for_table('tbl_ward')->where('district_id',$_smarty_tpl->tpl_vars['ad']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['aw'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aw']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wardz']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aw']->key => $_smarty_tpl->tpl_vars['aw']->value){
$_smarty_tpl->tpl_vars['aw']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['villagez'] = new Smarty_variable(ORM::for_table('tbl_villages')->where('ward_id',$_smarty_tpl->tpl_vars['aw']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['az'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['az']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['villagez']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['az']->key => $_smarty_tpl->tpl_vars['az']->value){
$_smarty_tpl->tpl_vars['az']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['am']->value['id'])->sum('used_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_counv'] = new Smarty_variable($_smarty_tpl->tpl_vars['farm_count']->value+$_smarty_tpl->tpl_vars['farm_counv']->value, null, 0);?>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_counv']->value,0);?>

                                </td>
                                <td>
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_coun']->value-$_smarty_tpl->tpl_vars['farm_counv']->value,0);?>

                                </td>
                                </tr>
                                <?php } ?>

                                </tbody>


                                </table>
 <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <b>Seeds distribution By District</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>District Name</th><th>Seeds Delivered to Amcos' (Kg)</th><th>Seeds Issued to Farmers (Kg)</th><th>Remaining Seeds (Kg)</th><tr>

                                </thead>
                                <tbody>
                                <?php $_smarty_tpl->tpl_vars['seeds_delivered_r'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['seeds_issued_r'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['districts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</td><td>

                    
                                <?php $_smarty_tpl->tpl_vars['wardz'] = new Smarty_variable(ORM::for_table('tbl_ward')->where('district_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['aw'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aw']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wardz']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aw']->key => $_smarty_tpl->tpl_vars['aw']->value){
$_smarty_tpl->tpl_vars['aw']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['villagez'] = new Smarty_variable(ORM::for_table('tbl_villages')->where('ward_id',$_smarty_tpl->tpl_vars['aw']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['az'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['az']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['villagez']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['az']->key => $_smarty_tpl->tpl_vars['az']->value){
$_smarty_tpl->tpl_vars['az']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['am']->value['id'])->sum('input_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable($_smarty_tpl->tpl_vars['farm_count']->value+$_smarty_tpl->tpl_vars['farm_coun']->value, null, 0);?>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                               
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_coun']->value,0);?>

                                </td>
                                <td>
                                
                                <?php $_smarty_tpl->tpl_vars['farm_counv'] = new Smarty_variable(0, null, 0);?>
                                
                                <?php $_smarty_tpl->tpl_vars['wardz'] = new Smarty_variable(ORM::for_table('tbl_ward')->where('district_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['aw'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aw']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wardz']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aw']->key => $_smarty_tpl->tpl_vars['aw']->value){
$_smarty_tpl->tpl_vars['aw']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['villagez'] = new Smarty_variable(ORM::for_table('tbl_villages')->where('ward_id',$_smarty_tpl->tpl_vars['aw']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['az'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['az']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['villagez']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['az']->key => $_smarty_tpl->tpl_vars['az']->value){
$_smarty_tpl->tpl_vars['az']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['am']->value['id'])->sum('used_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_counv'] = new Smarty_variable($_smarty_tpl->tpl_vars['farm_count']->value+$_smarty_tpl->tpl_vars['farm_counv']->value, null, 0);?>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_counv']->value,0);?>

                                </td>
                                <td>
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_coun']->value-$_smarty_tpl->tpl_vars['farm_counv']->value,0);?>

                                </td>
                                </tr>
                                <?php } ?>

                                </tbody>


                                </table>
 <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <b>Seeds distribution By Ward</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Ward Name</th><th>Seeds Delivered to Amcos' (Kg)</th><th>Seeds Issued to Farmers (Kg)</th><th>Remaining Seeds (Kg)</th><tr>

                                </thead>
                                <tbody>
                                <?php $_smarty_tpl->tpl_vars['seeds_delivered_r'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['seeds_issued_r'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wards']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</td><td>

                    
                               
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable(0, null, 0);?>
                               
                                <?php $_smarty_tpl->tpl_vars['villagez'] = new Smarty_variable(ORM::for_table('tbl_villages')->where('ward_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['az'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['az']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['villagez']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['az']->key => $_smarty_tpl->tpl_vars['az']->value){
$_smarty_tpl->tpl_vars['az']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['am']->value['id'])->sum('input_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable($_smarty_tpl->tpl_vars['farm_count']->value+$_smarty_tpl->tpl_vars['farm_coun']->value, null, 0);?>
                                <?php } ?>
                                <?php } ?>
                                
                               
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_coun']->value,0);?>

                                </td>
                                <td>
                                
                                <?php $_smarty_tpl->tpl_vars['farm_counv'] = new Smarty_variable(0, null, 0);?>
                            
                                <?php $_smarty_tpl->tpl_vars['villagez'] = new Smarty_variable(ORM::for_table('tbl_villages')->where('ward_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['az'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['az']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['villagez']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['az']->key => $_smarty_tpl->tpl_vars['az']->value){
$_smarty_tpl->tpl_vars['az']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['am']->value['id'])->sum('used_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_counv'] = new Smarty_variable($_smarty_tpl->tpl_vars['farm_count']->value+$_smarty_tpl->tpl_vars['farm_counv']->value, null, 0);?>
                                <?php } ?>
                                <?php } ?>
                               
                                
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_counv']->value,0);?>

                                </td>
                                <td>
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_coun']->value-$_smarty_tpl->tpl_vars['farm_counv']->value,0);?>

                                </td>
                                </tr>
                                <?php } ?>

                                </tbody>


                                </table>                               
 <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <b>Seeds distribution By Village</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Village Name</th><th>Seeds Received by Amcos' (Kg)</th><th>Seeds Issued to Farmers (Kg)</th><th>Remaining Seeds (Kg)</th><tr>

                                </thead>
                                <tbody>
                                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['villages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['village_name'];?>
</td><td>
                                <?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->where('village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['am']->value['id'])->sum('input_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable($_smarty_tpl->tpl_vars['farm_count']->value+$_smarty_tpl->tpl_vars['farm_coun']->value, null, 0);?>
                                <?php } ?>
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_coun']->value,0);?>

                                </td><td>
                                <?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('amcos')->where('village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_counv'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['am']->value['id'])->sum('used_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_counv'] = new Smarty_variable($_smarty_tpl->tpl_vars['farm_count']->value+$_smarty_tpl->tpl_vars['farm_counv']->value, null, 0);?>
                                <?php } ?>
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_counv']->value,0);?>

                                </td><td>
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_coun']->value-$_smarty_tpl->tpl_vars['farm_counv']->value,0);?>

                                </td>
                                </tr>
                                <?php } ?>

                                </tbody>


                                </table>
                  <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <div class="widget-heading">Seeds distribution Per Sub Village</div>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>
                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Sub Village Name</th><th>Seeds Issued to Farmers (Kg)</th><tr>

                                </thead>
                                <tbody>
                                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub_villages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</td><td>
                                <?php $_smarty_tpl->tpl_vars['amcos'] = new Smarty_variable(ORM::for_table('farmer')->where('sub_village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['am'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['am']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['am']->key => $_smarty_tpl->tpl_vars['am']->value){
$_smarty_tpl->tpl_vars['am']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('amcos_input_order')->where('farmer_id',$_smarty_tpl->tpl_vars['am']->value['id'])->sum('input_qty'), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['farm_coun'] = new Smarty_variable($_smarty_tpl->tpl_vars['farm_count']->value+$_smarty_tpl->tpl_vars['farm_coun']->value, null, 0);?>
                                <?php } ?>
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_coun']->value,0);?>

                                </td>
                                </tr>
                                <?php } ?>

                                </tbody>


                                </table>

<div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <div class="widget-heading">Seeds Issued to Amcos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>
                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Amcos Name</th><th>Seeds Issued (Kg)</th><th>Seeds Issued to Farmers(Kg)</th><th>Seeds in Warehouse (Kg)</th><tr>

                                </thead>
                                <tbody>
                                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amcos_i']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</td>
                                <td>
    
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->sum('input_qty'), null, 0);?>
                    
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_count']->value,0);?>

                                </td>
                                   <td>
    
                                <?php $_smarty_tpl->tpl_vars['farm_count_u'] = new Smarty_variable(ORM::for_table('input_order')->where('amcos_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->sum('used_qty'), null, 0);?>
                    
                                <?php echo number_format($_smarty_tpl->tpl_vars['farm_count_u']->value,0);?>

                                </td>
                                <td><?php echo number_format($_smarty_tpl->tpl_vars['farm_count']->value-$_smarty_tpl->tpl_vars['farm_count_u']->value,0);?>
</td>
                                </tr>
                                <?php } ?>

                                </tbody>


                                </table>                                

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