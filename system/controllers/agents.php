<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Business Directory-Agents'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'agents');

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
            $paginator = Paginator::bootstrap('agents', 'fullname', '%' . $name . '%');
            $d = ORM::for_table('agents')->where_like('fullname', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            if ($type != '') {
                $paginator = Paginator::bootstrap('agents', 'status', '%' . $type . '%');
                $d = ORM::for_table('agents')->where_like('status', '%' . $type . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            } else {
            $paginator = Paginator::bootstrap('agents');
            $d = ORM::for_table('agents')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            }
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('agents.tpl');

        break;

     case 'add':
     

        $ui->assign('_title', 'Add Agent - ' . $config['CompanyName']);
        $sms = ORM::for_table('sms_group')->find_many();
        $ui->assign('sms', $sms);
        $ui->display('agent-add.tpl');
        break;
    case 'edit':
         
            $ui->assign('_title', 'Edit Agent  - ' . $config['CompanyName']);
            $sms = ORM::for_table('sms_group')->find_many();
            $id = $routes['2'];
            $d = ORM::for_table('agents')->find_one($id);
            if ($d) {
                $ui->assign('d', $d);
                $ui->assign('sms', $sms);
    
                $ui->display('agent-edit.tpl');
            } else {
                r2(U . 'agents/list', 'e', $_L['Account_Not_Found']);
            }
          break;
    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('agents')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted Agent name ".$d['fullname'], 'Admin',$admin['id']);
                r2(U . 'agents/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'agents/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;
    case 'activate':
       
                $id = $routes['2'];
        
                $d = ORM::for_table('agents')->find_one($id);
                if ($d) {
                    $d->status="on";
                    $d->save();
                    _log($admin['username'] . ' ' . "Activated Agent name ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'agents/list', 's', "Agent Activated successfully");
                }else{
                    r2(U . 'agents/list', 'e', $_L['Account_Not_Found']);
                
                }

                break;
   case 'deactivate':
       
                    $id = $routes['2'];
            
                    $d = ORM::for_table('agents')->find_one($id);
                    if ($d) {
                        $d->status="off";
                        $d->save();
                        _log($admin['username'] . ' ' . "Deactivated Agent name ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'agents/list', 's', "Agent Deactivated successfully");
                    }else{
                        r2(U . 'agents/list', 'e', $_L['Account_Not_Found']);
                    
                    }
                    
                    break;
    case 'agent-add-post':
        
                $fullname = _post('fullname');
                $username = _post('username');
                $password = _post('password');
                $cpassword = _post('cpassword');
                $phonenumber = _post('phonenumber');
                $email = _post('email');
                $sms_group_id = _post('sms_group_id');
                $msg="";
                if($password != $cpassword){
                    $msg .= 'Passwords does not match'. '<br>';
                }
                $d = ORM::for_table('agents')->where('username',$username)->find_one();
                if($d){
                    $msg .= 'Username already exists'. '<br>';
                }
                if ($msg=='') {
               
                    $d = ORM::for_table('agents')->create();
                    $d->fullname = $fullname;
                    $d->username = $username;
                    $d->password = Password::_crypt($password);
                    $d->phonenumber = $phonenumber;
                    $d->email = $email;
                    $d->sms_group_id = $sms_group_id;
                    $d->save();
                    _log($admin['username'] . ' ' . "Added agent   ".$d['fullname'], 'Admin',$admin['id']);
                    r2(U . 'agents/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'agents/add', 'e', $msg);
                }
                break;
         case 'agent-edit-post':
       
                    $id = _post('id');
                    $fullname = _post('fullname');
                    $username = _post('username');
                    $password = _post('password');
                    $phonenumber = _post('phonenumber');
                    $email = _post('email');
                    $sms_group_id = _post('sms_group_id');
                
                    $d = ORM::for_table('agents')->find_one($id);
                 
                    if($password != $cpassword){
                        $msg .= 'Passwords does not match'. '<br>';
                    }
            
                    if ($msg == '') {
                       
                      
                        $d->fullname = $fullname;
                        $d->username = $username;
                        if($password !=""){
                            $d->password = Password::_crypt($password);
                        }
                        $d->phonenumber = $phonenumber;
                        $d->email = $email;
                        $d->sms_group_id = $sms_group_id;
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated agent   ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'agents/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'agents/edit', 'e', $msg);
                    }
                    break;
    
    
               


    default:
        echo 'action not defined';
}