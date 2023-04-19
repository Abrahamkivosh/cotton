<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', $_L['Dashboard'] . ' - ' . $config['CompanyName']);
$admin = Admin::_info();

$ui->assign('_admin', $admin);


    $fdate = date('Y-m-01');
    $tdate = date('Y-m-t');
//first day of month
    $first_day_month = date('Y-m-01');
    $mdate = date('Y-m-d');
    $month_n = date('n');


//activity log
    $dlog = ORM::for_table('tbl_logs')->limit(5)->order_by_desc('id')->find_many();
    $ui->assign('dlog', $dlog);
    $log = ORM::for_table('tbl_logs')->count();
    $ui->assign('log', $log);

// Count stock
    $listings = $v = ORM::for_table('listing_annalysis')->find_many();
    $view = array();
    $date=array();
    $listing=array();
    $n = 0;
    
    foreach ($listings as $list) {
        $list_name=ORM::for_table('listings')->find_one($list['listing_id']);
        $listing[$n]=$list_name->name;
        $date[$n]=$list['date'];
        $view[$n]=$list['view'];
        $n++;
    }
 
    $agents_all = ORM::for_table('agents')->count();
    $agents_active = ORM::for_table('agents')->where('status', "on")->count();
    $agents_inactive = ORM::for_table('agents')->where('status', "off")->count();
    $listing_top = ORM::for_table('listings')->where('top', "1")->count();
    $listing_all = ORM::for_table('listings')->count();
    $today_search_count = ORM::for_table('listing_annalysis')->where('date',$mdate)->count();
    $today_search = ORM::for_table('listing_annalysis')->where('date',$mdate)->find_many();
    $top = ORM::for_table('main_category')->where('top',1)->count();
    $agent_attendance = ORM::for_table('agent_attendance')->where('date',$mdate)->find_many();
    $ui->assign('agent_attendance', $agent_attendance);
    $ui->assign('agents_all', $agents_all);
    $ui->assign('listing_all', $listing_all);
    $ui->assign('agents_active', $agents_active);
    $ui->assign('agents_inactive', $agents_inactive);
    $ui->assign('listing', $listing);
    $ui->assign('date', $date);
    $ui->assign('view', $view);
    $ui->assign('top', $top);
    $ui->assign('today_search_count', $today_search_count);
    $ui->assign('today_search', $today_search);

    $gin_order_all=ORM::for_table('orders')->where('ginner_id',$admin['ginner_id'])->count();
    $gin_order_w=ORM::for_table('orders')->where('ginner_id',$admin['ginner_id'])->where('status','1')->count();
	$gin_order_a=ORM::for_table('orders')->where('ginner_id',$admin['ginner_id'])->where('status','3')->count();
	$gin_order_r=ORM::for_table('orders')->where('ginner_id',$admin['ginner_id'])->where('status','4')->count();
    $ui->assign('gin_order_all', $gin_order_all);
    $ui->assign('gin_order_w', $gin_order_w);
    $ui->assign('gin_order_a', $gin_order_a);
    $ui->assign('gin_order_r', $gin_order_r);
    //amcos
    $amcos_order_all=ORM::for_table('orders')->where('amcos_id',$admin['amcos_id'])->count();
    $amcos_order_w=ORM::for_table('orders')->where('amcos_id',$admin['amcos_id'])->where('status','1')->count();
	$amcos_order_a=ORM::for_table('orders')->where('amcos_id',$admin['amcos_id'])->where('status','3')->count();
	$amcos_order_r=ORM::for_table('orders')->where('amcos_id',$admin['amcos_id'])->where('status','4')->count();
    $ui->assign('amcos_order_all', $amcos_order_all);
    $ui->assign('amcos_order_w', $amcos_order_w);
    $ui->assign('amcos_order_a', $amcos_order_a);
    $ui->assign('amcos_order_r', $amcos_order_r);
    
    $amcos_ginner_all=ORM::for_table('ginner')->count();
    $ui->assign('amcos_ginner_all', $amcos_ginner_all);
    $amcos=ORM::for_table('amcos')->find_one($admin['amcos_id']);

    $amcos_farmer_all=ORM::for_table('farmer')->where('amcos_id',$admin['amcos_id'])->count();
    $ui->assign('amcos_farmer_all', $amcos_farmer_all);
    //monthly collection
    $amcos_collection_monthly=ORM::for_table('cotton_collection')->where('amcos_id',$admin['amcos_id'])->sum('qty');
    $ui->assign('amcos_collection_monthly', $amcos_collection_monthly);

    //monthly paid commission
    $amcos_payment_monthly=ORM::for_table('amcos_payment_schedule')->where('amcos_id',$admin['amcos_id'])->sum('amount');
    $ui->assign('amcos_payment_monthly', $amcos_payment_monthly);


    $gin_system_suc=ORM::for_table('system_payment_schedule')->where('ginner_id',$admin['ginner_id'])->where('status','1')->count();
    $gin_system_fai=ORM::for_table('system_payment_schedule')->where('ginner_id',$admin['ginner_id'])->where('status','2')->count();
    $ui->assign('gin_system_suc', $gin_system_suc);
    $ui->assign('gin_system_fai', $gin_system_fai);

    $gin_amcos_suc=ORM::for_table('amcos_payment_schedule')->where('ginner_id',$admin['ginner_id'])->where('status','1')->count();
    $gin_amcos_fai=ORM::for_table('amcos_payment_schedule')->where('ginner_id',$admin['ginner_id'])->where('status','2')->count();
    $ui->assign('gin_amcos_suc', $gin_amcos_suc);
    $ui->assign('gin_amcos_fai', $gin_amcos_suc);
    //amcos
    $amcos_amcos_suc=ORM::for_table('amcos_payment_schedule')->where('amcos_id',$admin['amcos_id'])->where('status','1')->count();
    $amcos_amcos_fai=ORM::for_table('amcos_payment_schedule')->where('amcos_id',$admin['amcos_id'])->where('status','2')->count();
    $ui->assign('amcos_amcos_suc', $amcos_amcos_suc);
    $ui->assign('amcos_amcos_fai', $amcos_amcos_fai);

    $gin_farmer_suc=ORM::for_table('farmer_payment_schedule')->where('ginner_id',$admin['ginner_id'])->where('status','1')->count();
    $gin_farmer_fai=ORM::for_table('farmer_payment_schedule')->where('ginner_id',$admin['ginner_id'])->where('status','2')->count();
    $ui->assign('gin_farmer_suc', $gin_farmer_suc);
    $ui->assign('gin_farmer_fai', $gin_farmer_fai);

    $amcos_farmer_suc=ORM::for_table('cotton_collection')->where('amcos_id',$admin['amcos_id'])->where('status','1')->count();
    $amcos_farmer_fai=ORM::for_table('cotton_collection')->where('amcos_id',$admin['amcos_id'])->where('status','0')->count();
    $ui->assign('amcos_farmer_suc', $amcos_farmer_suc);
    $ui->assign('amcos_farmer_fai', $amcos_farmer_fai);

    $board_villages_all=ORM::for_table('tbl_villages')->count();
    $ui->assign('board_villages_all', $board_villages_all);

    $board_ginner_all=ORM::for_table('ginner')->count();
    $ui->assign('board_ginner_all', $board_ginner_all);

    $board_farmer_all=ORM::for_table('farmer')->count();
    $ui->assign('board_farmer_all', $board_farmer_all);


    

    $ui->assign('url', APP_URL);
    $ui->display('dashboard_new.tpl');


