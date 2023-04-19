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
						</div>Hotspot Redirect Server</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

				<div class="row">
					<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}services/redirect/">
											<div class="input-group">

													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="name" class="form-control" placeholder="{$_L['Search_by_Name']}...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</form>
										</div>
										{if $rights['redirect_add']}
										<div class="col-md-4">
											<a href="{$_url}services/b_redirect" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> New Server</a>
										</div>&nbsp;
										{/if}
									</div>

				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
							<thead>
								<tr>
									<th>Server Name</th>
									<th>Server Address</th>
									<th>Name</th>
									<th>interface</th>
                                              
									<th>Pool</th>
									<th>Profile</th>
									<th>{$_L['Manage']}</th>
								</tr>
							</thead>
							<tbody>
							{foreach $d as $ds}
								<tr>
									<td>{$ds['server_name']}</td>
									<td>{$ds['address']}</td>
									<td>{$ds['name']}</td>
									<td>{$ds['interface']}</td>
                                                      
									<td>{$ds['pool']}</td>
									<td>{$ds['profile']}</td>
									<td>	
									{if $rights['redirect_delete']}
									<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}services/redirect-delete/{$ds['id']}"  class="btn btn-danger btn-sm ">{$_L['Delete']}</a>
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
