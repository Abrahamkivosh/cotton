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
						</div>Amcos Payment Report
						<br>

							Amcos Payment Report:
							{if $stype==1}
                            Success Payments From
							{else if $stype==2}
                            Pendind Payments From
							{else if $stype==3}
							Rejected Payments From
							{else}
                            All Payments From
							{/if}
							
							
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
											
								  <th>Order No.</th>
								  <th>{$_L['Full_Name']}</th>
								  <th>Amount</th>
								  <th>Status</th>
								  <th>Date Created</th>
										</tr>
									</thead>
									<tbody>
										{foreach $d as $dv}
										{$ds = ORM::for_table('amcos')->find_one($dv['amcos_id'])}
											<tr>
											    <td>{$dv['order_no']}</td>
                                                <td>{$ds['fullname']}--{$ds['phonenumber']}</td>
											    <td>{$dv['amount']}</td>
												<td>
												           {if $dv['status']=="1"}
																<label class="badge badge-success">Paid</label>
															{else}
																<label class="badge badge-danger">Pending</label>
															{/if}
												</td>
												<td>{$dv['created_at']}</td>

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
