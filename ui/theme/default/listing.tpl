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
						</div>Directory Listing</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}listing/list/">
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
							<a href="{$_url}listing/add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i>Add Sub Category</a>
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
												<th>Name</th>
												<th>Description</th>
												<th>Location</th>
												<th>Contacts</th>
												<th>Email</th>
												<th>Address</th>
												<th>Main Category </th>
												<th>Sub Category </th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										{$no = 1}
										{foreach $d as $ds}
											<tr>
												<td align="center">{$no++}</td>
												<td>{$ds['name']}</td>
												<td>{$ds['description']}</td>
												<td>{$ds['location']}</td>
												<td>{$ds['contact']}</td>
												<td>{$ds['email']}</td>
												<td>{$ds['address']}</td>
												<td>{$ds['main_category']}</td>
												<td>{$ds['sub_category']}</td>
												
												<td>
													<a href="{$_url}listing/edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
													<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}listing/delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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