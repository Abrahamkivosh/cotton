<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Business Directory-listings'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'listings');

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
            $paginator = Paginator::bootstrap('listings', 'name', '%' . $name . '%');
            $d = ORM::for_table('listings')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('listings');
            $d = ORM::for_table('listings')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('listing.tpl');

        break;

     case 'add':
    
        $ui->assign('_title', 'Add listing - ' . $config['CompanyName']);
        $main = ORM::for_table('sub_category')->find_many();
        $ui->assign('main', $main);
        $ui->display('listing-add.tpl');
        break;


    case 'edit':

            $ui->assign('_title', 'Edit listing  - ' . $config['CompanyName']);
            $id = $routes['2'];
            $d = ORM::for_table('listings')->find_one($id);
            $main = ORM::for_table('sub_category')->find_many();
            
            if ($d) {
                $ui->assign('d', $d);
             
                $ui->assign('main', $main);
                $ui->display('listing-edit.tpl');
            } else {
                r2(U . 'listing/list', 'e', $_L['Account_Not_Found']);
            }
          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('listings')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted listing name ".$d['fullname'], 'Admin',$admin['id']);
                r2(U . 'listing/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'listing/list', 'e', $_L['Account_Not_Found']);
            
            }

        break;
    
    case 'listing-add-post':
        
                $name = _post('name');
                $description = _post('description');
                $location = _post('location');
                $contact = _post('contact');
                $email = _post('email');
                $address = _post('address');
                $sub_category_id=_post('sub_category_id');
        
            
              $msg="";
        
                if ($msg == '') {
                     $pc = ORM::for_table('sub_category')->find_one($sub_category_id);
                     $cat_ma = ORM::for_table('main_category')->find_one($pc['main_category_id']);
                     $main_category=$cat_ma->name;
                     $sub_category=$pc->name;
                   
                    $d = ORM::for_table('listings')->create();
                    $d->name = $name;
                    $d->description = $description;
                    $d->location =$location;
                    $d->contact = $contact;
                    $d->email = $email;
                    $d->address = $address;
                    $d->main_category = $main_category;
                    $d->sub_category = $sub_category;
                    $d->sub_category_id = $sub_category_id;

                    $d->save();
                    _log($admin['username'] . ' ' . "Added listing   ".$d['name'], 'Admin',$admin['id']);
                    r2(U . 'listing/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'listing/add', 'e', $msg);
                }
                break;
         case 'listing-edit-post':
       
                    $id = _post('id');
                    $name = _post('name');
                    $description = _post('description');
                    $location = _post('location');
                    $contact = _post('contact');
                    $email = _post('email');
                    $address = _post('address');
                   $sub_category_id=_post('sub_category_id');
                
                    $d = ORM::for_table('listings')->find_one($id);
                    $msg="";
                    if ($msg == '') {
                        $pc = ORM::for_table('sub_category')->find_one($sub_category_id);
                        $cat_ma = ORM::for_table('main_category')->find_one($pc['main_category_id']);
                        $main_category=$cat_ma->name;
                        $sub_category=$pc->name;
                      
                        $d->name = $name;
                        $d->description = $description;
                        $d->location =$location;
                        $d->contact = $contact;
                        $d->email = $email;
                        $d->address = $address;
                        $d->main_category = $main_category;
                        $d->sub_category = $sub_category;
                        $d->sub_category_id = $sub_category_id;
                        
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated listing   ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'listing/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'listing/edit', 'e', $msg);
                    }
                    break;
    
    
               


    default:
        echo 'action not defined';
}