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
						</div>Input Preview</div></div>
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
	                Time : {date('Y-m-d H:i:s')}<br>
					Recepient Name : {$amcos->name}<br>
					Address : {$amcos->address}<br>
					Contact : {$amcos->phonenumber}<br>
	</div>

</div>

<div id="header">REF  # : REF-{$ref_id}</div>
<table id="customers">

	<tr>
		<th class="service">INPUT NAME</th>
		<th class="desc">Unit</th>
		<th class="desc">QTY</th>


	</tr>

{foreach $d as $cs}
	<tr>
		<td class="service">
		{$inu=ORM::for_table('inputs')->find_one($cs['input_id'])}
		{$inu->name}</td>
		<td class="desc">{$inu->unit}</td>
		<td class="desc">{$cs['input_qty']}</td>
	</tr>
{{/foreach}}	
</table>

<div id="header">{$body}</div>
</div>
<br><br><br>
<script type="text/javascript">
	var s5_taf_parent = window.location;
	function popup_print() {
		window.open('print.php?page=<?php echo $_GET['act'];?>','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left=50,top=50,titlebar=yes')
	}
</script>


</div>
{include file="sections/footer.tpl"}
