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
						</div>{$_L['Recharge_Account']}</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}prepaid/recharge-post" >
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Select_Account']}</label>
								<div class="col-md-6">
									<select id="personSelect"  name="id_customer" style="width: 100%" data-placeholder="{$_L['Select_Customer']}...">
									<option></option>
										{foreach $c as $cs}
											<option value="{$cs['id']}">{$cs['username']}--{$cs['fullname']}</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Type']}</label>
								<div class="col-md-6">
									<input type="radio" id="Hot" name="type" value="Hotspot"> {$_L['Hotspot_Plans']} 
									<input type="radio" id="POE" name="type" value="PPPOE"> {$_L['PPPOE_Plans']} 
									<input type="radio" id="IP" name="type" value="IP"> IP Plans
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Routers']}</label>
								<div class="col-md-6">
									<select  id="server" name="server" class="form-control">
										<option value=''>{$_L['Select_Routers']}</option>
									</select>
								</div>
							</div>
							

					<div class="form-group">
						<label class="col-md-2 control-label">{$_L['Service_Plan']}</label>
						<div class="col-md-6">
							<select  id="plan" name="plan" class="form-control">
								<option value=''>{$_L['Select_Plans']}</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Schedule Burst</label>
						<div class="col-md-6">
							<select onchange="document.getElementById('burst').style.display = 'block';" class="form-control">
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
						</div>
					</div>
						<div id="burst" style="display:none;">
					<div class="form-group">
						<label class="col-md-2 control-label">Burst {$_L['Service_Plan']}</label>
						<div class="col-md-6">
							<select  id="planv" name="burst_plan_id" class="form-control">
								<option value=''>{$_L['Select_Plans']}</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Burst Days Of the Week (Don't uncheck Days)</label>
						<div class="col-md-6">
							<table class="mb-0 table table-hover">
								<tr><td>Day</td><td>Mon<br>	<input type="checkbox"  name="day[]" value="Mon" checked></td><td>Tue<br>	<input type="checkbox"  name="day[]" value="Tue" checked></td><td>Wed<br>	<input type="checkbox"  name="day[]" value="Wed" checked></td><td>Thur<br>	<input type="checkbox"  name="day[]" value="Thur" checked></td><td>Fri<br>	<input type="checkbox"  name="day[]" value="Fri" checked> </td><td> Sat<br>	<input type="checkbox"  name="day[]" value="Sat" checked></td><td>Sun<br>	<input type="checkbox"  name="day[]" value="Sun" checked></td></tr>
								<tr><td>Begin Time</td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td></tr>
								<tr><td>End Time</td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td></tr>
							</table>

						</div>
					</div>
					</div>

                                                                         <div class="form-group">
								<label class="col-md-2 control-label">Mac-Address(For PPoe or Hotspot)</label>
																			 <div class="col-md-6">
																				 <input type="text" class="form-control" placeholder="e8:7g:k8:v4  (optional)" name="mac2" value="{$mac}">
																				 <br>
																				<!-- OR
																				 <br>

									<select id="mac"  name="mac" class="form-control" >
										<option value=''>Select Mac-Address</option>
										 {$num =count($ARRAY)}
										{for $i=0; $i<$num; $i++}
       
											<option value="{$ARRAY[$i]['mac-address']}">{$ARRAY[$i]['mac-address']}-{$ARRAY[$i]['address']}</option>
										{/for}
                                            
									</select>
									-->
								</div>
							</div>
                                                       <div class="form-group">
								<label class="col-md-2 control-label">IP Address (Mandatoy for IP Type)</label>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="192.168.2.3" name="ip" >
								</div>
							</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Payment Received?</label>
						<div class="col-md-6">
							<select  name="billable" class="form-control">
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Remarks  (optional)</label>
						<div class="col-md-6">
							<textarea cols="6" rows="3" name="comment" class="form-control"></textarea>
						</div>
					</div>


					<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button class="btn btn-success waves-effect waves-light" type="submit">{$_L['Recharge']}</button>
									Or <a href="{$_url}customers/list">{$_L['Cancel']}</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
