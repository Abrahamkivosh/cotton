<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Ward'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'ward');


$action = $routes['1'];
$admin = Admin::_info();
$ui->assign('_admin', $admin);


use PEAR2\Net\RouterOS;

require_once 'system/autoload/PEAR2/Autoload.php';

switch ($action) {

    //list
    case 'list':
       
        $name = _post('name');
        if ($name != '') {
            $paginator = Paginator::bootstrap('tbl_ward', 'name', '%' . $name . '%');
            $d = ORM::for_table('tbl_ward')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('tbl_ward');
            $d = ORM::for_table('tbl_ward')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('ward.tpl');

        break;

    case 'add':
        $ui->assign('_title', 'Add ward - ' . $config['CompanyName']);
        $district = ORM::for_table('tbl_district')->find_many();
        $ui->assign('district', $district);
        $ui->display('ward-add.tpl');
        break;

    case 'edit':

            $ui->assign('_title', 'Edit ward  - ' . $config['CompanyName']);
            $id = $routes['2'];
            $district = ORM::for_table('tbl_district')->find_many();
          
            $d = ORM::for_table('tbl_ward')->find_one($id);
            if ($d) {
                $ui->assign('district', $district);
                $ui->assign('d', $d);
                $ui->display('ward-edit.tpl');
            } else {
                r2(U . 'ward/list', 'e', $_L['Account_Not_Found']);
            }
          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('tbl_ward')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted ward name ".$d['name'], 'Admin',$admin['id']);
                r2(U . 'ward/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'ward/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'ward-add-post':
        
                $name = _post('name');
                $district_id = _post('district_id');
                
                $d = ORM::for_table('tbl_ward')->where('name', $name)->find_one();
                if ($d) {
                    $msg .= 'district name already exists<br>';
                }
        
                if ($msg == '') {
                    $d = ORM::for_table('tbl_ward')->create();
                    $d->name = $name;
                    $d->district_id = $district_id;
                    $d->save();
                    _log($admin['username'] . ' ' . "Added ward   ".$d['name'], 'Admin',$admin['id']);
                    r2(U . 'ward/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'ward/add', 'e', $msg);
                }
                break;

        case 'ward-edit-post':
       
                    $id = _post('id');
                    $name = _post('name');
                    $district_id = _post('district_id');
          

                    $d = ORM::for_table('tbl_ward')->find_one($id);
                  
                    if ($d) {  
                        $d->name = $name;
                        $d->district_id = $district_id;
                    
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated ward   ".$d['name'], 'Admin',$admin['id']);
                        r2(U . 'ward/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'ward/edit', 'e', $msg);
                    }
                    break;
                    



    default:
        echo 'action not defined';
}