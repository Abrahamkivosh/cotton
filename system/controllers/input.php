<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'Inputs'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'farmer');

$action = $routes['1'];
$admin = Admin::_info();
$ui->assign('_admin', $admin);



use PEAR2\Net\RouterOS;

require_once 'system/autoload/PEAR2/Autoload.php';

switch ($action) {

    //list
    case 'list':
        $name = _post('username');
        if ($name != '') {
            $paginator = Paginator::bootstrap('inputs', 'name', '%' . $name . '%');
            $d = ORM::for_table('inputs')->where_like('name', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            if ($type != '') {
                $paginator = Paginator::bootstrap('inputs', 'input_code', '%' . $name . '%');
                $d = ORM::for_table('inputs')->where_like('input_code', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            } else {
            $paginator = Paginator::bootstrap('inputs');
            $d = ORM::for_table('inputs')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            }
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('inputs.tpl');


        break;


     case 'add':
     

        $ui->assign('_title', 'Add Inpur - ' . $config['CompanyName']);
    
        $ui->display('inputs-add.tpl');
        break;

     case 'edit':
        
            $ui->assign('_title', 'Edit Input  - ' . $config['CompanyName']);
           // $village = ORM::for_table('tbl_villages')->find_many();
            $id = $routes['2'];
            $d = ORM::for_table('inputs')->find_one($id);
            if ($d) {
                $ui->assign('d', $d);
                $ui->display('inputs-edit.tpl');
            } else {
                r2(U . 'input/list', 'e', $_L['Account_Not_Found']);
            }
          break;

    case 'delete':
            $id = $routes['2'];
            $d = ORM::for_table('inputs')->find_one($id);
            if ($d) {
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted Input name ".$d['fullname'], 'Admin',$admin['id']);
                r2(U . 'input/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'input/list', 'e', $_L['Account_Not_Found']);
            }
            break;

    case 'inputs-add-post':
                $msg="";
                $name=_post('name');
                $category=_post('category');
                $rate_per_acre=_post('rate_per_acre');
                $unit=_post('unit');

                if ($msg=='') {
                    $d = ORM::for_table('inputs')->create();
                    $d->name = $name;
                    $d->category = $category;
                    $d->unit = $unit;
                    $d->rate_per_acre = $rate_per_acre;
                    $d->input_code = rand(12233974531,787162662279);
                    $d->save();
                   // $message=Message::_filter("newfarmer", $fullname);
                   // SendSMS::_sendSMS($_c, $phonenumber, $message);
                    _log($admin['username'] . ' ' . "Added input" , 'Admin',$admin['id']);
                    r2(U . 'input/list', 's', $_L['Created_Successfully']);
                } else {
                    r2(U . 'input/add', 'e', $msg);
                }

                break;
         case 'inputs-edit-post':
                    $id = _post('id');  
                    $name=_post('name');
                    $category=_post('category');
                   // $price=_post('price');      
                   $rate_per_acre=_post('rate_per_acre');
                    $unit=_post('unit');  
                    $d = ORM::for_table('inputs')->find_one($id);
                    if ($msg == '') {
                        $d->name = $name;
                        $d->unit = $unit;
                        $d->category = $category;
                        $d->rate_per_acre = $rate_per_acre;
                        $d->save();
                     
                        /*  $message=Message::_filter("newfarmer", $fullname);
                    SendSMS::_sendSMS($_c, $phonenumber, $message);
                    */
                        _log($admin['username'] . ' ' . "Updated input name   ".$d['product_name'], 'Admin',$admin['id']);
                        r2(U . 'input/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'input/edit', 'e', $msg);
                    }
                    break;
         case 'add_stock':
     

           $ui->assign('_title', 'Add Input Stock - ' . $config['CompanyName']);
           $inputs = ORM::for_table('inputs')->find_many();
                 
           $ui->assign('inputs', $inputs);
           $ui->display('inputs-add-stock.tpl');
          break;



        case 'inputs-stock-post':
            $id = _post('id');  
            $qty=_post('qty');      
            $d = ORM::for_table('inputs')->find_one($id);

             if($d){
                $d->qty =$d->qty+$qty;
                $d->save(); 
                  
                $d = ORM::for_table('stock')->where('input_id',$id)->where('date',date("Y-m-d"))->find_one();
                if($d){
                $d = ORM::for_table('stock')->find_one($d->id);
                $d->add_qty = $d->add_qty+$qty;
                $d->date = date("Y-m-d");
                $d->input_id = $id;
                $d->save();
                }else{
                    $d = ORM::for_table('stock')->create();
                    $d->add_qty = $qty;
                    $d->date = date("Y-m-d");
                    $d->input_id = $id;
                    $d->save();
                }
              /*  $message=Message::_filter("newfarmer", $fullname);
            SendSMS::_sendSMS($_c, $phonenumber, $message);
            */
                _log($admin['username'] . ' ' . "Stock added successfully  ", 'Admin',$admin['id']);
                r2(U . 'input/list', 's', "Stock added successfully ");
            } else {
                r2(U . 'input/list', 'e', "Input not found");
            }
           break;  
        
        case 'issue_input_sec1':
    
            $ui->assign('_title', 'Issue inputs- ' . $config['CompanyName']);
            
            $amcos = ORM::for_table('amcos')->find_many(); 
             $ref_id=ORM::for_table('input_order')->where('status',"1")->max('ref_id');
             $ref_id=$ref_id+1;
            $ui->assign('amcos', $amcos);
            $ui->assign('ref_id', $ref_id);
            $ui->display('inputs-issue-sec1.tpl');
           break;

        case 'issue_input_sec2':
    
            $ui->assign('_title', 'Issue inputs- ' . $config['CompanyName']);
            $amcos_id=_post('amcos_id');
            $ref_id=_post('ref_id');

            $input = ORM::for_table('inputs')->where_gte('qty',0)->find_many();  
            $ui->assign('input', $input);
            $input_order = ORM::for_table('input_order')->where('ref_id',$ref_id)->find_many();  
            $ui->assign('input_order', $input_order);
            $ui->assign('amcos_id', $amcos_id);
            $ui->assign('ref_id', $ref_id);
            $ui->display('inputs-issue-sec2.tpl');
        break;    
        case 'issue_input_order':
            $ui->assign('_title', 'Issue inputs- ' . $config['CompanyName']);
            $amcos_id=_post('amcos_id');
            $ref_id=_post('ref_id');
            $input_id=_post('input_id');
            $input_qty=_post('input_qty');
            $input_c = ORM::for_table('inputs')->where_gte('qty',$input_qty-1)->find_one($input_id);  

            if($input_c){
            $findme = ORM::for_table('input_order')->where('ref_id',$ref_id)->where('input_id',$input_id)->find_one();
            if($findme){
             $d= ORM::for_table('input_order')->find_one($findme->id);
             $d->input_qty = $d->input_qty+$input_qty;
             $d->save();
            }else{
            $d = ORM::for_table('input_order')->create();
            $d->ref_id = $ref_id;
            $d->amcos_id = $amcos_id;
            $d->input_qty = $input_qty;
            $d->date = date("Y-m-d");
            $d->input_id = $input_id;
            $d->save();
            }
       
            $d = ORM::for_table('stock')->where('input_id',$input_id)->where('date',date("Y-m-d"))->find_one();
            if($d){
            $d = ORM::for_table('stock')->find_one($d->id);
            $d->issued_qty = $d->issued_qty+$input_qty;
            $d->date = date("Y-m-d");
            $d->input_id = $input_id ;
            $d->save();
            }else{
                $d = ORM::for_table('stock')->create();
                $d->issued_qty = $input_qty;
                $d->date = date("Y-m-d");
                $d->input_id = $input_id;
                $d->save();
            }

            $input_c = ORM::for_table('inputs')->find_one($input_id);
            $input_c->qty=$input_c->qty-$input_qty;
            $input_c->save();

           }else{
            echo '<script>alert("Quantity exceeds available quantity")</script>';
           }
            $input = ORM::for_table('inputs')->where_gte('qty',0)->find_many();  
            $ui->assign('input', $input);
            $input_order = ORM::for_table('input_order')->where('ref_id',$ref_id)->find_many();  
            $ui->assign('input_order', $input_order);
            $ui->assign('amcos_id', $amcos_id);
            $ui->assign('ref_id', $ref_id);
            $ui->display('inputs-issue-sec2.tpl');
        break;


        case 'issue_input_order_post':
            $ui->assign('_title', 'Issue inputs- ' . $config['CompanyName']);
            $amcos_id=$routes['2'];
            $ref_id=$routes['3'];
            
            $findme = ORM::for_table('input_order')->where('ref_id',$ref_id)->where('status',0)->find_one();
            if($findme){
                $findref = ORM::for_table('input_order')->where('ref_id',$ref_id)->find_many();
                foreach($findref as $findre){
                 $d= ORM::for_table('input_order')->find_one($findre->id);
                 $d->amcos_id = $amcos_id;
                 $d->user_id= $admin['id'];
                 $d->status=1;
                 $d->created_at=date("Y-m-d H:i:s");
                 $d->save();
                }

             _log($admin['username'] . ' ' . "Inputs issued  ".$d['product_name'], 'Admin',$admin['id']);
             r2(U . 'input/print_receipt/'.$ref_id, 's', "Inputs issued successfully");
         } else {
             r2(U . 'input/issue_input_sec1', 'e', "Inputs order not found");
         }

        break; 
      
        case 'issue_input_delete':

            $ui->assign('_title', 'Issue inputs delete- ' . $config['CompanyName']);
            $amcos_id=$routes['2'];
            $ref_id=$routes['3'];
            $order_id=$routes['4'];
             
            $d = ORM::for_table('input_order')->find_one($order_id);

            $dv = ORM::for_table('stock')->where('input_id',$d->input_id)->where('date',date("Y-m-d"))->find_one();
            if($dv){
            $dv = ORM::for_table('stock')->find_one($dv->id);
            $dv->issued_qty = $dv->issued_qty-$d->input_qty;
            $dv->save();
            }
            $input_c = ORM::for_table('inputs')->find_one($d->input_id);
            $input_c->qty=$input_c->qty+$d->input_qty;
            $input_c->save();

            if($d){
            $d->delete();
            }
            
            $input = ORM::for_table('inputs')->where_gte('qty',0)->find_many();  
            $ui->assign('input', $input);
            $input_order = ORM::for_table('input_order')->where('ref_id',$ref_id)->find_many();  
            $ui->assign('input_order', $input_order);
            $ui->assign('amcos_id', $amcos_id);
            $ui->assign('ref_id', $ref_id);
            $ui->display('inputs-issue-sec2.tpl');
        break; 
     case 'print_receipt':
        $ref_id=$routes['2'];
        $d = ORM::for_table('input_order')->where('ref_id',$ref_id)->find_one();
        $amcos=ORM::for_table('amcos')->find_one($d->amcos_id);
        //message
        $message="Input item has been issued to you";
        SendSMS::_sendSMS($_c, $amcos->phonenumber, $message);
        
        $d = ORM::for_table('input_order')->where('ref_id',$ref_id)->find_many();
        $ui->assign('amcos', $amcos);
        $ui->assign('ref_id', $ref_id);
        $ui->assign('d', $d);
        $ui->display('issue-input-print.tpl');
        break;    
     case 'inputs-issued-list':
            $amcos_id = _post('amcos_id');
            if ($name != '') {
                $paginator = Paginator::bootstrap('input_order', 'amcos_id', '%' . $amcos_id . '%');
                $d = ORM::for_table('input_order')->where_like('amcos_id', '%' . $amcos_id . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            } else {
               $paginator = Paginator::bootstrap('input_order');
               $d = ORM::for_table('input_order')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            }
            $ui->assign('d', $d);
            $ui->assign('paginator', $paginator);
            $ui->display('issued-inputs.tpl');    
        break;    

    

    default:
        echo 'action not defined';
}