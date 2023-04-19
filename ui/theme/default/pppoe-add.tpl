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
                <form class="form-horizontal" method="post" role="form" action="{$_url}services/pppoe-add-post" >
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Plan_Name']}</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="name_plan" name="name_plan">
								</div>
							</div>
							 <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Plan_Type']}</label>
						<div class="col-md-10">
							<input type="radio" id="Unlimited" name="typebp" value="Unlimited" checked> {$_L['Unlimited']} 
							<input type="radio" id="Limited" name="typebp" value="Limited"> {$_L['Limited']} 
						</div>
                    </div>
					<div style="display:none;" id="Type">
						<div class="form-group">
							<label class="col-md-2 control-label">{$_L['Limit_Type']}</label>
							<div class="col-md-10">
								<input type="radio" id="Time_Limit" name="limit_type" value="Time_Limit" > {$_L['Time_Limit']} 
								<input type="radio" id="Data_Limit" name="limit_type" value="Data_Limit"> {$_L['Data_Limit']} 
								<input type="radio" id="Both_Limit" name="limit_type" value="Both_Limit"> {$_L['Both_Limit']} 
							</div>
						</div>
					</div>
					<div style="display:none;" id="TimeLimit">
						<div class="form-group">
							<label class="col-md-2 control-label">{$_L['Time_Limit']}</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="time_limit" name="time_limit" value="0">
							</div>
							<div class="col-md-2">
								<select id="personSelect" class="form-control" id="time_unit" name="time_unit">
									<option value="Hrs">{$_L['Hrs']}</option>
									<option value="Mins">{$_L['Mins']}</option>
								</select>
							</div>
						</div>
					</div>
					<div style="display:none;" id="DataLimit">
						<div class="form-group">
							<label class="col-md-2 control-label">{$_L['Data_Limit']}</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="data_limit" name="data_limit" value="0">
							</div>
							<div class="col-md-2">
								<select id="personSelect" class="form-control" id="data_unit" name="data_unit">
									<option value="MB">MBs</option>
									<option value="GB">GBs</option>
								</select>
							</div>
						</div>
					</div>
				
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['BW_Name']}</label>
								<div class="col-md-6">
									<select  id="id_bw" name="id_bw" class="form-control" required>
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
									<select  name="id_bw_b" class="form-control">
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
                                                        <div class="form-group">
								<label class="col-md-2 control-label">Bridge</label>
								<div class="col-md-6">
									<select id="personSelect"  name="bridge" class="form-control" >
										<option value="">Select Bridge (Optional)</option>
										 {$num =count($ARRAY)}
										{for $i=0; $i<$num; $i++}
       
											<option value="{$ARRAY[$i]['name']}">{$ARRAY[$i]['name']}</option>
										{/for}
                                            
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Router_Name']}</label>
								<div class="col-md-6">
									<select  id="routers" name="routers" class="form-control">
										    <option value=''>{$_L['Select_Routers']}</option>

											<option value="{$r}">{$r}</option>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Pool']}</label>
								<div class="col-md-6">
									<select id="pool_name" name="pool_name" class="form-control">
										<option value=''>{$_L['Select_Pool']}</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
									Or <a href="{$_url}services/pppoe">{$_L['Cancel']}</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
