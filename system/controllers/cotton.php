<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'cottons'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'cotton');

$action = $routes['1'];
$admin = Admin::_info();
$ui->assign('_admin', $admin);



use PEAR2\Net\RouterOS;

require_once 'system/autoload/PEAR2/Autoload.php';

switch ($action) {

    //list
    case 'list':
         $type=$routes['2'];
        $name = _post('username');
        if ($name != '') {
            $paginator = Paginator::bootstrap('cotton_collection', 'village_id', '%' . $name . '%');
            $d = ORM::for_table('cotton_collection')->where_like('village_id', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            if ($type != '') {
                $paginator = Paginator::bootstrap('cotton_collection', 'village_id', '%' . $type . '%');
                $d = ORM::for_table('cotton_collection')->where_like('village_id', '%' . $type . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            } else {
            $paginator = Paginator::bootstrap('cotton_collection');
            $d = ORM::for_table('cotton_collection')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            }
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('cotton.tpl');

        break;
    case 'list-board':
            $type=$routes['2'];
           $name = _post('username');
           if ($name != '') {
               $paginator = Paginator::bootstrap('cotton_collection');
               $d = ORM::for_table('cotton_collection')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
           } else {
               $paginator = Paginator::bootstrap('cotton_collection');
               $d = ORM::for_table('cotton_collection')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();    
           }
   
           $ui->assign('d', $d);
           $ui->assign('paginator', $paginator);
           $ui->display('cotton-board.tpl');
   
        break;
   

     case 'collect':
     

        $ui->assign('_title', 'Add cotton - ' . $config['CompanyName']);
         
        $d = ORM::for_table('amcos')->find_one($admin['amcos_id']);
        
        $farmer = ORM::for_table('farmer')->where('status','on')->where('village_id',$d->village_id)->find_many();

        $ui->assign('farmer', $farmer);
        
        $ui->display('cotton-collection.tpl');
        break;

     case 'edit':
         
            $ui->assign('_title', 'Edit cotton  - ' . $config['CompanyName']);
              
            $d = ORM::for_table('amcos')->find_one($admin['amcos_id']);
            
            $farmer = ORM::for_table('farmer')->where('status','on')->where('village_id',$d->village_id)->find_many();

            $ui->assign('farmer', $farmer);
        
            $id = $routes['2'];
            $d = ORM::for_table('cotton_collection')->find_one($id);
            if ($d) {
                
                $ui->assign('d', $d);
                $ui->assign('village', $village);
    
                $ui->display('cotton-collection-edit.tpl');
            } else {
                r2(U . 'cotton/list', 'e', $_L['Account_Not_Found']);
            }

          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('cotton_collection')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted cotton collection record", 'Admin',$admin['id']);
                r2(U . 'cotton/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'cotton/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'verify':
       
                $id = $routes['2'];
                $amcos = ORM::for_table('amcos')->find_one($admin['amcos_id']);
                $d = ORM::for_table('cotton_collection')->find_one($id);
                if ($d) {
                   // $d->status=0;
                    $d->save();
                    //send sms
                    $farmer = ORM::for_table('farmer')->find_one($d->farmer_id);
                    $message=Message::_filter("farmercottoncollection", $farmer->fullname,$amcos->fullname,"","","","",$d->qty);
                    SendSMS::_sendSMS($_c, $farmer->phonenumber, $message);

                    _log($admin['username'] . ' ' . "Verification OTP sent to farmer", 'Admin',$admin['id']);
                    r2(U . 'cotton/list', 's', "Verification OTP sent to farmer successfully");
                }else{
                    r2(U . 'cotton/list', 'e', $_L['Account_Not_Found']);
                
                }

                break;
  
          case 'approve_collection':
       
                    $id = _post('id');
                    $code = _post('code');
            
                    $d = ORM::for_table('cotton_collection')->where('code',$code)->find_one($id);
                    if ($d) {
                        $d->status=2;
                        $d->save();
                         //farmer details obtained
                    $farmer = ORM::for_table('farmer')->find_one($d->farmer_id);
                    //$message=Message::_filter("farmercottoncollection", $farmer->fullname,$amcos_name,"","","","",$qty);
                   // $message="Shukran, tumepokea pamba kilo ".$qty.". Thibitisha kwa  kutumia OTP:".$code;
                   $rates=ORM::for_table('tbl_ratescommissions')->find_one();
                    $message="Umekabidhi ".$d->qty."kg za pamba kwa Amcos yenye thamani ya ".($rates->min_rate*$d->qty)." kwa bei elekezi. Malipo ya pamba yatafanyika baada ya pamba kuuzwa kwa bei halisi ya soko ndani ya siku 7"; 
                  
                    SendSMS::_sendSMS($_c, $farmer->phonenumber, $message); 
                        _log($admin['username'] . ' ' . "Confirmed collection ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'cotton/list', 's', "Cotton collected successfully");
                    }else{
                        r2(U . 'cotton/confirm_collection/'.$id, 'e', "Wrong code");
                    
                    }
                  
           case 'deactivate':
       
                    $id = $routes['2'];
             
                    $d = ORM::for_table('cotton')->find_one($id);
                    if ($d) {
                        $d->status="off";
                        $d->save();
                        _log($admin['username'] . ' ' . "Deactivated cotton name ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'cotton/list', 's', "cotton Deactivated successfully");
                    }else{
                        r2(U . 'cotton/list', 'e', $_L['Account_Not_Found']);
                    
                    }
                    
                    break;
        case 'cotton-add-post':
               $d = ORM::for_table('amcos')->find_one($admin['amcos_id']);
                $qty=_post('qty');
                $farmer_id = _post('farmer_id');
                $village_id = $d->village_id;
                $amcos_id=$admin['amcos_id'];
                $amcos_name=$d->fullname;

               // if ($msg=='') {

                    $d = ORM::for_table('cotton_collection')->create();
                    $code=rand(1231,7879);
                    $d->farmer_id = $farmer_id;
                    $d->village_id = $village_id;
                    $d->amcos_id = $amcos_id;
                    $d->status = 0;
                    $d->qty = $qty;
                    $d->code = $code;
                    $d->save();

                    //farmer details obtained
                    $farmer = ORM::for_table('farmer')->find_one($farmer_id);
                    //$message=Message::_filter("farmercottoncollection", $farmer->fullname,$amcos_name,"","","","",$qty);
                   // $message="Shukran, tumepokea pamba kilo ".$qty.". Thibitisha kwa  kutumia OTP:".$code;
                   $rates=ORM::for_table('tbl_ratescommissions')->find_one();
                    $message="Umekabidhi ".$qty."kg za pamba kwa Amcos yenye thamani ya ".($rates->min_rate*$qty)." kwa bei elekezi.Tafadhari mpatie wakala namba ya Nenosiri ya wakati mmoja kudhibitisha ukabithi wako. Namba ni ".$code; 
                  
                    SendSMS::_sendSMS($_c, $farmer->phonenumber, $message);

               //send sms

                    _log($admin['username'] . ' ' . "Added cotton   ", 'Admin',$admin['id']);
                    r2(U . 'cotton/confirm_collection/'.$d->id, 's', " ".$_L['Created_Successfully']);

               // } else {
                  //  r2(U . 'cotton/add', 'e', $msg);
               // }

                break;

         case 'cotton-edit-post':
       
                    $id = _post('id');
                    $d = ORM::for_table('amcos')->find_one($admin['amcos_id']);
                    $qty=_post('qty');
                    $farmer_id = _post('farmer_id');
                    $village_id = $d->village_id;
                    $amcos_id=$admin['id'];
                    $amcos_name=$d->fullname;
                
                    $d = ORM::for_table('cotton_collection')->find_one($id);
                 
                    if ($d) {
                        $code=rand(1231,7879);
                        $d->farmer_id = $farmer_id;
                        $d->village_id = $village_id;
                        $d->amcos_id = $amcos_id;
                        $d->status = 0;
                        $d->code = $code;
                        $d->qty = $qty;
                        $d->save();
    
                        //farmer details obtained
                        $farmer = ORM::for_table('farmer')->find_one($farmer_id);
                       // $message=Message::_filter("farmercottoncollection", $farmer->fullname,$amcos_name,"","","","",$qty);
                       $rates=ORM::for_table('tbl_ratescommissions')->find_one();
                       $message="Umekabidhi ".$qty."kg za pamba kwa Amcos yenye thamani ya ".($rates->min_rate*$qty)." kwa bei elekezi.Tafadhari mpatie wakala namba ya Nenosiri ya wakati mmoja kudhibitisha usajili wako. Namba ni ".$code; 
                     
                       SendSMS::_sendSMS($_c, $farmer->phonenumber, $message);
    
                        _log($admin['username'] . ' ' . "Updated cotton   ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'cotton/confirm_collection/'.$id, 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'cotton/edit/'.$id, 'e', $msg);
                    }
                    break;
            case 'confirm_collection':
                        $id=$routes['2'];

                        $ui->assign('id', $id);
                $ui->display('confirm-collection.tpl');
                        break;
            
            
                       
    
               


    default:
        echo 'action not defined';
}