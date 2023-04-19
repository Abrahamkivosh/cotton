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
						</div>Farmers</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}farmer/list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by phonenumber or name">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
{if $rights['user_add']}
										<div class="col-md-4">
											<a href="{$_url}farmer/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Add farmer</a>
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
											
												<th>FirstName</th>
												<th>MiddleName</th>
												<th>Lastname</th>
												<th>Gender</th>
												<th>Phone Number</th>
												<th>Year of Birth</th>
												<th>Village Name</th>
												<th>Subvillage</th>
												<th>Land Size (Acres)</th>
												<th>Status</th>
												<th>Date Created</th>
												<th>By Who?</th>
												<th>{$_L['Manage']}</th>
											</tr>
										</thead>
										<tbody>
										{foreach $d as $ds}
											<tr>
												<td>{$ds['firstname']}</td>
												<td>{$ds['middlename']}</td>
												<td>{$ds['lastname']}</td>
												<td>{$ds['gender']}</td>
												<td>{$ds['phonenumber']}</td>
												<td>{$ds['idno']}</td>
												<td>{$amcos=ORM::for_table('tbl_villages')->find_one($ds['village_id'])}
		                                         {$amcos->village_name}</td>
												 <td>{$sub=ORM::for_table('tbl_sub_villages')->find_one($ds['sub_village_id'])}
		                                         {$sub->name}</td>
												 <td>{$ds['acre']}</td>
												<td>
												           {if $ds['status']=="on"}
																<label class="badge badge-success">Active</label>
															{else}
																<label class="badge badge-danger">InActive</label>
															{/if}
												</td>
												
												<td>{$ds['created_at']}</td>

												<td>{$amcos_u=ORM::for_table('amcos_users')->find_one($ds['user_id'])}
		                                         {$amcos_u->fullname}</td>
                                                 <td>
												{if $rights['user_edit']}
													<a href="{$_url}farmer/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
												{/if}
												{if $rights['user_delete']}
													{if ($_admin['username']) neq ($ds['username'])}
														<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}farmer/delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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
