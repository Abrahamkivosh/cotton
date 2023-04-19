<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'ginner users'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'ginner');

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
            $paginator = Paginator::bootstrap('ginner', 'name', '%' . $name . '%');
            $d = ORM::for_table('ginner')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            if ($type != '') {
                $paginator = Paginator::bootstrap('ginner', 'status', '%' . $type . '%');
                $d = ORM::for_table('ginner')->where_like('status', '%' . $type . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            } else {
            $paginator = Paginator::bootstrap('ginner');
            $d = ORM::for_table('ginner')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            }
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('ginner.tpl');

        break;

     case 'add':
     

        $ui->assign('_title', 'Add ginner - ' . $config['CompanyName']);
      
        $ui->display('ginner-add.tpl');
        break;

     case 'edit':
             $id = $routes['2'];
            $ui->assign('_title', 'Edit ginner  - ' . $config['CompanyName']);
            $ginner_user = ORM::for_table('tbl_ginner_users')->where('ginner_id',$id)->find_many();
            $d = ORM::for_table('ginner')->find_one($id);
            if ($d) {
                $ui->assign('d', $d);
                $ui->assign('ginner_user', $ginner_user);

                $ui->display('ginner-edit.tpl');
            } else {
                r2(U . 'ginner/list', 'e', $_L['Account_Not_Found']);
            }

          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('ginner')->find_one($id);
            if ($d) {
               
                $d->delete();
                $ginner_user = ORM::for_table('tbl_ginner_users')->where('ginner_id',$id)->find_many();
                foreach($ginner_user as $ck){
                 $cv=ORM::for_table('tbl_ginner_users')->find_one($ck["id"]);
                 $cv->delete();
                }
                _log($admin['username'] . ' ' . "Deleted ginner name ".$d['fullname'], 'Admin',$admin['id']);
                r2(U . 'ginner/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'ginner/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'activate':
       
                $id = $routes['2'];
        
                $d = ORM::for_table('ginner')->find_one($id);
                if ($d) {
                    $d->status="on";
                    $d->save();
                    _log($admin['username'] . ' ' . "Activated ginner name ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'ginner/list', 's', "ginner Activated successfully");
                }else{
                    r2(U . 'ginner/list', 'e', $_L['Account_Not_Found']);
                
                }

                break;
   case 'deactivate':
       
                    $id = $routes['2'];
            
                    $d = ORM::for_table('ginner')->find_one($id);
                    if ($d) {
                        $d->status="off";
                        $d->save();
                        _log($admin['username'] . ' ' . "Deactivated ginner name ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'ginner/list', 's', "ginner Deactivated successfully");
                    }else{
                        r2(U . 'ginner/list', 'e', $_L['Account_Not_Found']);
                    
                    }
                    
                    break;

    case 'ginner-add-post':
        
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $phonenumberv = $_POST['phonenumberv'];
                $role = $_POST['role'];

                $name = _post('name');
                $address = _post('address');
                $phonenumber = _post('phonenumber');
                $email = _post('email');
                $location = _post('location');
                $paybill = _post('paybill');
                $paybill_url = _post('paybill_url');
                $msg="";
             
                $d = ORM::for_table('ginner')->where('name',$name)->find_one();
                if($d){
                    $msg .= 'Username already exists'. '<br>';
                }
                if ($msg=='') {
               
                    $d = ORM::for_table('ginner')->create();
                    $d->name = $name;
                    $d->address = $address;
                    $d->phonenumber = $phonenumber;
                    $d->email = $email;
                    $d->location = $location;
                    $d->paybill = $paybill;
                    $d->paybill_url = $paybill_url;
                    $d->save();

                   
                    for($i=0;$i<count($fullname);$i++){
                        if($fullname[$i]!=""){
                        $de = ORM::for_table('tbl_ginner_users')->create();
                        $de->ginner_id = $d->id;
                        $de->fullname = $fullname[$i];
                        $de->username = $username[$i];
                        $de->phonenumber = $phonenumberv[$i];
                        $de->role = $role[$i];
                        $de->password = Password::_crypt($password[$i]);
                        $de->save();
                        }
                    }
                    
                    
                    _log($admin['username'] . ' ' . "Added ginner   ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'ginner/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'ginner/add', 'e', $msg);
                }
                break;
         case 'ginner-edit-post':
       
                    $id = _post('id');
                    $idv = _post('idv');
                    $name = _post('name');
                    $address = _post('address');
                   

                    $fullname = $_POST['fullname'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $phonenumberv = $_POST['phonenumberv'];
                    $role = $_POST['role'];

                    $phonenumber = _post('phonenumber');
                    $email = _post('email');
                    $location = _post('location');
                    $paybill = _post('paybill');
                    $paybill_url = _post('paybill_url');
                
                    $d = ORM::for_table('ginner')->find_one($id);
                
                    if ($msg == '') {
                        $d->name = $name;
                        $d->address = $address;
                        $d->phonenumber = $phonenumber;
                        $d->email = $email;
                        $d->location = $location;
                        $d->paybill = $paybill;
                        $d->paybill_url = $paybill_url;
                        $d->save();

                        for($i=0;$i<count($fullname);$i++){
                            $check_u = ORM::for_table('tbl_ginner_users')->where('ginner_id',$d->id)->find_one($idv[$i]);
                            if($check_u){
                                $de = ORM::for_table('tbl_ginner_users')->find_one($check_u->id);
                                $de->fullname = $fullname[$i];
                                $de->username = $username[$i];
                                $de->role = $role[$i];
                                $de->password = Password::_crypt($password[$i]);
                                $de->save();
                            }else{
                            $de = ORM::for_table('amcos_users')->create();
                            $de->ginner_id = $d->id;
                            $de->fullname = $fullname[$i];
                            $de->username = $username[$i];
                            $de->role = $role[$i];
                            $de->password = Password::_crypt($password[$i]);
                            $de->save();
                            }
                        }
                        _log($admin['username'] . ' ' . "Updated ginner   ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'ginner/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'ginner/edit', 'e', $msg);
                    }
                    break;
    
    
               


    default:
        echo 'action not defined';
}