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
						</div>User Roles</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
									<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
									<div class="row">
										<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}customers/list/">
									       	<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Role Name...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</form>
										</div>
										<div class="col-md-4">
											<a href="{$_url}settings/roles-add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Add Role</a>
										</div>&nbsp;
										&nbsp;
										</div>
									</div>

				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Role Name</th>
												<th>Access Rights</th>


												<th>{$_L['Manage']}</th>
											</tr>
										</thead>
										<tbody>
										{foreach $d as $ds}
											<tr>
												<td>{$ds['name']}</td>
												<td>
												{$pc = ORM::for_table('tbl_roles')->where('uid', $ds['id'])->find_many()}
												{foreach $pc as $dk}
                                                {$pc = ORM::for_table('tbl_rights')->find_one($dk['rid'])}
												{$pc->name} ,
												{/foreach}
												</td>
												<td>
						
										      <a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}settings/role-delete/{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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
