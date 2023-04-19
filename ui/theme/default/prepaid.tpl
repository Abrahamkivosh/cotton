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
						</div>{$_L['Prepaid_User']}</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="row">
					<div class="col-md-8">
						<form id="site-search" method="post" action="{$_url}prepaid/list/">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
								<input type="text" name="username" class="form-control" placeholder="Search by account no, client name or phonenumber ...">
								<div class="input-group-btn">
									<button class="btn btn-success">{$_L['Search']}</button>
								</div>
							</div>
						</form>
					</div>
					 {if $rights['recharge_add']}
					<div class="col-md-4">
						<a href="{$_url}prepaid/recharge" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> {$_L['Recharge_Account']}</a>
					</div>&nbsp;
					{/if}
				</div>
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
					<thead>
					<tr>
						<th>{$_L['Username']}</th>
						<th>Payable Amount</th>
						<th>{$_L['Plan_Name']}</th>
						<th>Burst {$_L['Plan_Name']}</th>
						<th>{$_L['Type']}</th>
						<th>{$_L['Created_On']}</th>
						<th>{$_L['Expires_On']}</th>
						<th>Status</th>
						<th>{$_L['Routers']}</th>
						<th>Remarks</th>
						<th>{$_L['Manage']}</th>
					</tr>
					</thead>
					<tbody>
					{foreach $d as $ds}
						<tr>
							<td>{$ds['username']}-
								{$pc = ORM::for_table('tbl_customers')->where('username', $ds['username'])->find_one()}
								{$pc->fullname}-
								{$pc->phonenumber}

							</td>
							<td>
								{$bl = ORM::for_table('tbl_plans')->where('id', $ds['plan_id'])->find_one()}
								{$bl->price-$pc->discount}
							</td>
							<td>{$ds['namebp']}</td>
							<td>
								{$bl = ORM::for_table('tbl_plans')->where('id', $ds['burst_plan_id'])->find_one()}
								{$bl->name_plan}
							</td>
							<td>{$ds['type']}
							{if $ds['type']=="Hotspot" || $ds['type']=="IP"  }
								-{$ds['ip']}
								{if $ds['type']=="Hotspot"}
									-{$ds['mac']}
								{/if}
								{/if}
							</td>
							<td>{$ds['recharged_on']} {$ds['time']}</td>
							<td>{$ds['expiration']} {$ds['time']}</td>
							<td>{if $ds['status'] == "on"}
									<label class="badge badge-success">Active</label>
								{else}
									<label class="badge badge-danger">InActive</label>

								{/if}
							</td>
							<td>{$ds['routers']}</td>
							<td>{$ds['comment']}</td>
							<td>
							<a href="{$_url}prepaid/generate_invoice/{$ds['customer_id']}/1" class="btn btn-success btn-sm">Generate Invoice</a>
				
								{if $rights['recharge_add']}
									{if $ds['status']=="off"}
									<a href="{$_url}prepaid/recharge-user/{$ds['customer_id']}/1" class="btn btn-success btn-sm">Recharge</a>
										{/if}
                                {/if}

                                {if $rights['recharge_edit']}
									<a href="{$_url}prepaid/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
								{/if}
								
								{if $rights['recharge_delete']}
									<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}prepaid/delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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




{include file="sections/footer.tpl"}
