<?php
/**
* PHP Mikrotik Billing (www.phpmixbill.com)
* Ismail Marzuqi <iesien22@yahoo.com>
* @version		5.0
* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt
* @donate		PayPal: iesien22@yahoo.com / Bank Mandiri: 130.00.1024957.4
**/

Class Admin{
    public static function _info(){
        $id = $_SESSION['aid'];
        if($_SESSION['user_type']=="ADMIN"){
        $d = ORM::for_table('tbl_users')->find_one($id);
        }
        if($_SESSION['user_type']=="AMCOS"){
            $d = ORM::for_table('amcos_users')->find_one($id);
        }
        if($_SESSION['user_type']=="GINNER"){
            $d = ORM::for_table('tbl_ginner_users')->find_one($id);
        }
        if($_SESSION['user_type']=="BOARD"){
            $d = ORM::for_table('tbl_board_users')->find_one($id);
        } 
        
        return $d;
    }
}