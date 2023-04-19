
{include file="sections/header.tpl"}

    <!-- AMocs -->
{if $_admin['user_type'] eq 'AMCOS' }
        <div class="row" style="font-size:12px;">
        {if $rights['dashboard_income']}
            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:green;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Total Farmers</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="{$_url}farmer/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{$amcos_farmer_all}</span></div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:orange;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Total Ginners</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="{$_url}order/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{$amcos_ginner_all}</span></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-xl-3" >
                <div class="card mb-3 widget-content" style="background:blue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" style="font-size:14px;"><strong>Monthly Collection Quantity</strong></div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="  color: black;"  href="{$_url}cotton/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{$amcos_collection_monthly}</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content" style="background:darkblue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Monthly Paid Commission</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" href="{$_url}payments/amcos-amcos" style=" color: black;">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><span>{$amcos_payment_monthly}</span></div>
                        </div>
                    </div>
                </div>
            </div>
       {/if}
         </div>
        
            <div class="main-card mb-3 card">
                <div class="no-gutters row">
                {if $rights['dashboard_clients']}
                    <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success">{$amcos_order_all}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total Ginner Orders</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}order/list">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                           <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success">{$amcos_order_a}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Confirmed Ginner orders </div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}order/list">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-danger">{$amcos_order_w}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Pending Ginner orders </div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}order/list">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-danger">{$amcos_order_r}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Rejected Ginner orders </div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}order/list">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            
                       <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess">{$amcos_farmer_suc}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Paid Farmers</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}cotton/list">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-warning">{$amcos_farmer_fai}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Unpaid Farmers</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}cotton/list">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
   
                    {/if}
                </div>
            </div>
          {/if}  
       <!--Board -->
          {if $_admin['user_type'] eq 'ADMIN' || $_admin['user_type'] eq 'BOARD'}
        <div class="row" style="font-size:12px;">
        {if $rights['dashboard_income']}
            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:green;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Total Village</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="{$_url}villages/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span> {$board_villages_all}</span></div>
                        </div>
                    </div>
                </div>
            </div>

              <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:orange;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Total Ginners</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="{$_url}ginner/list">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span> {$board_ginner_all}</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3" >
                <div class="card mb-3 widget-content" style="background:blue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" style="font-size:14px;"><strong>Total Farmers</strong></div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="  color: black;"  href="{$_url}farmer/list-board">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{$board_farmer_all}</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content" style="background:darkblue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Monthly cotton Collection</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" href="{$_url}agents/list" style=" color: black;">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><span>{$agents_all}</span></div>
                        </div>
                    </div>
                </div>
            </div>
       {/if}
         </div>
        
            <div class="main-card mb-3 card">
                <div class="no-gutters row">
                {if $rights['dashboard_clients']}
                    <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success">0</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Weekly Cotton collection</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}reports/directory-before">{$_L['View_All']}</a></div>
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
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}category/list">{$_L['View_All']}</a></div>
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
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}listing/list">{$_L['View_All']}</a></div>
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
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}listing/list">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
   
                    {/if}
                </div>
            </div>
           {/if}

             <!-- Ginner -->
           {if $_admin['user_type'] eq 'GINNER'}
        <div class="row" style="font-size:12px;">
        {if $rights['dashboard_income']}
            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content " style="background:green;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Pending Orders</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="{$_url}order/list-gin">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{$gin_order_w}</span></div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content bg-arielle-smile" style="background:orange;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >Confirmed Orders</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="color: black;" href="{$_url}order/list-gin">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{$gin_order_a}</span></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-xl-3" >
                <div class="card mb-3 widget-content" style="background:blue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" style="font-size:14px;"><strong>Rejected Orders</strong></div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" style="  color: black;"  href="{$_url}order/list-gin">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{$gin_order_r}</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 widget-content" style="background:darkblue;">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading" >All Order</div>
                            <div class="widget-subheading"><p class="mt0 mb0 right"><a class="text-putih" href="{$_url}order/list-gin" style=" color: black;">View All</a></p></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><span>{$gin_order_all}</span></div>
                        </div>
                    </div>
                </div>
            </div>
       {/if}
         </div>
        
            <div class="main-card mb-3 card">
                <div class="no-gutters row">
                {if $rights['dashboard_clients']}
                    <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success">{$gin_farmer_suc}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Farmer Successful Payment</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}reports/farmer-gin-before">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                           <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success">{$gin_farmer_fai}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Farmer Unsuccessful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}reports/farmer-gin-before">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-danger">{$gin_amcos_suc}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Amcos Successful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}reports/amcos-gin-before">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-danger">{$gin_amcos_fai}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">Amcos Unsuccessful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}reports/amcos-gin-before">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            
                       <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess">{$gin_system_suc}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">System successful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}reports/system-gin-before">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-2">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-warning">{$gin_system_fai}</div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="widget-heading">System unsuccessful Payments</div>
                                    <div class="widget-subheading"><a class="text-putih" href="{$_url}reports/system-gin-before">{$_L['View_All']}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
   
                    {/if}
                </div>
            </div>
            {/if}
        {if $_admin['user_type'] eq 'ADMIN' }
        <div class="row">
    
             {if $rights['noc_view']}
         <div class="col-md-12 col-lg-12">
                <div class="mb-3 card">
          
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            {$_L['Activity_Log']}
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
                                                {foreach $dlog as $dlogs}
                                                    <li class="primary">
                                                        <span class="point"></span>
                                                        <span class="time small text-muted">{time_elapsed_string($dlogs['date'],true)}</span>
                                                        <p>{$dlogs['description']}</p>
                                                    </li>
                                                {/foreach}

                                            </ul>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            </div>
        {/if}
        {/if}


    {include file="sections/footer.tpl"}