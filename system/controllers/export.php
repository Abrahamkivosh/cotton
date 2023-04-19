<?php
/**
* PHP Mikrotik Billing (https://ibnux.github.io/phpmixbill/)


* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt

**/
_admin();
$ui->assign('_title', $_L['Reports'].'- '. $config['CompanyName']);
$ui->assign('_sysfrm_menu', 'reports');

$action = $routes['1'];
$admin = Admin::_info();
$ui->assign('_admin', $admin);

$mdate = date('Y-m-d');
$tdate = date('Y-m-d', strtotime('today - 30 days'));

//first day of month
$first_day_month = date('Y-m-01');
//
$this_week_start = date('Y-m-d',strtotime( 'previous sunday'));
// 30 days before
$before_30_days = date('Y-m-d', strtotime('today - 30 days'));
//this month
$month_n = date('n');

switch ($action) {
    case 'excel_issued_farmer':
    
        $d = ORM::for_table('farmer');
        $d->order_by_desc('id');
        $dk =  $d->find_many();

        $title = ' Reports Seeds Issued to Farmer';
        $title = str_replace('-',' ',$title);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-disposition: attachment; filename='.rand().'.csv');
        $output = fopen('php://output', 'w');

      


			fputcsv($output, array('Report Input Issued to Farmer'));
            fputcsv($output, array('Farmer Name',
				'Qty Issued',
				'Qty Remaining',
				));
            $issued=0;
            $balance=0;
            foreach ($dk as $x) {
    
                $d = ORM::for_table('amcos_input_order');
                $d->where('farmer_id',$x['id']);
                $qty_issued =  $d->sum('input_qty');
                
                $d = ORM::for_table('inputs');
                $input =  $d->find_one();
                 
                $total_a=($input->rate_per_acre*$x['acre'])-$qty_issued;
                fputcsv($output, array($x['firstname']." ".$x['middlename']." ".$x['lastname'],
				$qty_issued,
				$total_a
                ));
                $issued=$qty_issued+$issued;
                $balance=$total_a+$balance;
            }
            fputcsv($output, array('Total Issued Seeds',$issued,$balance));
        break;

    case 'print-by-date':
        $mdate = date('Y-m-d');
        $d = ORM::for_table('tbl_transactions');
        $d->where('recharged_on', $mdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();
		
        $dr = ORM::for_table('tbl_transactions');
        $dr->where('recharged_on', $mdate);
        $dr->order_by_desc('id');
        $xy =  $dr->sum('price');
		
        $ui->assign('d',$x);
		$ui->assign('dr',$xy);
        $ui->assign('mdate',$mdate);
        $ui->assign('recharged_on',$mdate);

        $ui->display('print-by-date.tpl');
        break;
		
    case 'pdf-by-date':
		$mdate = date('Y-m-d');
		
        $d = ORM::for_table('tbl_transactions');
        $d->where('recharged_on', $mdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();
		
		$dr = ORM::for_table('tbl_transactions');
        $dr->where('recharged_on', $mdate);
        $dr->order_by_desc('id');
        $xy =  $dr->sum('price');
		
        $title = ' Reports ['.$mdate.']';
        $title = str_replace('-',' ',$title);

        if ($x) {
            $html = '
			<div id="page-wrap">
				<div id="address">
					<h3>'.$config['CompanyName'].'</h3>
					'.$config['address'].'<br>
					'.$_L['Phone_Number'].': '.$config['phone'].'<br>
				</div>
				<div id="logo"><img id="image" src="system/uploads/logo.png" alt="logo" /></div>
			</div>
			<div id="header">'.$_L['All_Transactions_at_Date'].': '. date($_c['date_format'], strtotime($mdate)).'</div>
			<table id="customers">
				<tr>
				<th>'.$_L['Username'].'</th>
				<th>'.$_L['Plan_Name'].'</th>
				<th>'.$_L['Type'].'</th>
				<th>'.$_L['Plan_Price'].'</th>
				<th>'.$_L['Created_On'].'</th>
				<th>'.$_L['Expires_On'].'</th>
				<th>'.$_L['Method'].'</th>
				<th>'.$_L['Routers'].'</th>
				</tr>';
            $c = true;
            foreach ($x as $value) {
                
                $username = $value['username'];
                $plan_name = $value['plan_name'];
                $type = $value['type'];
                $price = $_c['currency_code'].' '. number_format($value['price'],0,$_c['dec_point'],$_c['thousands_sep']);
				$recharged_on = date( $config['date_format'], strtotime($value['recharged_on']));
				$expiration = date( $config['date_format'], strtotime($value['expiration']));
				$time = $value['time'];
				$method = $value['method'];
				$routers = $value['routers'];

                $html .= "<tr".(($c = !$c)?' class="alt"':' class=""').">"."
				<td>$username</td>
				<td>$plan_name</td>
				<td>$type</td>
				<td align='right'>$price</td>
				<td>$recharged_on $time </td>
				<td>$expiration $time </td>
				<td>$method</td>
				<td>$routers</td>
				</tr>";
            }
            $html .= '</table>
			<h4 class="text-uppercase text-bold">'.$_L['Total_Income'].':</h4>
			<h3 class="sum">'.$_c['currency_code'].' '.number_format($xy,2,$_c['dec_point'],$_c['thousands_sep']).'</h3>';

            define('_MPDF_PATH','system/vendors/mpdf/');

            require('system/vendors/mpdf/mpdf.php');

            $mpdf=new mPDF('c','A4','','',20,15,25,25,10,10);
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle($config['CompanyName'].' Reports');
            $mpdf->SetAuthor($config['CompanyName']);
            $mpdf->SetWatermarkText($d['price']);
            $mpdf->showWatermarkText = true;
            $mpdf->watermark_font = 'Helvetica';
            $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullpage');

            $style = '<style>
			#page-wrap { width: 100%; margin: 0 auto; }
			#header { text-align: center; position: relative; color: black; font: bold 15px Helvetica, Sans-Serif; margin-top: 10px; margin-bottom: 10px;}

			#address { width: 300px; float: left; }
			#logo { text-align: right; float: right; position: relative; margin-top: 15px; border: 5px solid #fff; overflow: hidden; }
			
			#customers
			{
			font-family: Helvetica, sans-serif;
			width:100%;
			border-collapse:collapse;
			}
			#customers td, #customers th
			{
			font-size:0.8em;
			border:1px solid #98bf21;
			padding:3px 5px 2px 5px;
			}
			#customers th
			{
			font-size:0.8em;
			text-align:left;
			padding-top:5px;
			padding-bottom:4px;
			background-color:#A7C942;
			color:#fff;
			}
			#customers tr.alt td
			{
			color:#000;
			background-color:#EAF2D3;
			}
			</style>';

            $nhtml = <<<EOF
$style
$html
EOF;
            $mpdf->WriteHTML($nhtml);
            $mpdf->Output(date('Y-m-d')._raid(4).'.pdf', 'D');

        }else{
            echo 'No Data';
        }

        break;
    case 'excel-by-date':
        $mdate = date('Y-m-d');

        $d = ORM::for_table('tbl_transactions');
        $d->where('recharged_on', $mdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $dr = ORM::for_table('tbl_transactions');
        $dr->where('recharged_on', $mdate);
        $dr->order_by_desc('id');
        $xy =  $dr->sum('price');

        $title = ' Reports ['.$mdate.']';
        $title = str_replace('-',' ',$title);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-disposition: attachment; filename='.rand().'.csv');
        $output = fopen('php://output', 'w');

        if ($x) {


			fputcsv($output, array($_L['All_Transactions_at_Date'].': '. date($_c['date_format'], strtotime($mdate))));
            fputcsv($output, array($_L['Username'],
				$_L['Plan_Name'],
				$_L['Type'],
				$_L['Plan_Price'],
			    $_L['Created_On'],
				$_L['Expires_On'],
				$_L['Method'],
				$_L['Routers']));

            foreach ($x as $value) {

                $username = $value['username'];
                $plan_name = $value['plan_name'];
                $type = $value['type'];
                $price = $_c['currency_code'].' '. number_format($value['price'],0,$_c['dec_point'],$_c['thousands_sep']);
                $recharged_on = date( $config['date_format'], strtotime($value['recharged_on']));
                $expiration = date( $config['date_format'], strtotime($value['expiration']));
                $time = $value['time'];
                $method = $value['method'];
                $routers = $value['routers'];

                fputcsv($output, array($username,
				$plan_name,
				$type,
				$price,
				$recharged_on." ".$time,
				$expiration." ".$time,
				$method,
				$routers
                ));
            }
            fputcsv($output, array($_L['Total_Income']." ".$_c['currency_code'].' '.number_format($xy,2,$_c['dec_point'],$_c['thousands_sep'])));
          

        }else{
            echo 'No Data';
        }
        break;
    case 'excel-by-period':
        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $stype = _post('stype');

        $d = ORM::for_table('tbl_transactions');
        if ($stype != ''){
            $d->where('type', $stype);
        }

        $d->where_gte('recharged_on', $fdate);
        $d->where_lte('recharged_on', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $dr = ORM::for_table('tbl_transactions');
        if ($stype != ''){
            $dr->where('type', $stype);
        }

        $dr->where_gte('recharged_on', $fdate);
        $dr->where_lte('recharged_on', $tdate);
        $xy = $dr->sum('price');

        $title = ' Reports ['.$mdate.']';
        $title = str_replace('-',' ',$title);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-disposition: attachment; filename='.rand().'.csv');
        $output = fopen('php://output', 'w');

        if ($x) {


            fputcsv($output, array($_L['All_Transactions_at_Date'].': '.date( $_c['date_format'], strtotime($fdate)).' - ' .date( $_c['date_format'], strtotime($tdate))));
            fputcsv($output, array($_L['Username'],
                $_L['Plan_Name'],
                $_L['Type'],
                $_L['Plan_Price'],
                $_L['Created_On'],
                $_L['Expires_On'],
                $_L['Method'],
                $_L['Routers']));

            foreach ($x as $value) {

                $username = $value['username'];
                $plan_name = $value['plan_name'];
                $type = $value['type'];
                $price = $_c['currency_code'].' '. number_format($value['price'],0,$_c['dec_point'],$_c['thousands_sep']);
                $recharged_on = date( $config['date_format'], strtotime($value['recharged_on']));
                $expiration = date( $config['date_format'], strtotime($value['expiration']));
                $time = $value['time'];
                $method = $value['method'];
                $routers = $value['routers'];

                fputcsv($output, array($username,
                    $plan_name,
                    $type,
                    $price,
                    $recharged_on." ".$time,
                    $expiration." ".$time,
                    $method,
                    $routers
                ));
            }
            fputcsv($output, array($_L['Total_Income']." ".$_c['currency_code'].' '.number_format($xy,2,$_c['dec_point'],$_c['thousands_sep'])));


        }else{
            echo 'No Data';
        }


        break;
    case 'print-by-period':
		$fdate = _post('fdate');
        $tdate = _post('tdate');
        $stype = _post('stype');
		
        $d = ORM::for_table('tbl_transactions');
		if ($stype != ''){
				$d->where('type', $stype);
		}
        
        $d->where_gte('recharged_on', $fdate);
        $d->where_lte('recharged_on', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();
		
		$dr = ORM::for_table('tbl_transactions');
		if ($stype != ''){
				$dr->where('type', $stype);
		}
        
        $dr->where_gte('recharged_on', $fdate);
        $dr->where_lte('recharged_on', $tdate);
		$xy = $dr->sum('price');
        
		$ui->assign('d',$x);
		$ui->assign('dr',$xy);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('stype',$stype);

        $ui->display('print-by-period.tpl');
        break;
    case 'print-customers':
        $option = _post('option');


        $d = ORM::for_table('tbl_customers')->order_by_desc('id')->find_many();

        $ty=_post('option');
        $ui->assign('ty',$ty);
        $ui->assign('option',$ty);
        $ui->assign('d',$d);

        $ui->display('print-customers.tpl');
        break;
    case 'customer_excel':
        $d = ORM::for_table('tbl_customers')->order_by_desc('id')->find_many();
        $ty=_post('option');


        header('Content-Type: application/vnd.ms-excel');
        header('Content-disposition: attachment; filename='.rand().'.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Customers List '.$ty));
        fputcsv($output, array('Account', 'Full Name',
            'Phone Number','Email Address',
            'Discount Amount',
            'Package',
            'Location',
            'Router',
            'Status',
            'Plan',
            'Approval Status'));

        foreach ($d as $ds) {



            if ($ds['approved'] == 1) {

                $Astatus = "Approved";
            } else {
                $Astatus = "Not Approved";
            }


            if ($ty == "active") {
                $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one();
            } elseif ($ty == "inactive") {
                $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "off")->find_one();

            } elseif ($ty == "due7") {
                $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 7, date("Y"))))->find_one();

            } elseif ($ty == "due3") {
                $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"))))->find_one();

            } else {
                $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->find_one();
            }

            if ( $ch['status']=="on") {

                $status = "Active";
            } else {
                $status = "Inactive";
            }

            if ($ds['username'] == $ch['username']) {

                fputcsv($output, array(
                    $ds['username'],
                    $ds['fullname'],
                    $ds['phonenumber'],
                    $ds['address'],
                    $ds['discount'],
                    $ch['type'] . ":" . $ch['namebp'],
                    $ds['location'],
                    $ds['routers'],
                    $status,
                    $ch['namebp'],
                    $Astatus));

            }
        }



        break;
    case 'pdf_customer':
        $d = ORM::for_table('tbl_customers')->order_by_desc('id')->find_many();
        $ty=_post('option');

        $title = 'Customers List '.$ty;
        $title = str_replace('-',' ',$title);

        if ($d) {
            $html = '
			<div id="page-wrap">
				<div id="address">
					<h3>'.$config['CompanyName'].'</h3>
					'.$config['address'].'<br>
					'.$_L['Phone_Number'].': '.$config['phone'].'<br>
				</div>
				<div id="logo"><img id="image" src="system/uploads/logo.png" alt="logo" /></div>
			</div>
			<div id="header">'.$title.'</div>
			<table id="customers">
				<tr>
				<th>Account  </th>
										<th>'.$_L['Full_Name'].'</th>
										<th>'.$_L['Phone_Number'].'</th>
										<th>Email Adress</th>
										<th>Discount Amount</th>
										<th>Package</th>
										<th>Location</th>
										<th>Router</th>
										<th>Status</th>
										<th>Plan</th>
										<th>Approval Status</th>
				</tr>';
            $c = true;
            foreach ($d as $ds) {



                if ($ds['approved'] == 1) {

                    $Astatus = "Approved";
                } else {
                    $Astatus = "Not Approved";
                }


                if ($ty == "active") {
                    $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one();
                } elseif ($ty == "inactive") {
                    $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "off")->find_one();

                } elseif ($ty == "due7") {
                    $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 7, date("Y"))))->find_one();

                } elseif ($ty == "due3") {
                    $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"))))->find_one();

                } else {
                    $ch = ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->find_one();
                }

                if ( $ch['status']=="on") {

                    $status = "Active";
                } else {
                    $status = "Inactive";
                }

                if ($ds['username'] == $ch['username']) {

                    $html .= "<tr".(($c = !$c)?' class="alt"':' class=""').">"."
                        <td>".$ds['username']."</td>
                        <td>".$ds['fullname']."</td>
                        <td>".$ds['phonenumber']."</td>
                        <td>". $ds['address']."</td>
                        <td>".$ds['discount']."</td>
                        <td>".$ch['type'] . ":" . $ch['namebp']."</td>
                        <td>".$ds['location']."</td>
                        <td>".$ds['routers']."</td>
                        <td>".$status."</td>
                        <td>".$ch['namebp']."</td>
                        <td>".$Astatus."</td>
                        <tr>";

                }
            }

            $html .= '</table>';
            define('_MPDF_PATH','system/vendors/mpdf/');

            require('system/vendors/mpdf/mpdf.php');

            $mpdf=new mPDF('c','A4','','',20,15,25,25,10,10);
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle($config['CompanyName'].' Reports');
            $mpdf->SetAuthor($config['CompanyName']);
            $mpdf->SetWatermarkText($d['price']);
            $mpdf->showWatermarkText = true;
            $mpdf->watermark_font = 'Helvetica';
            $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullpage');

            $style = '<style>
			#page-wrap { width: 100%; margin: 0 auto; }
			#header { text-align: center; position: relative; color: black; font: bold 15px Helvetica, Sans-Serif;  margin-top: 10px; margin-bottom: 10px;}

			#address { width: 300px; float: left; }
			#logo { text-align: right; float: right; position: relative; margin-top: 15px; border: 5px solid #fff; overflow: hidden; }
			
			#customers
			{
			font-family: Helvetica, sans-serif;
			width:100%;
			border-collapse:collapse;
			}
			#customers td, #customers th
			{
			font-size:0.8em;
			border:1px solid #98bf21;
			padding:3px 5px 2px 5px;
			}
			#customers th
			{
			font-size:0.8em;
			text-align:left;
			padding-top:5px;
			padding-bottom:4px;
			background-color:#A7C942;
			color:#fff;
			}
			#customers tr.alt td
			{
			color:#000;
			background-color:#EAF2D3;
			}
			</style>';

            $nhtml = <<<EOF
