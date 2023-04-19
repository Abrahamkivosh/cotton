<?php
/**
* PHP Mikrotik Billing (www.phpmixbill.com)
* Ismail Marzuqi <iesien22@yahoo.com>
* @version		5.0
* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt
* @donate		PayPal: iesien22@yahoo.com / Bank Mandiri: 130.00.1024957.4
**/

Class Invoice{
    public static function _humble($_c,$id,$type=""){
        $d = ORM::for_table('tbl_invoices')->where('id', $id)->find_one();

        $style='<style>
	.clearfix:after {
		content: "";
		display: table;
		clear: both;
	}





	#logo {
		text-align: right;
		margin-bottom: 10px;
	}

	#logo img {
		width: 700px;
	}

	h1 {
		border-top: 1px solid  #5D6975;
		border-bottom: 1px solid  #5D6975;
		color: #5D6975;
		font-size: 2.4em;
		line-height: 1.4em;
		font-weight: normal;
		text-align: center;
		margin: 0 0 20px 0;
	   background: url(dimension.png);
	}

	#project {
		text-align: right;
	}

	#project span {
		color: #5D6975;
		text-align: left;;
		margin-right: 5px;
		display: inline-block;
		font-size: 0.8em;
	}

	table {
		width: 100%;
		border-collapse: collapse;
		border-spacing: 0;
		margin-bottom: 20px;
	}

	table tr:nth-child(2n-1) td {
		background: #F5F5F5;
	}

	table th,
	table td {
		text-align: center;
	}

	table th {
		padding: 5px 20px;
		color: #5D6975;
		border-bottom: 1px solid #C1CED9;
		white-space: nowrap;
		font-weight: normal;
	}

	table .service,
	table .desc {
		text-align: left;
	}

	table td {
		padding: 20px;
		text-align: right;
	}

	table td.service,
	table td.desc {
		vertical-align: top;
	}

	table td.unit,
	table td.qty,
	table td.total {
		font-size: 1.2em;
	}

	table td.grand {
		border-top: 1px solid #5D6975;;
	}

	#notices .notice {
		color: #5D6975;
		font-size: 1.2em;
	}

</style>';



        $html='<header class="clearfix">
	<div id="logo">
		
		<b>'.$_c['CompanyName'].'</b><br>
		'.$_c['address'].'<br>
		'.$_c['phone'].'<br>

	</div>
	<h1>INVOICE # : INV-'.$d['id'].'</h1>
	<div id="project">';

        $v=ORM::for_table('tbl_customers')->where('id',$d['customer_id'])->find_one();
        $b = ORM::for_table('tbl_user_recharges')->where('customer_id', $d['customer_id'])->find_one();
        $p = ORM::for_table('tbl_plans')->where('id', $b['plan_id'])->find_one();
        $account = $v['username'];
        $name = $v['fullname'];
        $message=$_c['invoice_footer'];
        $message = str_replace("{name}", $name, $message);
        $message = str_replace("{account}", $account, $message);
        $message = str_replace("{amount}", $p['price'], $message);
        $message = str_replace("{plan}", $p['name_plan'], $message);
        $message = str_replace("{due}", $b['expiration'] . " " . $b['time'], $message);


        $html.='
		<div><span>CLIENT:</span>'.$v['fullname'].'</div>
		<div><span>INVOICE DATE:</span>'.date($_c['date_format'], strtotime($d['created_at'])).' </div>
		<div><span>INVOICE DUE DATE:</span>'.date($_c['date_format'], strtotime(date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"))))).'</div>
		<div><span>STATUS:</span>'.$d['status'].'</div>
	</div>
</header>
<main>
	<table>
		<thead>
		<tr>
			<th class="service">SERVICE</th>
			<th class="desc">DESCRIPTION</th>
			<th>PRICE</th>


		</tr>
		</thead>
		<tbody>
		<tr>
			<td class="service">'.$d['planname'].'</td>
			<td class="desc">'.$d['planname'].'</td>
			<td class="unit">'.$_c['currency_code'].' '.number_format($d['amount'],2,$_c['dec_point'],$_c['thousands_sep']).'</td>

		</tr>
		<tr>
			<td colspan="2" class="grand total">GRAND TOTAL</td>
			<td class="grand total">'.$_c['currency_code'].' '.number_format($d['amount'],2,$_c['dec_point'],$_c['thousands_sep']).'</td>
		</tr>
		</tbody>
	</table>

	<h3 style="text-align: center">'.$message.'</h3>
