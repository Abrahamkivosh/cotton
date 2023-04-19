{include file="sections/header.tpl"}

					<div class="row">
						<div class="col-md-12">
							<div class="invoice-wrap">
								<div class="clearfix invoice-head">
									<h3 class="brand-logo text-uppercase text-bold left mt15">
										<span class="text">{$_L['Daily_Report']} WIFI</span>
									</h3>
								</div>
								<div class="clearfix invoice-subhead mb20">
									<div class="group clearfix left">
										<p class="text-bold mb5">{$_L['All_Transactions_at_Date']}:</p>
										<p class="small">{date($_c['date_format'], strtotime($mdate))} {$mtime}</p>
									</div>
									<div class="group clearfix right">
										<a href="{$_url}export/print-by-date" class="btn btn-default" target="_blank"><i class="ion ion-printer"></i>{$_L['Export_for_Print']}</a>
										<a href="{$_url}export/pdf-by-date" class="btn btn-default"><i class="fa fa-file-pdf-o"></i>{$_L['Export_to_PDF']}</a>
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
								
								{$paginator['contents']}
								
								<div class="clearfix text-right total-sum mb10">
									<h4 class="text-uppercase text-bold">{$_L['Total_Income']}:</h4>
									<h3 class="sum">{$_c['currency_code']} {number_format($dr,2,$_c['dec_point'],$_c['thousands_sep'])}</h3>
								</div>
								<p class="text-center small text-info">{$_L['All_Transactions_at_Date']}: {date($_c['date_format'], strtotime($mdate))} {$mtime}</p>
							</div>
						</div>
					</div>

{include file="sections/footer.tpl"}
