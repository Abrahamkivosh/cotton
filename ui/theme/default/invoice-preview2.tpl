<!DOCTYPE html>
<html>
<head>
    <title>{$_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{$_theme}/styles/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{$_theme}/images/favicon.ico">

	<script type="text/javascript">
	function printpage() {
		window.print();  
	}
	</script>
</head>

<body topmargin="0" leftmargin="0" >
<div class="row">
    <div class="col-md-12">
        <table width="200">
			<tr>
				<td>
				<fieldset>
					<center>
					<b>{$_c['CompanyName']}</b><br>
					{$_c['address']}<br>
					{$_c['phone']}<br>
					</center>
					============================================<br>
					INVOICE: <b>INV-{$d['id']}</b>  -  {$_L['Date']} : {$d['created_at']}<br>
					{$_L['Sales']} : {$_admin['fullname']}<br>
					============================================<br>

					{$_L['Plan_Name']} : <b>{$d['planname']}</b><br>
					{$_L['Plan_Price']} : <b>{$_c['currency_code']} {number_format($d['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</b><br>

					{$_L['Created_On']} : <b>{date($_c['date_format'], strtotime($d['created_at']))} {$d['time']}</b><br>

					============================================<br>
					<center>{$_c['note']}</center>
				</fieldset>
				</td>
			</tr>
		</table>
    </div>
</div>

<script src="{$_theme}/scripts/jquery-1.10.2.js"></script>
<script src="{$_theme}/scripts/bootstrap.min.js"></script>
{if isset($xfooter)}
    {$xfooter}
{/if}

</body>
</html>
