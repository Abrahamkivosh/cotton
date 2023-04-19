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
						</div>Tickets Report</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}reports/ticket-after">
									<div class="form-group">
										<label class="col-md-3 control-label">{$_L['From_Date']}</label>
										<div class="col-md-6">
											<div class="input-group date" id="datepicker1">
												<input type="text" class="form-control" value="{$tdate}" name="fdate" id="fdate">
												<span class="input-group-addon ion ion-calendar"></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">{$_L['To_Date']}</label>
										<div class="col-md-6">
											<div class="input-group date" id="datepicker2">
												<input type="text" class="form-control" value="{$mdate}" name="tdate" id="tdate">
												<span class="input-group-addon ion ion-calendar"></span>
											</div>
										</div>
									</div>
									 <div class="form-group">
						<label class="col-md-2 control-label">Technician Assigned:</label>
						<div class="col-md-6">
							<select id="personSelect"  name="user_id" class="form-control"s tyle="width: 100%" data-placeholder="Select Client...">
						           	<option value="all">All</option>          
										{foreach $userd as $users}
											<option value="{$users['id']}">{$users['fullname']}--{$users['username']}</option>
										{/foreach}
						</select>
						</div>

									<div class="form-group">
										<label class="col-md-3 control-label">{$_L['Type']}</label>
										<div class="col-md-6">
											<select id="personSelect" class="form-control"  name="stype">
												<option value="all">ALL</option>
													<option>pending</option>
														<option>assigned</option>
														<option>customer reply</option>
														<option>closed</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<button type="submit" id="submit" class="btn btn-primary">Tickets Report</button>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
</div>


{include file="sections/footer.tpl"}
