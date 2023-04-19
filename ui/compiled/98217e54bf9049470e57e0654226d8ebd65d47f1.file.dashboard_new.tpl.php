<?php /* Smarty version Smarty-3.1.13, created on 2022-11-20 09:55:30
         compiled from "ui/theme/default/dashboard_new.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18113259986278203068cee2-09004276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98217e54bf9049470e57e0654226d8ebd65d47f1' => 
    array (
      0 => 'ui/theme/default/dashboard_new.tpl',
      1 => 1668927106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18113259986278203068cee2-09004276',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_627820306f42a2_29232464',
  'variables' => 
  array (
    '_admin' => 0,
    'rights' => 0,
    '_url' => 0,
    'amcos_farmer_all' => 0,
    'amcos_ginner_all' => 0,
    'amcos_collection_monthly' => 0,
    'amcos_payment_monthly' => 0,
    'amcos_order_all' => 0,
    '_L' => 0,
    'amcos_order_a' => 0,
    'amcos_order_w' => 0,
    'amcos_order_r' => 0,
    'amcos_farmer_suc' => 0,
    'amcos_farmer_fai' => 0,
    'board_villages_all' => 0,
    'board_ginner_all' => 0,
    'board_farmer_all' => 0,
    'agents_all' => 0,
    'gin_order_w' => 0,
    'gin_order_a' => 0,
    'gin_order_r' => 0,
    'gin_order_all' => 0,
    'gin_farmer_suc' => 0,
    'gin_farmer_fai' => 0,
    'gin_amcos_suc' => 0,
    'gin_amcos_fai' => 0,
    'gin_system_suc' => 0,
    'gin_system_fai' => 0,
    'dlog' => 0,
    'dlogs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_627820306f42a2_29232464')) {function content_627820306f42a2_29232464($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!-- AMocs -->
<?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type']=='AMCOS'){?>
        <div class="row" style="font-size:12px;">
        <?php if ($_smarty_tpl->tpl_vars['rights']->value['dashboard_income']){?>
            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:green;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Total Farmers</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $_smarty_tpl->tpl_vars['amcos_farmer_all']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:orange;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Total Ginners</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $_smarty_tpl->tpl_vars['amcos_ginner_all']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-xl-3" >
                <div class="card mb-3 widget-content" style="background:blue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" style="font-size:14px;"><strong>Monthly Collection Quantity</strong></div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="  color: black;"  href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $_smarty_tpl->tpl_vars['amcos_collection_monthly']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content" style="background:darkblue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Monthly Paid Commission</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payments/amcos-amcos" style=" color: black;">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><span><?php echo $_smarty_tpl->tpl_vars['amcos_payment_monthly']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>
       <?php }?>
         </div>
        
            <div class="main-card mb-3 card">
                <div class="no-gutters row">
                <?php if ($_smarty_tpl->tpl_vars['rights']->value['dashboard_clients']){?>
                    <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success"><?php echo $_smarty_tpl->tpl_vars['amcos_order_all']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total Ginner Orders</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                           <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success"><?php echo $_smarty_tpl->tpl_vars['amcos_order_a']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Confirmed Ginner orders </div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-danger"><?php echo $_smarty_tpl->tpl_vars['amcos_order_w']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Pending Ginner orders </div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-danger"><?php echo $_smarty_tpl->tpl_vars['amcos_order_r']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Rejected Ginner orders </div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            
                       <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess"><?php echo $_smarty_tpl->tpl_vars['amcos_farmer_suc']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Paid Farmers</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-warning"><?php echo $_smarty_tpl->tpl_vars['amcos_farmer_fai']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Unpaid Farmers</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
   
                    <?php }?>
                </div>
            </div>
          <?php }?>  
       <!--Board -->
          <?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type']=='ADMIN'||$_smarty_tpl->tpl_vars['_admin']->value['user_type']=='BOARD'){?>
        <div class="row" style="font-size:12px;">
        <?php if ($_smarty_tpl->tpl_vars['rights']->value['dashboard_income']){?>
            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:green;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Total Village</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
villages/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span> <?php echo $_smarty_tpl->tpl_vars['board_villages_all']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>

              <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:orange;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Total Ginners</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ginner/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span> <?php echo $_smarty_tpl->tpl_vars['board_ginner_all']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3" >
                <div class="card mb-3 widget-content" style="background:blue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" style="font-size:14px;"><strong>Total Farmers</strong></div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="  color: black;"  href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/list-board">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $_smarty_tpl->tpl_vars['board_farmer_all']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content" style="background:darkblue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Monthly cotton Collection</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
agents/list" style=" color: black;">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><span><?php echo $_smarty_tpl->tpl_vars['agents_all']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>
       <?php }?>
         </div>
        
            <div class="main-card mb-3 card">
                <div class="no-gutters row">
                <?php if ($_smarty_tpl->tpl_vars['rights']->value['dashboard_clients']){?>
                    <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success">0</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Weekly Cotton collection</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/directory-before"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                           <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success">0</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Annual Cotton collection </div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
category/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                       <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess">0</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Paid Farmers</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
listing/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-warning">0</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Unpaid Farmers</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
listing/list"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
   
                    <?php }?>
                </div>
            </div>
           <?php }?>

             <!-- Ginner -->
           <?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type']=='GINNER'){?>
        <div class="row" style="font-size:12px;">
        <?php if ($_smarty_tpl->tpl_vars['rights']->value['dashboard_income']){?>
            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:green;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Pending Orders</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list-gin">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $_smarty_tpl->tpl_vars['gin_order_w']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content bg-arielle-smile" style="background:orange;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Confirmed Orders</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list-gin">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $_smarty_tpl->tpl_vars['gin_order_a']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-xl-3" >
                <div class="card mb-3 widget-content" style="background:blue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" style="font-size:14px;"><strong>Rejected Orders</strong></div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="  color: black;"  href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list-gin">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $_smarty_tpl->tpl_vars['gin_order_r']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content" style="background:darkblue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >All Order</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list-gin" style=" color: black;">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><span><?php echo $_smarty_tpl->tpl_vars['gin_order_all']->value;?>
</span></div>
                        </div>
                    </div>
                </div>
            </div>
       <?php }?>
         </div>
        
            <div class="main-card mb-3 card">
                <div class="no-gutters row">
                <?php if ($_smarty_tpl->tpl_vars['rights']->value['dashboard_clients']){?>
                    <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success"><?php echo $_smarty_tpl->tpl_vars['gin_farmer_suc']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Farmer Successful Payment</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/farmer-gin-before"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                           <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success"><?php echo $_smarty_tpl->tpl_vars['gin_farmer_fai']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Farmer Unsuccessful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/farmer-gin-before"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-danger"><?php echo $_smarty_tpl->tpl_vars['gin_amcos_suc']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Amcos Successful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/amcos-gin-before"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-danger"><?php echo $_smarty_tpl->tpl_vars['gin_amcos_fai']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Amcos Unsuccessful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/amcos-gin-before"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            
                       <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess"><?php echo $_smarty_tpl->tpl_vars['gin_system_suc']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">System successful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/system-gin-before"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-warning"><?php echo $_smarty_tpl->tpl_vars['gin_system_fai']->value;?>
</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">System unsuccessful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/system-gin-before"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View_All'];?>
</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
   
                    <?php }?>
                </div>
            </div>
            <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type']=='ADMIN'){?>
        <div class="row">
    
             <?php if ($_smarty_tpl->tpl_vars['rights']->value['noc_view']){?>
         <div class="col-md-12 col-lg-12">
                <div class="mb-3 card">
          
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Activity_Log'];?>

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                              <!--  <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <canvas id="canvas"></canvas>
                                        </div>
                                    </div>
                                </div>
                                -->
                             <!--   <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Service Plan Count</h6> -->
                               
                                    
                                    <div class="scroll-area-sm">
                                        <div class="scrollbar-container">
                                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                <?php  $_smarty_tpl->tpl_vars['dlogs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dlogs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dlog']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dlogs']->key => $_smarty_tpl->tpl_vars['dlogs']->value){
$_smarty_tpl->tpl_vars['dlogs']->_loop = true;
?>
                                                    <li class="primary">
                                                        <span class="point"></span>
                                                        <span class="time small text-muted"><?php echo time_elapsed_string($_smarty_tpl->tpl_vars['dlogs']->value['date'],true);?>
</span>
                                                        <p><?php echo $_smarty_tpl->tpl_vars['dlogs']->value['description'];?>
</p>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            </div>
        <?php }?>
        <?php }?>


    <?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>