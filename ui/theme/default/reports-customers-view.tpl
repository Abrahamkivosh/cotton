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
						</div>Customer Report {$option} </div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">


								<div class="clearfix invoice-subhead mb20">
									<div class="group clearfix left">
										<p class="text-bold mb5">Customer Report by {$option}</p>

									</div>
									<div class="row">
										<div class="col-lg-2">
									<div class="group clearfix right">
										<form method="post" action="{$_url}export/print-customers" target="_blank">
											<input type="hidden" name="option" value="{$option}">
											<button type="submit" class="btn btn-success"><i class="fa fa-print"></i> {$_L['Export_for_Print']}</button>
										</form>

									</div>
										</div>
										<div class="col-lg-2">
									<div class="group clearfix right">
										<form method="post" action="{$_url}export/customer_excel" target="_blank">
											<input type="hidden" name="option" value="{$option}">
											<button type="submit" class="btn btn-success"><i class="fa fa-file-excel"></i> Export To Excel</button>
										</form>

									</div>
										</div>
										<div class="col-lg-2">
											<div class="group clearfix right">
												<form method="post" action="{$_url}export/pdf_customer" target="_blank">
													<input type="hidden" name="option" value="{$option}">
													<button type="submit" class="btn btn-success"><i class="fa fa-file-pdf"></i> Export To PDF</button>
												</form>

											</div>
										</div>
									</div>

									<br>
								</div>
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
									<thead>
									<tr>

										<th>Account  </th>
										<th>{$_L['Full_Name']}</th>
										<th>{$_L['Phone_Number']}</th>
										<th>Email Adress</th>
										<th>Discount Amount</th>
										<th>Package</th>
										<th>Location</th>
										<th>Router</th>
										<th>Status</th>
										<th>Plan</th>
										<th>Approval Status</th>



									</tr>
									</thead>
									<tbody>
									{foreach $d as $ds}
										{if $ty == "active"}
											{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

											{if $ds['username']==$ch['username']}
												<tr>

													<td>{$ds['username']}</td>
													<td>{$ds['fullname']}</td>
													<td>{$ds['phonenumber']}</td>
													<td>{$ds['address']}</td>
													<td>{$ds['discount']}</td>
													<td>{$ch['type']}:{$ch['namebp']}</td>
													<td>{$ds['location']}</td>
													<td>{$ds['routers']}</td>
													<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

														{if $ds['username']==$ch['username']}
															<label class="btn-tag btn-tag-success">Active</label>
														{else}
															<label class="btn-tag btn-tag-danger">InActive</label>
														{/if}
													</td>
													<td>{$ch['namebp']}</td>
													<td>{if $ds['approved']==1}
															Approved
														{else}
															Not Approved
														{/if}
													</td>





												</tr>
											{/if}
										{elseif $ty == "inactive"}

											{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "off")->find_one()}
											{if $ds['username']==$ch['username']}
												<tr>

													<td>{$ds['username']}</td>
													<td>{$ds['fullname']}</td>
													<td>{$ds['phonenumber']}</td>
													<td>{$ds['address']}</td>
													<td>{$ds['discount']}</td>
													<td>{$ch['type']}:{$ch['namebp']}</td>
													<td>{$ds['location']}</td>
													<td>{$ds['routers']}</td>
													<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

														{if $ds['username']==$ch['username']}
															<label class="btn-tag btn-tag-success">Active</label>
														{else}
															<label class="btn-tag btn-tag-danger">InActive</label>
														{/if}
													</td>
													<td>{$ch['namebp']}</td>
													<td>{if $ds['approved']==1}
															Approved
														{else}
															Not Approved
														{/if}
													</td>





												</tr>
											{/if}
										{elseif $ty == "due7"}
											{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 7, date("Y"))))->find_one()}
											{if $ds['username']==$ch['username']}
												<tr>

													<td>{$ds['username']}</td>
													<td>{$ds['fullname']}</td>
													<td>{$ds['phonenumber']}</td>
													<td>{$ds['address']}</td>
													<td>{$ds['discount']}</td>
													<td>{$ch['type']}:{$ch['namebp']}</td>
													<td>{$ds['location']}</td>
													<td>{$ds['routers']}</td>
													<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

														{if $ds['username']==$ch['username']}
															<label class="btn-tag btn-tag-success">Active</label>
														{else}
															<label class="btn-tag btn-tag-danger">InActive</label>
														{/if}
													</td>
													<td>{$ch['namebp']}</td>
													<td>{if $ds['approved']==1}
															Approved
														{else}
															Not Approved
														{/if}
													</td>





												</tr>
											{/if}
										{elseif $ty == "due3"}

											{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"))))->find_one()}
											{if $ds['username']==$ch['username']}
												<tr>

													<td>{$ds['username']}</td>
													<td>{$ds['fullname']}</td>
													<td>{$ds['phonenumber']}</td>
													<td>{$ds['address']}</td>
													<td>{$ds['discount']}</td>
													<td>{$ch['type']}:{$ch['namebp']}</td>
													<td>{$ds['location']}</td>
													<td>{$ds['routers']}</td>
													<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

														{if $ds['username']==$ch['username']}
															<label class="btn-tag btn-tag-success">Active</label>
														{else}
															<label class="btn-tag btn-tag-danger">InActive</label>
														{/if}
													</td>
													<td>{if $ds['approved']==1}
															Approved
														{else}
															Not Approved
														{/if}
													</td>





												</tr>
											{/if}
										{else}

											<tr>
												<td>{$ds['username']}</td>
												<td>{$ds['fullname']}</td>
												<td>{$ds['phonenumber']}</td>
												<td>{$ds['address']}</td>
												<td>{$ds['discount']}</td>
												<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

													{$ch['type']}:{$ch['namebp']}</td>
												<td>{$ds['location']}</td>
												<td>{$ds['routers']}</td>
												<td>

													{if $ds['username']==$ch['username']}
														<label class="btn-tag btn-tag-success">Active</label>
													{else}
														<label class="btn-tag btn-tag-danger">InActive</label>
													{/if}
												</td>
												<td>{if $ds['approved']==1}
														Approved
													{else}
														Not Approved
													{/if}
												</td>
											</tr>
										{/if}
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
