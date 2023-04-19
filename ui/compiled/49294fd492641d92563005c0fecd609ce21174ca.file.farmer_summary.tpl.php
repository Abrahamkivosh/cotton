<?php /* Smarty version Smarty-3.1.13, created on 2022-11-22 16:25:56
         compiled from "ui/theme/default/farmer_summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1776809456379cf9ba5a067-95146475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49294fd492641d92563005c0fecd609ce21174ca' => 
    array (
      0 => 'ui/theme/default/farmer_summary.tpl',
      1 => 1669120943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1776809456379cf9ba5a067-95146475',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6379cf9ba84899_68921956',
  'variables' => 
  array (
    'notify' => 0,
    'total_farmers' => 0,
    'male_farmers' => 0,
    'female_farmers' => 0,
    'verified_farmers' => 0,
    'regions' => 0,
    'ds' => 0,
    'districtz' => 0,
    'ad' => 0,
    'wardz' => 0,
    'aw' => 0,
    'villagez' => 0,
    'az' => 0,
    'all' => 0,
    'allc' => 0,
    'male' => 0,
    'malec' => 0,
    'female' => 0,
    'femalec' => 0,
    'verified' => 0,
    'verifiedc' => 0,
    'unverified' => 0,
    'unverifiedc' => 0,
    'districts' => 0,
    'wards' => 0,
    'villages' => 0,
    'farm_count' => 0,
    'sub_villages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6379cf9ba84899_68921956')) {function content_6379cf9ba84899_68921956($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Farmers Summary Report
						<br>

							Farmer Report:
							
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
              
                    <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                               
                                    <div class="widget-numbers text-success"> <b style="color:black;font-size:20px;">Total Farmers</b> <?php echo number_format($_smarty_tpl->tpl_vars['total_farmers']->value,0);?>
</div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                           <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success"><b style="color:black;font-size:20px;"> Male Farmers</b> <?php echo number_format($_smarty_tpl->tpl_vars['male_farmers']->value,0);?>
</div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
            
                       <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess"><b style="color:black;font-size:20px;"> Female Farmers</b> <?php echo number_format($_smarty_tpl->tpl_vars['female_farmers']->value,0);?>
</div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess"><b style="color:black;font-size:20px;"> Verified Farmers</b> <?php echo number_format($_smarty_tpl->tpl_vars['verified_farmers']->value,0);?>
</div>
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
                                    <b>Farmer By Region</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Region Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

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
                                 <?php $_smarty_tpl->tpl_vars['allc'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['malec'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['femalec'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['verifiedc'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['unverifiedc'] = new Smarty_variable(0, null, 0);?>
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
                                 <?php $_smarty_tpl->tpl_vars['all'] = new Smarty_variable(ORM::for_table('farmer')->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['male'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"male")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['female'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"female")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['verified'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"on")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['unverified'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"off")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['allc'] = new Smarty_variable($_smarty_tpl->tpl_vars['all']->value+$_smarty_tpl->tpl_vars['allc']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['malec'] = new Smarty_variable($_smarty_tpl->tpl_vars['male']->value+$_smarty_tpl->tpl_vars['malec']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['femalec'] = new Smarty_variable($_smarty_tpl->tpl_vars['female']->value+$_smarty_tpl->tpl_vars['femalec']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['verifiedc'] = new Smarty_variable($_smarty_tpl->tpl_vars['verified']->value+$_smarty_tpl->tpl_vars['verifiedc']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['unverifiedc'] = new Smarty_variable($_smarty_tpl->tpl_vars['unverified']->value+$_smarty_tpl->tpl_vars['unverifiedc']->value, null, 0);?>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>

                                <?php echo number_format($_smarty_tpl->tpl_vars['allc']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['malec']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['femalec']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['verifiedc']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['unverifiedc']->value,0);?>

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
                                    <b>Farmer By District</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>District Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

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
                                 <?php $_smarty_tpl->tpl_vars['allc'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['malec'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['femalec'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['verifiedc'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['unverifiedc'] = new Smarty_variable(0, null, 0);?>
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
                                <?php $_smarty_tpl->tpl_vars['all'] = new Smarty_variable(ORM::for_table('farmer')->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['male'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"male")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['female'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"female")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['verified'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"on")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['unverified'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"off")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                 <?php $_smarty_tpl->tpl_vars['allc'] = new Smarty_variable($_smarty_tpl->tpl_vars['all']->value+$_smarty_tpl->tpl_vars['allc']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['malec'] = new Smarty_variable($_smarty_tpl->tpl_vars['male']->value+$_smarty_tpl->tpl_vars['malec']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['femalec'] = new Smarty_variable($_smarty_tpl->tpl_vars['female']->value+$_smarty_tpl->tpl_vars['femalec']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['verifiedc'] = new Smarty_variable($_smarty_tpl->tpl_vars['verified']->value+$_smarty_tpl->tpl_vars['verifiedc']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['unverifiedc'] = new Smarty_variable($_smarty_tpl->tpl_vars['unverified']->value+$_smarty_tpl->tpl_vars['unverifiedc']->value, null, 0);?>
                                <?php } ?>
                                <?php } ?>
                               
                                 <?php echo number_format($_smarty_tpl->tpl_vars['allc']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['malec']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['femalec']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['verifiedc']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['unverifiedc']->value,0);?>

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
                                    <b>Farmer By Ward</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Ward Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

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


                                <?php $_smarty_tpl->tpl_vars['allc'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['malec'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['femalec'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['verifiedc'] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['unverifiedc'] = new Smarty_variable(0, null, 0);?>
                               
                                <?php $_smarty_tpl->tpl_vars['villagez'] = new Smarty_variable(ORM::for_table('tbl_villages')->where('ward_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->find_many(), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['az'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['az']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['villagez']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['az']->key => $_smarty_tpl->tpl_vars['az']->value){
$_smarty_tpl->tpl_vars['az']->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['all'] = new Smarty_variable(ORM::for_table('farmer')->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['male'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"male")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['female'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"female")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['verified'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"on")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['unverified'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"off")->where('village_id',$_smarty_tpl->tpl_vars['az']->value['id'])->count(), null, 0);?>

                                <?php $_smarty_tpl->tpl_vars['allc'] = new Smarty_variable($_smarty_tpl->tpl_vars['all']->value+$_smarty_tpl->tpl_vars['allc']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['malec'] = new Smarty_variable($_smarty_tpl->tpl_vars['male']->value+$_smarty_tpl->tpl_vars['malec']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['femalec'] = new Smarty_variable($_smarty_tpl->tpl_vars['female']->value+$_smarty_tpl->tpl_vars['femalec']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['verifiedc'] = new Smarty_variable($_smarty_tpl->tpl_vars['verified']->value+$_smarty_tpl->tpl_vars['verifiedc']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['unverifiedc'] = new Smarty_variable($_smarty_tpl->tpl_vars['unverified']->value+$_smarty_tpl->tpl_vars['unverifiedc']->value, null, 0);?>
                                <?php } ?>
                                
                               
                                <?php echo number_format($_smarty_tpl->tpl_vars['allc']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['malec']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['femalec']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['verifiedc']->value,0);?>

                                </td>
                                <td>
                                 <?php echo number_format($_smarty_tpl->tpl_vars['unverifiedc']->value,0);?>

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
                                    <b>Farmer By Village</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>
                 <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Village Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

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
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

                                </td><td>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"male")->where('village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

                                </td><td>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"female")->where('village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

                                </td>
                                <td>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"on")->where('village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

                                </td>
                                <td>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"off")->where('village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

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
                                    <div class="widget-heading">Farmer Per Sub Village</div>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>
                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Sub Village Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

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
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('sub_village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

                                </td><td>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"male")->where('sub_village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

                                </td><td>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('gender',"female")->where('sub_village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

                                </td>
                                <td>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"on")->where('sub_village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

                                </td>
                                <td>
                                <?php $_smarty_tpl->tpl_vars['farm_count'] = new Smarty_variable(ORM::for_table('farmer')->where('status',"off")->where('sub_village_id',$_smarty_tpl->tpl_vars['ds']->value['id'])->count(), null, 0);?>
                                <?php echo $_smarty_tpl->tpl_vars['farm_count']->value;?>

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