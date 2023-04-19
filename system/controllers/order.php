<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'orders'. ' - ' . $config['CompanyName']);
$ui->assign('_system_menu', 'cotton');

$action = $routes['1'];
$admin = Admin::_info();
$ui->assign('_admin', $admin);



use PEAR2\Net\RouterOS;

require_once 'system/autoload/PEAR2/Autoload.php';

switch ($action) {

    //list
    case 'list':
         $type=$routes['2'];
        $name = _post('username');
        if ($name != '') {
            $paginator = Paginator::bootstrap('orders', 'amcos_id', '%' .  $admin['amcos_id']. '%');
            $d = ORM::for_table('orders')->where_like('amcos_id', '%' . $admin['amcos_id'] . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('orders', 'amcos_id', '%' .  $admin['amcos_id']. '%');
            $d = ORM::for_table('orders')->where('amcos_id',$admin['amcos_id'])->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            
        }

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('orders.tpl');

        break;
        case 'approve-ordera':
       
            $id = $routes['2'];
            $d = ORM::for_table('orders')->find_one($id);
            $code=rand(1231,7879);
            if($d){
            $d->code=$code;
            $d->save();
                $gin = ORM::for_table('ginner')->find_one($admin['ginner_id']);
                $gin_user = ORM::for_table('tbl_ginner_users')->find_one($admin['id']);
                $message="Dear Ginner ".$gin->name." user ".$gin_user->fulname." requests for payment of Order no. ".$d->order_no.". Kindly use OTP: ".$code." to confirm and payment.";
                SendSMS::_sendSMS($_c, $gin->phonenumber, $message); 
            }
            $ui->assign('id', $id);
            $ui->assign('d', $d);
            $ui->display('order_approve.tpl');    
        break;    


         case 'approve-order':
       
            $id = _post('id');
            $code = _post('code');
            $dv = ORM::for_table('orders')->where('code',$code)->find_one($id);
            if($dv){
            $d = ORM::for_table('orders')->find_one($id);
            if($d){
               
                //check balance

                $price=$d->price;
                $amcos_id=$d->amcos_id;
                $amcos = ORM::for_table('amcos')->find_one($amcos_id);
                $village_id=$amcos->village_id;
                $village = ORM::for_table('tbl_villages')->find_one($d->village_id);
                $ward = ORM::for_table('tbl_ward')->find_one($d->ward_id);
                $rates=ORM::for_table('tbl_ratescommissions')->where('district_id',$ward->district_id)->order_by_desc('id')->find_one();
             //calculation
                 $amount=$d->verified_qty*$d->price;
                $amcos_amount=$rates->amcos_rate*$d->verified_qty;
                 $system_amount=(int)($rates->system_rate*$amount)/100;
                 $amount_after_deduction=$amount-$amcos_amount;
                 $pay_farmers=$amount_after_deduction;
                 $price=(int)($amount_after_deduction/$d->qty);
                
                $coll = ORM::for_table('cotton_collection')->where('amcos_id',$amcos_id)->where('status',2)->order_by_desc('id')->find_many();
                foreach($coll as $col){

                   $farmer_payable_amount=$col->qty*$price-$col->paid_amount;
                    
                    if($farmer_payable_amount<$pay_farmers){

                    $farmer = ORM::for_table('farmer')->find_one($col->farmer_id);
                    $phonenumber=$farmer->phonenumber;
                    $amount_to_pay=$farmer_payable_amount;
                        //send payment
                        //send sms
                    $cv = ORM::for_table('cotton_collection')->find_one($col['id']);
                       //save payment status
                    $cv->status=1;
                    $cv->qty_paid=$cv->qty;
                    $cv->amount_paid=$cv->amount_paid+$amount_to_pay;
                    $cv->save();

                    $ck = ORM::for_table('farmer_payment_schedule')->create();
                    //save payment status
                    //Pay system
                    $ck->ginner_id=$admin['ginner_id'];
                    $ck->order_no=$d->order_no;
                    $ck->status=1;
                    $ck->amount=$amount_to_pay;
                    $ck->farmer_id=$col->farmer_id;
                    $ck->phonenumber=$phonenumber;
                    $ck->save();
                    
                    $gin = ORM::for_table('ginner')->find_one($admin['ginner_id']);
                       // $message=Message::_filter("farmerpaymentsuccess", "",$farmer->firstname,$gin->name);
                       $message="Ndugu Mkulima, shilingi ".$amount_to_pay." imeshalipwa kwa mauzo ya kilo ".$cv->qty." za pamba kwa bei ya shilingi".$amount_to_pay;
                       
                        SendSMS::_sendSMS($_c, $farmer->phonenumber, $message); 

                    }
                    //if amount not enough
                    if($farmer_payable_amount>$pay_farmers and $pay_farmers>0){
                        $farmer = ORM::for_table('farmer')->find_one($col->farmer_id);
                        $phonenumber=$farmer->phonenumber;
                        $amount_to_pay=$pay_farmers;
                            //send payment
                        $cv = ORM::for_table('cotton_collection')->find_one($col['id']);
                           //save payment status
                        $cv->status=2;
                        $cv->amount_paid=$cv->amount_paid+$amount_to_pay;
                        $cv->qty_paid=((int)($amount_to_pay/$price)+$cv->qty_paid);
                        $cv->save();

                        $ck = ORM::for_table('farmer_payment_schedule')->create();
                        //save payment status
                        //Pay system
                        $ck->ginner_id=$admin['ginner_id'];
                        $ck->order_no=$d->order_no;
                        $ck->status=1;
                        $ck->amount=$amount_to_pay;
                        $ck->farmer_id=$col->farmer_id;
                        $ck->phonenumber=$phonenumber;
                        $ck->save();
                        $gin = ORM::for_table('ginner')->find_one($admin['ginner_id']);
                      //  $message=Message::_filter("farmerpaymentsuccess", "",$farmer->firstname,$gin->name);
                      $message="Ndugu Mkulima, shilingi ".$amount_to_pay." imeshalipwa kwa mauzo ya kilo ".$cv->qty." za pamba kwa bei ya shilingi".$amount_to_pay;
                        SendSMS::_sendSMS($_c, $farmer->phonenumber, $message); 

                    }

                    $pay_farmers=$pay_farmers-$amount_to_pay;

                }

                $coll = ORM::for_table('cotton_collection')->where('amcos_id',$amcos_id)->where('status',0)->order_by_desc('id')->find_many();
                foreach($coll as $col){

                  $farmer_payable_amount=$col->qty*$price;
                    
                    if($farmer_payable_amount<$pay_farmers){

                    $farmer = ORM::for_table('farmer')->find_one($col->farmer_id);
                    $phonenumber=$farmer->phonenumber;
                    $amount_to_pay=$farmer_payable_amount;
                        //send payment
                        //send sms
                        
                    $cv = ORM::for_table('cotton_collection')->find_one($col['id']);
                       //save payment status
                    $cv->status=1;
                    $cv->qty_paid=$cv->qty;
                    $cv->amount_paid=$amount_to_pay;
                    $cv->save();
                    
                    $ck = ORM::for_table('farmer_payment_schedule')->create();
                    //save payment status
                    //Pay system
                    $ck->ginner_id=$admin['ginner_id'];
                    $ck->order_no=$d->order_no;
                    $ck->status=1;
                    $ck->amount=$amount_to_pay;
                    $ck->farmer_id=$col->farmer_id;
                    $ck->phonenumber=$phonenumber;
                    $ck->save();

                    $gin = ORM::for_table('ginner')->find_one($admin['ginner_id']);
                      //  $message=Message::_filter("farmerpaymentsuccess", "",$farmer->firstname,$gin->name);
                      $message="Ndugu Mkulima, shilingi ".$amount_to_pay." imeshalipwa kwa mauzo ya kilo ".$cv->qty." za pamba kwa bei ya shilingi".$amount_to_pay;
                       SendSMS::_sendSMS($_c, $farmer->phonenumber, $message);    SendSMS::_sendSMS($_c, $farmer->phonenumber, $message); 

                    }
                    //if amount not enough
                    if($farmer_payable_amount>$pay_farmers and $pay_farmers>0){
                        $farmer = ORM::for_table('farmer')->find_one($col->farmer_id);
                        $phonenumber=$farmer->phonenumber;
                        $amount_to_pay=$pay_farmers;
                            //send payment

                         

                        $cv = ORM::for_table('cotton_collection')->find_one($col['id']);
                           //save payment status
                        $cv->status=2;
                        $cv->amount_paid=$amount_to_pay;
                        $cv->qty_paid=(int)($amount_to_pay/$price);
                        $cv->save();

                        $ck = ORM::for_table('farmer_payment_schedule')->create();
                        //save payment status
                        //Pay system
                        $ck->ginner_id=$admin['ginner_id'];
                        $ck->order_no=$d->order_no;
                        $ck->status=1;
                        $ck->amount=$amount_to_pay;
                        $ck->farmer_id=$col->farmer_id;
                        $ck->phonenumber=$phonenumber;
                        $ck->save();

                        $gin = ORM::for_table('ginner')->find_one($admin['id']);
                       // $message=Message::_filter("farmerpaymentsuccess", "",$farmer->fullname,$gin->fullname);
                        $message="Ndugu Mkulima, shilingi ".$amount_to_pay." imeshalipwa kwa mauzo ya kilo ".$cv->qty." za pamba kwa bei ya shilingi".$amount_to_pay;
                       SendSMS::_sendSMS($_c, $farmer->phonenumber, $message); 
                        
                    }

                    $pay_farmers=$pay_farmers-$amount_to_pay;

                }

                //system payment
                $cv = ORM::for_table('system_payment_schedule')->create();
                //save payment status
                //Pay system
                //send sms
                $message=Message::_filter("systempaymentsuccess");
                //SendSMS::_sendSMS($_c, $_c['phone'], $message);
                $cv->ginner_id=$admin['ginner_id'];
                $cv->order_no=$d->order_no;
                $cv->status=1;
                $cv->amount=$system_amount;
                $cv->save();

                //pay amcos

                $cv = ORM::for_table('amcos_payment_schedule')->create();
                //save payment status
                //Pay system
                //send sms
                $am = ORM::for_table('amcos')->find_one($d->amcos_id);
                $gin = ORM::for_table('ginner')->find_one($admin['ginner_id']);
               // $message=Message::_filter("ginnerorderapproval", "",$am->name,"",$d->order_no);
               // $message="AMCOS ".$am->name." Namba yako ya Mauzo ".$d->order_no." imeshalipwa  na ".$gin->name.". Asante";
                $message=$am->name." Mauzo yako ya ".$d->qty."kg yamethibishwa na ".$gin->name." Namba yako mauzo ni".$d->order_no;
                SendSMS::_sendSMS($_c, $am->phonenumber, $message);

                //$message=Message::_filter("amcospaymentsuccess", "",$am->name,"",$d->order_no);
                $message="AMCOS ".$am->name." Namba yako ya Mauzo ".$d->order_no." imeshalipwa  na ".$gin->name.". Asante";
                SendSMS::_sendSMS($_c, $am->phonenumber, $message);

                $cv->ginner_id=$admin['ginner_id'];
                $cv->order_no=$d->order_no;
                $cv->amcos_id=$d->amcos_id;
                $cv->status=1;
                $cv->amount=$amcos_amount;
                $cv->save();

               $d->status=3;
               $d->save();

                _log($admin['username'] . ' ' . "Scheduled Payment", 'Admin',$admin['id']);
                  r2(U . 'order/list-gin', 's', "Payment scheduled successfully");
               
            }else{

                   r2(U . 'order/list-gin', 'e', "Payment not successully scheduled");
                
            }
           }else{
            r2(U . 'order/approve-ordera/'.$id, 'e', "Wrong OTP Code");
           }

        break;

    case 'list-gin':
            $type=$routes['2'];
           $name = _post('username');
           if ($name != '') {
               $paginator = Paginator::bootstrap('orders', 'ginner_id', '%' . $name . '%');
               $d = ORM::for_table('orders')->where('ginner_id',$admin['ginner_id'])->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
           } else {
               if ($type != '') {
                   $paginator = Paginator::bootstrap('orders', 'ginner_id', '%' . $type . '%');
                   $d = ORM::for_table('orders')->where('ginner_id',$admin['ginner_id'])->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
               } else {
               $paginator = Paginator::bootstrap('orders', 'ginner_id', '%' . $admin['id'] . '%');
               $d = ORM::for_table('orders')->where('ginner_id',$admin['ginner_id'])->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
               }
           }
   
           $ui->assign('d', $d);
           $ui->assign('paginator', $paginator);
           $ui->display('orders-gin.tpl');
   
     break;    

     case 'create-order':
     

        $ui->assign('_title', 'Add cotton - ' . $config['CompanyName']);
         
        $ginner = ORM::for_table('ginner')->find_many();
        $d = ORM::for_table('amcos')->find_one($admin['amcos_id']);
        $village = ORM::for_table('tbl_villages')->find_one($d->village_id);
        $ward = ORM::for_table('tbl_ward')->find_one($d->ward_id);
      
        $rates = ORM::for_table('tbl_ratescommissions')->where('district_id',$ward->district_id)->order_by_desc('id')->find_one();
        $ui->assign('min', $rates->min_rate);
        //$farmer = ORM::for_table('farmer')->where('status','on')->where('village_id',$d->village_id)->find_many();
        $qty = ORM::for_table('cotton_collection')->where('amcos_id',$admin['amcos_id'])->where('status','2')->sum('qty');
        $ui->assign('qty', $qty);
        $ui->assign('ginner', $ginner);
        
        $ui->display('create-order.tpl');
        break;

     case 'edit':
              $id = $routes['2'];
            $ui->assign('_title', 'Edit cotton  - ' . $config['CompanyName']);
            $ginner = ORM::for_table('ginner')->find_many();
            $d = ORM::for_table('amcos')->find_one($admin['id']);
            $rates = ORM::for_table('tbl_ratescommissions')->where('village_id',$d->village_id)->order_by_desc('id')->find_one();
            $ui->assign('min', $rates->min_rate);
        //$farmer = ORM::for_table('farmer')->where('status','on')->where('village_id',$d->village_id)->find_many();
            $d = ORM::for_table('orders')->find_one($id);
            if ($d) {
                $ui->assign('ginner', $ginner);
                $ui->assign('d', $d);
                $ui->display('order-edit.tpl');
            } else {
                r2(U . 'order/list', 'e', $_L['Account_Not_Found']);
            }

          break;

    case 'delete':
       
            $id = $routes['2'];
    
            $d = ORM::for_table('orders')->find_one($id);
            if ($d) {
               
                $d->delete();
                _log($admin['username'] . ' ' . "Deleted order record", 'Admin',$admin['id']);
                r2(U . 'order/list', 's', $_L['Delete_Successfully']);
            }else{
                r2(U . 'order/list', 'e', $_L['Account_Not_Found']);
            
            }
            break;
     case 'deliveryb-gin':
       
                $id = $routes['2'];
                
                $d = ORM::for_table('orders')->find_one($id);
                $ui->assign('id', $id);
                $ui->assign('d', $d);
                $ui->display('delivery-details.tpl');      
            break;
            
     case 'receiveb-gin':
       
                $id = $routes['2'];
                $d = ORM::for_table('orders')->find_one($id);
                if($d){
                  
                    $ui->assign('qty',$d->qty);
                    $ui->assign('d',$d);
                }
                $ui->assign('d',$d);
                $ui->assign('id', $id);
    
                $ui->display('receive-cotton.tpl');   

            break;

     case 'receivea-gin':
                $id = _post('id');
       
                $empty_weight=_post('empty_weight');
                $verified_qty = _post('received_qty');
                $d = ORM::for_table('orders')->find_one($id);
                if ($d) {
                    $d->empty_weight=$empty_weight;
                    $d->verified_qty=$verified_qty;
                    $d->save();

                    _log($admin['username'] . ' ' . "Delivery Received", 'Admin',$admin['id']);
                  r2(U . 'order/list-gin', 's', "Delivery successfully Received");
               
                }else{

                   r2(U . 'order/list-gin', 'e', $_L['Account_Not_Found']);
                
                }
        
         break;            
     case 'deliverya-gin':
                $id = _post('id');
                $trans_name=_post('trans_name');
                $trans_phonenumber=_post('trans_phonenumber');
                $trans_truck=_post('trans_truck');
                $trans_trailer=_post('trans_trailer');
                $empty_weight=_post('empty_weight');
                $verified_qty = _post('transeived_qty');
                $d = ORM::for_table('orders')->find_one($id);
                if ($d) {
                    $d->trans_name=$trans_name;
                    $d->trans_phonenumber=$trans_phonenumber;
                    $d->trans_truck=$trans_truck;
                    $d->trans_trailer=$trans_trailer;
                    $d->delivery_details=$delivery_details;
                    $d->save();
                    _log($admin['username'] . ' ' . "Delivery details added", 'Admin',$admin['id']);
                  r2(U . 'order/list-gin', 's', "Delivery data added successfully");
                }else{

                   r2(U . 'order/list-gin', 'e', $_L['Account_Not_Found']);
                
                }
        
         break;            
    case 'verify':
       
                $id = $routes['2'];
        
                $d = ORM::for_table('orders')->find_one($id);
                if ($d) {
                    $d->status=1;
                    $d->save();
                    //send sms
                    $am = ORM::for_table('amcos')->find_one($d->amcos_id);
                    $gin = ORM::for_table('ginner')->find_one($d->ginner_id);
                    $message=Message::_filter("amcosorderacceptance", "",$am->name,"",$d->order_no);

                    $message=$am->name." imeuza ".$d->qty."kg za pamba. Kwa ".$gin->name." Namba yako mauzo ni ".$d->order_no;
                    SendSMS::_sendSMS($_c, $am->phonenumber, $message);

                
                    //$message="Cotton order no.".$d->order_no." has been generated for you by AMCOS:  ".$am->name." ,Kindly login to the system and accept.";
                   
                    SendSMS::_sendSMS($_c, $gin->phonenumber, $message);
                    _log($admin['username'] . ' ' . "Verified order", 'Admin',$admin['id']);
                    r2(U . 'order/list', 's', "Verified successfully");
                }else{
                    r2(U . 'order/list', 'e', $_L['Account_Not_Found']);
                
                }

                break;
     case 'verify-gin':
       
                    $id = $routes['2'];
            
                    $d = ORM::for_table('orders')->find_one($id);
                    if ($d) {
                        $d->status=2;
                        $d->save();
                        //send sms
                        $am = ORM::for_table('amcos')->find_one($d->amcos_id);
                        $gin = ORM::for_table('ginner')->find_one($d->ginner_id);
                        //$message=Message::_filter("ginnerorderacceptance", "",$am->fullname,"",$d->order_no);
                        $message=$am->name." Mauzo yako ya ".$d->qty."kg yamekubaliwa na ".$gin->name." Namba yako mauzo ni ".$d->order_no;
                        SendSMS::_sendSMS($_c, $am->phonenumber, $message);

                        _log($admin['username'] . ' ' . "Verified order", 'Admin',$admin['id']);
                        r2(U . 'order/list-gin', 's', "Verified successfully");
                    }else{
                        r2(U . 'order/list-gin', 'e', $_L['Account_Not_Found']);
                    
                    }
    
        break;             
   case 'deactivate':
       
                    $id = $routes['2'];
            
                    $d = ORM::for_table('cotton')->find_one($id);
                    if ($d) {
                        $d->status="off";
                        $d->save();
                        _log($admin['username'] . ' ' . "Deactivated cotton name ".$d['fullname'], 'Admin',$admin['id']);
                        r2(U . 'cotton/list', 's', "cotton Deactivated successfully");
                    }else{
                        r2(U . 'cotton/list', 'e', $_L['Account_Not_Found']);
                    
                    }
                    
                    break;
        case 'order-add-post':
            $d = ORM::for_table('amcos')->find_one($admin['amcos_id']);
            $village = ORM::for_table('tbl_villages')->find_one($d->village_id);
            $ward = ORM::for_table('tbl_ward')->find_one($d->ward_id);
          
                $rate = ORM::for_table('tbl_ratescommissions')->where('district_id',$ward->district_id)->find_one();
                $ginner_id=_post('ginner_id');
                $qty=_post('qty');
                $price=_post('price');
                $amount=$qty*$price;
                $amcos_id=$admin['amcos_id'];
                $order = ORM::for_table('orders')->order_by_desc('id')->find_one();
                $nu=preg_replace("/[^0-9]/", "", $order->order_no );
                $order_no=sprintf('%03d',$nu+1);
                $order_no="CT-".$order_no;
               // if ($msg=='') {

                    $d = ORM::for_table('orders')->create();
                    $d->order_no = $order_no;
                    $d->ginner_id = $ginner_id;
                    $d->amcos_id = $amcos_id;
                    $d->qty = $qty;
                    $d->price = $price;
                    $d->amount = $amount;
                    $d->status = 0;
                    $d->save();

               //send sms

                    _log($admin['username'] . ' ' . "Created Order    ", 'Admin',$admin['id']);
                    r2(U . 'order/list', 's', " ".$_L['Created_Successfully']);

               // } else {
                  //  r2(U . 'cotton/add', 'e', $msg);
               // }

                break;

         case 'order-edit-post':
                    
                    $id = _post('id');
                    $ginner_id = _post('ginner_id');
                    $qty=_post('qty');
                    $price=_post('price');
                    $amount=$qty*$price;
                
                    $d = ORM::for_table('orders')->find_one($id);
                    
                    if ($msg == '') {
                        $d->qty = $qty;
                        $d->price = $price;
                        $d->amount = $amount;
                        $d->status = 0;
                        $d->save();
                        _log($admin['username'] . ' ' . "Updated Order ", 'Admin',$admin['id']);
                        r2(U . 'order/list', 's', $_L['Updated_Successfully']);
                    } else {
                        r2(U . 'order/edit', 'e', $msg);
                    }
                    break;
    
    
               


    default:
        echo 'action not defined';
}