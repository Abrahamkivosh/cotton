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
						</div>Amcos Input Issue Report
						<br>
							 [ {$fdate} - {$tdate}]
						</div>
					</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<br>
							<div class="col-lg-12">
								<div class="main-card mb-3 card">
									<div class="card-body">

										<table class="mb-0 table table-hover">
									<thead>
										<tr>
											
												<th>Date</th>
							                    <th>Input Name</th>
												<th>Quantity</th>
												<th>Farmer Name</th>
												
								
										</tr>
									</thead>
									<tbody>
										{foreach $d as $ds}
										<tr>
										        <td>{$ds['created_at']}</td>
												<td>{$inu=ORM::for_table('inputs')->find_one($ds['input_id'])}
		                                         {$inu->name}</td>
	                                         	<td>{$ds['input_qty']}</td>
												<td>{$farmer=ORM::for_table('amcos')->find_one($ds['farmer_id'])}
		                                         {$farmer->fullname} {$farmer->lastname}
											</tr>
										{/foreach}
									</tbody>
								</table>

							</div>
						</div>
					</div>
						</div>
					</div>
				</div>
			</div>




{include file="sections/footer.tpl"}
