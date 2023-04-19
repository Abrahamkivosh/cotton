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
						</div>{$_L['Add_Plan']}</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}services/ip-add-post" >
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Plan_Name']}</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="name_plan" name="name_plan">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['BW_Name']}</label>
								<div class="col-md-6">
									<select id="personSelect" id="id_bw" name="id_bw" class="form-control">
										<option value="">{$_L['Select_BW']}...</option>
										{foreach $d as $ds}
											<option value="{$ds['id']}">{$ds['name_bw']}</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Burst {$_L['BW_Name']} (Optional)</label>
								<div class="col-md-6">
									<select id="id_bw" name="id_bw_b" class="form-control">
										<option value="">{$_L['Select_BW']}...</option>
										{foreach $d as $ds}
											<option value="{$ds['id']}">{$ds['name_bw']}</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Plan_Price']}</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="price" name="price">
								</div>
							</div>
								<div class="form-group">
								<label class="col-md-2 control-label">Interface name:</label>
								<div class="col-md-6">
									<input type="text" class="form-control"  name="bridge" value="{$d['bridge']}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Plan_Validity']}</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="validity" name="validity">
								</div>
								<div class="col-md-2">
									<select id="personSelect" class="form-control" id="validity_unit" name="validity_unit">
										<option value="Days">{$_L['Days']}</option>
										<option value="Months">{$_L['Months']}</option>
									</select>
								</div>
							</div>
                                                      
						<!--	<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Router_Name']}</label>
								<div class="col-md-6">
									<select id="personSelect" id="routers" name="routers" class="form-control">
										<option value=''>{$_L['Select_Routers']}</option>
										{foreach $r as $rs}
											<option value="{$rs['name']}">{$rs['name']}</option>
										{/foreach}
									</select>
								</div>
							</div>
						-->
							
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
									Or <a href="{$_url}services/ip">{$_L['Cancel']}</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
