<?php
/**
* PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt

**/

if (isset($routes['1'])) {
    $do = $routes['1'];
} else {
    $do = 'login-display';
}

    switch ($do) {
        case 'post':

            $username = strtolower(str_replace(' ', '',_post('username')));
            $password = _post('password');
            $phone=_post('phone');
            if ($username != '' AND $password != '') {

                $d = ORM::for_table('agents')->where('username', $username)->find_one();
                if ($d['status'] == "on") {
                    if ($d AND substr($d['phonenumber'], -4)==$phone) {
                     
                        $d_pass = $d['password'];
                        
                        if (Password::_verify($password, $d_pass) == true) {
    
                            $_SESSION['uid'] = $d['id'];
                            $_SESSION['username'] =$username;
                            $d->last_login = date('Y-m-d H:i:s');
                            $d->save();

                            _log($username . ' ' . $_L['Login_Successful'], 'Agent', $d['id']);

                            $att = $db -> query("SELECT * FROM agent_attendance WHERE `agent_id` = '".$_SESSION['uid']."' AND `date`='".date('Y-m-d')."'")->fetch();
                            if($att){
                                $sql = "UPDATE agent_attendance 
                                SET time_in_e=?
                               WHERE date=? AND agent_id=?";
                            $q = $db->prepare($sql);
                            $q->execute(array(date('Y-m-d H:i:s'),date('Y-m-d'),$_SESSION['uid']));
                            }else{
                            $sql = "INSERT INTO agent_attendance (agent_id,time_in,date,time_in_e) VALUES (:a,:b,:c,:d)";
                            $q = $db->prepare($sql);
                            $q->execute(array(':a'=>$_SESSION['uid'],':b'=>date('Y-m-d H:i:s'),':c'=>date('Y-m-d'),':d'=>date('Y-m-d H:i:s')));
                            }

                            setcookie('_time', time(), '/');        

                         r2(U . 'home');
                        
                        } else {
                            _msglog('e', $_L['Invalid_Username_or_Password']);

                            _log($username . ' ' . $_L['Failed_Login'], 'User');
                            r2(U . 'login/login_now');
                        }
                    } else {
                        _msglog('e', $_L['Invalid_Username_or_Password']." OR 4 Digits phone number");
                        r2(U . 'login/login_now');
                    }
                }else{
                    _msglog('e', "Your account is deactivated, Kindly contact administrator");
                    r2(U . 'login/login_now');
                }
                } else {
                    _msglog('e', $_L['Invalid_Username_or_Password']);
                    r2(U . 'login/login_now');
                }
            break;

        
        case 'login-display':
         
            $ui->display('admin_new.tpl');
            break;

        case 'ginner':
         
            $ui->display('ginner_login.tpl');
        break;   
        case 'amcos':
         
        $ui->display('amcos_login.tpl');
        break; 
        case 'board':
         
        $ui->display('board_login.tpl');
        break;     
            
            
         case 'login_now':
           // $ui->display('login.tpl');
            $ui->display('admin_new.tpl');
            break;

        default:
            $ui->assign('mac',$_SESSION['mac']);
            $ui->assign('linkloginonly',$_SESSION['linkloginonly']);
            $ui->assign('chapid',$_SESSION['chapid']);
            $ui->assign('linkorig',$_SESSION['linkorig']);
            //$ui->assign('dst',$_SESSION['dst']);
            $ui->assign('macesc',$_SESSION['macesc']);
            $ui->assign('identity',$_SESSION['identity']);
            $ui->assign('chapchallenge',$_SESSION['chapchallenge']);
           // $ui->display('login.tpl');
           $ui->display('admin_new.tpl');
            break;
    }


