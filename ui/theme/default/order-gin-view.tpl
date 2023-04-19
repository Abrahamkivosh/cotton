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
						</div>Order Report
						<br>

						[	Order Report:
							{if $stype==1}
                            Pending From
							{else if $stype==3}
                            Order Paid and Approved From
							{else}
                            All From
							{/if}
							
							{$fdate} - {$tdate}]
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
											
							                 	<th>Order Number</th>
												<th>AMCOS user</th>
												<th>Requested QTY</th>
												<th>Price Per QTY</th>
												<th>Received QTY</th>
												<th>Payable Amount (System fee inclusive)</th>
												<th>Delivery Details</th>
												<th>Status</th>
												<th>Created At</th>
										</tr>
									</thead>
									<tbody>
										{foreach $d as $ds}
											<tr>
											    <td>{$ds->order_no}</td>
												<td>
												  {$fm = ORM::for_table('amcos')->find_one($ds['amcos_id'])}
												  {$fm->fullname}  {$fm->phonenumber}
												</td>
												<td>{$ds->qty}</td>
												<td>{$ds->price}</td>
												<td>{$ds->verified_qty}</td>
												<td>
												{$amcos = ORM::for_table('amcos')->find_one($ds->amcos_id)}
                    {$rates=ORM::for_table('tbl_ratescommissions')->where('village_id',$amcos->village_id)->order_by_desc('id')->find_one()}
             
                        {((int)($rates->system_rate*$ds->verified_qty*$ds->price)/100)+$ds->verified_qty*$ds->price}
												
												</td>
												<td>{$ds->delivery_details}</td>
											
												<td>
												           {if $ds['status']=="1"}
													       	<label class="badge badge-danger">Pending Approval by you </label>
																<br>
																<a href="{$_url}order/verify-gin/{$ds['id']}" class="btn btn-success btn-sm">Accept Order</a>
															{else if $ds['status']=="2" }
															{if  $ds->verified_qty>0}
																<a href="{$_url}order/approve-order/{$ds['id']}" class="btn btn-success btn-sm" onClick="return confirm('Are yo sure you want to Pay?')" >Approve Order and Pay</a>
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