</main>';
        define('_MPDF_PATH','system/vendors/mpdf/');

        require('system/vendors/mpdf/mpdf.php');

        $mpdf=new mPDF('c','A4','','',20,15,25,25,10,10);
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle($_c['CompanyName'].' Invoice');
        $mpdf->SetAuthor($_c['CompanyName']);
 $mpdf->SetWatermarkText($_c['CompanyName']);
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'Helvetica';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        $nhtml = <<<EOF
$style
$html
EOF;
        $mpdf->WriteHTML($nhtml);
        $pdf_name=date('Y-m-d')._raid(4).'.pdf';
        if($type=="send"){
            $mpdf->Output($pdf_name, 'F');
            return $pdf_name;
        }else{
            $mpdf->Output($pdf_name, 'D');
        }


    }
    public static function _space($_c,$id,$type=""){
        $d = ORM::for_table('tbl_invoices')->where('id', $id)->find_one();

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
        define('_MPDF_PATH','system/vendors/mpdf/');

        require('system/vendors/mpdf/mpdf.php');

        $mpdf=new mPDF('c','A4','','',20,15,25,25,10,10);
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle($_c['CompanyName'].' INV-'.$id);
        $mpdf->SetAuthor($_c['CompanyName']);
        $mpdf->SetWatermarkText($_c['CompanyName']);
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'Helvetica';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        $v=ORM::for_table('tbl_customers')->where('id',$d['customer_id'])->find_one();
        $b = ORM::for_table('tbl_user_recharges')->where('customer_id', $d['customer_id'])->find_one();
        $p = ORM::for_table('tbl_plans')->where('id', $b['plan_id'])->find_one();
        $account = $v['username'];
        $name = $v['fullname'];
        $message=$_c['invoice_footer'];
        $message = str_replace("{name}", $name, $message);
        $message = str_replace("{account}", $account, $message);
        $message = str_replace("{amount}", $p['price'], $message);
        $message = str_replace("{plan}", $p['name_plan'], $message);
        $message = str_replace("{due}", $b['expiration'] . " " . $b['time'], $message);

        $html='
<div id="page-wrap">
				<div id="address">
					<h3>'.$_c['CompanyName'].'</h3>
					'.$_c['address'].'<br>
					Tel : '.$_c['phone'].'<br>
				</div>
				<div id="logo">
			
				<b>CLIENT NAME : </b>'.$v['fullname'].'<br>
		        <b>INVOICE DATE : </b>'.date($_c['date_format'], strtotime($d['created_at'])).'<br>
		        <b>INVOICE DUE DATE : </b>'.date($_c['date_format'], strtotime(date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"))))).'<br>
		        <b>STATUS : </b>'.$d['status'].'
		        </div>
				
</div>
			
		<div id="header">INVOICE # : INV-'.$d['id'].'</div>
	    <table id="customers">
		
		<tr>
			<th class="service">SERVICE</th>
			<th class="desc">DESCRIPTION</th>
			<th>PRICE</th>


		</tr>
		
		
		<tr>
			<td class="service">'.$d['planname'].'</td>
			<td class="desc">'.$d['planname'].'</td>
			<td class="unit">'.$_c['currency_code'].' '.number_format($d['amount'],2,$_c['dec_point'],$_c['thousands_sep']).'</td>

		</tr>
	     </table>
	     <div id="logo">
	        <h4 class="text-uppercase text-bold">GRAND TOTAL:</h4>
			<h3 class="sum">'.$_c['currency_code'].' '.number_format($d['amount'],2,$_c['dec_point'],$_c['thousands_sep']).'</h3>
</div>
	<div id="header">'.$message.'</div>
';


        $nhtml = <<<EOF
$style
$html
EOF;

        $mpdf->WriteHTML($nhtml);
        $pdf_name=date('Ymd')._raid(4).'.pdf';

        if($type=="send"){

            $mpdf->Output($pdf_name, 'F');
        return $pdf_name;
        }else{
            $mpdf->Output($pdf_name, 'D');
        }


    }
}
