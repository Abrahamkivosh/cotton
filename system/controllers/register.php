<?php
/**
* PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)
* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*
* created by iBNuX
**/

if (isset($routes['1'])) {
    $do = $routes['1'];
} else {
    $do = 'register-display';
}
use PEAR2\Net\RouterOS;
require_once 'system/autoload/PEAR2/Autoload.php';

switch($do){
    case 'post':
		$username = strtolower(str_replace(' ', '',_post('username')));
        $password = _post('password');
		$phonenumber = _post('phone');
        $str = ltrim($phonenumber, '0');
        $str = ltrim($str, '254');
        $str = ltrim($str, '+254');
        $str = ltrim($str, '2540');
        $str = ltrim($str, '254254');
        $str = ltrim($str, '254+254');
        $to = '254' . $str;
			$msg = '';

			if(Validator::Length($username,35,2) == false){
				$msg .= 'Username should be between 3 to 55 characters'. '<br>';
			}
			if(!Validator::Length($password,35,2)){
				$msg .= 'Password should be between 3 to 35 characters'. '<br>';
			}
			$d = ORM::for_table('tbl_customers')->where('username',$username)->find_one();
			if($d){
                $msg .= $_L['account_already_exist']. '<br>';
			}
        $d = ORM::for_table('tbl_customers')->where('phonenumber',$to)->find_one();
        if($d){
            $msg .= $_L['account_already_exist']. '<br>';
        }

			if($msg == ''){

				$d = ORM::for_table('tbl_customers')->create();
				$d->username = $username;
				$d->password = $password;
				$d->phonenumber = $to;
                $d->approved=1;
                $d->code=rand(1231,7879);;
                $d->save();
                $message="Dear Customer, Your verification code OTP is:".$code;
                SendSMS::_sendSMS($_c,$to,$message);
                $msg="Verification code has been sent to ".$to;
                $ui->assign('msg', $msg);
                $ui->assign('id', $d->id);
                $ui->display('verifyn.tpl');

			}else{
				$ui->assign('username', $username);
				$ui->assign('phonenumber', $phonenumber);
				$ui->assign('notify','<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span>
				</button>
				<div>'.$msg.'</div></div>');
				$ui->display('register.tpl');
            }


        break;

    case 'resend':
            $id=$routes[2];
    
            $d = ORM::for_table('tbl_customers')->find_one($id);
            if($d){
                $code=rand(1231,7879);
                $d->code=$code;
                $d->save();
                $ui->assign('id', $d->id);
                $message="Dear Customer, Your verification code OTP is:".$code;
                SendSMS::_sendSMS($_c,$d->phonenumber,$message);
                $msg="Verification code has been re sent to ".$d->phonenumber;
                $ui->assign('msg', $msg);
                $ui->display('verifyn.tpl');
            }else{
                r2(U . 'register', 'e', "Kindly request new code");
            }
            break;
    case 'confirm_number':
        $to=_post('code');

        $d = ORM::for_table('tbl_customers')->where('code',$to)->find_one();
        if($d){
            $d->approved=1;
            $d->code=null;
            $d->save();
            $message="Dear Customer, Your Account has been created successfully. You username is: ".$d['username'];
            SendSMS::_sendSMS($_c,$d['phonenumber'],$message);

            r2(U . 'login', 's', $_L['Register_Success']);
        }else{
            r2(U . 'register/verify_number', 'e', "Code not Correct input correct Code");
        }

        break;
    case 'verify_number':
        $ui->display('verifyn.tpl');
        break;
    case 'change-pin':
        $ui->display('forgotpin.tpl');
        break;
    case 'change-username':
        $ui->display('forgotusername.tpl');
        break;
    case 'forgot-pin-post':
        $to=_post('phone');
        $str = ltrim($to, '0');
        $str = ltrim($str, '251');
        $str = ltrim($str, '+251');
        $str = ltrim($str, '2510');
        $str = ltrim($str, '251251');
        $str = ltrim($str, '251+251');
        $to = '251' . $str;
        $d = ORM::for_table('agents')->where('phonenumber',$to)->find_one();
        if($d){
            $code=rand(1231,7879);
            $d->code=$code;
            $d->save();
            $message="Dear Customer, Your verification code OTP is:".$code;
            SendSMS::_sendSMS($_c,$to,$message);
            $msg="Verification code has been sent to ".$to;
            $ui->assign('msg', $msg);
            $ui->display('verify.tpl');
        }else{
            r2(U . 'register/change-pin', 'e', "Phone number doesn't exist");
        }
        break;
    case 'forgot-username-post':
        $to=_post('phone');
        $str = ltrim($to, '0');
        $str = ltrim($str, '254');
        $str = ltrim($str, '+254');
        $str = ltrim($str, '2540');
        $str = ltrim($str, '254254');
        $str = ltrim($str, '254+254');
        $to = '254' . $str;
        $d = ORM::for_table('agents')->where('phonenumber',$to)->find_one();
        if($d){
            $message="Dear Customer, Your username is:".$d->username;
            SendSMS::_sendSMS($_c,$to,$message);
            $msg="Your username has been sent to ".$to;
            r2(U . 'login', 's', $msg);

        }else{
            r2(U . 'register/change-username', 'e', "Phone number doesn't exist");
        }

        break;
    case 'verify-post':
        $to=_post('code');

        $d = ORM::for_table('agents')->where('code',$to)->find_one();
        if($d){
            $d->code=null;
            $d->save();
            $ui->assign('id', $d->id);
            $ui->display('changepin.tpl');
        }else{
            r2(U . 'register/change-pin', 'e', "Kindly request new code");
        }
        break;
    case 'change-pin-post':
        $id=_post('id');
        $p1=_post('pass1');
        $p2=_post('pass2');
        if($p1==$p2){
            $d = ORM::for_table('agents')->find_one($id);
            if($d) {
                $d->password = $p1;
                $d->save();
                r2(U . 'login', 's', "Pin updated successfully");
            }else{
                r2(U . 'register/change-pin', 'e', "User does not exist!");
            }
        }else{
            r2(U . 'register/change-pin', 'e', "Password do not match, Kindly request new pin!");
        }

        break;
    default:
    
       $ui->display('register.tpl');
        break;
}

