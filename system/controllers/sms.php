<?php

/**
 * PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


 * @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 * */
_admin();
$ui->assign('_title', 'SMS- ' . $config['CompanyName']);
$ui->assign('_system_menu', 'sms');

$action = $routes['1'];
$admin = Admin::_info();
$ui->assign('_admin', $admin);

switch ($action) {
    case 'compose':
        $c = ORM::for_table('agents')->find_many();
        $t = ORM::for_table('sms_template')->find_many();
        $sms = ORM::for_table('sms_group')->find_many();
        $ui->assign('sms', $sms);
        $ui->assign('c', $c);
        $ui->assign('t', $t);
        $ui->display('compose.tpl');
        break;

    case 'sms_send_selected':
        $d = ORM::for_table('agents')->find_many();
        $t = ORM::for_table('sms_template')->find_many();
        $ui->assign('d', $d);
        $ui->assign('t', $t);
        $ui->display('compose_selected.tpl');
        break;

    case 'compose-post':

        $lan = ORM::for_table('tbl_language')->find_many();
        $ui->assign('lan', $lan);

        $timezonelist = Timezone::timezoneList();
        $ui->assign('tlist', $timezonelist);
        $ui->assign('xjq', ' $("#tzone").select2(); ');
        $ui->display('app-localisation.tpl');
        break;

    case 'template':

        $c = ORM::for_table('sms_template')->find_many();
        $paginator = Paginator::bootstrap('sms_template');
        $ui->assign('t', $c);
        $ui->assign('paginator', $paginator);
        $ui->display('template.tpl');

        break;

    case 'sms_send_post_s':
        $id=$_POST['id'];
         $messaga = _post('messaga');

        if($messaga!=""){
            $message = _post('messaga');
        }else{
            $message = _post('message');
        }

        $mess[]=array();

        for ($i = 0; $i < count($id); $i++) {

            $m = ORM::for_table('tbl_agents')->find_one($id[$i]);
            $ph=$m['phonenumber'];
            $str = $m['phonenumber'];
            $str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $str);
            $str = ltrim($str, '0');
            //$name=$m['fullname'];
            $c = ORM::for_table('agents')->where('phonenumber', $ph)->find_one();
            $account=$c['username'];

            $name=$c['fullname'];
            $mess[$i]=$message;
            $mess[$i]=str_replace("{name}",$name,$mess[$i]);
        


            $phonenumber_no = '+251' . $str;
            $recipients = $phonenumber_no;


            SendSMS::_sendSMS($_c,$recipients,$mess[$i]);


        }
        $c = ORM::for_table('sms_sent')->find_many();
        $paginator = Paginator::bootstrap('sms_sent');
        $ui->assign('t', $c);
        $ui->assign('paginator', $paginator);

       r2(U . 'sms/sent_sms', 's', 'SMS Sent successfully');
        break;
    case 'sms_send_post':
        $phonev = _post('phone');
        $phonenumber = _post('phonenumber');

        $messaga = _post('messaga');
        $group_id=_post('group_id');
        if($messaga!=""){
            $message = _post('messaga');
        }else{
            $message = _post('message');
        }

