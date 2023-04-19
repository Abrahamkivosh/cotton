<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
date_default_timezone_set('Africa/Nairobi');
$_SESSION['uid'] = 14;
_auth();
//$ui->assign('_title', $_L['Voucher'] . '- ' . $config['CompanyName']);
//$ui->assign('_system_menu', 'voucher');

$action = $routes['1'];

switch ($action) {

    case 'data_all':
        $time=date('d-m-Y H:i:s');
        $time_conv=strtotime($time)-(60*2);
        $time_back=date('d-m-Y H:i:s',$time_conv);
     
      
        //seperator
       function between_the_lines($str, $starting_word, $ending_word)
       {
           $subtring_start = strpos($str, $starting_word);
           $subtring_start += strlen($starting_word); 
           $size = strpos($str, $ending_word, $subtring_start) - $subtring_start; 
           return substr($str, $subtring_start, $size); 
       }
             
           $dataposted=file_get_contents('php://input');

           $actual = explode (";",$dataposted); 


       for($i=0;$i<count($actual);$i++){

           $data=ltrim(strstr($actual[$i], '='), '=type');

           $type=between_the_lines("type=".$data,'type=','&');
           $url = U.'check/'.$type;
           
           $ch = curl_init( $url );
           curl_setopt( $ch, CURLOPT_POST, 1);
           curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
           curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
           curl_setopt( $ch, CURLOPT_HEADER, 0);
           curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
           curl_exec( $ch );
           
       }

       break;
    
    case 'farmer-add-post':
        $amcos_id=_post('amcos_id');
        $user_id=_post('user_id');
        $am = ORM::for_table('amcos')->find_one($amcos_id);
        $firstname = _post('first');
        $middlename = _post('middle');
        $lastname = _post('last');
        $gender = _post('gender');
        $acre = _post('acre');
        $sub_village_id=_post('sub');
        $idno=_post('idno');
        $phonenumber = _post('phone');
        $village_id = $am->village_id;

     
           
            $code=_post('code');
            $d = ORM::for_table('farmer')->create();
            $d->firstname = $firstname;
            $d->middlename = $middlename;
            $d->lastname = $lastname;
            $d->gender = $gender;
            $d->sub_village_id = $sub_village_id;
            $d->idno = $idno;
            $d->acre = $acre;
            $d->status="off";
            $d->phonenumber = $phonenumber;
            $d->code = $code;
            $d->village_id = $village_id;
            $d->created_at = date('Y-m-d H:i:s');
            $d->amcos_id = $amcos_id;
            $d->user_id = $user_id;

            $d->save();
            //$message=Message::_filter("newfarmer", $fullname);
            $message=$firstname.", unasajiliwa kwenye mfumo wa PambaApp Tafadhari mpatie wakala namba ya Nenosiri ya wakati mmoja kudhibitisha usajili wako. Namba ni ".$code;
           
            SendSMS::_sendSMS($_c, $phonenumber, $message);
            
        break;


        case 'farmer-edit-post':
             $amcos_id=_post('amcos_id');
             $user_id=_post('user_id');
             $am = ORM::for_table('amcos')->find_one($amcos_id);
             $id = _post('id');
             $firstname = _post('firstname');
             $middlename = _post('middlename');
             $lastname = _post('lastname');
             $gender = _post('gender');
             $acre = _post('acre');
             $sub_village_id=_post('sub_village_id');
             $phonenumber = _post('phonenumber');
           
             $idno=_post('idno');
             $village_id = $am->village_id;
     
             //$code=rand(1231,7879);
             $d = ORM::for_table('farmer')->where('phonenumber',$phonenumber)->find_one();
             $code=_post('code');
            // $d->firstname = $firstname;
            // $d->middlename = $middlename;
            // $d->lastname = $lastname;
            // $d->gender = $gender;
            // $d->sub_village_id = $sub_village_id;
            // $d->acre = $acre;
            // $d->idno = $idno;
             $d->phonenumber = $phonenumber;
            // $d->village_id = $village_id;
             $d->code=$code;
             $d->status="off";
             $d->amcos_id = $amcos_id;
             $d->user_id = $user_id;
             $d->save();

             // $message=Message::_filter("newfarmer", $fullname);
             $message=$firstname.", unasajiliwa kwenye mfumo wa PambaApp Tafadhari mpatie wakala namba ya Nenosiri ya wakati mmoja kudhibitisha usajili wako. Namba ni ".$code;
             SendSMS::_sendSMS($_c, $phonenumber, $message);
             
             break;
         case 'activate':
       
                $phonenumber = _post('phonenumber');
                $code = _post('code');
        
                $d = ORM::for_table('farmer')->where('code',$code)->where('phonenumber',$phonenumber)->find_one();
                if ($d) {
                    $d->status="on";
                    $d->save();
                }
                

            break;


    case 'issue_input_order':
        $farmer_id=_post('farmer_id');
        $input_id=_post('input_id');
        $input_qty=_post('input_qty')*_post('acre');
        $amcos_id=_post('amcos_id');
        $user_id=_post('user_id');
        $code=_post('code');

        $ref=ORM::for_table('amcos_input_order')->order_by_desc('id')->find_one();
        $ref_id=$amcos_id."".$user_id."".($ref->id+1);
        $input_check= ORM::for_table('inputs')->find_one($input_id);
        $farmer_check= ORM::for_table('farmer')->find_one($farmer_id);
    
        $issued_inputs = ORM::for_table('amcos_input_order')->where('farmer_id',$farmer_id)->find_many();
      
        $d_c= ORM::for_table('amcos_input_order')->where('farmer_id',$farmer_id)->where('input_id',$input_id)->where_gte('date',date('Y-01-01'))->where_lte('date',date('Y-12-30'))->find_many();
        $input_c=0;
        foreach($d_c as $dks){
        $input_c=$dks->input_qty+$input_c;
        }
       // if(($farmer_check->acre*$input_check->rate_per_acre)>=($input_c+$input_qty)){
        //if($findref){
        //    r2(U . 'input_amcos/issue_input_sec1', 'e', "Input was already issued");
       // }else{

        $inputs = ORM::for_table('input_order')->where('amcos_id',$amcos_id)->where('input_id',$input_id)->where('confirm',0)->find_many();
        $actual_qty=0;
        $used_qty=0;

        foreach($inputs as $cs){
            $actual_qty=$cs['input_qty']+$actual_qty;
            $used_qty=$cs['used_qty']+$used_qty;
        }
        
      //  if($input_qty<=($actual_qty-$used_qty)){

        $remain_qty=$input_qty;
      /*  $findme = ORM::for_table('amcos_input_order')->where('ref_id',$ref_id)->where('input_id',$input_id)->find_one();
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
         
         }
         

        }else{

            */
        $d = ORM::for_table('amcos_input_order')->create();
        $d->ref_id = $ref_id;
        $d->input_qty = $input_qty;
        $d->date = date("Y-m-d");
        $d->created_at = date("Y-m-d H:i:s");
        $d->input_id = $input_id;
        $d->farmer_id = $farmer_id;
        $d->amcos_id = $amcos_id;
        $d->status = 1;
        $d->code = $code;
       /* $final_qty=$input_qty;
        if(($farmer_check->acre*$input_check->rate_per_acre)>=($final_qty)){
            */
        $d->save();
          /*  }else{
            }
           
        }
        */

       // if(($farmer_check->acre*$input_check->rate_per_acre)>=$final_qty ){
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
        //}

        $farmer = ORM::for_table('farmer')->find_one($farmer_id);
            $message=$farmer->firstname." ".$farmer->$middlename." ".$farmer->lastname.", Tafadhali mpatie wakala namba ya Nenosiri ya wakati mmoja kudhibitisha kupokea Pembejeo Kilo ".$input_qty.". Namba ni OTP ".$code;
                 
            SendSMS::_sendSMS($_c, $farmer->phonenumber, $message);
        $farmer->acre=_post('acre');
        $farmer->save();
     /*   }else{

        } 
       /* }else{
    
        }
        */
        
    
        break;

        case 'input_code_confirm':
            $farmer_id=_post('farmer_id');
            $code=_post('code');
            $d=ORM::for_table('amcos_input_order')->where('farmer_id',$farmer_id)->where('code',$code)->find_one();
            if($d){
            $d->status=0;
            $d->save();
           
            $message=$d->firstname." ".$d->$middlename." ".$d->lastname.", Nenosiri limethibitishwa, asante. ";
                 
            SendSMS::_sendSMS($_c, $farmer->phonenumber, $message);
            }

            break;
        case 'farmer_code_confirm':
            $phonenumber=_post('phonenumber');
            $code=_post('code');
            $d=ORM::for_table('farmer')->where('phonenumber',$phonenumber)->where('code',$code)->find_one();
            if($d){
            $d->status="on";
            $d->code="1";
            $d->save();
        
            $message=$farmer->d." ".$d->$middlename." ".$d->lastname.", Nenosiri limethibitishwa, asante. ";
                 
            SendSMS::_sendSMS($_c, $phonenumber, $message);
            }

            break;

        case 'pulldata':
        $ad=array("oki"=>"12334");

        echo json_encode($ad);

            break;
     default:
        $ui->display('404.tpl');
}
