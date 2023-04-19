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
						</div>SMS Template</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}pool/list/">
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
						{if $rights['template_add']}
						<div class="col-md-4">
											<a href="{$_url}sms/template-add" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i>Add Template</a>
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
												<th>Purpose</th>
												<th>Message</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										{$no = 1}
										{foreach $t as $ds}
											<tr>
												<td align="center">{$no++}</td>
												<td>{$ds['purpose']}</td>
												<td>{$ds['message']}</td>
												<td align="center">
										{if $rights['template_edit']}
													<a href="{$_url}sms/template-edit/{$ds['id']}" class="btn btn-warning btn-sm">{$_L['Edit']}</a>
										{/if}		
										{if $rights['template_delete']}
													<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}sms/template-delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
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
