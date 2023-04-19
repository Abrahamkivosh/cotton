<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Business Directory-Village'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'Village');


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
            $paginator = Paginator::bootstrap('tbl_sub_villages', 'name', '%' . $name . '%');
            $d = ORM::for_table('tbl_sub_villages')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('tbl_sub_villages');
            $d = ORM::for_table('tbl_sub_villages')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('subvillages.tpl');

        break;

    case 'add':
        $ui->assign('_title', 'Add Sub Village - ' . $config['CompanyName']);
        $villages = ORM::for_table('tbl_villages')->find_many();
        $ui->assign('villages', $villages);
        $ui->display('subvillage-add.tpl');
        break;

    case 'edit':
            $ui->assign('_title', 'Edit Sub Village  - ' . $config['CompanyName']);
            $id = $routes['2'];
            $villages = ORM::for_table('tbl_villages')->find_many();
        
            $d = ORM::for_table('tbl_sub_villages')->find_one($id);
            if ($d) {
                $ui->assign('villages', $villages);
                $ui->assign('d', $d);
                $ui->display('subvillage-edit.tpl');
            } else {
                r2(U . 'subvillages/list', 'e', $_L['Account_Not_Found']);
            }
          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('tbl_sub_villages')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted Sub Village name ".$d['name'], 'Admin',$admin['id']);
                r2(U . 'subvillages/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'subvillages/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'subvillage-add-post':
        
                $name = _post('name');
                $village_id = _post('village_id');
               
        
            
                $d = ORM::for_table('tbl_sub_villages')->where('name', $name)->where('village_id', $village_id)->find_one();
                if ($d) {
                    $msg .= 'Sub Village name already exists<br>';
                }
        
                if ($msg == '') {
                    $d = ORM::for_table('tbl_sub_villages')->create();
                    $d->name = $name;
                    $d->village_id = $village_id;
                    $d->save();
                    _log($admin['username'] . ' ' . "Added Village   ".$d['name'], 'Admin',$admin['id']);
                    r2(U . 'subvillages/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'subvillages/add', 'e', $msg);
                }
                break;

        case 'subvillage-edit-post':
       
                    $id = _post('id');
                    $name = _post('name');
                    $village_id = _post('village_id');
                    

            
                    $d = ORM::for_table('tbl_sub_villages')->find_one($id);
                    if ($d) {
                
                       
                        $d->name = $name;
                        $d->village_id = $village_id;
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated Sub Village   ".$d['name'], 'Admin',$admin['id']);
                        r2(U . 'subvillages/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'subvillages/edit', 'e', $msg);
                    }
                    break;
                    



    default:
        echo 'action not defined';
}