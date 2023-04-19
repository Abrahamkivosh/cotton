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
            $paginator = Paginator::bootstrap('tbl_villages', 'village_name', '%' . $name . '%');
            $d = ORM::for_table('tbl_villages')->where_like('village_name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('tbl_villages');
            $d = ORM::for_table('tbl_villages')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('villages.tpl');

        break;

    case 'add':
        $ui->assign('_title', 'Add Village - ' . $config['CompanyName']);
        $ward = ORM::for_table('tbl_ward')->find_many();
        $ui->assign('ward', $ward);
        $ui->display('village-add.tpl');
        break;

    case 'edit':

            $ui->assign('_title', 'Edit Village  - ' . $config['CompanyName']);
            $id = $routes['2'];
            $d = ORM::for_table('tbl_villages')->find_one($id);
            if ($d) {
                $ward = ORM::for_table('tbl_ward')->find_many();
                $ui->assign('ward', $ward);
                $ui->assign('d', $d);
                $ui->display('village-edit.tpl');
            } else {
                r2(U . 'villages/list', 'e', $_L['Account_Not_Found']);
            }
          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('tbl_villages')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted Village name ".$d['name'], 'Admin',$admin['id']);
                r2(U . 'villages/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'villages/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'village-add-post':
        
                $name = _post('village_name');
                $ward_id = _post('ward_id');
                
        
            
                $d = ORM::for_table('tbl_villages')->where('village_name', $name)->find_one();
                if ($d) {
                    $msg .= 'Village name already exists<br>';
                }
        
                if ($msg == '') {
                    $d = ORM::for_table('tbl_villages')->create();
                    $d->village_name = $name;
                    $d->ward_id = $ward_id;
                    $d->save();
                    _log($admin['username'] . ' ' . "Added Village   ".$d['name'], 'Admin',$admin['id']);
                    r2(U . 'villages/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'villages/add', 'e', $msg);
                }
                break;

        case 'village-edit-post':
       
                    $id = _post('id');
                    $name = _post('village_name');
                    $ward_id = _post('ward_id');
                    

            
                    $d = ORM::for_table('tbl_villages')->find_one($id);
                  
                    if ($d) {
                
                       
                        $d->village_name = $name;
                        $d->ward_id = $ward_id;
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated Village   ".$d['name'], 'Admin',$admin['id']);
                        r2(U . 'villages/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'villages/edit', 'e', $msg);
                    }
                    break;
                    



    default:
        echo 'action not defined';
}