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



        case 'farmer-gin':
            $type=$routes['2'];
           $name = _post('username');
         //  if ($name != '') {
            $ginner_id=$admin['id'];
               $paginator = Paginator::bootstrap('farmer_payment_schedule', 'ginner_id', $ginner_id );
               $d = ORM::for_table('farmer_payment_schedule')->where('ginner_id', $ginner_id )->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
         
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

           case 'farmer-amcos':
            $type=$routes['2'];
           $name = _post('username');
         //  if ($name != '') {
              $amcos_id=$admin['id'];
               $paginator = Paginator::bootstrap('farmer_payment_schedule');
               $d = ORM::for_table('farmer_payment_schedule')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
         
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
           $ui->display('farmer-amcos.tpl');

           break; 

           case 'amcos-gin':
            $type=$routes['2'];
           $name = _post('username');
         //  if ($name != '') {
            $ginner_id=$admin['ginner_id'];
               $paginator = Paginator::bootstrap('amcos_payment_schedule', 'ginner_id', $ginner_id );
               $d = ORM::for_table('amcos_payment_schedule')->where('ginner_id', $ginner_id )->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
         
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
           $ui->display('amcos-gin.tpl');

           case 'amcos-amcos':
            $type=$routes['2'];
           $name = _post('username');
         //  if ($name != '') {
            $amcos_id=$admin['id'];
               $paginator = Paginator::bootstrap('amcos_payment_schedule', 'amcos_id', $amcos_id );
               $d = ORM::for_table('amcos_payment_schedule')->where('amcos_id', $amcos_id )->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
         
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
           $ui->display('amcos-amcos.tpl');


           break;
        
           case 'system-gin':

           $type=$routes['2'];
           
           $name = _post('username');
         //  if ($name != '') {
           $ginner_id=$admin['id'];
           $paginator = Paginator::bootstrap('system_payment_schedule', 'ginner_id', $ginner_id );
           $d = ORM::for_table('system_payment_schedule')->where('ginner_id', $ginner_id )->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
         
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
           $ui->display('system-gin.tpl');

           break; 
             
             


        case 'add':
     

        $ui->assign('_title', 'Add farmer - ' . $config['CompanyName']);
        $village = ORM::for_table('tbl_villages')->find_many();

        $ui->assign('village', $village);
        $ui->display('farmer-add.tpl');
        break;

     case 'edit':
         
            $ui->assign('_title', 'Edit farmer  - ' . $config['CompanyName']);
            $village = ORM::for_table('tbl_villages')->find_many();
            $id = $routes['2'];
            $d = ORM::for_table('farmer')->find_one($id);
            if ($d) {
                $ui->assign('d', $d);
                $ui->assign('village', $village);
    
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
       
                $id = $routes['2'];
        
                $d = ORM::for_table('farmer')->find_one($id);
                if ($d) {
                    $d->status="on";
                    $d->save();
                    _log($admin['username'] . ' ' . "Activated farmer name ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'farmer/list', 's', "farmer Activated successfully");
                }else{
                    r2(U . 'farmer/list', 'e', $_L['Account_Not_Found']);
                
                }

                break;
   case 'deactivate':
       
                    $id = $routes['2'];
            
                    $d = ORM::for_table('farmer')->find_one($id);
                    if ($d) {
                        $d->status="off";
                        $d->save();
                        _log($admin['username'] . ' ' . "Deactivated farmer name ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'farmer/list', 's', "farmer Deactivated successfully");
                    }else{
                        r2(U . 'farmer/list', 'e', $_L['Account_Not_Found']);
                    
                    }
                    
                    break;
    case 'farmer-add-post':
                $am = ORM::for_table('amcos')->find_one($admin['id']);
                $fullname = _post('fullname');
                $idno=_post('idno');
                $phonenumber = _post('phonenumber');
                $village_id = $am->village_id;
                $msg="";
                if($password != $cpassword){
                    $msg .= 'Passwords does not match'. '<br>';
                }
                $d = ORM::for_table('farmer')->where('phonenumber',$phonenumber)->find_one();
                if($d){
                    $msg .= 'Phonenumber already exists'. '<br>';
                }
                if ($msg=='') {
                    $d = ORM::for_table('farmer')->create();
                    $d->fullname = $fullname;
                    $d->idno = $idno;
                    $d->phonenumber = $phonenumber;
                    $d->code = rand(1231,7879);
                    $d->village_id = $village_id;
                    $d->save();
                    _log($admin['username'] . ' ' . "Added farmer   ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'farmer/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'farmer/add', 'e', $msg);
                }

                break;
         case 'farmer-edit-post':
                   $am = ORM::for_table('amcos')->find_one($admin['id']);
                    $id = _post('id');
                    $fullname = _post('fullname');
                    $phonenumber = _post('phonenumber');
                    $idno=_post('idno');
                    $village_id = $am->village_id;
                
                    $d = ORM::for_table('farmer')->find_one($id);
                 
                    if ($msg == '') {
                        $d->fullname = $fullname;
                        $d->idno = $idno;
                        $d->village_id = $village_id;
                        $d->code=rand(1231,7879);
                        $d->status="off";
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated farmer   ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'farmer/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'farmer/edit', 'e', $msg);
                    }
                    break;
    
    
               


    default:
        echo 'action not defined';
}