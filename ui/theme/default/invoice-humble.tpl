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

</style>



<div style="width: 80%;">
<header class="clearfix">
	<div id="logo">

		<b>{$_c['CompanyName']}</b><br>
		{$_c['address']}<br>
		{$_c['phone']}<br>

	</div>
	<h1>INVOICE # : INV-{$d['id']}</h1>
	<div id="project">
		{$v=ORM::for_table('tbl_customers')->where('id',$d['customer_id'])->find_one()}
		<div><span>CLIENT</span>{$v['fullname']}</div>
		<div><span>INVOICE DATE</span>{date($_c['date_format'], strtotime($d['created_at']))}</div>
		<div><span>INVOICE DUE DATE</span>{date($_c['date_format'], strtotime(date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y")))))}</div>
		<div><span>STATUS</span>{$d['status']}</div>
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
			<td class="service">{$d['planname']}</td>
			<td class="desc">{$d['planname']}</td>
			<td class="unit">{$_c['currency_code']} {number_format($d['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>

		</tr>
		<tr>
			<td colspan="2" class="grand total">GRAND TOTAL</td>
			<td class="grand total">{$_c['currency_code']} {number_format($d['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
		</tr>
		</tbody>
	</table>

	<h3 style="text-align: center">{$body}</h3>
</main>
</div>
<br>
<br>
<br>
<script type="text/javascript">
	var s5_taf_parent = window.location;
	function popup_print() {
		window.open('print.php?page=<?php echo $_GET['act'];?>','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left=50,top=50,titlebar=yes')
	}
</script>
<a href="{$_url}prepaid/gen_pdf/{$d['id']}" class="btn btn-primary" ><i class="fa fa-file-pdf"></i>Generate PDF</a>

</div>
{include file="sections/footer.tpl"}