if($group_id!=""){
    $phone = ORM::for_table('agents')->where('sms_group_id',$group_id)->find_many();
    $mess[] = array();
    $i = 0;
    foreach ($phone as $m) {
     
        $ph = $m['phonenumber'];
        $str = $m['phonenumber'];
        $str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $str);
        $str = ltrim($str, '0');
        //$name=$m['fullname'];
        $c = ORM::for_table('agents')->where('phonenumber', $ph)->find_one();
        $account = $c['username'];

        $name = $c['fullname'];
        $mess[$i] = $message;
        $mess[$i] = str_replace("{name}", $name, $mess[$i]);
        $mess[$i] = str_replace("{account}", $account, $mess[$i]);
      


        $phonenumber_no = '+251' . $str;
        $recipients = $phonenumber_no;
        SendSMS::_sendSMS($_c, $recipients, $mess[$i]);
        $i += 1;
    }
}else{
    if ($phonenumber == "all") {
        $phone = ORM::for_table('agents')->find_many();
        $mess[] = array();
        $i = 0;
        foreach ($phone as $m) {
     
            $ph = $m['phonenumber'];
            $str = $m['phonenumber'];
            $str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $str);
            $str = ltrim($str, '0');
            //$name=$m['fullname'];
            $c = ORM::for_table('agents')->where('phonenumber', $ph)->find_one();
            $account = $c['username'];

            $name = $c['fullname'];
            $mess[$i] = $message;
            $mess[$i] = str_replace("{name}", $name, $mess[$i]);
            $mess[$i] = str_replace("{account}", $account, $mess[$i]);
          


            $phonenumber_no = '+251' . $str;
            $recipients = $phonenumber_no;
            SendSMS::_sendSMS($_c, $recipients, $mess[$i]);
            $i += 1;
        }
    } elseif ($phonenumber == "inactive") {
        $phone = ORM::for_table('agents')->where('status', 'off')->find_many();


        $mess[] = array();
        $i = 0;
        foreach ($phone as $m) {
            $cu = ORM::for_table('agents')->find_one($m['customer_id']);
          
            $tell = $cu['phonenumber'];
            $str = $cu['phonenumber'];
            $str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $str);
            $str = ltrim($str, '0');
            //$name=$m['fullname'];

            $account = $cu['username'];

            $name = $cu['fullname'];
            $mess[$i] = $message;
            $mess[$i] = str_replace("{name}", $name, $mess[$i]);
            $mess[$i] = str_replace("{account}", $account, $mess[$i]);
          

            $phonenumber_no = '+251' . $str;
            $recipients = $phonenumber_no;
            SendSMS::_sendSMS($_c, $recipients, $mess[$i]);
            $i += 1;
        }
    }  elseif ($phonenumber == "active") {
        $phone = ORM::for_table('agents')->where('status', 'on')->find_many();


        $mess[] = array();
        $i = 0;
        foreach ($phone as $m) {
            $cu = ORM::for_table('agents')->find_one($m['customer_id']);
          
            $tell = $cu['phonenumber'];
            $str = $cu['phonenumber'];
            $str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $str);
            $str = ltrim($str, '0');
            //$name=$m['fullname'];

            $account = $cu['username'];

            $name = $cu['fullname'];
            $mess[$i] = $message;
            $mess[$i] = str_replace("{name}", $name, $mess[$i]);
            $mess[$i] = str_replace("{account}", $account, $mess[$i]);
      

            $phonenumber_no = '+251' . $str;
            $recipients = $phonenumber_no;
            SendSMS::_sendSMS($_c, $recipients, $mess[$i]);
            $i += 1;
        }
    }elseif ($phonenumber != "all" and $phonenumber != "ooo") {
        $c = ORM::for_table('agents')->where('phonenumber', $phonenumber)->find_one();
      
        $account = $c['username'];
        $name = $c['fullname'];
        $str = $phonenumber;
        $str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $str);
        $str = ltrim($str, '0');
        $phonenumber_no = '+251' . $str;
        $message = str_replace("{name}", $name, $message);
        $message = str_replace("{account}", $account, $message);
     
        $recipients = $phonenumber_no;

        SendSMS::_sendSMS($_c, $recipients, $message);

    } else {

        $phonenumber_no = $phonev;
        $recipients = $phonenumber_no;
        SendSMS::_sendSMS($_c, $recipients, $message);
      }
    }

        $c = ORM::for_table('sms_sent')->find_many();
        $paginator = Paginator::bootstrap('sms_sent');
        $ui->assign('t', $c);
        $ui->assign('paginator', $paginator);
        _log($admin['username'] . ' ' . "Sent Bulk sms  ", 'Admin',$admin['id']);
        r2(U . 'sms/sent_sms', 's', 'SMS Sent successfully');

        break;

    case 'sent_sms':
        $phonenumber=_post('phonenumber');
        if ($phonenumber != '') {
            $paginator = Paginator::bootstrap('sms_sent', 'phone', '%' . $phonenumber . '%');
            $c = ORM::for_table('sms_sent')->where_like('phone', '%' . $phonenumber . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();

            }else {
            $paginator = Paginator::bootstrap('sms_sent');
            $c = ORM::for_table('sms_sent')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }
        $ui->assign('t', $c);
        $ui->assign('paginator', $paginator);
        $ui->display('sms_sent.tpl');


        break;


    case 'template-add':
     
        $ui->display('template-add.tpl');
        break;

    case 'template-edit':
      

        $id = $routes['2'];
        $d = ORM::for_table('sms_template')->find_one($id);
        if ($d) {
            $ui->assign('d', $d);
            $ui->display('template-edit.tpl');
        } else {
            r2(U . 'sms/template', 'e', 'SMS Template not found');
        }
        break;

    case 'template-delete':
      

        $id = $routes['2'];

        $d = ORM::for_table('sms_template')->find_one($id);
        if ($d) {
            $d->delete();
            r2(U . 'sms/template', 's', 'SMS template deleted successfully');
        } else {
            r2(U . 'sms/template', 'e', 'Template not found');
        }
        break;

    case 'template-post':
        $purpose = _post('purpose');
        $message = _post('message');

        $msg = '';


        $d = ORM::for_table('sms_template')->where('message', $message)->find_one();
        if ($d) {
            $msg .= $_L['account_already_exist'] . '<br>';
        }
        $date_now = date("Y-m-d H:i:s");
        if ($msg == '') {

            $d = ORM::for_table('sms_template')->create();
            $d->purpose = $purpose;
            $d->message = $message;
            $d->save();

            _log($admin['username'] . ' ' . "Added sms template  ".$d['purpose'], 'Admin',$admin['id']);
            r2(U . 'sms/template', 's', 'SMS template created successfully');
        } else {
            r2(U . 'sms/add-template', 'e', $msg);
        }
        break;

    case 'template-edit-post':
        $purpose = _post('purpose');
        $message = _post('message');


        $msg = '';


        $id = _post('id');
        $d = ORM::for_table('sms_template')->find_one($id);
        if ($d) {

        } else {
            $msg .= 'SMS template not found<br>';
        }

        if ($d['message'] != $message) {
            $c = ORM::for_table('sms_template')->where('message', $message)->find_one();
            if ($c) {
                $msg .= 'SMS Template doesnt exist<br>';
            }
        }

        if ($msg == '') {
            $d->purpose = $purpose;


            $d->message = $message;


            $d->save();

            _log($admin['username'] . ' ' . "Updated sms template  ".$d['purpose'], 'Admin',$admin['id']);
            r2(U . 'sms/template', 's', 'SMS Template edited Successfully');
        } else {
            r2(U . 'sms/template-edit/' . $id, 'e', $msg);
        }
        break;

   
    //sms group
    case 'group':

        $c = ORM::for_table('sms_group')->find_many();
        $paginator = Paginator::bootstrap('sms_group');
        $ui->assign('t', $c);
        $ui->assign('paginator', $paginator);
        $ui->display('group.tpl');

        break;
    case 'group-add':
     
        $ui->display('group-add.tpl');
        break;

    case 'group-edit':
    
        $id = $routes['2'];
        $d = ORM::for_table('sms_group')->find_one($id);
        if ($d) {
            $ui->assign('d', $d);
            $ui->display('group-edit.tpl');
        } else {
            r2(U . 'sms/group', 'e', 'SMS Group not found');
        }
        break;

    case 'group-delete':
      

        $id = $routes['2'];

        $d = ORM::for_table('sms_group')->find_one($id);
        if ($d) {
            $d->delete();
            r2(U . 'sms/group', 's', 'SMS Group deleted successfully');
        } else {
            r2(U . 'sms/group', 'e', 'Group not found');
        }
        break;

    case 'group-post':
        $group_name = _post('group_name');

        $msg = '';

        $d = ORM::for_table('sms_group')->where('group_name', $group_name)->find_one();
        if ($d) {
            $msg .= $_L['account_already_exist'] . '<br>';
        }
        $date_now = date("Y-m-d H:i:s");
        if ($msg == '') {

            $d = ORM::for_table('sms_group')->create();
            $d->group_name = $group_name;
            $d->save();


            r2(U . 'sms/group', 's', 'SMS group created successfully');
        } else {
            r2(U . 'sms/add-group', 'e', $msg);
        }
        break;

    case 'group-edit-post':
        $group_name = _post('group_name');



        $msg = '';


        $id = _post('id');
        $d = ORM::for_table('sms_group')->find_one($id);
        if ($d) {

        } else {
            $msg .= 'SMS group not found<br>';
        }

        if ($d['message'] != $message) {
            $c = ORM::for_table('sms_group')->where('group_name', $group_name)->find_one();
            if ($c) {
                $msg .= 'SMS Group doesnt exist<br>';
            }
        }

        if ($msg == '') {
            $d->group_name = $group_name;
            $d->save();


            r2(U . 'sms/group', 's', 'SMS Group edited Successfully');
        } else {
            r2(U . 'sms/group-edit/' . $id, 'e', $msg);
        }
        break;

    default:
        echo 'action not defined';
}