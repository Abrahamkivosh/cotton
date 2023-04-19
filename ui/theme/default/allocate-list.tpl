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
						</div>Burst List</div></div>
				</div>


					{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

						<div class="row">
							<div class="col-md-8">
										
											<form id="site-search" method="post" action="#">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="name" class="form-control" placeholder="{$_L['Search_by_Name']}...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</form>
										</div>
                                      {if $rights['burst_add']}
										<div class="col-md-4">
											<a href="{$_url}prepaid/allocate-add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Add Burst</a>
										</div>&nbsp;
									   {/if}
									</div>


					<div class="col-lg-12">
						<div class="main-card mb-3 card">
							<div class="card-body">

								<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Begin Date</th>
												<th>End Date</th>
												<th>Plan Type</th>
												<th>Burst Plan Name</th>
												<th>Client Plan Group</th>
												<th>Router</th>
												<th>Details</th>
												<th>{$_L['Manage']}</th>
											</tr>
										</thead>
										<tbody>
										{$no = 1}
										{foreach $d as $ds}
											<tr>
												<td align="center">{$no++}</td>
												<td>
													{$ds['d1']}
												</td>
												<td>
													{$ds['d2']}
												</td>
												<td>
													{$ds['plan_type']}
												</td>
												<td>{$c=ORM::for_table('tbl_plans')->where('id',$ds['burst_plan_id'])->find_one()}
													{$c->name_plan}
												</td>
												<td>
													{$c=ORM::for_table('tbl_plans')->where('id',$ds['plan_id'])->find_one()}
													{$c->name_plan}
												</td>
												<td>{$ds['router']}</td>
												<td><label class="col-md-2 control-label">Burst Days Of the Week</label>
													<br>
													<div class="col-md-6">
														{$bs = ORM::for_table('burst_link')->where('burst_id',$ds['id'])->where_not_null('day')->find_many()}
														{if !empty($bs)}

															<table class="mb-0 table table-hover">
																<tr><td>Day</td>
																	{foreach $bs as $ks}
																		<td>{$ks['day']}<br>	<input type="checkbox"  name="day[]"  value="{$ks['day']}" checked></td>
																	{/foreach}
																</tr>
																<tr><td>Begin Time</td>
																	{foreach $bs as $ks}
																		<td><input type="time" name="time[]" value="{$ks['begin_time']}"></td>
																	{/foreach}
																</tr>
																<tr><td>End Time</td>

																	{foreach $bs as $ks}
																		<td><input type="time" name="end[]" value="{$ks['end_time']}"></td>
																	{/foreach}

																</tr>

															</table>
														{else}
															<table class="mb-0 table table-hover">
																<tr><td>Day</td><td>Mon<br>	<input type="checkbox"  name="day[]" value="Mon" checked></td><td>Tue<br>	<input type="checkbox"  name="day[]" value="Tue" checked></td><td>Wed<br>	<input type="checkbox"  name="day[]" value="Wed" checked></td><td>Thur<br>	<input type="checkbox"  name="day[]" value="Thur" checked></td><td>Fri<br>	<input type="checkbox"  name="day[]" value="Fri" checked> </td><td> Sat<br>	<input type="checkbox"  name="day[]" value="Sat" checked></td><td>Sun<br>	<input type="checkbox"  name="day[]" value="Sun" checked></td></tr>
																<tr><td>Begin Time</td></t><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td></tr>
																<tr><td>End Time</td></t><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td></tr>
															</table>
														{/if}

													</div></td>
												<td align="center">
												{if $rights['burst_edit']}
													<a href="{$_url}prepaid/allocate_edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
												{/if}
												{if $rights['burst_delete']}
													<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}prepaid/allocate_delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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
