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
						</div>{$_L['Bandwidth_Plans']}</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

				<div class="row">
					<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}bandwidth/list/">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="name" class="form-control" placeholder="{$_L['Search_by_Name']}...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</form>
										</div>
										{if $rights['bandwidth_add']}
										<div class="col-md-4">
											<a href="{$_url}bandwidth/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> {$_L['New_Bandwidth']}</a>
										</div>&nbsp;
										 {/if}
									</div>

				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
							<thead>
								<tr>
									<th>{$_L['BW_Name']}</th>
									<th>{$_L['Rate_Download']}</th>
									<th>{$_L['Rate_Upload']}</th>
									<th>{$_L['Manage']}</th>
								</tr>
							</thead>
							<tbody>
							{foreach $d as $ds}
								<tr>
									<td>{$ds['name_bw']}</td>
									<td>{$ds['rate_down']} {$ds['rate_down_unit']}</td>
									<td>{$ds['rate_up']} {$ds['rate_up_unit']}</td>
									<td>
									{if $rights['bandwidth_edit']}
										<a href="{$_url}bandwidth/edit/{$ds['id']}" class="btn btn-sm btn-warning">{$_L['Edit']}</a>
									{/if}
									{if $rights['bandwidth_delete']}
										<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}bandwidth/delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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