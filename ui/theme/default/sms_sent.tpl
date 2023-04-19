
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
						</div>Send Messages</div></div>
			</div>


			{if isset($notify)}
				{$notify}
			{/if}
			<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">
							<form id="site-search" method="post" action="{$_url}sms/sent_sms/">
								<div class="input-group">
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
										<input type="text" name="phonenumber" class="form-control" placeholder="Search by phone number...">
										<div class="input-group-btn">
											<button class="btn btn-success">{$_L['Search']}</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						{if $rights['compose']}
						<div class="col-md-4">
							<a href="{$_url}sms/compose" class="btn btn-primary btn-block waves-effect"><i class="ion ion-android-add"> </i>Compose SMS</a>
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
									<th>Phone</th>
									<th>Message</th>
									<th>Time</th>
								</tr>
								</thead>
								<tbody>
								{$no = 1}
								{foreach $t as $ds}
									<tr>
										<td align="center">{$no++}</td>
										<td>{$ds['phone']}</td>
										<td>{$ds['message']}</td>
										<td>{$ds['datet']}</td>
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
