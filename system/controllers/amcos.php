<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Amcos users'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'amcos');

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
            $paginator = Paginator::bootstrap('amcos', 'name', '%' . $name . '%');
            $d = ORM::for_table('amcos')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            if ($type != '') {
                $paginator = Paginator::bootstrap('amcos', 'status', '%' . $type . '%');
                $d = ORM::for_table('amcos')->where_like('status', '%' . $type . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            } else {
            $paginator = Paginator::bootstrap('amcos');
            $d = ORM::for_table('amcos')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            }
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('amcos.tpl');

        break;

     case 'add':
    
        $ui->assign('_title', 'Add Amcos - ' . $config['CompanyName']);
        $village = ORM::for_table('tbl_villages')->find_many();
        $ui->assign('village', $village);
        $ui->display('amcos-add.tpl');
        break;

     case 'edit':
        $id = $routes['2'];
            $ui->assign('_title', 'Edit amcos  - ' . $config['CompanyName']);
            $village = ORM::for_table('tbl_villages')->find_many();
            $amcos_user = ORM::for_table('amcos_users')->where('amcos_id',$id)->find_many();
            
            $d = ORM::for_table('amcos')->find_one($id);
            if ($d) {
                $ui->assign('amcos_user', $amcos_user);
                $ui->assign('d', $d);
                $ui->assign('village', $village);
                $ui->display('amcos-edit.tpl');
            } else {
                r2(U . 'amcos/list', 'e', $_L['Account_Not_Found']);
            }

          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('amcos')->find_one($id);
            if ($d) {
                $amcos_user = ORM::for_table('amcos_users')->where('amcos_id',$id)->find_many();
                foreach($amcos_user as $ck){
                 $cv=ORM::for_table('amcos_users')->find_one($ck["id"]);
                 $cv->delete();
                }

                $d->delete();
                _log($admin['username'] . ' ' . "Deleted amcos name ".$d['fullname'], 'Admin',$admin['id']);
                r2(U . 'amcos/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'amcos/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'activate':
       
                $id = $routes['2'];
        
                $d = ORM::for_table('amcos')->find_one($id);
                if ($d) {
                    $d->status="on";
                    $d->save();
                    _log($admin['username'] . ' ' . "Activated amcos name ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'amcos/list', 's', "amcos Activated successfully");
                }else{
                    r2(U . 'amcos/list', 'e', $_L['Account_Not_Found']);
                
                }

                break;
   case 'deactivate':
       
                    $id = $routes['2'];
            
                    $d = ORM::for_table('amcos')->find_one($id);
                    if ($d) {
                        $d->status="off";
                        $d->save();
                        _log($admin['username'] . ' ' . "Deactivated amcos name ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'amcos/list', 's', "amcos Deactivated successfully");
                    }else{
                        r2(U . 'amcos/list', 'e', $_L['Account_Not_Found']);
                    
                    }
                    
                    break;
    case 'amcos-add-post':
        
                
                $name = _post('name');
                $address = _post('address');
                $phonenumber = _post('phonenumber');
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $phonenumberv = $_POST['phonenumberv'];
                //$email = _post('email');
                $village_id = _post('village_id');
                $msg="";
            
                $d = ORM::for_table('amcos')->where('name',$name)->find_one();
                if($d){
                    $msg .= 'Amcos name already exists'. '<br>';
                }
                
             
                if ($msg=='') {
               
                    $d = ORM::for_table('amcos')->create();
                    $d->name = $name;
                    $d->address = $address;
                    $d->phonenumber = $phonenumber;
                    $d->village_id = $village_id;
                    $d->save();
                    
                    for($i=0;$i<=count($fullname);$i++){
                        if($fullname[$i]!=""){
                        $de = ORM::for_table('amcos_users')->create();
                        $de->amcos_id = $d->id;
                        $de->fullname = $fullname[$i];
                        $de->username = $username[$i];
                        $de->phonenumber = $phonenumberv[$i];
                        $de->password = Password::_crypt($password[$i]);
                        $de->save();

                        SendSMS::_sendSMS($_c, $phonenumberv[$i], "Karibu kwenye mfumo wa PampaApp tumia jina la utambulisho ".$username[$i]." na nanesiri ".$password[$i]." kuingia.");
                        }
                    }
                    _log($admin['username'] . ' ' . "Added amcos   ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'amcos/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'amcos/add', 'e', $msg);
                }
                break;
         case 'amcos-edit-post':
       
                    $id = _post('id');
                    $fullname = $_POST['fullname'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $phonenumberv = $_POST['phonenumberv'];
                    $idv=$_POST['idv'];
                 
                    $phonenumber = _post('phonenumber');
            
                    $village_id = _post('village_id');
                    $name = _post('name');
                    $address = _post('address');

                    $d = ORM::for_table('amcos')->find_one($id);

                    if ($msg == '') {
                    $d->name = $name;
                    $d->address = $address;
                    $d->phonenumber = $phonenumber;
                    $d->village_id = $village_id;
                    $d->save();
                    for($i=0;$i<count($fullname);$i++){
                        $check_u = ORM::for_table('amcos_users')->find_one($idv);
                        if($check_u){
                            $de = ORM::for_table('amcos_users')->find_one($check_u->id);
                            $de->fullname = $fullname[$i];
                            $de->username = $username[$i];
                            $de->phonenumber = $phonenumberv[$i];
                            $de->password = Password::_crypt($password[$i]);
                            $de->save();
                            SendSMS::_sendSMS($_c, $phonenumberv[$i], "Karibu kwenye mfumo wa PampaApp tumia jina la utambulisho ".$username[$i]." na nenosiri ".$password[$i]." kuingia.");
                        }else{
                        $de = ORM::for_table('amcos_users')->create();
                        $de->amcos_id = $d->id;
                        $de->fullname = $fullname[$i];
                        $de->username = $username[$i];
                        $de->phonenumber = $phonenumberv[$i];
                        $de->password = Password::_crypt($password[$i]);
                        $de->save();
                        }
                    }
                        _log($admin['username'] . ' ' . "Updated amcos   ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'amcos/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'amcos/edit', 'e', $msg);
                    }
                    break;
    
    
               


    default:
        echo 'action not defined';
}