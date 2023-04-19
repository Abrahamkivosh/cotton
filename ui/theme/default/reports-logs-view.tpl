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
						</div>Logs Report
						<br>

							Logs Report:
							{$stype} [ {$fdate} - {$tdate}]
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
											<th>User</th>
											<th>Log Description</th>
											<th>Type</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										{foreach $d as $ds}
                                        <tr>
											<td>
												{if $ds['type']=="Admin"}
												{$use= ORM::for_table('tbl_users')->find_one($ds['userid'])}
													{$use['username']}--{$use['fullname']}
											     {else}
													{$use= ORM::for_table('agents')->find_one($ds['userid'])}
													{$use['username']}--{$use['fullname']}
												{/if}
											</td>
											<td>{$ds['description']}</td>
											<td>{$ds['type']}</td>
											<td>{$ds['date']}</td>

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
