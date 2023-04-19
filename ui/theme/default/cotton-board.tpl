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
						</div>Cotton collection list</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}cotton/list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by famer phonenumber...">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
{if $rights['user_add']}
										
{/if}										
					</div
									</div>

									<div class="col-lg-12">
										<div class="main-card mb-3 card">
											<div class="card-body">

										<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Farmer Name</th>
												<th>Village Name</th>
												<th>Collected QTY</th>
												<th>Paid QTY</th>
												<th>Status</th>
												<th>Collected At</th>
												
											</tr>
										</thead>
										<tbody>
										{foreach $d as $ds}
											<tr>
												<td>
												  {$fm = ORM::for_table('farmer')->find_one($ds['farmer_id'])}
												  {$fm->firstname} {$fm->lastname}{$fm->middlename} {$fm->phonenumber}
												</td>
												<td>
												 {$vl = ORM::for_table('tbl_villages')->find_one($ds['village_id'])}
												  {$vl->village_name} 
												</td>
												<td>{$ds['qty']}</td>
												<td>{$ds['qty_paid']}</td>
											
												<td>
												            {if $ds['status']=="2"}
																<label class="badge badge-success">Verified</label>
														    {else if $ds['status']=="1"}
																<label class="badge badge-success">Paid Off</label>
															{else}
																<label class="badge badge-danger">Pending Verification</label>
								
															{/if}
												</td>
												
												<td>{$ds['created_at']}</td>
												
											</tr>
										{/foreach}
										</tbody>
									</table>
									</div>
									{$paginator['contents']}
								</div>
							</div>
						</div>
					</div>
						</div>
					</div>


{include file="sections/footer.tpl"}
