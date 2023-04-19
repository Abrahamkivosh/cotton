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
						</div>{$_L['c']}
					<br>
						{$_L['All_Transactions_at_Date']}:{date($_c['date_format'], strtotime($mdate))} {$mtime}
					</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

				<div class="row">
					<div class="col-md-8">
								<div class="clearfix invoice-subhead mb20">

									<div class="group clearfix right">
										<a href="{$_url}export/print-by-date"  class="btn btn-success" target="_blank"><i class="fa fa-print"></i>{$_L['Export_for_Print']}</a>
										<a href="{$_url}export/pdf-by-date" class="btn btn-success"><i class="fa fa-file-pdf"></i>{$_L['Export_to_PDF']}</a>
										<a href="{$_url}export/excel-by-date" class="btn btn-success"><i class="fa fa-file-pdf"></i>Export To Excel</a>
									</div>
								</div>
					</div>
				</div>
				<br>
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
									<thead>
										<tr>
											<th>{$_L['Username']}</th>
											<th>{$_L['Type']}</th>
											<th>{$_L['Plan_Name']}</th>
											<th>{$_L['Plan_Price']}</th>
											<th>{$_L['Created_On']}</th>
											<th>{$_L['Expires_On']}</th>
											<th>{$_L['Method']}</th>
											<th>{$_L['Routers']}</th>
										</tr>
									</thead>
									<tbody>
										{foreach $d as $ds}
                                        <tr>
											<td>{$ds['username']}</td>
											<td>{$ds['type']}</td>
											<td>{$ds['plan_name']}</td>
											<td class="text-right">{$_c['currency_code']} {number_format($ds['price'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
											<td>{date($_c['date_format'], strtotime($ds['recharged_on']))} {$ds['time']}</td>
											<td>{date($_c['date_format'], strtotime($ds['expiration']))} {$ds['time']}</td>
											<td>{$ds['method']}</td>
											<td>{$ds['routers']}</td>
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
			</div>
		</div>
	</div>
</div>

{include file="sections/footer.tpl"}
