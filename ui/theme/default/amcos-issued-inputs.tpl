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
						</div>Issued Inputs to Farmers</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}input_amcos/inputs-issued-list/">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="username" class="form-control" placeholder="Search by Ref ID...">
												<div class="input-group-btn">
													<button class="btn btn-success">Search</button>
												</div>
											</div>
											</div>
											</form>
{if $rights['user_add']}
										<div class="col-md-4">
											<a href="{$_url}input_amcos/issue_input_sec1" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i> Issue Inputs</a>
										</div>&nbsp;
{/if}										
					</div>
									</div>
									<div class="col-lg-12">
										<div class="main-card mb-3 card">
											<div class="card-body">

												<table class="mb-0 table table-hover">
										<thead>
											<tr>
											<th>Ref #</th>
												<th>Input Name</th>
												<th>Quantity Issued</th>
												<th>Units</th>
												<th>Farmer name</th>
												<th>Date Time</th>

											</tr>
										</thead>
										<tbody>
										{foreach $d as $ds}
											<tr>
											     <td>Ref. {$ds['ref_id']}</td>
												<td>{$inu=ORM::for_table('inputs')->find_one($ds['input_id'])}
		                                         {$inu->name}</td>
												
	                                         	<td>{$ds['input_qty']}</td>
												 <td>{$inu->unit}</td>
												<td>{$farmer=ORM::for_table('farmer')->find_one($ds['farmer_id'])}
		                                         {$farmer->firstname} {$farmer->lastname} {$farmer->phonenumber}</td>
												<td>{$ds['created_at']}</td>
											</tr>
										{/foreach}
										</tbody>
									</table>
									</div>
									{$paginator['contents']}
								</div>
							</div>
						</div>
					</div>
						</div>
					</div>


{include file="sections/footer.tpl"}
