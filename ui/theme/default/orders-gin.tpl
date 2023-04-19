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
						</div>Your Order list</div></div>
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
										
					</div>
									</div>
									<div class="col-lg-12">
										<div class="main-card mb-3 card">
											<div class="card-body">

												<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Order Number</th>
												<th>AMCOS user</th>
												<th>Requested QTY(Kgs)</th>
												<th>Price Per QTY(Kgs) </th>
												<th>Received QTY (Kgs)</th>
												<th>Empty weight (Kgs)</th>
												<th>Payable Amount (System fee inclusive)</th>
												<th>Delivery Details</th>
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
												
												  {$fm = ORM::for_table('amcos')->find_one($ds->amcos_id)}
												  {$fm->name}  {$fm->phonenumber}
												</td>
												<td>{$ds->qty}</td>
												<td>{$ds->price}</td>
												<td>{$ds->verified_qty}</td>
												<td>{$ds->empty_weight}</td>
												<td>
								
												{$amcos = ORM::for_table('amcos')->find_one($ds->amcos_id)}
												{$villages = ORM::for_table('tbl_villages')->find_one($amcos->village_id)}
												{$ward = ORM::for_table('tbl_ward')->find_one($villages->ward_id)}
                    							{$rates=ORM::for_table('tbl_ratescommissions')->where('district_id',$ward->district_id)->order_by_desc('id')->find_one()}
                      						  	{((int)($rates->system_rate*($ds->verified_qty-$ds->empty_weight)*$ds->price)/100)+($ds->verified_qty-$ds->empty_weight)*$ds->price}
												</td>
												<td>
												{if $ds->trans_name}
												Transporter Name: {$ds->trans_name} <br>
												    Telephone Number: {$ds->trans_phonenumber}<br>
													Truck Registration: {$ds->trans_truck}<br>
													Trailer Registration: {$ds->trans_trailer}
												{/if}	
												</td>
												<td>
												           {if $ds['status']=="1"}
													       	<label class="badge badge-danger">Pending Approval by you </label>
																<br>
																<a href="{$_url}order/verify-gin/{$ds['id']}" class="btn btn-success btn-sm">Accept Order</a>
															{else if $ds['status']=="2" }
															{if  $ds->verified_qty>0}
																<a href="{$_url}order/approve-ordera/{$ds['id']}" class="btn btn-success btn-sm" onClick="return confirm('Are yo sure you want to Pay?')" >Approve Order and Pay</a>
														    {else}
                                                                 <label class="badge badge-warning">Not delivered yet!</label>
															{/if}
														    {else if $ds['status']=="3" }
														        <label class="badge badge-success">Order Paid</label>
															{else}
																<label class="badge badge-danger">Pending Approval by Amcos </label>
															{/if}
												</td>
												
												<td>{$ds['created_at']}</td>
												<td>
											    {if $ds['status']=="2"}
												{if $rights['user_edit']}
												    {if $ds->verified_qty}
													{else}
													{if $ds->trans_name}
													{if $ds->rec_name}
													<a href="{$_url}order/receiveb-gin/{$ds['id']}" class="btn btn-success btn-sm">Update Received Order</a>
													{else}
													<a href="{$_url}order/receiveb-gin/{$ds['id']}" class="btn btn-success btn-sm">Receive Order</a>
													{/if}
													<br><br>
													<!--<a href="{$_url}order/deliveryb-gin/{$ds['id']}" class="btn btn-warning btn-sm">Update Delivery Details</a>-->
													{else}
                                                    <a href="{$_url}order/deliveryb-gin/{$ds['id']}" class="btn btn-warning btn-sm">Add Delivery Details</a>

													{/if}
													{/if}
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
