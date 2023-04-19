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
						</div>All Farmers</div></div>
			</div>
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-12">
											<form id="site-search" method="post" action="{$_url}farmer/list-board/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by phonenumber...">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>	
					</div>
									</div>
									<div class="col-lg-12">
										<div class="main-card mb-3 card">
											<div class="card-body">

												<table class="mb-0 table table-hover">
										<thead>
											<tr>
											
												<th>FirstName</th>
												<th>MiddleName</th>
												<th>Lastname</th>
												<th>Phone Number</th>
												<th>Year of Birth</th>
												<th>Village Name</th>
												<th>Subvillage</th>
												<th>Land Size (Acres)</th>
												<th>Status</th>
										
											</tr>
										</thead>
										<tbody>
										{foreach $d as $ds}
											    <tr>
												<td>{$ds['firstname']}</td>
												<td>{$ds['middlename']}</td>
												<td>{$ds['lastname']}</td>
												<td>{$ds['phonenumber']}</td>
												<td>{$ds['idno']}</td>
												<td>{$inu=ORM::for_table('tbl_villages')->find_one($ds['village_id'])}
		                                         {$inu->village_name}</td>
												 <td>{$insu=ORM::for_table('tbl_sub_villages')->find_one($ds['sub_village_id'])}
		                                         {$insu->name}</td>
												<td>{$ds['acre']}</td>
												<td>
												           {if $ds['status']=="on"}
																<label class="badge badge-success">Active</label>
															{else}
																<label class="badge badge-danger">InActive</label>
															{/if}
												</td>
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
