<?php
/**
* PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt

**/


$att = $db -> query("SELECT * FROM agent_attendance WHERE `agent_id` = '{$_SESSION['uid']}' AND `date`='".date('Y-m-d')."'")->fetch();
$time = time();
// 5 minutes since last request

function dateDiff($start, $end) {

    $start_ts = strtotime($start);

    $end_ts = strtotime($end);

    $diff = $end_ts - $start_ts;

    return round($diff / 60);

    }
$active_time=dateDiff($att['time_in_e'],date('Y-m-d H:i:s'));

$sql = "UPDATE agent_attendance 
SET idle_time=idle_time+?,hours=hours+?
WHERE date=? AND agent_id=?";
$q = $db->prepare($sql);

$q->execute(array(0,$active_time,date('Y-m-d'),$_SESSION['uid']));

if (session_status() == PHP_SESSION_NONE) session_start();
session_destroy();
header('location: index.php');