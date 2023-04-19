<?php
/**
* PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt

**/

_auth();
use PEAR2\Net\RouterOS;
require_once 'system/autoload/PEAR2/Autoload.php';
$ui->assign('_title', $_L['Dashboard'].' - '. $config['CompanyName']);
$user = User::_info();
$ui->assign('_user', $user);
//Client Page

$t = ORM::for_table('agent_attendance')->where('agent_id',$user['id'])->order_by_desc('id')->limit(10)->find_many();

$c= ORM::for_table('agents')->find_one($user['id']);
$ui->assign('c',$c);
$ui->assign('t',$t);



$paginator = Paginator::bootstrap('main_category');
$cat = ORM::for_table('main_category')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('top')->find_many();
$ui->assign('cat',$cat);
$ui->assign('paginator', $paginator);


if( !empty( $_POST['username'] ) OR $routes['1']>0){
    if(!empty( $_POST['username'])){
        
    $search = ORM::for_table('listings')->where_like('main_category', '%' . $_POST['username'] . '%')->find_many();
    if(count($search)>0){
        $search = ORM::for_table('listings')->where_like('main_category', '%' . $_POST['username'] . '%')->find_many();
    }else{
        $search = ORM::for_table('listings')->where_like('sub_category', '%' . $_POST['username'] . '%')->find_many(); 
        if(count($search)>0){
        }else{
            $search = ORM::for_table('listings')->where_like('location', '%' . $_POST['username'] . '%')->find_many(); 
            if(count($search)>0){
                
            }else{
                $search = ORM::for_table('listings')->where_like('address', '%' . $_POST['username'] . '%')->find_many(); 
                if(count($search)>0){
                
                }else{
                    $search = ORM::for_table('listings')->where_like('description', '%' . $_POST['username'] . '%')->find_many(); 
                    if(count($search)>0){
                
                    }else{
                        $search = ORM::for_table('listings')->where_like('name', '%' . $_POST['username'] . '%')->find_many();
                        if(count($search)>0){
                
                        }else{
                            $search = ORM::for_table('listings')->where_like('contact', '%' . $_POST['username'] . '%')->find_many(); 
                        } 
                    }
                }
            }
        }
    }

$finalURL="http://www.google.com/search?hl=en&q=".preg_replace('/\s+/', '+',$_POST['username']);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $finalURL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                
              //print_r($response);   
 //preg_replace( '/[^0-9]/', '', $string );

function string_between_two_string($str, $starting_word, $ending_word)
{
    $subtring_start = strpos($str, $starting_word);
    //Adding the starting index of the starting word to
    //its length would give its ending index
    $subtring_start += strlen($starting_word); 
    //Length of our required sub string
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start; 
    // Return the substring from the index substring_start of length size
    return substr($str, $subtring_start, $size); 
}

$phone = string_between_two_string($response, 'Phone', '</div>');
  $phone = string_between_two_string($phone, ':', '</span>');
 
 $address = string_between_two_string($response, 'Address', '</span><div');
// $address = string_between_two_string($address, ':', 'Ethiopia');


$address = string_between_two_string(strip_tags($address), ':', 'Hours');
//$address=substr($address,0,100);

 $ui->assign('sugg_name',$_POST['username']);

 if(strlen($address)>100){
	 
 }else{
    
    $ui->assign('sugg_address',$address);
   // $ui->assign('sugg_phone',$phone);	 
 }  

 
 if(strlen(strip_tags($phone))>50){
	 
}else{
   
  // $ui->assign('sugg_name',$_POST['username']);
   //$ui->assign('sugg_address',$address);
   $ui->assign('sugg_phone',$phone);	 
}  
    }else{
    $search = ORM::for_table('listings')->where('sub_category_id',$routes['1'])->find_many();  
    }
   
    foreach($search as $sea){
    $att = $db -> query("SELECT * FROM listing_annalysis WHERE `listing_id` = '".$sea['id']."' AND `agent_id` = '".$_SESSION['uid']."' AND `date`='".date('Y-m-d')."'")->fetch();
    if($att){
    $sql = "UPDATE listing_annalysis 
        SET views=views+?
       WHERE date=? AND agent_id=? AND listing_id=?";
    $q = $db->prepare($sql);
    $q->execute(array(1,date('Y-m-d'),$_SESSION['uid'],$sea['id']));
    }else{
    $sql = "INSERT INTO listing_annalysis (agent_id,date,listing_id,views) VALUES (:a,:b,:c,:d)";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$_SESSION['uid'],':b'=>date('Y-m-d'),':c'=>$sea['id'],':d'=>1));

    }
   }
    $ui->assign('search',$search);

}   

$att = ORM::for_table('agent_attendance')->where('agent_id',$user['id'])->where('date',date('Y-m-d'))->find_one();
$ui->assign('att',$att);
$time = time();
// 5 minutes since last request

function dateDiff($start, $end) {

    $start_ts = strtotime($start);

    $end_ts = strtotime($end);

    $diff = $end_ts - $start_ts;

    return round($diff / 60);

}

$active_time=dateDiff($att['time_in_e'],date('Y-m-d H:i:s'));

if(!empty($_COOKIE['_time'] && ($time - $_COOKIE['_time'] >= 3000))){

$sql = "UPDATE agent_attendance 
       SET idle_time=idle_time+?,hours=hours+?
WHERE date=? AND agent_id=?";
$q = $db->prepare($sql);
$q->execute(array(5,$active_time,date('Y-m-d'),$user['id']));
 
 // log user out
 
 r2(U . 'logout');
 
 }


 $ui->display('account.tpl');

