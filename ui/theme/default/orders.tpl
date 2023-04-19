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
						</div>Order to Order list</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}order/list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by order number...">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
{if $rights['user_add']}
										<div class="col-md-4">
											<a href="{$_url}order/create-order" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Add Order</a>
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
												<th>Order Number</th>
												<th>Ginner Name</th>
												<th>Requested QTY</th>
												<th>Price Per QTY</th>
												<th>Delivery Details</th>
												<th>Verified QTY</th>
												<th>Status</th>
												<th>Created At</th>
												<th>{$_L['Manage']}</th>
											</tr>
										</thead>
										<tbody>
										{foreach $d as $ds}
											<tr>
											    <td>{$ds->order_no}</td>
												<td>
												  {$fm = ORM::for_table('ginner')->find_one($ds['ginner_id'])}
												  {$fm->name}  {$fm->phonenumber}
												</td>
												<td>{$ds->qty}</td>
												<td>{$ds->price}</td>
												<td>
												{if $ds->trans_name} 
												Transporter Name: {$ds->trans_name} <br>
												    Telephone Number: {$ds->trans_phonenumber}<br>
													Truck Registration: {$ds->trans_truck}<br>
													Trailer Registration: {$ds->trans_trailer}
												{/if}	
												</td>
												<td>{$ds->verified_qty}</td>
											
												<td>
												           {if $ds['status']=="1"}
																<label class="badge badge-warning">Approved by You <br>Pending Approval from Ginner</label>
														
															{else if $ds['status']=="2" }
                                                                 <label class="badge badge-success">Approved by Ginner</label>
															{else if $ds['status']=="3" }
                                                                 <label class="badge badge-success">Paid Off</label>	 
															{else if $ds['status']=="4" }
                                                                 <label class="badge badge-danger">Rejected by Ginner</label>
															{else}
																<label class="badge badge-danger">Pending Approval by you </label>
																<br>
																<a href="{$_url}order/verify/{$ds['id']}" class="btn btn-success btn-sm">Verify Order</a>
															{/if}
												</td>
												
												<td>{$ds['created_at']}</td>
												<td>
												{if $ds['status']=="0"}
												{if $rights['user_edit']}
													<a href="{$_url}order/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']} Collection</a>
												{/if}
												{/if}
												<!--
												{if $rights['user_delete']}
													{if ($_admin['username']) neq ($ds['username'])}
														<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}amcos/delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
													{/if}
												{/if}
												-->
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
