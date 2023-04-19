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
						</div>{$_L['Routers']}</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
									<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
										<div class="row">
										<div class="col-md-8">
										
											<form id="site-search" method="post" action="{$_url}routers/list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="name" class="form-control" placeholder="{$_L['Search_by_Name']}...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</form>
										</div>
                                                                                    {foreach $d as $dc}
                                                                                        {$na=$dc['name']}
										
                                                                                {/foreach}
                                                                                
                                                                                      <div class="col-md-4">
											<a href="{$_url}routers/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> {$_L['New_Router']}</a>
										</div>
										</div>
                                                                                       &nbsp; 
									</div>
				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
							<thead>
								<tr>
									<th>{$_L['Router_Name']}</th>
									<th>{$_L['IP_Address']}</th>
									<th>{$_L['Username']}</th>
									<th>{$_L['Router_Secret']}</th>
									<th>{$_L['Description']}</th>
									<th>{$_L['Manage']}</th>
								</tr>
							</thead>
							<tbody>
							{foreach $d as $ds}
								<tr>
									<td>{$ds['name']}</td>
									<td>{$ds['ip_address']}</td>
									<td>{$ds['username']}</td>
									<td>{$ds['password']}</td>
									<td>{$ds['description']}</td>
									<td>
									{if $ds['sync']==1}
                                     Data Sync active
									 {else}
									 <a onClick="javascript: return confirm('Please confirm Data sync script');" href="{$_url}routers/sync/{$ds['id']}/1" class="btn btn-success btn-sm">Sync  Data Script</a>
									 {/if}
										<a href="{$_url}routers/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
										<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}routers/delete/{$ds['id']}"  class="btn btn-danger btn-sm">{$_L['Delete']}</a>
									</td>
								</tr>
							{/foreach}
							</tbody>
						</table>
						</div>
						</div>
				</div>
						{$paginator['contents']}
								</div>
							</div>
						</div>
					</div>

{include file="sections/footer.tpl"}
