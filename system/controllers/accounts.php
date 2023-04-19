<?php
/**
* PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt

**/
_auth();
$ui->assign('_title', $_L['My_Account'].'- '. $config['CompanyName']);
$ui->assign('_system_menu', 'accounts');

$action = $routes['1'];
$user = User::_info();
$ui->assign('_user', $user);

use PEAR2\Net\RouterOS;
require_once 'system/autoload/PEAR2/Autoload.php';

switch ($action) {
	
    case 'change-password':
        $ui->display('user-change-password.tpl');
        break;

    case 'change-password-post':
       $password = _post('password');
        if($password != ''){
            $d = ORM::for_table('agents')->where('username',$user['username'])->find_one();
            if($d){
				
                 $d_pass = $d['password'];
				$npass = _post('npass');
                $cnpass = _post('cnpass');
				
                if(Password::_verify($password,$d_pass) == true){
					
					if(!Validator::Length($npass,15,2)){
                        r2(U.'accounts/change-password','e','New Password must be 3 to 14 character');
                    }
                    if($npass != $cnpass){
                        r2(U.'accounts/change-password','e','Both Password should be same');
                    }

					
						$d->password =Password::_crypt($password);
						$d->save();
						
						_msglog('s',$_L['Password_Changed_Successfully']);
						_log('['.$user['username'].']: Password changed successfully','User',$user['id']);
						
						r2(U.'login');
					
					
                }else{
                    r2(U.'home','e',$_L['Incorrect_Current_Password']);
                }
            }else{
                r2(U.'home','e',$_L['Incorrect_Current_Password']);
            }
        }else{
            r2(U.'home','e',$_L['Incorrect_Current_Password']);
        }
        break;

    case 'profile':
		
        $id  = $_SESSION['uid'];
        $d = ORM::for_table('agents')->find_one($id);
        if($d){
            $ui->assign('d',$d);
            $ui->display('user-profile.tpl');
        }else{
            r2(U . 'accounts/users', 'e', $_L['Account_Not_Found']);
        }
        break;

    case 'edit-profile-post':
        $fullname = _post('fullname');
        $address = _post('address');
    //    $phonenumber = _post('phonenumber');

        $msg = '';

        $id  = $_SESSION['uid'];
       // $id = _post('id');
        $d = ORM::for_table('agents')->find_one($id);
        if($d){
        }else{
            $msg .= $_L['Data_Not_Found']. '<br>';
        }


        if($msg == ''){
            $d->fullname = $fullname;
			$d->email = $address;
			//$d->phonenumber = $phonenumber;
            $d->save();
			
			_log('['.$user['username'].']: '.$_L['User_Updated_Successfully'],'User',$user['id']);
            r2(U . 'home', 's', $_L['User_Updated_Successfully']);

        }else{
            r2(U . 'home', 'e', $msg);
        }
        break;
		
    default:
        echo 'action not defined';
}