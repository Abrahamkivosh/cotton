{include file="sections/header.tpl"}

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Customer Report</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}reports/customers-post">

									<div class="form-group">
										<label class="col-md-3 control-label">Option</label>
										<div class="col-md-9">
											<select id="personSelect" class="form-control" name="option">
												<option value="" selected="">All</option>
												<option value="active">Active</option>
												<option value="inactive">Inactive</option>
												<option value="due3">Due 3 days</option>
												<option value="due7">Due 7 Days</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<button type="submit" id="submit" class="btn btn-primary">Generate Report</button>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
</div>


{include file="sections/footer.tpl"}
