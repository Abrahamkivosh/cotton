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

if ($admin['user_type'] != 'Admin' AND $admin['user_type'] != 'Sales') {
    r2(U . "home", 'e', $_L['Do_Not_Access']);
}

use PEAR2\Net\RouterOS;

require_once 'system/autoload/PEAR2/Autoload.php';
$fdate = date('Y-m-01');
$tdate = date('Y-m-t');
//first day of month
$first_day_month = date('Y-m-01');
$mdate = date('Y-m-d');
$month_n = date('n');

$iday = ORM::for_table('tbl_transactions')->where('recharged_on', $mdate)->sum('price');
if ($iday == '') {
    $iday = '0.00';
}
$ui->assign('iday', $iday);

$idayw = ORM::for_table('pesapi_payment')->where('time', $mdate)->sum('amount');
if ($idayw == '') {
    $idayw = '0.00';
}
$ui->assign('idayw', $idayw);

$imonth = ORM::for_table('tbl_transactions')->where_gte('recharged_on', $first_day_month)->where_lte('recharged_on', $mdate)->sum('price');
if ($imonth == '') {
    $imonth = '0.00';
}
$ui->assign('imonth', $imonth);

$imonthw = ORM::for_table('pesapi_payment')->where_gte('time', $first_day_month)->where_lte('time', $mdate)->sum('amount');
if ($imonthw == '') {
    $imonthw = '0.00';
}
$ui->assign('imonthw', $imonthw);

$u_act = ORM::for_table('tbl_customers')->where('status', 'connected')->count();
if ($u_act == '') {
    $u_act = '0';
}
$ui->assign('u_act', $u_act);

$u_all = ORM::for_table('tbl_customers')->count();
if ($u_all == '') {
    $u_all = '0';
}
$ui->assign('u_all', $u_all);
//user expire
$expire = ORM::for_table('tbl_user_recharges')->where('expiration', $mdate)->order_by_desc('id')->find_many();
$ui->assign('expire', $expire);

//activity log
$dlog = ORM::for_table('tbl_logs')->limit(5)->order_by_desc('id')->find_many();
$ui->assign('dlog', $dlog);
$log = ORM::for_table('tbl_logs')->count();
$ui->assign('log', $log);

// Count stock
$tmp = $v = ORM::for_table('tbl_plans')->find_many();
$plans = array();
$stocks = array("used" => 0, "unused" => 0);
$n = 0;
foreach ($tmp as $plan) {
    $plans[$n]['name_plan'] = $plan['name_plan'];
    $plans[$n]['unused'] = ORM::for_table('tbl_voucher')
                    ->where('id_plan', $plan['id'])
                    ->where('status', 0)->count();
    ;
    $stocks["unused"] += $plans[$n]['unused'];
    $plans[$n]['used'] = ORM::for_table('tbl_user_recharges')
                     ->where('plan_id', $plan['id'])
                     ->where_gte('expiration', date('Y-m-d'))
        ->count();
    ;
    $stocks["used"] += $plans[$n]['used'];
    $n++;
}
$ro = ORM::for_table('tbl_routers')->find_one();

$mikrotik = Router::_info($ro['name']);


/*
include_once('routeros_api.class.php');
$ro = ORM::for_table('tbl_routers')->find_one();
$ip = $ro['ip_address'];
$user = $ro['username'];
$pass = $ro['password'];
$API = new routeros_api();
if ($API->connect($ip, $user, $pass)) {
    
} else {
    
}
$ARRAY = $API->comm("/interface/print");

*/
$ui->assign('ARRAY', $ARRAY);

$ui->assign('stocks', $stocks);
$ui->assign('plans', $plans);
$ui->display('dashboard.tpl');

