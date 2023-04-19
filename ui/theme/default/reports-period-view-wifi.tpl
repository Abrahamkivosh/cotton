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
						</div>{$_L['Daily_Report']} WIFI</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
								<div class="clearfix invoice-subhead mb20">
									<div class="group clearfix left">
										<p class="text-bold mb5">{$_L['All_Transactions_at_Date']}:</p>
										<p class="small">{$stype} [{date( $_c['date_format'], strtotime($fdate))} - {date( $_c['date_format'], strtotime($tdate))}]</p>
									</div>
									<div class="group clearfix right">
										<form method="post" action="{$_url}export/print-by-period" target="_blank">
											<input type="hidden" name="fdate" value="{$fdate}">
											<input type="hidden" name="tdate" value="{$tdate}">
											<input type="hidden" name="stype" value="{$stype}">
											<button type="submit" class="btn btn-default"><i class="fa fa-print"></i> {$_L['Export_for_Print']}</button>
										</form>
										<form method="post" action="{$_url}export/pdf-by-period" target="_blank">
											<input type="hidden" name="fdate" value="{$fdate}">
											<input type="hidden" name="tdate" value="{$tdate}">
											<input type="hidden" name="stype" value="{$stype}">
											<button type="submit" class="btn btn-default"><i class="fa fa-file-pdf-o"></i> {$_L['Export_to_PDF']}</button>
										</form>
									</div>
								</div>
								<table class="table table-bordered invoice-table mb10">
									<thead>
										<tr>
											<th>FullName</th>
											<th>Phone Number</th>
                                                                                        <th>MpesaCode</th>
											<th>Starttime</th>
											<th>EndTime</th>
											<th>Amount</th>
											
										</tr>
									</thead>
									<tbody>
										{foreach $d as $ds}
                                        <tr>
											<td>{$ds['name']}</td>
											<td>{$ds['phonenumber']}</td>
                                                                                        <td>{$ds['receipt']}</td>
											<td>{$ds['startime']}</td>
                                                                                        <td>{$ds['endtime']}</td>
                                                                                        <td>{$ds['amount']}</td>
                                                                                       
											
                                        </tr>
										{/foreach}
									</tbody>
								</table>
								
								<div class="clearfix text-right total-sum mb10">
									<h4 class="text-uppercase text-bold">{$_L['Total_Income']}:</h4>
									<h3 class="sum">{$_c['currency_code']} {number_format($dr,2,$_c['dec_point'],$_c['thousands_sep'])}</h3>
								</div>
								<p class="text-center small text-info">{$stype} [{date( $_c['date_format'], strtotime($fdate))} - {date( $_c['date_format'], strtotime($tdate))}]</p>
							</div>
						</div>
					</div>
</div>

{include file="sections/footer.tpl"}
