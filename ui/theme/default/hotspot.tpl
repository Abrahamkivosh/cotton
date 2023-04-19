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
						</div>{$_L['Hotspot_Plans']}</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

				<div class="row">
					<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}services/hotspot/">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="name" class="form-control" placeholder="{$_L['Search_by_Name']}...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</form>
										</div>
										{if $rights['hotspot_add']}
										<div class="col-md-4">
											<a href="{$_url}services/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> {$_L['New_Plan']}</a>
										</div>&nbsp;
										{/if}

									</div>

				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
							<thead>
								<tr>
									<th>{$_L['Plan_Name']}</th>
									<th>{$_L['Plan_Type']}</th>
									<th>{$_L['Bandwidth_Plans']}</th>
									<th>{$_L['Plan_Price']}</th>
									<th>{$_L['Time_Limit']}</th>
									<th>{$_L['Data_Limit']}</th>
									<th>{$_L['Plan_Validity']}</th>
									<th>{$_L['Routers']}</th>
									<th>{$_L['Manage']}</th>
								</tr>
							</thead>
							<tbody>
							{foreach $d as $ds}
								<tr>
									<td>{$ds['name_plan']}</td>
									<td>{$ds['typebp']}</td>
									<td>{$ds['name_bw']}</td>
									<td>{$ds['price']}</td>
									<td>{$ds['time_limit']} {$ds['time_unit']}</td>
									<td>{$ds['data_limit']} {$ds['data_unit']}</td>
									<td>{$ds['validity']} {$ds['validity_unit']}</td>
									<td>{$ds['routers']}</td>
									<td>
									{if $rights['hotspot_edit']}
										<a href="{$_url}services/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
									{/if}	
									{if $rights['hotspot_delete']}
										<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}services/delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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
