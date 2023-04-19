<?php
/**
* PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt

**/
_admin();
$ui->assign('_title', $_L['Reports'].' - '. $config['CompanyName']);
$ui->assign('_system_menu', 'reports');

$action = $routes['1'];
$admin = Admin::_info();
$ui->assign('_admin', $admin);



$mdate = date('Y-m-d');
$mtime = date('H:i:s');
$tdate = date('Y-m-d', strtotime('today - 30 days'));
$firs_day_month = date('Y-m-01');
$this_week_start = date('Y-m-d', strtotime('previous sunday'));
$before_30_days = date('Y-m-d', strtotime('today - 30 days'));
$month_n = date('n');

switch ($action) {
    case 'general_summary':

        $d = ORM::for_table('tbl_region');
        $total_region =  $d->count();
        $d = ORM::for_table('tbl_district');
        $total_district =  $d->count();
        $d = ORM::for_table('tbl_ward');
        $total_ward =  $d->count();

        $d = ORM::for_table('amcos');
        $d->order_by_desc('id');
        $input_distributed =  $d->count();
        $d = ORM::for_table('tbl_villages');
        $d->order_by_desc('id');
        $total_villages =  $d->count();

        $d = ORM::for_table('tbl_villages');
        $villages =  $d->find_many();
        $active_villages=0;
        foreach($villages as $ac){
            $d = ORM::for_table('farmer');
            $d->where('village_id',$ac['id']);
            $d =  $d->count();
            if($d>0){
                $active_villages=$active_villages+1;
            }
        }

        $d = ORM::for_table('tbl_sub_villages');
        $d->order_by_desc('id');
        $total_sub_villages =  $d->count();
        $d = ORM::for_table('farmer');
        $d->order_by_desc('id');
        $total_farmers =  $d->count();
        $total_acreage =  $d->sum('acre');
        $ui->assign('total_acreage',$total_acreage);
       
        $d = ORM::for_table('farmer');
        //$d->where_lte('created_at',date('Y-m-d 00:00:00'));
        $d->order_by_desc('id');
        $total_farmers_b_today =  $d->count();

        $ui->assign('total_farmers_b_today',$total_farmers_b_today);
        $d = ORM::for_table('farmer');
       // $d->where_lte('created_at',date('Y-m-d 00:00:00'));
        $d->order_by_desc('id');
        $total_acreage_b_today =  $d->sum('acre');
        $ui->assign('total_acreage_b_today',$total_acreage_b_today);

        $d = ORM::for_table('input_order');
        $input_issued =  $d->sum('used_qty');
        $d = ORM::for_table('farmer');
        $acreage =  $d->sum('acre');
        
        $d = ORM::for_table('amcos');
        $d->order_by_desc('id');
        $total_amcos =  $d->count();
        $d = ORM::for_table('inputs');
        $d->order_by_desc('id');
        $input =  $d->find_many();
        
        $d = ORM::for_table('farmer');
        $d->where('status','on');
        $verified_farmers =  $d->count();
        $d = ORM::for_table('farmer');
        $total_acreage =  $d->sum('acre');
        $ui->assign('total_acreage',$total_acreage);

        $d = ORM::for_table('inputs');
        $d->order_by_desc('id');
        $inputs =  $d->find_many();
        $ui->assign('inputs',$inputs);

       
       
        $ui->assign('acreage',$acreage);
        $ui->assign('input',$input);
        $ui->assign('total_amcos',$total_amcos);
        $ui->assign('total_region',$total_region);
        $ui->assign('total_district',$total_district);
        $ui->assign('total_ward',$total_ward);
        $ui->assign('total_villages',$total_villages);
        $ui->assign('active_villages',$active_villages);
        $ui->assign('total_sub_villages',$total_sub_villages);
        $ui->assign('total_farmers',$total_farmers);
        $ui->assign('verified_farmers',$verified_farmers);
        $ui->assign('input_issued',$input_issued);
    
        $ui->display('general_summary.tpl');
     break; 
     case 'farmer_summary':
        $d = ORM::for_table('farmer');
        $d->order_by_desc('id');
        $total_farmers =  $d->count();

        $d = ORM::for_table('farmer');
        $d->where('gender',"male");
        $d->order_by_desc('id');
        $male_farmers =  $d->count();

        $d = ORM::for_table('farmer');
        $d->where('gender',"female");
        $d->order_by_desc('id');
        $female_farmers =  $d->count();

        $d = ORM::for_table('farmer');
        $d->where('status',"on");
        $d->order_by_desc('id');
        $verified_farmers =  $d->count();

     

        $d = ORM::for_table('tbl_villages');
        $d->order_by_asc('village_name');
        $villages =  $d->find_many();
        $ui->assign('villages',$villages);

        $d = ORM::for_table('tbl_region');
        $d->order_by_asc('name');
        $regions =  $d->find_many();
        $ui->assign('regions',$regions);

        $d = ORM::for_table('tbl_district');
        $d->order_by_asc('name');
        $districts =  $d->find_many();
        $ui->assign('districts',$districts);

        $d = ORM::for_table('tbl_ward');
        $d->order_by_asc('name');
        $wards =  $d->find_many();
        $ui->assign('wards',$wards);

        $d = ORM::for_table('tbl_sub_villages');
        $d->order_by_asc('name');
        $sub_villages =  $d->find_many();
        $ui->assign('sub_villages',$sub_villages);
       
        $ui->assign('total_farmers',$total_farmers);
        $ui->assign('male_farmers',$male_farmers);
        $ui->assign('female_farmers',$female_farmers);
        $ui->assign('verified_farmers',$verified_farmers);
        $ui->assign('villages',$villages);

        $ui->display('farmer_summary.tpl');
     break; 

     case 'input_summary':
        $d = ORM::for_table('input_order');
        $amcos_input =  $d->sum('input_qty');
        $ui->assign('amcos_input',$amcos_input);

        $d = ORM::for_table('amcos');
        $d->order_by_desc('name');
        $amcos =  $d->find_many();
        $ui->assign('amcos_i',$amcos);

        $d = ORM::for_table('input_order');
        $issued_input =  $d->sum('used_qty');
        $ui->assign('issued_input',$issued_input);

       // $d = ORM::for_table('input_order');
        $remaining_input =  $amcos_input-$issued_input;
        $ui->assign('remaining_input',$remaining_input);

        $d = ORM::for_table('input_order');
        $d->order_by_desc('id');
        $input_amcos =  $d->find_many();
        $ui->assign('input_amcos',$input_amcos);

        $d = ORM::for_table('tbl_villages');
        $d->order_by_asc('village_name');
        $villages =  $d->find_many();
        $ui->assign('villages',$villages);

        $d = ORM::for_table('tbl_region');
        $d->order_by_asc('name');
        $regions =  $d->find_many();
        $ui->assign('regions',$regions);

        $d = ORM::for_table('tbl_district');
        $d->order_by_asc('name');
        $districts =  $d->find_many();
        $ui->assign('districts',$districts);

        $d = ORM::for_table('tbl_ward');
        $d->order_by_asc('name');
        $wards =  $d->find_many();
        $ui->assign('wards',$wards);

        $d = ORM::for_table('tbl_sub_villages');
        $d->order_by_asc('name');
        $sub_villages =  $d->find_many();
        $ui->assign('sub_villages',$sub_villages);

        $ui->display('input_summary.tpl');

     break; 
    
     case 'acreage_summary':
        $d = ORM::for_table('farmer');
        $total_acreage =  $d->sum('acre');
        $ui->assign('total_acreage',$total_acreage);

        $d = ORM::for_table('tbl_villages');
        $d->order_by_asc('village_name');
        $villages =  $d->find_many();
        $ui->assign('villages',$villages);

        $d = ORM::for_table('tbl_region');
        $d->order_by_asc('name');
        $regions =  $d->find_many();
        $ui->assign('regions',$regions);

        $d = ORM::for_table('tbl_district');
        $d->order_by_asc('name');
        $districts =  $d->find_many();
        $ui->assign('districts',$districts);

        $d = ORM::for_table('tbl_ward');
        $d->order_by_asc('name');
        $wards =  $d->find_many();
        $ui->assign('wards',$wards);

        $d = ORM::for_table('tbl_sub_villages');
        $d->order_by_asc('name');
        $sub_villages =  $d->find_many();
        $ui->assign('sub_villages',$sub_villages);

        $ui->display('acreage_summary.tpl');

     break;  

    case 'farmer-gin-before':
        $ui->assign('mdate',$mdate);
        $ui->assign('mtime',$mtime);
        $ui->assign('tdate', $tdate);
       // $user = ORM::for_table('tbl_use')->find_many();

      //  $ui->assign('userd', $user);
        $ui->display('farmer-gin-before.tpl');
        break;
    case 'farmer-gin-after':
            $fdate = _post('fdate')." 00:00:00";
            $tdate = _post('tdate')." 23:59:59";
            $stype = _post('stype');
           
    
            $d = ORM::for_table('farmer_payment_schedule');
            if ($stype != 'all'){
               // $d->where('type', $stype);
            }
            $d->where_gte('created_at', $fdate);
            $d->where_lte('created_at', $tdate);

            if ($stype =='1'){
                $d->where('status', 1);
            }
            if ($stype =='0'){
                $d->where('status', 0);
            }
            if ($stype =='2'){
                $d->where('status', 2);
            }
            $d->where('ginner_id', $admin['id']);
            $d->order_by_desc('id');
            
            $x =  $d->find_many();
    
    
    
    
            $ui->assign('d',$x);
    
            $ui->assign('fdate',$fdate);
            $ui->assign('tdate',$tdate);
            $ui->assign('stype',$stype);
          
    
           $ui->display('farmer-gin-view.tpl');
            break;
    case 'amcos-gin-before':
            $ui->assign('mdate',$mdate);
            $ui->assign('mtime',$mtime);
            $ui->assign('tdate', $tdate);
               // $user = ORM::for_table('tbl_use')->find_many();
        
              //  $ui->assign('userd', $user);
            $ui->display('amcos-gin-before.tpl');
            break;

    case 'input-amcos-before':
        $ui->assign('mdate',$mdate);
        $ui->assign('mtime',$mtime);
        $ui->assign('tdate', $tdate);
       // $user = ORM::for_table('tbl_use')->find_many();

      //  $ui->assign('userd', $user);
        $ui->display('input-amcos-before.tpl');
        break;
    case 'input-amcos-after':
            $fdate = _post('fdate')." 00:00:00";
            $tdate = _post('tdate')." 23:59:59";
          
            
    
            $d = ORM::for_table('amcos_input_order');
            if ($stype != 'all'){
               // $d->where('type', $stype);
            }
            $d->where_gte('created_at', $fdate);
            $d->where_lte('created_at', $tdate);

          
            $d->where('user_id', $admin['id']);
            $d->order_by_desc('id');
            
            $x =  $d->find_many();
    
    
    
            $ui->assign('d',$x);
    
            $ui->assign('fdate',$fdate);
            $ui->assign('tdate',$tdate);
           
          
    
           $ui->display('input-amcos-view.tpl');
            break;   




 case 'input-amcos-before':
        $ui->assign('mdate',$mdate);
        $ui->assign('mtime',$mtime);
        $ui->assign('tdate', $tdate);
       // $user = ORM::for_table('tbl_use')->find_many();

      //  $ui->assign('userd', $user);
        $ui->display('input-amcos-before.tpl');
        break;
    case 'input-amcos-after':
            $fdate = _post('fdate')." 00:00:00";
            $tdate = _post('tdate')." 23:59:59";
          
            
    
            $d = ORM::for_table('amcos_input_order');
            if ($stype != 'all'){
               // $d->where('type', $stype);
            }
            $d->where_gte('created_at', $fdate);
            $d->where_lte('created_at', $tdate);

          
            $d->where('user_id', $admin['id']);
            $d->order_by_desc('id');
            
            $x =  $d->find_many();
    
    
    
            $ui->assign('d',$x);
    
            $ui->assign('fdate',$fdate);
            $ui->assign('tdate',$tdate);
           
          
    
           $ui->display('input-amcos-view.tpl');
            break;     

        case 'input-board-before':
                $ui->assign('mdate',$mdate);
                $ui->assign('mtime',$mtime);
                $ui->assign('tdate', $tdate);
               // $user = ORM::for_table('tbl_use')->find_many();
        
              //  $ui->assign('userd', $user);
                $ui->display('input-board-before.tpl');
                break;
        case 'input-board-after':
                    $fdate = _post('fdate')." 00:00:00";
                    $tdate = _post('tdate')." 23:59:59";
                  
                    
            
                    $d = ORM::for_table('input_order');
                    if ($stype != 'all'){
                       // $d->where('type', $stype);
                    }
                    $d->where_gte('created_at', $fdate);
                    $d->where_lte('created_at', $tdate);
        
                  
                    $d->where('user_id', $admin['id']);
                    $d->order_by_desc('id');
                    
                    $x =  $d->find_many();
            
            
            
                    $ui->assign('d',$x);
            
                    $ui->assign('fdate',$fdate);
                    $ui->assign('tdate',$tdate);
                   
                   $ui->display('input-board-view.tpl');
                    break;                 
    case 'amcos-gin-after':
            $fdate = _post('fdate')." 00:00:00";
            $tdate = _post('tdate')." 23:59:59";
            $stype = _post('stype');
            
    
            $d = ORM::for_table('amcos_payment_schedule');
            if ($stype != 'all'){
               // $d->where('type', $stype);
            }
            $d->where_gte('created_at', $fdate);
            $d->where_lte('created_at', $tdate);

            if ($stype =='1'){
                $d->where('status', 1);
            }
            if ($stype =='0'){
                $d->where('status', 0);
            }
            if ($stype =='2'){
                $d->where('status', 2);
            }
            $d->where('ginner_id', $admin['id']);
            $d->order_by_desc('id');
            
            $x =  $d->find_many();
    
    
    
    
            $ui->assign('d',$x);
    
            $ui->assign('fdate',$fdate);
            $ui->assign('tdate',$tdate);
            $ui->assign('stype',$stype);
          
    
           $ui->display('amcos-gin-view.tpl');
            break;        
     case 'system-gin-before':
                $ui->assign('mdate',$mdate);
                $ui->assign('mtime',$mtime);
                $ui->assign('tdate', $tdate);
               // $user = ORM::for_table('tbl_use')->find_many();
        
              //  $ui->assign('userd', $user);
             $ui->display('system-gin-before.tpl');
             break;
     case 'system-gin-after':
            $fdate = _post('fdate')." 00:00:00";
            $tdate = _post('tdate')." 23:59:59";
             $stype = _post('stype');
                   
            
            $d = ORM::for_table('system_payment_schedule');
            if ($stype != 'all'){
                    // $d->where('type', $stype);
            }
                    $d->where_gte('created_at', $fdate);
                    $d->where_lte('created_at', $tdate);
        
                    if ($stype =='1'){
                        $d->where('status', 1);
                    }
                    if ($stype =='0'){
                        $d->where('status', 0);
                    }
                    if ($stype =='2'){
                        $d->where('status', 2);
                    }
                    $d->where('ginner_id', $admin['id']);
                    $d->order_by_desc('id');
                    
                    $x =  $d->find_many();
            
            
            
            
                    $ui->assign('d',$x);
            
                    $ui->assign('fdate',$fdate);
                    $ui->assign('tdate',$tdate);
                    $ui->assign('stype',$stype);
                  
            
                   $ui->display('system-gin-view.tpl');
                    break;  
                    
                    
             case 'order-gin-before':
                        $ui->assign('mdate',$mdate);
                        $ui->assign('mtime',$mtime);
                        $ui->assign('tdate', $tdate);
                       // $user = ORM::for_table('tbl_use')->find_many();
                
                      //  $ui->assign('userd', $user);
                     $ui->display('order-gin-before.tpl');
                     break;
             case 'order-gin-after':
                    $fdate = _post('fdate')." 00:00:00";
                    $tdate = _post('tdate')." 23:59:59";
                     $stype = _post('stype');
                           
                    
                    $d = ORM::for_table('orders');
                    if ($stype != 'all'){
                            // $d->where('type', $stype);
                    }
                            $d->where_gte('created_at', $fdate);
                            $d->where_lte('created_at', $tdate);
                
                            if ($stype =='1'){
                                $d->where('status', 1);
                            }
                            if ($stype =='0'){
                                $d->where('status', 0);
                            }
                            if ($stype =='2'){
                                $d->where('status', 2);
                            }
                            $d->where('ginner_id', $admin['id']);
                            $d->order_by_desc('id');
                            
                            $x =  $d->find_many();
                    
                    
                    
                    
                            $ui->assign('d',$x);
                    
                            $ui->assign('fdate',$fdate);
                            $ui->assign('tdate',$tdate);
                            $ui->assign('stype',$stype);
                          
                    
                    $ui->display('order-gin-view.tpl');
                            break;                    
        case 'order-amcos-before':
                                $ui->assign('mdate',$mdate);
                                $ui->assign('mtime',$mtime);
                                $ui->assign('tdate', $tdate);
                               // $user = ORM::for_table('tbl_use')->find_many();
                        
                              //  $ui->assign('userd', $user);
                             $ui->display('order-amcos-before.tpl');
                             break;
         case 'order-amcos-after':
                            $fdate = _post('fdate')." 00:00:00";
                            $tdate = _post('tdate')." 23:59:59";
                             $stype = _post('stype');
                                   
                            
                            $d = ORM::for_table('orders');
                            if ($stype != 'all'){
                                    // $d->where('type', $stype);
                            }
                                    $d->where_gte('created_at', $fdate);
                                    $d->where_lte('created_at', $tdate);
                        
                                    if ($stype =='1'){
                                        $d->where('status', 1);
                                    }
                                    if ($stype =='0'){
                                        $d->where('status', 0);
                                    }
                                    if ($stype =='2'){
                                        $d->where('status', 2);
                                    }
                                    $d->where('amcos_id', $admin['id']);
                                    $d->order_by_desc('id');
                                    
                                    $x =  $d->find_many();
                            
                            
                            
                            
                                    $ui->assign('d',$x);
                            
                                    $ui->assign('fdate',$fdate);
                                    $ui->assign('tdate',$tdate);
                                    $ui->assign('stype',$stype);
                                  
                            
                            $ui->display('order-amcos-view.tpl');
                                    break;                                    
                     
    case 'ticket-before':
        $ui->assign('mdate',$mdate);
        $ui->assign('mtime',$mtime);
        $ui->assign('tdate', $tdate);
        $user = ORM::for_table('tbl_users')->find_many();
        $ui->assign('userd', $user);
        $ui->display('reports-ticket.tpl');
        break;
    case 'ticket-after':
        $fdate = _post('fdate')." 00:00:00";
        $tdate = _post('tdate')." 23:59:59";
        $stype = _post('stype');
        $user_id = _post('user_id');

        $d = ORM::for_table('tbl_support_tickets');
        if ($stype != 'all'){
            $d->where('type', $stype);
        }
        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        if ($stype != 'all'){
            
            $d->where('status', $stype);
        }
        if ($user_id != 'all'){
           
            $d->where('user_id', $user_id);
        }
        $d->order_by_desc('id');
        $x =  $d->find_many();




        $ui->assign('d',$x);

        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('stype',$stype);
        $ui->assign('user_id',$user_id);

       $ui->display('reports-ticket-view.tpl');
        break;

    case 'logs-before':
        $ui->assign('mdate',$mdate);
        $ui->assign('mtime',$mtime);
        $ui->assign('tdate', $tdate);

        $ui->display('reports-logs.tpl');
        break;
    case 'logs-after':
        $fdate = _post('fdate')." 00:00:00";
        $tdate = _post('tdate')." 23:59:59";
        $stype = _post('stype');

        $d = ORM::for_table('tbl_logs');
        if ($stype != 'all'){
            $d->where('type', $stype);
        }
        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        if ($stype != 'all'){
            $d->where('type', $stype);
        }
        $d->order_by_desc('id');
        $x =  $d->find_many();




        $ui->assign('d',$x);

        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('stype',$stype);

        $ui->display('reports-logs-view.tpl');
        break;

    case 'attendance-before':
        $ui->assign('mdate',$mdate);
        $ui->assign('mtime',$mtime);
        $ui->assign('tdate', $tdate);
        $agents = ORM::for_table('agents')->find_many();
        $ui->assign('agents',$agents);
		
        $ui->display('reports-attendance.tpl');
        break;
    case 'attendance-after':
            $fdate = _post('fdate')." 00:00:00";
            $tdate = _post('tdate')." 23:59:59";
            $stype = _post('agent');
    
            $d = ORM::for_table('agent_attendance');
            if ($stype != 'all'){
                $d->where('agent_id', $stype);
            }
            $d->where_gte('time_in', $fdate);
            $d->where_lte('time_in', $tdate);
         
            $d->order_by_desc('id');
            $x =  $d->find_many();
    
    
    
    
            $ui->assign('d',$x);
    
            $ui->assign('fdate',$fdate);
            $ui->assign('tdate',$tdate);
            $ui->assign('stype',$stype);
    
            $ui->display('reports-attendance-view.tpl');

            break;  
    case 'directory-before':
                $ui->assign('mdate',$mdate);
                $ui->assign('mtime',$mtime);
                $ui->assign('tdate', $tdate);
                $category = ORM::for_table('sub_category')->find_many();
                $ui->assign('category',$category);
                
                $ui->display('reports-directory.tpl');
                break;
    case 'directory-after':
                    $fdate = _post('fdate');
                    $tdate = _post('tdate');
                    $stype = _post('cate');
            
                    $d = ORM::for_table('listing_annalysis');
                    if ($stype != 'all'){
                        $d->where('listing_id', $stype);
                    }
                    $d->where_gte('date', $fdate);
                    $d->where_lte('date', $tdate);
                 
                    $d->order_by_desc('id');
                    $x =  $d->find_many();
            
            
            
            
                    $ui->assign('d',$x);
            
                    $ui->assign('fdate',$fdate);
                    $ui->assign('tdate',$tdate);
                    $ui->assign('stype',$stype);
            
                    $ui->display('reports-directory-view.tpl');
        
                    break;        
    case 'daily-report':
		$paginator = Paginator::bootstrap('tbl_transactions','recharged_on',$mdate);
        $d = ORM::for_table('tbl_transactions')->where('recharged_on',$mdate)->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
		$dr = ORM::for_table('tbl_transactions')->where('recharged_on',$mdate)->sum('price');
		
        $ui->assign('d',$d);
		$ui->assign('dr',$dr);
		$ui->assign('mdate',$mdate);
		$ui->assign('mtime',$mtime);
		$ui->assign('paginator',$paginator);
		
        $ui->display('reports-daily.tpl');
        break;
        case 'customers':

        $ui->display('reports-customers.tpl');
        break;
        case 'customers-post':
            $d = ORM::for_table('tbl_customers')->order_by_desc('id')->find_many();
           $ty=_post('option');
            $ui->assign('ty',$ty);
            $ui->assign('option',$ty);
            $ui->assign('d',$d);

       $ui->display('reports-customers-view.tpl');
        break;






       case 'daily-wifi':
		$paginator = Paginator::bootstrap('pesapi_payment','time',$mdate);
             $d = ORM::for_table('pesapi_payment')->where('time',$mdate)->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
		$dr = ORM::for_table('pesapi_payment')->where('time',$mdate)->sum('amount');
		
        $ui->assign('d',$d);
		$ui->assign('dr',$dr);
		$ui->assign('mdate',$mdate);
		$ui->assign('mtime',$mtime);
		$ui->assign('paginator',$paginator);
		
        $ui->display('wifi.tpl');
        break;
		
    case 'by-period':
		$ui->assign('mdate',$mdate);
		$ui->assign('mtime',$mtime);
		$ui->assign('tdate', $tdate);
		
        $ui->display('reports-period.tpl');
        break;
		
    case 'period-view':
        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $stype = _post('stype');
		
        $d = ORM::for_table('tbl_transactions');
		if ($stype != ''){
				$d->where('type', $stype);
		}
        
        $d->where_gte('recharged_on', $fdate);
        $d->where_lte('recharged_on', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();
		
		$dr = ORM::for_table('tbl_transactions');
		if ($stype != ''){
				$dr->where('type', $stype);
		}
        
        $dr->where_gte('recharged_on', $fdate);
        $dr->where_lte('recharged_on', $tdate);
		$xy = $dr->sum('price');
        
		$ui->assign('d',$x);
		$ui->assign('dr',$xy);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('stype',$stype);

        $ui->display('reports-period-view.tpl');
        break;
		
        
        case 'by-period-wifi':
		$ui->assign('mdate',$mdate);
		$ui->assign('mtime',$mtime);
		$ui->assign('tdate', $tdate);
		
        $ui->display('reports-periodw.tpl');
        break;
		
    case 'period-view-wifi':
        $fdate = _post('fdate');
        $tdate = _post('tdate');
      
		
        $d = ORM::for_table('pesapi_payment');
		
        
        $d->where_gte('time', $fdate);
        $d->where_lte('time', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();
		
		$dr = ORM::for_table('pesapi_payment');
		
        $dr->where_gte('time', $fdate);
        $dr->where_lte('time', $tdate);
		$xy = $dr->sum('amount');
        
		$ui->assign('d',$x);
		$ui->assign('dr',$xy);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('stype',$stype);

        $ui->display('reports-period-view-wifi.tpl');
        break;
		
    default:
        echo 'action not defined';
}