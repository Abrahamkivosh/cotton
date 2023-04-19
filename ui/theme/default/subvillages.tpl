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
						</div>SubVillages</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}subvillages/list/">
											<div class="input-group">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="name" class="form-control" placeholder="{$_L['Search_by_Name']}...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</div>
											</form>
						</div>
						<div class="col-md-4">
							<a href="{$_url}subvillages/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i>Add Sub Village</a>
						</div>&nbsp;
					</div>
				</div>

				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Sub Village Name</th>
												<th>Village Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										{$no = 1}
										{foreach $d as $ds}
											<tr>
												<td align="center">{$no++}</td>
												<td>{$ds['name']}</td>
												<td>{$amcos=ORM::for_table('tbl_villages')->find_one($ds['village_id'])}
		                                         {$amcos->village_name}</td>
												
												<td>
													<a href="{$_url}subvillages/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
													<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}subvillages/delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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
