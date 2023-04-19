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
						</div>{$_L['Manage_Accounts']}</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

										<div class="row">
											<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}prepaid/mpesa/">
												<div class="input-group">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search Account number or Phone number or name...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</form>
										</div>
										<div class="col-md-4">
											
										</div>&nbsp;
									</div>



				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
										<thead>
											<tr>
											<th>Reference Code</th>
											<th>Account</th>
											
												
											<th>Phone Number</th>
											<th>Full Name</th>
											<th>Amount Paid</th>
												
                                             <th>Date</th>
												<th>Allocation Status</th>
												
											</tr>
										</thead>
										<tbody>
										{foreach $d as $ds}
											<tr>
											<td>{$ds['receipt']}</td>
												<td>{$ds['account']}</td>
												<td>{$ds['phonenumber']}</td>
												<td>{$ds['name']}</td>
												<td>{$ds['amount']}</td>
												
                                                                                                <td>{$ds['time']}</td>
												<td>
												{if $ds['status_active']==1 }
													Pending
													{else}
													Allocated
													{/if}
												</td>
												
											</tr>
										{/foreach}
										</tbody>
									</table>
									{$paginator['contents']}
								</div>
							</div>
						</div>
					</div>
		</div>
	</div>
</div>

{include file="sections/footer.tpl"}
