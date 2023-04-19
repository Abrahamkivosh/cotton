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
						</div>Ticket Report
						<br>

							Tickets Report:
							{$stype} [ {$fdate} - {$tdate}]
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
											
									<th>Assigned To:</th>
									<th>Client:</th>
									<th>Subject</th>
									<th>Date</th>
									<th>Status</th>
								
										</tr>
									</thead>
									<tbody>
										{foreach $d as $ds}
                                       <tr>
								
										<td>
										{$user=ORM::for_table('tbl_users')->find_one($ds['user_id'])}
										{$user->fullname}
										</td>
										<td>
										{$client=ORM::for_table('tbl_customers')->find_one($ds['client_id'])}
										{$client->fullname}
										</td>
										<td>{$ds['subject']}</td>
										<td>{$ds['date']}</td>
										<td>
										{if $ds['status']=="pending"}
										<label class="badge badge-danger">Pending</label>
										{else if $ds['status']=="assigned"}
										<label class="badge badge-warning">Assigned</label>
										{else if $ds['status']=="customer reply"}	
										<label class="badge badge-success">Customer reply</label>
										{else if $ds['status']=="closed"}
										<label class="badge badge-success">Closed</label>
									 	{/if}	
							
										</td>
										

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
