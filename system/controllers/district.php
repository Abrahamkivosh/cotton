<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Business Directory-Village'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'District');


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
            $paginator = Paginator::bootstrap('tbl_district', 'name', '%' . $name . '%');
            $d = ORM::for_table('tbl_district')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('tbl_district');
            $d = ORM::for_table('tbl_district')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('district.tpl');

        break;

    case 'add':
        $ui->assign('_title', 'Add District - ' . $config['CompanyName']);
        $region = ORM::for_table('tbl_region')->find_many();
        $ui->assign('region', $region);
        $ui->display('district-add.tpl');
        break;

    case 'edit':

            $ui->assign('_title', 'Edit District  - ' . $config['CompanyName']);
            $id = $routes['2'];
            $region = ORM::for_table('tbl_region')->find_many();
          
            $d = ORM::for_table('tbl_district')->find_one($id);
            if ($d) {
                $ui->assign('region', $region);
                $ui->assign('d', $d);
                $ui->display('district-edit.tpl');
            } else {
                r2(U . 'district/list', 'e', $_L['Account_Not_Found']);
            }
          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('tbl_district')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted District name ".$d['name'], 'Admin',$admin['id']);
                r2(U . 'district/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'district/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'district-add-post':
        
                $name = _post('name');
                $region_id = _post('region_id');
                
                $d = ORM::for_table('tbl_district')->where('name', $name)->find_one();
                if ($d) {
                    $msg .= 'Region name already exists<br>';
                }
        
                if ($msg == '') {
                    $d = ORM::for_table('tbl_district')->create();
                    $d->name = $name;
                    $d->region_id = $region_id;
                    $d->save();
                    _log($admin['username'] . ' ' . "Added District   ".$d['name'], 'Admin',$admin['id']);
                    r2(U . 'district/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'district/add', 'e', $msg);
                }
                break;

        case 'district-edit-post':
       
                    $id = _post('id');
                    $name = _post('name');
                    $region_id = _post('region_id');
          

                    $d = ORM::for_table('tbl_district')->find_one($id);
                  
                    if ($d) {  
                        $d->name = $name;
                        $d->region_id = $region_id;
                    
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated District   ".$d['name'], 'Admin',$admin['id']);
                        r2(U . 'district/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'district/edit', 'e', $msg);
                    }
                    break;
                    



    default:
        echo 'action not defined';
}