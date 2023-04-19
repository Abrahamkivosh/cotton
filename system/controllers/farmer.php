<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Farmers'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'farmer');

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
            $paginator = Paginator::bootstrap('farmer', 'phonenumber', '%' . $name . '%');
             $d = ORM::for_table('farmer')->where_like('phonenumber', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
         
             if(count($d)>0){

          }else{
            $paginator = Paginator::bootstrap('farmer', 'firstname', '%' . $name . '%');
            $d = ORM::for_table('farmer')->where_like('firstname', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        
          }
        } else {
           
               
            $paginator = Paginator::bootstrap('farmer');
            $d = ORM::for_table('farmer')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            }
        

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('farmer.tpl');


        break;
       //list
    case 'list-board':
        $type=$routes['2'];
       $name = _post('username');
       if ($name != '') {
           $paginator = Paginator::bootstrap('farmer', 'phonenumber', '%' . $name . '%');
           $d = ORM::for_table('farmer')->where_like('phonenumber', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
       } else {
          
           $paginator = Paginator::bootstrap('farmer');
           $d = ORM::for_table('farmer')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
           }
       

       $ui->assign('d', $d);
       $ui->assign('paginator', $paginator);
       $ui->display('farmer-board.tpl');


       break;  

        case 'list-gin':
            $type=$routes['2'];
           $name = _post('username');
         //  if ($name != '') {
            $ginner_id=$admin['id'];
               $paginator = Paginator::bootstrap('farmer_payment_schedule', 'ginner_id', '%' . $ginner_id . '%');
               $d = ORM::for_table('farmer_payment_schedule')->where('ginner_id', '%' . $ginner_id . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
         
         /*   } else {
               if ($type != '') {
                   $paginator = Paginator::bootstrap('farmer', 'status', '%' . $type . '%');
                   $d = ORM::for_table('farmer')->where_like('status', '%' . $type . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
               } else {
                
               $paginator = Paginator::bootstrap('order');
               $d = ORM::for_table('order')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
               }
           }
           */

           $ui->assign('d', $d);
           $ui->assign('paginator', $paginator);
           $ui->display('farmer-gin.tpl');
   
   
           break; 

     case 'add':
     

        $ui->assign('_title', 'Add farmer - ' . $config['CompanyName']);
        $am = ORM::for_table('amcos')->find_one($admin['amcos_id']);
        $sub_village = ORM::for_table('tbl_sub_villages')->where('village_id',$am->village_id)->find_many();

        $ui->assign('sub_village', $sub_village);
        $ui->display('farmer-add.tpl');
        break;

     case 'edit':
         
            $ui->assign('_title', 'Edit farmer  - ' . $config['CompanyName']);
            
            $sub_village = ORM::for_table('tbl_sub_villages')->find_many();
            $id = $routes['2'];
            $d = ORM::for_table('farmer')->find_one($id);
            $am = ORM::for_table('amcos')->find_one($admin['amcos_id']);
            $sub_village = ORM::for_table('tbl_sub_villages')->where('village_id',$am->village_id)->find_many();
            if ($d) {
                $ui->assign('d', $d);
                $ui->assign('sub_village', $sub_village);
    
                $ui->display('farmer-edit.tpl');
            } else {
                r2(U . 'farmer/list', 'e', $_L['Account_Not_Found']);
            }

          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('farmer')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted farmer name ".$d['fullname'], 'Admin',$admin['id']);
                r2(U . 'farmer/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'farmer/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'activate':
       
                $id = _post('id');
                $code = _post('code');
        
                $d = ORM::for_table('farmer')->where('code',$code)->find_one($id);
                if ($d) {
                    $d->status="on";
                    $d->save();
                    _log($admin['username'] . ' ' . "Activated farmer name ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'farmer/list', 's', "farmer Activated successfully");
                }else{
                    r2(U . 'farmer/confirm_register/'.$id, 'e', "Wrong code");
                
                }

                break;
   case 'deactivate':
                    $id = $routes['2'];
        
                    $d = ORM::for_table('farmer')->find_one($id);
                    if ($d) {
                        $d->status="off";
                        $d->save();


                        $message=$firstname." ".$middlename." ".$lastname.",Umefanikiwa kusajiliwa kwenye mfumo wa PambaApp namba yako ya usajili ni ".$d->phonenumber.". Tafadhari tumia namba hiyo kufanya miamala yako. ";
                   
                        SendSMS::_sendSMS($_c, $d->phonenumber, $message);
                        _log($admin['username'] . ' ' . "Deactivated farmer name ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'farmer/list', 's', "farmer Deactivated successfully");
                    }else{
                        r2(U . 'farmer/list', 'e', $_L['Account_Not_Found']);
                    
                    }
                    
                    break;
         case 'farmer-add-post':
                $am = ORM::for_table('amcos')->find_one($admin['amcos_id']);
                $firstname = _post('firstname');
                $middlename = _post('middlename');
                $lastname = _post('lastname');
                $gender = _post('gender');
                $acre = _post('acre');
                $sub_village_id=_post('sub_village_id');
                $idno=_post('idno');
                $phonenumber = _post('phonenumber');
                $village_id = $am->village_id;
                if($phonenumber!=$phonenumber1){
                    $msg="Phonenumber do not match";
                }
                $msg="";
                if($password != $cpassword){
                    $msg .= 'Passwords does not match'. '<br>';
                }
                $d = ORM::for_table('farmer')->where('phonenumber',$phonenumber)->find_one();
                if($d){
                    $msg .= 'Phonenumber already exists'. '<br>';
                }
                if ($msg=='') {
                    $code=rand(1231,7879);
                    $d = ORM::for_table('farmer')->create();
                    $d->firstname = $firstname;
                    $d->middlename = $middlename;
                    $d->lastname = $lastname;
                    $d->gender = $gender;
                    $d->sub_village_id = $sub_village_id;
                    $d->idno = $idno;
                    $d->acre = $acre;
                    $d->status="off";
                    $d->phonenumber = $phonenumber;
                    $phonenumber1 = _post('phonenumber1');
                    $d->code = $code;
                    $d->village_id = $village_id;
                    $d->created_at = date('Y-m-d H:i:s');
                    $d->amcos_id = $admin['amcos_id'];
                    $d->user_id = $admin['id'];

                    $d->save();
                    //$message=Message::_filter("newfarmer", $fullname);
                    $message=$firstname.", unasajiliwa kwenye mfumo wa PambaApp Tafadhari mpatie wakala namba ya Nenosiri ya wakati mmoja kudhibitisha usajili wako. Namba ni ".$code;
                   
                    SendSMS::_sendSMS($_c, $phonenumber, $message);
                    
                    _log($admin['username'] . ' ' . "Added farmer   ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'farmer/confirm_register/'.$d->id, 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'farmer/add', 'e', $msg);
                }

                break;
         case 'farmer-edit-post':
                   $am = ORM::for_table('amcos')->find_one($admin['amcos_id']);
                    $id = _post('id');
                    $firstname = _post('firstname');
                    $middlename = _post('middlename');
                    $lastname = _post('lastname');
                    $gender = _post('gender');
                    $acre = _post('acre');
                    $sub_village_id=_post('sub_village_id');
                    $phonenumber = _post('phonenumber');
                    $phonenumber1 = _post('phonenumber1');
                    $idno=_post('idno');
                    $village_id = $am->village_id;

                    $d = ORM::for_table('farmer')->find_one($id);
                    $msg="";
                    if($phonenumber!=$phonenumber1){
                        $msg="Phonenumber do not match";
                    }
            
                    if ($msg == '') {
                        $code=rand(1231,7879);
                        $d->firstname = $firstname;
                        $d->middlename = $middlename;
                        $d->lastname = $lastname;
                        $d->gender = $gender;
                        $d->sub_village_id = $sub_village_id;
                        $d->acre = $acre;
                        $d->idno = $idno;
                        $d->phonenumber = $phonenumber;
                        $d->village_id = $village_id;
                        $d->code=$code;
                        $d->status="off";
                        $d->amcos_id = $admin['amcos_id'];
                        $d->user_id = $admin['id'];
                        $d->save();

                       // $message=Message::_filter("newfarmer", $fullname);
                       $message=$firstname.", unasajiliwa kwenye mfumo wa PambaApp Tafadhari mpatie wakala namba ya Nenosiri ya wakati mmoja kudhibitisha usajili wako. Namba ni ".$code;
                   
                       SendSMS::_sendSMS($_c, $phonenumber, $message);
                    
                        _log($admin['username'] . ' ' . "Updated farmer   ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'farmer/confirm_register/'.$d->id, 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'farmer/edit', 'e', $msg);
                    }
                    break;
            case 'confirm_register':
                $id=$routes['2'];

                $ui->assign('id', $id);
                $ui->display('confirm-register.tpl');
                break;
    
    
               


    default:
        echo 'action not defined';
}