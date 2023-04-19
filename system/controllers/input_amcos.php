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
    case 'list':
        $name = _post('username');
        if ($name != '') {
            $paginator = Paginator::bootstrap('input_order', 'amcos_id', $admin['amcos_id']);
            $d = ORM::for_table('input_order')->where('amcos_id',$admin['amcos_id'])->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        } else {
            $paginator = Paginator::bootstrap('input_order', 'amcos_id', $admin['id']);
            $d = ORM::for_table('input_order')->where('amcos_id',$admin['amcos_id'])->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            }
    
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->display('amcos-inputs.tpl');
        break;

        case 'issue_input_sec1':
            $ui->assign('_title', 'Issue inputs- ' . $config['CompanyName']);
            
            $d = ORM::for_table('amcos')->find_one($admin['amcos_id']);
        
            $farmer = ORM::for_table('farmer')->where('status','on')->where('village_id',$d->village_id)->order_by_desc('id')->find_many();
    
            $ui->assign('farmer', $farmer);
            $ref=ORM::for_table('amcos_input_order')->order_by_desc('id')->find_one();
            $ref_id=$admin['amcos_id']."".$admin['id']."".($ref->id+1);
            $ui->assign('ref_id', $ref_id);
            $ui->display('amcos-inputs-issue-sec1.tpl');
           break;

        case 'issue_input_sec2':
            $ui->assign('_title', 'Issue inputs- ' . $config['CompanyName']);
            $farmer_id=_post('farmer_id');
            $ref_id=_post('ref_id');
            $farmer_check= ORM::for_table('farmer')->find_one($farmer_id);
            $ui->assign('farmer', $farmer_check);
            $issued_inputs = ORM::for_table('amcos_input_order')->where('farmer_id',$farmer_id)->find_many();
            $ui->assign('input_issued', $issued_inputs);
            $input_order = ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->find_many();  
            $inputs = ORM::for_table('input_order')->where('amcos_id',$admin['amcos_id'])->where('confirm',0)->find_many();
            $ui->assign('inputs', $inputs);

            $ui->assign('input_order', $input_order);
            $ui->assign('farmer_id', $farmer_id);
            $ref=ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->find_one();
            if($ref){
            $ref=ORM::for_table('amcos_input_order')->order_by_desc('id')->find_one();
            $ref_id=$ref->ref_id+1;
            }
            $ui->assign('ref_id', $ref_id);
            
            $ui->display('amcos-inputs-issue-sec2.tpl');
        break;    

        case 'issue_input_order':
            $ui->assign('_title', 'Issue inputs- ' . $config['CompanyName']);
            $farmer_id=_post('farmer_id');
            $ui->assign('farmer_id', $farmer_id);
            $ref_id=_post('ref_id');
             $input_id=_post('input_id');
            $input_qty=_post('input_qty');
            $input_check= ORM::for_table('inputs')->find_one($input_id);
            $farmer_check= ORM::for_table('farmer')->find_one($farmer_id);
            $ui->assign('farmer', $farmer_check);
            $issued_inputs = ORM::for_table('amcos_input_order')->where('farmer_id',$farmer_id)->find_many();
            $ui->assign('input_issued', $issued_inputs);
            $d_c= ORM::for_table('amcos_input_order')->where('farmer_id',$farmer_id)->where('input_id',$input_id)->where_gte('date',date('Y-01-01'))->where_lte('date',date('Y-12-30'))->find_many();
            $input_c=0;
            foreach($d_c as $dks){
            $input_c=$dks->input_qty+$input_c;
            }
            if(($farmer_check->acre*$input_check->rate_per_acre)>=($input_c+$input_qty)){
            //if($findref){
            //    r2(U . 'input_amcos/issue_input_sec1', 'e', "Input was already issued");
           // }else{

            $inputs = ORM::for_table('input_order')->where('amcos_id',$admin['amcos_id'])->where('input_id',$input_id)->where('confirm',0)->find_many();
            $actual_qty=0;
            $used_qty=0;

            foreach($inputs as $cs){
                $actual_qty=$cs['input_qty']+$actual_qty;
                $used_qty=$cs['used_qty']+$used_qty;
            }
            

            
            if($input_qty<=($actual_qty-$used_qty)){

            $remain_qty=$input_qty;
            $findme = ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->where('input_id',$input_id)->find_one();
            if($findme){

             $d= ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->where('input_id',$input_id)->find_many();
             $final_qty=$input_qty;
             foreach($d as $dks){
             $final_qty=$dks->input_qty+$final_qty;
             }
             $d->input_qty = $final_qty;

             if(($farmer_check->acre*$input_check->rate_per_acre)>=($final_qty)){
             $d->save();
             }else{
               // echo '<script>alert("Input given exceeds limit")</script>'; 
                _msglog('e', "Input given exceeds limit");
             }
             

            }else{
            $d = ORM::for_table('amcos_input_order')->create();
            $d->ref_id = $ref_id;
            $d->input_qty = $input_qty;
            $d->date = date("Y-m-d");
            $d->created_at = date("Y-m-d H:i:s");
            $d->input_id = $input_id;
            $final_qty=$input_qty;
            if(($farmer_check->acre*$input_check->rate_per_acre)>=($final_qty)){
                $d->save();
                }else{
                   // r2(U . 'input_amcos/issue_input_sec1', 'e', "Input given exceeds limit");
                  //  echo '<script>alert("Input given exceeds limit")</script>'; 
                  _msglog('e', "Input given exceeds limit");
                }
               
            }

            if(($farmer_check->acre*$input_check->rate_per_acre)>=$final_qty ){
            $d = ORM::for_table('stock_amcos')->where('input_id',$input_id)->where('date',date("Y-m-d"))->find_one();
            if($d){
            $d = ORM::for_table('stock_amcos')->find_one($d->id);
            $d->issued_qty = $d->issued_qty+$input_qty;
            $d->date = date("Y-m-d");
            $d->created_at = date("Y-m-d H:i:s");
            $d->input_id = $input_id ;
            $d->save();
            }else{
                $d = ORM::for_table('stock_amcos')->create();
                $d->input_id = $input_id;
                $d->issued_qty = $input_qty;
                $d->date = date("Y-m-d");
                $d->created_at = date("Y-m-d H:i:s");
                $d->input_id = $input_id;
                $d->save();
            }
            
            foreach($inputs as $cs){
                
                $input_d=ORM::for_table('input_order')->find_one($cs['id']);
                
                if($remain_qty>=($input_d->input_qty-$input_d->used_qty)){
                $input_d->used_qty=$input_d->input_qty;
                $input_d->confirm=1;
                $remain_qty=$remain_qty-($input_d->input_qty-$input_d->used_qty);
                
                }else{
                    $input_d->used_qty=$input_d->used_qty+$remain_qty;
                   
                    $remain_qty=0;  
                }

                $input_d->save();
            }
            }
            }else{
              //  r2(U . 'input_amcos/issue_input_sec1', 'e', "Quantity exceeds available quantity");
              //  echo '<script>alert("Quantity exceeds available quantity")</script>';
              _msglog('e', "Quantity exceeds available quantity");
            } 
            }else{
                _msglog('e', "Input given exceeds limit");
            }
            
        
            $input_order = ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->find_many();  
            $inputs = ORM::for_table('input_order')->where('amcos_id',$admin['amcos_id'])->where('confirm',0)->find_many();
            $ui->assign('inputs', $inputs);
            $ui->assign('input_order', $input_order);
            
        
            $ui->assign('ref_id', $ref_id);
           $ui->display('amcos-inputs-issue-sec2.tpl');
       // }
        break;
        case 'issue_input_order_post':
            $ui->assign('_title', 'Issue inputs- ' . $config['CompanyName']);
            $farmer_id=$routes['2'];
            $ref_id=$routes['3'];
            $code=rand(1231,7879);

            $findref = ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->find_many();
            $input_qty=0;
            foreach($findref as $findre){
             $d= ORM::for_table('amcos_input_order')->find_one($findre->id);
             $d->farmer_id = $farmer_id;
             $d->user_id= $admin['id'];
             $d->code=$code;
             $d->status=0;
             $d->created_at=date('Y-m-d H:i:s');
             $d->save();
             $input_qty=$input_qty+$d->input_qty;
            }

            $farmer = ORM::for_table('farmer')->find_one($farmer_id);
            $message=$farmer->firstname." ".$farmer->$middlename." ".$farmer->lastname.", Tafadhali mpatie wakala namba ya Nenosiri ya wakati mmoja kudhibitisha kupokea Pembejeo Kilo ".$input_qty.". Namba ni ".$code;
                 
            SendSMS::_sendSMS($_c, $farmer->phonenumber, $message);

            $ui->assign('farmer_id', $farmer_id);
            $ui->assign('ref_id', $ref_id);
            $ui->display('confirm-input.tpl');
  
        break; 

        case 'issue_input_order_post2':
            $ui->assign('_title', 'Issue inputs- ' . $config['CompanyName']);
            $farmer_id=_post('farmer_id');
            $ref_id=_post('ref_id');
            $code=_post('code');
            

            
            $findme = ORM::for_table('amcos_input_order')->where('code',$code)->where('farmer_id',$farmer_id)->find_one();
            if($findme){
                $findref = ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->find_many();
                foreach($findref as $findre){
                 $d= ORM::for_table('amcos_input_order')->find_one($findre->id);
                 $d->farmer_id = $farmer_id;
                 $d->user_id= $admin['id'];
                 $d->amcos_id= $admin['amcos_id'];
                 $d->status=1;
                 $d->save();
                }

             _log($admin['username'] . ' ' . "Inputs issued  ", 'Admin',$admin['id']);
             r2(U . 'input_amcos/print_receipt/'.$ref_id, 's', "Inputs issued successfully");
         } else {
            
             $ui->assign('farmer_id', $farmer_id);
             $ui->assign('ref_id', $ref_id);
             $ui->display('confirm-input.tpl');
         }

        break; 
      
        case 'issue_input_delete':

            $ui->assign('_title', 'Issue inputs delete- ' . $config['CompanyName']);
            $farmer_id=$routes['2'];
            $ref_id=$routes['3'];
            $order_id=$routes['4'];

            $farmer_check= ORM::for_table('farmer')->find_one($farmer_id);
            $ui->assign('farmer', $farmer_check);
            $issued_inputs = ORM::for_table('amcos_input_order')->where('farmer_id',$farmer_id)->find_many();
            $ui->assign('input_issued', $issued_inputs);

            $d = ORM::for_table('amcos_input_order')->find_one($order_id);
           
           
            
            $dv = ORM::for_table('stock_amcos')->where('input_id',$d->input_id)->where('date',date("Y-m-d"))->find_one();
            if($dv){
            $dv = ORM::for_table('stock_amcos')->find_one($dv->id);
            $dv->issued_qty = $dv->issued_qty-$d->input_qty;
            $dv->save();
            }

            if($d){
                $ds = ORM::for_table('amcos_input_order')->find_one($order_id); 
            $d->delete();
            }
            $input_order = ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->find_many();  
             
            
                $dk = ORM::for_table('input_order')->where('amcos_id',$admin['amcos_id'])->where('input_id',$ds->input_id)->order_by_desc('id')->find_one();  
                $d = ORM::for_table('input_order')->find_one($dk->id);  
                $d->used_qty=$dk->used_qty-$ds->input_qty;
                if($ds){
                $d->save();
                }
            
            $inputs = ORM::for_table('input_order')->where('amcos_id',$admin['amcos_id'])->where('confirm',0)->find_many();
            $ui->assign('inputs', $inputs);
            $ui->assign('input_order', $input_order);
            $ui->assign('farmer_id', $farmer_id);
            $ui->assign('ref_id', $ref_id);

           
            $ui->display('amcos-inputs-issue-sec2.tpl');
        break;   

     case 'inputs-issued-list':
            $farmer_id = _post('farmer_id');
            if ($name != '') {
                $paginator = Paginator::bootstrap('amcos_input_order', 'amcos_id', '%' . $admin['amcos_id'] . '%');
                $d = ORM::for_table('amcos_input_order')->where_like('farmer_id', '%' . $farmer_id . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            } else {
                $paginator = Paginator::bootstrap('amcos_input_order', 'amcos_id', $admin['amcos_id']);
               $d = ORM::for_table('amcos_input_order')->where('amcos_id',$admin['amcos_id'])->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
            }
            $ui->assign('d', $d);
            $ui->assign('paginator', $paginator);
            $ui->display('amcos-issued-inputs.tpl');    
        break;

     case 'print_receipt':
        $ref_id=$routes['2'];
        $d = ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->find_one();
        $farmer=ORM::for_table('farmer')->find_one($d->farmer_id);
        $d = ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->find_many();
        $ui->assign('farmer', $farmer);
        $ui->assign('ref_id', $ref_id);
        $ui->assign('d', $d);
        $ui->display('amcos-issue-input-print.tpl');
        break;       

    
    default:
        echo 'action not defined';
}