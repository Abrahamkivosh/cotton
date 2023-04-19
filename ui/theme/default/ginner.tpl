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
						</div>Ginner  </div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}ginner/list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by Username...">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
{if $rights['user_add']}
										<div class="col-md-4">
											<a href="{$_url}ginner/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Add Ginner</a>
										</div>&nbsp;
{/if}										
					</div>
									</div>
									<div class="col-lg-12">
										<div class="main-card mb-3 card">
											<div class="card-body">

												<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Ginner Name</th>
												<th>Address</th>
												<th>Contact</th>
												<th>Email Address</th>
												<th>Location</th>
												<th>Ginner Users</th>
												<th>Paybill no.</th>
												<th>C2B callback</th>
												<th>Status</th>
												<th>{$_L['Manage']}</th>
											</tr>
										</thead>
										<tbody>
										{foreach $d as $ds}
											<tr>
												<td>{$ds['name']}</td>
												<td>{$ds['address']}</td>
												<td>{$ds['phonenumber']}</td>
												<td>{$ds['email']}</td>
												<td>{$ds['location']}</td>
												<td>
												<table>
												<tr><th>Full names</th><th>Username</th><th>phonenumber</th><th>Role</th></tr>
												{$amcos_users=ORM::for_table('tbl_ginner_users')->where('ginner_id',$ds['id'])->find_many()}
												{foreach $amcos_users as $am}
                                                <tr><td>{$am['fullname']}</td><td>{$am['username']}</td><td>{$am['phonenumber']}</td><td>{$am['role']}</td></tr>
												{/foreach}
												</table>
												</td>       
												
												<td>{$ds['paybill']}</td>
												<td>{$ds['paybill_url']}</td>
												<td>
												           {if $ds['status']=="on"}
																<label class="badge badge-success">Active</label>
																<br>
																<a href="{$_url}ginner/deactivate/{$ds['id']}" class="btn btn-warning btn-sm">Deactivate</a>
															{else}
																<label class="badge badge-danger">InActive</label>
																<br>
																<a href="{$_url}ginner/activate/{$ds['id']}" class="btn btn-success btn-sm">Activate</a>
															{/if}
												</td>
												<td>
												{if $rights['user_edit']}
													<a href="{$_url}ginner/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
												{/if}
												{if $rights['user_delete']}
													{if ($_admin['username']) neq ($ds['username'])}
														<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}ginner/delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
													{/if}
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
