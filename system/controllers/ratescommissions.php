<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Cotton Commission'. ' - ' . $config['CompanyName']);
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
            $paginator = Paginator::bootstrap('tbl_ratescommissions', 'id', '%' . $name . '%');
            $d = ORM::for_table('tbl_ratescommissions')->where_like('id', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('tbl_ratescommissions');
            $d = ORM::for_table('tbl_ratescommissions')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('ratescommission.tpl');

        break;

    case 'add':
        $ui->assign('_title', 'Add Rates Commission - ' . $config['CompanyName']);

        $district = ORM::for_table('tbl_district')->find_many();
        $ui->assign('district', $district);
        $ui->display('ratescommission-add.tpl');
        break;

    case 'edit':

            $ui->assign('_title', 'Edit Rates Commission  - ' . $config['CompanyName']);
            $id = $routes['2'];
            $d = ORM::for_table('tbl_ratescommissions')->find_one($id);
            if ($d) {
                $district = ORM::for_table('tbl_district')->find_many();
                $ui->assign('district', $district);
                $ui->assign('d', $d);
                $ui->display('ratescommission-edit.tpl');
            } else {
                r2(U . 'ratescommissions/list', 'e', $_L['Account_Not_Found']);
            }
          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('tbl_ratescommissions')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted Commission rates ".$d['name'], 'Admin',$admin['id']);
                r2(U . 'ratescommissions/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'ratescommissions/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;

    case 'ratescommission-add-post':
        
                $district_id = _post('district_id');
                $min_rate = _post('min_rate');
                $cess = _post('cess');
                $cdtf = _post('cdtf');
                $educational = _post('educational');
                $amcos_rate = _post('amcos_rate');
                $system_rate = _post('system_rate');
                $msg='';
               /* $d = ORM::for_table('tbl_ratescommissions')->where('village_name', $min_rate)->find_one();
                if ($d) {
                    $msg .= 'Data already exist name already exists<br>';
                }
               */
                if ($msg == '') {
                    $d = ORM::for_table('tbl_ratescommissions')->create();
                    $d->district_id = $district_id;
                    $d->min_rate = $min_rate;
                    $d->cess = $cess;
                    $d->cdtf = $cdtf;
                    $d->educational = $educational;
                    $d->amcos_rate  = $amcos_rate ;
                    $d->system_rate  = $system_rate ;
                    $d->save();
                    _log($admin['username'] . ' ' . "Added Rates Commission of rate ".$d['min_rate'], 'Admin',$admin['id']);

                    r2(U . 'ratescommissions/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'ratescommissions/add', 'e', $msg);
                }
                break;

        case 'ratescommission-edit-post':
       
                    $id = _post('id');
                    $district_id = _post('district_id');
                    $min_rate = _post('min_rate');
                    $cess = _post('cess');
                    $cdtf = _post('cdtf');
                    $educational = _post('educational');
                    $amcos_rate = _post('amcos_rate');
                    $system_rate = _post('system_rate');

            
                    $d = ORM::for_table('tbl_ratescommissions')->find_one($id);
                  
                    if ($d) {
                        $d->district_id = $district_id;
                        $d->min_rate = $min_rate;
                        $d->cess = $cess;
                        $d->cdtf = $cdtf;
                        $d->educational = $educational;
                        $d->amcos_rate  = $amcos_rate ;
                        $d->system_rate  = $system_rate ;
                        $d->save();
                        
                        _log($admin['username'] . ' ' . "Updated Rates commission rates ".$d['name'], 'Admin',$admin['id']);
                        r2(U . 'ratescommissions/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'ratescommissions/edit', 'e', $msg);
                    }
               break;
                    



    default:
        echo 'action not defined';
}