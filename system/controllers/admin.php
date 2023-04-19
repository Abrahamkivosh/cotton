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
if($_c['system_live']==0){
    $fields = array(
        'account' => $_c['account'],
    );
   $url ="http://pinno.isp-africa.com/index.php?_route=check/check_acc_amount";
   $cURLConnection = curl_init($url);
   curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $fields);
   curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
   $res = curl_exec($cURLConnection);
   curl_close($cURLConnection);
   $amount=$res;
   $ui->assign('amount', $amount);
    $ui->display('suspended.tpl');
}else {
    switch ($do) {
        case 'post':
            $username = _post('username');
            $password = _post('password');
            if ($username != '' AND $password != '') {
                $d = ORM::for_table('tbl_users')->where('username', $username)->find_one();
                if ($d) {
                    $d_pass = $d['password'];
                    if (Password::_verify($password, $d_pass) == true) {
                        $_SESSION['aid'] = $d['id'];
                        $_SESSION['user_type']=$d['user_type'];
                        $d->last_login = date('Y-m-d H:i:s');
                        $d->save();
                        _log($username . ' ' . $_L['Login_Successful'], 'Admin', $d['id']);



                       
                       r2(U . 'dashboard');
                    } else {
                        _msglog('e', $_L['Invalid_Username_or_Password']);
                        _log($username . ' ' . $_L['Failed_Login'], 'Admin');
                        r2(U . 'admin');
                    }
                } else {
                    _msglog('e', $_L['Invalid_Username_or_Password']);
                    r2(U . 'admin');
                }
            } else {
                _msglog('e', $_L['Invalid_Username_or_Password']);
                r2(U . 'admin');
            }

            break;
        case 'post-amcos':
                $username = _post('username');
                $password = _post('password');
                if ($username != '' AND $password != '') {
                    $d = ORM::for_table('amcos_users')->where('username', $username)->find_one();
                    if ($d) {
                        $d_pass = $d['password'];
                        if (Password::_verify($password, $d_pass) == true) {
                            $_SESSION['aid'] = $d['id'];
                            $_SESSION['user_type']="AMCOS";
                            $d->last_login = date('Y-m-d H:i:s');
                            $d->save();
                            _log($username . ' ' . $_L['Login_Successful'], 'Admin', $d['id']);
    
    
                           r2(U . 'dashboard');
                        } else {
                            _msglog('e', $_L['Invalid_Username_or_Password']);
                            _log($username . ' ' . $_L['Failed_Login'], 'Admin');
                            r2(U . 'login/amcos');
                        }
                    } else {
                        _msglog('e', $_L['Invalid_Username_or_Password']);
                        r2(U . 'login/amcos');
                    }
                } else {
                    _msglog('e', $_L['Invalid_Username_or_Password']);
                    r2(U . 'login/amcos');
                }
    
            break;   
            case 'post-board':
                $username = _post('username');
                $password = _post('password');
                if ($username != '' AND $password != '') {
                    $d = ORM::for_table('tbl_board_users')->where('username', $username)->find_one();
                    if ($d) {
                        $d_pass = $d['password'];
                        if (Password::_verify($password, $d_pass) == true) {
                            $_SESSION['aid'] = $d['id'];
                            $_SESSION['user_type']="BOARD";
                            $d->last_login = date('Y-m-d H:i:s');
                            $d->save();
                            _log($username . ' ' . $_L['Login_Successful'], 'Admin', $d['id']);
    
    
                           r2(U . 'dashboard');
                        } else {
                            _msglog('e', $_L['Invalid_Username_or_Password']);
                            _log($username . ' ' . $_L['Failed_Login'], 'Admin');
                            r2(U . 'login/board');
                        }
                    } else {
                        _msglog('e', $_L['Invalid_Username_or_Password']);
                        r2(U . 'login/board');
                    }
                } else {
                    _msglog('e', $_L['Invalid_Username_or_Password']);
                    r2(U . 'login/board');
                }
    
            break; 
            case 'post-ginner':
                $username = _post('username');
                $password = _post('password');
                if ($username != '' AND $password != '') {
                    $d = ORM::for_table('tbl_ginner_users')->where('username', $username)->find_one();
                    if ($d) {
                        $d_pass = $d['password'];
                        if (Password::_verify($password, $d_pass) == true) {
                            $_SESSION['aid'] = $d['id'];
                            $_SESSION['user_type']="GINNER";
                            $d->last_login = date('Y-m-d H:i:s');
                            $d->save();
                            _log($username . ' ' . $_L['Login_Successful'], 'Admin', $d['id']);
    
    
                           r2(U . 'dashboard');

                        } else {
                            _msglog('e', $_L['Invalid_Username_or_Password']);
                            _log($username . ' ' . $_L['Failed_Login'], 'Admin');
                            r2(U . 'login/ginner');
                        }
                    } else {
                        _msglog('e', $_L['Invalid_Username_or_Password']);
                        r2(U . 'login/ginner');
                    }
                } else {
                    _msglog('e', $_L['Invalid_Username_or_Password']);
                    r2(U . 'login/ginner');
                }
    
            break;               

        case 'login-display':
            $ui->display('admin_new.tpl');
            break;

        default:
            $ui->display('admin_new.tpl');
            break;
    }
}

