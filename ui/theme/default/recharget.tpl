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
						</div>Recharge Transactions</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

				<div class="row">
					<div class="col-md-8">
						<form id="site-search" method="post" action="{$_url}prepaid/recharget/">
							<div class="input-group">
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
								<input type="text" name="username" class="form-control" placeholder="{$_L['Search_by_Username']}...">
								<div class="input-group-btn">
									<button class="btn btn-success">{$_L['Search']}</button>
								</div>
								</div>


						</form>
					</div>
					<div class="col-md-4">

					</div>&nbsp;
				</div>


				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
					<thead>
					<tr>
						<th>{$_L['Username']}</th>
						<th>{$_L['Plan_Name']}</th>
						<th>Amount</th>
						<th>{$_L['Created_On']}</th>
						<th>{$_L['Routers']}</th>
					</tr>
					</thead>
					<tbody>
					{foreach $d as $ds}
						<tr>
							<td>{$ds['username']}-
								{$pc = ORM::for_table('tbl_customers')->where('username', $ds['username'])->find_one()}
								{$pc->fullname}-
								{$pc->phonenumber}
							</td>
							<td>{$ds['plan_name']}</td>
							<td>{$ds['price']}</td>
							<td>{$ds['recharged_on']} {$ds['time']}</td>
							<td>{$ds['routers']}</td>
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
