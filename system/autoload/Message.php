<?php
/**
* PHP Mikrotik Billing (www.phpmixbill.com)
* Ismail Marzuqi <iesien22@yahoo.com>
* @version		5.0
* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt
* @donate		PayPal: iesien22@yahoo.com / Bank Mandiri: 130.00.1024957.4
**/

Class Message{
    public static function _filter($purpose,$farmer_name="",$amcos_name="",$ginner_name="",$order_no="",$amount="",$created_at="",$cotton_qty=""){

$tem = ORM::for_table('sms_template')->where('purpose', $purpose)->find_one();
$message = $tem['message'];

$message=str_replace("{farmer_name}",$farmer_name,$message);
$message=str_replace("{amcos_name}",$amcos_name,$message);
$message=str_replace("{ginner_name}",$ginner_name,$message);
$message=str_replace("{order_no}",$order_no,$message);
$message=str_replace("{amount}",$amount,$message);
$message=str_replace("{cotton_qty}",$cotton_qty,$message);
$message=str_replace("{created_at}",date('d-m-Y',strtotime($created_at)),$message);


return $message;
}
}
