<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Business Directory-Village'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'Region');


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
            $paginator = Paginator::bootstrap('tbl_region', 'village_name', '%' . $name . '%');
            $d = ORM::for_table('tbl_region')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('tbl_region');
            $d = ORM::for_table('tbl_region')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('region.tpl');

        break;

    case 'add':
        $ui->assign('_title', 'Add Region - ' . $config['CompanyName']);

        $ui->display('region-add.tpl');
        break;

    case 'edit':

            $ui->assign('_title', 'Edit Region  - ' . $config['CompanyName']);
            $id = $routes['2'];
            $d = ORM::for_table('tbl_region')->find_one($id);
            if ($d) {
                $ui->assign('d', $d);
                $ui->display('region-edit.tpl');
            } else {
                r2(U . 'region/list', 'e', $_L['Account_Not_Found']);
            }
          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('tbl_region')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted region name ".$d['name'], 'Admin',$admin['id']);
                r2(U . 'region/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'region/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'region-add-post':
        
                $name = _post('name');
              
        
            
                $d = ORM::for_table('tbl_region')->where('name', $name)->find_one();
                if ($d) {
                    $msg .= 'Region name already exists<br>';
                }
        
                if ($msg == '') {
                    $d = ORM::for_table('tbl_region')->create();
                    $d->name = $name;
                    $d->save();
                    _log($admin['username'] . ' ' . "Added Region   ".$d['name'], 'Admin',$admin['id']);
                    r2(U . 'region/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'region/add', 'e', $msg);
                }
                break;

        case 'region-edit-post':
       
                    $id = _post('id');
                    $name = _post('name');
                 
            
                    $d = ORM::for_table('tbl_region')->find_one($id);
                  
                    if ($d) {
                
                       
                        $d->name = $name;
                       
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated Region   ".$d['name'], 'Admin',$admin['id']);
                        r2(U . 'region/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'region/edit', 'e', $msg);
                    }
                    break;
                    



    default:
        echo 'action not defined';
}