$style
$html
EOF;
            $mpdf->WriteHTML($nhtml);
            $mpdf->Output(date('Y-m-d')._raid(4).'.pdf', 'D');

        }else{
            echo 'No Data';
        }

        break;
    case 'pdf-by-period':
		$fdate = _post('fdate');
        $tdate = _post('tdate');
        $stype = _post('stype');
		
        $d = ORM::for_table('tbl_transactions');
		if ($stype != ''){
				$d->where('type', $stype);
		}
        
        $d->where_gte('recharged_on', $fdate);
        $d->where_lte('recharged_on', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();
		
		$dr = ORM::for_table('tbl_transactions');
		if ($stype != ''){
				$dr->where('type', $stype);
		}
        
        $dr->where_gte('recharged_on', $fdate);
        $dr->where_lte('recharged_on', $tdate);
		$xy = $dr->sum('price');

        $title = ' Reports ['.$mdate.']';
        $title = str_replace('-',' ',$title);

        if ($x) {
            $html = '
			<div id="page-wrap">
				<div id="address">
					<h3>'.$config['CompanyName'].'</h3>
					'.$config['address'].'<br>
					'.$_L['Phone_Number'].': '.$config['phone'].'<br>
				</div>
				<div id="logo"><img id="image" src="system/uploads/logo.png" alt="logo" /></div>
			</div>
			<div id="header">'.$_L['All_Transactions_at_Date'].': '.date( $_c['date_format'], strtotime($fdate)).' - ' .date( $_c['date_format'], strtotime($tdate)).'</div>
			<table id="customers">
				<tr>
				<th>'.$_L['Username'].'</th>
				<th>'.$_L['Plan_Name'].'</th>
				<th>'.$_L['Type'].'</th>
				<th>'.$_L['Plan_Price'].'</th>
				<th>'.$_L['Created_On'].'</th>
				<th>'.$_L['Expires_On'].'</th>
				<th>'.$_L['Method'].'</th>
				<th>'.$_L['Routers'].'</th>
				</tr>';
            $c = true;
            foreach ($x as $value) {
                
                $username = $value['username'];
                $plan_name = $value['plan_name'];
                $type = $value['type'];
                $price = $_c['currency_code'].' '. number_format($value['price'],0,$_c['dec_point'],$_c['thousands_sep']);
				$recharged_on = date( $config['date_format'], strtotime($value['recharged_on']));
				$expiration = date( $config['date_format'], strtotime($value['expiration']));
				$time = $value['time'];
				$method = $value['method'];
				$routers = $value['routers'];

                $html .= "<tr".(($c = !$c)?' class="alt"':' class=""').">"."
				<td>$username</td>
				<td>$plan_name</td>
				<td>$type</td>
				<td align='right'>$price</td>
				<td>$recharged_on $time </td>
				<td>$expiration $time </td>
				<td>$method</td>
				<td>$routers</td>
				</tr>";
            }
            $html .= '</table>
			<h4 class="text-uppercase text-bold">'.$_L['Total_Income'].':</h4>
			<h3 class="sum">'.$_c['currency_code'].' '.number_format($xy,2,$_c['dec_point'],$_c['thousands_sep']).'</h3>';

            define('_MPDF_PATH','system/vendors/mpdf/');

            require('system/vendors/mpdf/mpdf.php');

            $mpdf=new mPDF('c','A4','','',20,15,25,25,10,10);
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle($config['CompanyName'].' Reports');
            $mpdf->SetAuthor($config['CompanyName']);
            $mpdf->SetWatermarkText($d['price']);
            $mpdf->showWatermarkText = true;
            $mpdf->watermark_font = 'Helvetica';
            $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullpage');

            $style = '<style>
			#page-wrap { width: 100%; margin: 0 auto; }
			#header { text-align: center; position: relative; color: black; font: bold 15px Helvetica, Sans-Serif;  margin-top: 10px; margin-bottom: 10px;}

			#address { width: 300px; float: left; }
			#logo { text-align: right; float: right; position: relative; margin-top: 15px; border: 5px solid #fff; overflow: hidden; }
			
			#customers
			{
			font-family: Helvetica, sans-serif;
			width:100%;
			border-collapse:collapse;
			}
			#customers td, #customers th
			{
			font-size:0.8em;
			border:1px solid #98bf21;
			padding:3px 5px 2px 5px;
			}
			#customers th
			{
			font-size:0.8em;
			text-align:left;
			padding-top:5px;
			padding-bottom:4px;
			background-color:#A7C942;
			color:#fff;
			}
			#customers tr.alt td
			{
			color:#000;
			background-color:#EAF2D3;
			}
			</style>';

            $nhtml = <<<EOF
$style
$html
EOF;
            $mpdf->WriteHTML($nhtml);
            $mpdf->Output(date('Y-m-d')._raid(4).'.pdf', 'D');

        }else{
            echo 'No Data';
        }

        break;
		
    default:
        echo 'action not defined';
}