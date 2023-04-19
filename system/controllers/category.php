<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Business Directory-category'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'category');

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
            $paginator = Paginator::bootstrap('main_category', 'name', '%' . $name . '%');
            $d = ORM::for_table('main_category')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('main_category');
            $d = ORM::for_table('main_category')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('category.tpl');

        break;

     case 'add':
        $ui->assign('_title', 'Add category - ' . $config['CompanyName']);

        $ui->display('category-add.tpl');
        break;
    case 'edit':
    
            $ui->assign('_title', 'Edit category  - ' . $config['CompanyName']);
            $id = $routes['2'];
            $d = ORM::for_table('main_category')->find_one($id);
            if ($d) {
                $ui->assign('d', $d);
                $ui->display('category-edit.tpl');
            } else {
                r2(U . 'category/list', 'e', $_L['Account_Not_Found']);
            }
          break;
    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('main_category')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted category name ".$d['name'], 'Admin',$admin['id']);
                r2(U . 'category/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'category/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;
    case 'category-add-post':
        
                $name = _post('name');
                $top = _post('top');
        
            
                $d = ORM::for_table('main_category')->where('name', $name)->find_one();
                if ($d) {
                    $msg .= $_L['Account_already_exist'] . '<br>';
                }
        
                if ($msg == '') {
                   
                    $d = ORM::for_table('main_category')->create();
                    $d->name = $name;
                    $d->top = $top;
            
                    $d->save();
                    _log($admin['username'] . ' ' . "Added category   ".$d['name'], 'Admin',$admin['id']);
                    r2(U . 'category/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'category/add', 'e', $msg);
                }
                break;
    case 'category-edit-post':
       
                    $id = _post('id');
                    $name = _post('name');
                    $top = _post('top');
                  
            
            
                    $d = ORM::for_table('main_category')->find_one($id);
                  
            
                    if ($d) {
                
                       
                        $d->name = $name;
                        $d->top = $top;
                     
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated category   ".$d['name'], 'Admin',$admin['id']);
                        r2(U . 'category/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'category/edit', 'e', $msg);
                    }
                    break;
                    

    
          case 'sub-list':
       
                        $name = _post('name');
                        if ($name != '') {
                            $paginator = Paginator::bootstrap('sub_category', 'name', '%' . $name . '%');
                            $d = ORM::for_table('sub_category')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
                        } else {
                            $paginator = Paginator::bootstrap('sub_category');
                            $d = ORM::for_table('sub_category')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
                        }
                
                        $ui->assign('d', $d);
                        $ui->assign('paginator', $paginator);
                        $ui->display('sub-category.tpl');
                
                        break;
                
           case 'sub-add':
                        $ui->assign('_title', 'Add category - ' . $config['CompanyName']);
                        $main = ORM::for_table('main_category')->find_many();
                        $ui->assign('main', $main);

                        $ui->display('sub-category-add.tpl');
                        break;

            case 'sub-edit':
                     
                            $ui->assign('_title', 'Edit category  - ' . $config['CompanyName']);
                            $id = $routes['2'];
                            $d = ORM::for_table('sub_category')->find_one($id);
                            $main = ORM::for_table('main_category')->find_many();
                            if ($d) {
                                $ui->assign('d', $d);
                                $ui->assign('main', $main);
                             
                    
                                $ui->display('sub-category-edit.tpl');
                            } else {
                                r2(U . 'category/sub-list', 'e', $_L['Account_Not_Found']);
                            }
                          break;
             case 'sub-delete':
                       
                            $id = $routes['2'];
                    
                            $d = ORM::for_table('sub_category')->find_one($id);
                            if ($d) {
                               
                                $d->delete();
                                _log($admin['username'] . ' ' . "Deleted Sub category name ".$d['name'], 'Admin',$admin['id']);
                                r2(U . 'category/sub-list', 's', $_L['Delete_Successfully']);
                            }else{
                                r2(U . 'category/sub-list', 'e', $_L['Account_Not_Found']);
                            
                            }
                            break;
            case 'sub-category-add-post':
                        
                                $name = _post('name');
                                $top = _post('top');
                                $main_category_id = _post('main_category_id');
                            
                                $d = ORM::for_table('sub_category')->where('name', $name)->find_one();
                                if ($d) {
                                    $msg .= $_L['Account_already_exist'] . '<br>';
                                }
                        
                                if ($msg == '') {
                                   
                                    $d = ORM::for_table('sub_category')->create();
                                    $d->name = $name;
                                    $d->main_category_id = $main_category_id;
                                    $d->top = $top;
                                    $d->save();
                                    _log($admin['username'] . ' ' . "Added category   ".$d['name'], 'Admin',$admin['id']);
                                    r2(U . 'category/sub-list', 's', $_L['Created_Successfully']);
                                } else {
                                    r2(U . 'category/sub-add', 'e', $msg);
                                }
                                break;
                case 'sub-category-edit-post':
                       
                                    $id = _post('id');
                                    $name = _post('name');
                                    $top = _post('top');
                                    
                                    $main_category_id = _post('main_category_id');
                            
                            
                                 
                                    $d = ORM::for_table('sub_category')->find_one($id);
                                    if ($msg == '') {
                                
                                       
                                        $d->name = $name;
                                        $d->main_category_id = $main_category_id;
                                        $d->top = $top;
                                        $d->save();
                                        _log($admin['username'] . ' ' . "Updated category   ".$d['name'], 'Admin',$admin['id']);
                                        r2(U . 'category/sub-list', 's', $_L['Updated_Successfully']);
                                    } else {
                                        r2(U . 'category/sub-edit', 'e', $msg);
                                    }
                                    break;
                        
    
               


    default:
        echo 'action not defined';
}