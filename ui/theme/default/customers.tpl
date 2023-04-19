{include file="sections/header.tpl"}
<script language="JavaScript">

	function toggle(source) {
		checkboxes = document.getElementsByName('id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

</script>
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
											<form id="site-search" method="post" action="{$_url}customers/list/">

											<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search Name, username, phone number...">

												<div class="input-group-btn">
													<span><button class="btn btn-success">{$_L['Search']}</button></span>
												</div>
											</div>
											</form>
										</div>
										{if $rights['client_add']}
									<div class="col-md-4">
										<a href="{$_url}customers/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> {$_L['Add_Contact']}</a>
									</div>&nbsp;
									   {/if}
								</div>



									<form method="POST" action="{$_url}customers/list/">
									<div style="alignment: right">
										<span>Filter Customer</span>
										<select  name="option">
											<option value="">Do nothing</option>
											<option>active</option>
											<option>inactive</option>
											<option value="due7">due in 7 days</option>
											<option value="due3">due in 3 days</option>
										</select>
										<button type="submit"  class="btn btn-success btn-sm">Filter Search</button>
									</div>
									</form>
<br>
									<form method="POST" action="{$_url}customers/activator/">
                                        {if $rights['recharge_add'] and $rights['recharge_edit']}
										With selected
										<select  name="option">
											<option value="">Do nothing</option>
											<option>activate</option>
											<option>deactivate</option>
										</select>
		 <button type="submit"  class="btn btn-success btn-sm">General Action</button>
		                                {/if}             
	 </div>


										<div class="col-lg-12">
										<div class="main-card mb-3 card">
											<div class="card-body">

									<table class="mb-0 table table-hover">
										<thead>
											<tr>
                                                 <th>
													<input type="checkbox" onClick="toggle(this)" /> Select All<br/>
												</th>
												<th>Account </th>
												<th>{$_L['Full_Name']}</th>
												<th>{$_L['Phone_Number']}</th>
												<th>Email Adress</th>
												<th>Wallet </th>
												<th>Discount </th>
												<th>Expiry Date</th>
												<th>Location</th>
												<th>Router</th>
												<th>Status</th>
												<th>Approval Status</th>

												
												<th>{$_L['Manage']}</th>
											</tr>
										</thead>
										<tbody>
										{foreach $d as $ds}
											{if $ty == "active"}
												{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

												{if $ds['username']==$ch['username']}
													<tr>
														<td>

															{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->find_one()}

															{if $ds['username']==$ch['username']}

																<input type="checkbox" name="id[]" value="{$ds['id']}" >
															{else}

															{/if}
														</td>
														<td>{$ds['username']}</td>
														<td>{$ds['fullname']}</td>
														<td>{$ds['phonenumber']}</td>
														<td>{$ds['address']}</td>
														<td>{$ds['credit']}</td><td>{$ds['discount']}</td>
														<td>{$ch['expiration']}</td>
														<td>{$ds['location']}</td>
														<td>{$ds['routers']}</td>
														<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

															{if $ds['username']==$ch['username']}
																<label class="badge badge-success">Active</label>
															{else}
																<label class="badge badge-danger">InActive</label>
															{/if}
														</td>
														<td>{if $ds['approved']==1}
																Approved
															{else}
																Not Approved
															{/if}
														</td>




														<td align="center">
							
														    {if $rights['recharge_add']}
																{if $ds['approved']==1}
																	{if $ds['username']==$ch['username']}
																		<a href="{$_url}prepaid/view_account/{$ch['username']}/1" class="btn btn-success btn-sm">View Account</a>
																		<a href="{$_url}prepaid/edit/{$ch['id']}/1" class="btn btn-success btn-sm">Edit Recharge</a>
																	{else}
																		<a href="{$_url}prepaid/recharge-user/{$ds['id']}/1" class="btn btn-success btn-sm">Recharge</a>
																	{/if}
																	<a href="{$_url}customers/approved/{$ds['id']}/0" class="btn btn-warning btn-sm">Disapprove</a>
																{else}
																	<a href="{$_url}customers/approved/{$ds['id']}/1" class="btn btn-success btn-sm">Approve</a>
																{/if}
															{/if}

                                                            {if $rights['client_edit']}
															<a href="{$_url}customers/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
														    {/if}

															{if $rights['client_delete']}
															<a onClick="javascript: return confirm('Please confirm deletion');"  href="{$_url}customers/delete/{$ds['id']}"  id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
														    {/if}
														</td>
													</tr>
													 {/if}
											{elseif $ty == "inactive"}

												{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "off")->find_one()}
												{if $ds['username']==$ch['username']}
													<tr>
														<th>
															{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->find_one()}

															{if $ds['username']==$ch['username']}
																<input type="checkbox" name="id[]" value="{$ds['id']}" class="">
															{else}

															{/if}

														</th>
														<td>{$ds['username']}</td>
														<td>{$ds['fullname']}</td>
														<td>{$ds['phonenumber']}</td>
														<td>{$ds['address']}</td>
														<td>{$ds['credit']}</td><td>{$ds['discount']}</td>
														<td>{$ch['expiration']}</td>
														<td>{$ds['location']}</td>
														<td>{$ds['routers']}</td>
														<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

															{if $ds['username']==$ch['username']}
																<label class="badge badge-success">Active</label>
															{else}
																<label class="badge badge-danger">InActive</label>
															{/if}
														</td>
														<td>{if $ds['approved']==1}
																Approved
															{else}
																Not Approved
															{/if}
														</td>




														<td align="center">
															{if $rights['recharge_add']}
																{if $ds['approved']==1}
																	{if $ds['username']==$ch['username']}
																		<a href="{$_url}prepaid/view_account/{$ch['username']}/1" class="btn btn-success btn-sm">View Account</a>
																		<a href="{$_url}prepaid/edit/{$ch['id']}/1" class="btn btn-success btn-sm">Edit Recharge</a>
																	{else}
																		<a href="{$_url}prepaid/recharge-user/{$ds['id']}/1" class="btn btn-success btn-sm">Recharge</a>
																	{/if}
																	<a href="{$_url}customers/approved/{$ds['id']}/0" class="btn btn-warning btn-sm">Disapprove</a>
																{else}
																	<a href="{$_url}customers/approved/{$ds['id']}/1" class="btn btn-success btn-sm">Approve</a>
																{/if}
															{/if}

                                                             {if $rights['client_edit']}
															<a href="{$_url}customers/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
														     {/if}
															  {if $rights['client_delete']}
															<a onClick="javascript: return confirm('Please confirm deletion');"  href="{$_url}customers/delete/{$ds['id']}"  id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
														      {/if}
														</td>
													</tr>
												{/if}
											{elseif $ty == "due7"}
												{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 7, date("Y"))))->find_one()}
												{if $ds['username']==$ch['username']}
													<tr>
														<th>
															{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->find_one()}

															{if $ds['username']==$ch['username']}
																<input type="checkbox" name="id[]" value="{$ds['id']}" class="">
															{else}

															{/if}

														</th>
														<td>{$ds['username']}</td>
														<td>{$ds['fullname']}</td>
														<td>{$ds['phonenumber']}</td>
														<td>{$ds['address']}</td>
														<td>{$ds['credit']}</td><td>{$ds['discount']}</td>
														<td>{$ch['expiration']}</td>
														<td>{$ds['location']}</td>
														<td>{$ds['routers']}</td>
														<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

															{if $ds['username']==$ch['username']}
																<label class="badge badge-success">Active</label>
															{else}
																<label class="badge badge-danger">InActive</label>
															{/if}
														</td>
														<td>{if $ds['approved']==1}
																Approved
															{else}
																Not Approved
															{/if}
														</td>




														<td align="center">
															
															 {if $rights['recharge_add']}
																{if $ds['approved']==1}
																	{if $ds['username']==$ch['username']}
																		<a href="{$_url}prepaid/view_account/{$ch['username']}/1" class="btn btn-success btn-sm">View Account</a>
																		<a href="{$_url}prepaid/edit/{$ch['id']}/1" class="btn btn-success btn-sm">Edit Recharge</a>
																	{else}
																		<a href="{$_url}prepaid/recharge-user/{$ds['id']}/1" class="btn btn-success btn-sm">Recharge</a>
																	{/if}
																	<a href="{$_url}customers/approved/{$ds['id']}/0" class="btn btn-warning btn-sm">Disapprove</a>
																{else}
																	<a href="{$_url}customers/approved/{$ds['id']}/1" class="btn btn-success btn-sm">Approve</a>
																{/if}
															{/if}

                                                            {if $rights['client_edit']}
															<a href="{$_url}customers/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
															{/if}

															{if $rights['client_delete']}
															<a onClick="javascript: return confirm('Please confirm deletion');"  href="{$_url}customers/delete/{$ds['id']}"  id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
													        {/if}
														</td>
													</tr>
												{/if}
											{elseif $ty == "due3"}

												{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('expiration', date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"))))->find_one()}
												{if $ds['username']==$ch['username']}
													<tr>
														<th>
															{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->find_one()}

															{if $ds['username']==$ch['username']}
																<input type="checkbox" name="id[]" value="{$ds['id']}" class="">
															{else}

															{/if}

														</th>
														<td>{$ds['username']}</td>
														<td>{$ds['fullname']}</td>
														<td>{$ds['phonenumber']}</td>
														<td>{$ds['address']}</td>
														<td>{$ds['credit']}</td><td>{$ds['discount']}</td>
														<td>{$ch['expiration']}</td>
														<td>{$ds['location']}</td>
														<td>{$ds['routers']}</td>
														<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

															{if $ds['username']==$ch['username']}
																<label class="badge badge-success">Active</label>
															{else}
																<label class="badge badge-danger">InActive</label>
															{/if}
														</td>
														<td>{if $ds['approved']==1}
																Approved
															{else}
																Not Approved
															{/if}
														</td>




														<td align="center">
															
															 {if $rights['recharge_add']}
																{if $ds['approved']==1}
																	{if $ds['username']==$ch['username']}
																		<a href="{$_url}prepaid/view_account/{$ch['username']}/1" class="btn btn-success btn-sm">View Account</a>
																		<a href="{$_url}prepaid/edit/{$ch['id']}/1" class="btn btn-success btn-sm">Edit Recharge</a>
																	{else}
																		<a href="{$_url}prepaid/recharge-user/{$ds['id']}/1" class="btn btn-success btn-sm">Recharge</a>
																	{/if}
																	<a href="{$_url}customers/approved/{$ds['id']}/0" class="btn btn-warning btn-sm">Disapprove</a>
																{else}
																	<a href="{$_url}customers/approved/{$ds['id']}/1" class="btn btn-success btn-sm">Approve</a>
																{/if}
														    {/if}

                                                            {if $rights['client_edit']}
															<a href="{$_url}customers/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
															{/if}
															{if $rights['client_delete']}
															<a onClick="javascript: return confirm('Please confirm deletion');"  href="{$_url}customers/delete/{$ds['id']}"  id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
														    {/if}
														</td>
													</tr>
												{/if}
											{else}

											<tr>
												<th>
											{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->find_one()}

											{if $ds['username']==$ch['username']}
												<input type="checkbox" name="id[]" value="{$ds['id']}" >
												{else}

												{/if}

													</th>
												<td>{$ds['username']}</td>
												<td>{$ds['fullname']}</td>
												<td>{$ds['phonenumber']}</td>
                                                                                                <td>{$ds['address']}</td>
												<td>{$ds['credit']}</td><td>{$ds['discount']}</td>
												<td>{$ch['expiration']}</td>
                                                                                                <td>{$ds['location']}</td>
                                                                                                <td>{$ds['routers']}</td>
												<td>{$ch=ORM::for_table('tbl_user_recharges')->where('username', $ds['username'])->where('status', "on")->find_one()}

											{if $ds['username']==$ch['username']}
												<label class="badge badge-success">Active</label>
												{else}
												<label class="badge badge-danger">InActive</label>
												{/if}
												</td>
												<td>{if $ds['approved']==1}
												Approved
												{else}
													Not Approved
													{/if}
												</td>




												<td align="center">	
												{if $rights['recharge_add']}
													{if $ds['approved']==1}
														{if $ds['username']==$ch['username']}
															<a href="{$_url}prepaid/view_account/{$ch['username']}/1" class="btn btn-success btn-sm">View Account</a>
															<a href="{$_url}prepaid/edit/{$ch['id']}/1" class="btn btn-success btn-sm">Edit Recharge</a>
														{else}
															<a href="{$_url}prepaid/recharge-user/{$ds['id']}/1" class="btn btn-success btn-sm">Recharge</a>
														{/if}
														<a href="{$_url}customers/approved/{$ds['id']}/0" class="btn btn-warning btn-sm">Disapprove</a>
													{else}
														<a href="{$_url}customers/approved/{$ds['id']}/1" class="btn btn-success btn-sm">Approve</a>
													{/if}
												{/if}
												 {if $rights['client_edit']}	
												<a href="{$_url}customers/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
											     {/if}
												{if $rights['client_delete']}
												<a onClick="javascript: return confirm('Please confirm deletion');"  href="{$_url}customers/delete/{$ds['id']}"  id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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

									</form>
								</div>
								{$paginator['contents']}
							</div>
						</div>


{include file="sections/footer.tpl"}
