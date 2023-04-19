{include file="sections/header.tpl"}

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Invoice Preview</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body" style="background:white;">
<style>
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
</style>
<div style="width: 80%;">
<div id="page-wrap">
	<div id="address">
		<h3>{$_c['CompanyName']}</h3>
		{$_c['address']}<br>
		Tel : {$_c['phone']}<br>
	</div>
	<div id="logo">
		{$v=ORM::for_table('tbl_customers')->where('id',$d['customer_id'])->find_one()}
		<b>CLIENT NAME : </b>{$v['fullname']}<br>
		<b>INVOICE DATE : </b>{date($_c['date_format'], strtotime($d['created_at']))}<br>
		<b>INVOICE DUE DATE : </b>{date($_c['date_format'], strtotime(date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y")))))}<br>
		<b>STATUS : </b>{$d['status']}
	</div>

</div>

<div id="header">INVOICE # : INV-{$d['id']}</div>
<table id="customers">

	<tr>
		<th class="service">SERVICE</th>
		<th class="desc">DESCRIPTION</th>
		<th>PRICE</th>


	</tr>


	<tr>
		<td class="service">{$d['planname']}</td>
		<td class="desc">{$d['planname']}</td>
		<td class="unit">{$_c['currency_code']} {number_format($d['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>

	</tr>
</table>
<div id="logo">
	<h4 class="text-uppercase text-bold">GRAND TOTAL:</h4>
	<h3 class="sum">{$_c['currency_code']} {number_format($d['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</h3>
</div>
<div id="header">{$body}</div>
</div>
<br><br><br>
<script type="text/javascript">
	var s5_taf_parent = window.location;
	function popup_print() {
		window.open('print.php?page=<?php echo $_GET['act'];?>','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left=50,top=50,titlebar=yes')
	}
</script>
<a href="{$_url}prepaid/gen_pdf/{$d['id']}" class="btn btn-primary" ><i class="fa fa-file-pdf"></i>Generate PDF</a>


</div>
{include file="sections/footer.tpl"}
