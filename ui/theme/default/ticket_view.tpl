
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
						</div>Support Tickets</div></div>
			</div>


			{if isset($notify)}
				{$notify}
			{/if}
			<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
							<form id="site-search" method="post" action="{$_url}ticket/view/">
								<div class="input-group">
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
										<input type="text" name="subject" class="form-control" placeholder="Search by Ticket Subject...">
										<div class="input-group-btn">
											<button class="btn btn-success">{$_L['Search']}</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						{if $rights['ticket_create']}
						<div class="col-md-4">
							<a href="{$_url}ticket/create" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i>Create Ticket</a>
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
									<th>#</th>
									<th>Assigned To:</th>
									<th>Client:</th>
									<th>Subject</th>
									<th>Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								{$no = 1}
								{foreach $t as $ds}
									<tr>
										<td align="center">{$no++}</td>
										<td>
										{$user=ORM::for_table('tbl_users')->find_one($ds['user_id'])}
										{$user->fullname}
										</td>
										<td>
										{$client=ORM::for_table('tbl_customers')->find_one($ds['client_id'])}
										{$client->fullname}
										</td>
										<td>{$ds['subject']}</td>
										<td>{$ds['date']}</td>
										<td>
										{if $ds['status']=="pending"}
										<label class="badge badge-danger">Pending</label>
										{else if $ds['status']=="assigned"}
										<label class="badge badge-warning">Assigned</label>
										{else if $ds['status']=="customer reply"}	
										<label class="badge badge-success">Customer reply</label>
										{else if $ds['status']=="closed"}
										<label class="badge badge-success">Closed</label>
									 	{/if}	
							
										</td>
										<td>
										<a href="{$_url}ticket/view_ticket/{$ds['id']}" class="btn btn-success btn-sm">View</a>
										{if $rights['ticket_delete']}
															<a onClick="javascript: return confirm('Please confirm deletion');"  href="{$_url}ticket/delete/{$ds['id']}"  id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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
