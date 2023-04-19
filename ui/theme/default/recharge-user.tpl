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
						</div>{$_L['Recharge_Account']}	</div></div>
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
									<select id="personSelect" id="personSelect" name="id_customer" style="width: 100%" data-placeholder="Select a customer...">
									<option></option>
										{foreach $c as $cs}
											{if $id eq $cs['id']}
												<option value="{$cs['id']}" selected>{$cs['username']}--{$cs['fullname']}</option>
											{else}
												<option value="{$cs['id']}">{$cs['username']}--{$cs['fullname']}</option>
											{/if}
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
										<option value=''>Select Routers</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Service_Plan']}</label>
								<div class="col-md-6">
									<select id="plan" id="plan" name="plan" class="form-control">
										<option value=''>Select Plans</option>
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
								{foreach $p as $ps}
										<option value="{$ps['id']}" {if $d['burst_plan_id'] eq $ps['id']} selected {/if}>{$ps['name_plan']}</option>
								{/foreach}
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Begin Day</label>
						<div class="col-md-6">
							<input type="text" name="d1" class="form-control" 
							{if $d1==""}
								value="{date('d-m-Y 00:00:00')}"
							{else}
							value="{$d1}"
							{/if}
							 required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">End Day</label>
						<div class="col-md-6">
							<input type="text" name="d2" class="form-control"
							 {if $d2==""}
								value="{date('d-m-Y 23:59:59')}"
							{else}
							value="{$d1}"
							{/if} required>
						</div>
					</div>
			     	<div class="form-group">
							<label class="col-md-2 control-label">Burst Days Of the Week</label>
							<div class="col-md-6">
								{if !empty($bs)}
									<table class="mb-0 table table-hover">
										<tr><td>Day</td>
											{foreach $bs as $ks}
												<td>{$ks['day']}<br>	<input type="checkbox"  name="day[]"  value="{$ks['day']}" checked></td>
											{/foreach}
										</tr>
										<tr><td>Begin Time</td>
											{foreach $bs as $ks}
												<td><input type="time" name="time[]" value="{$ks['begin_time']}"></td>
											{/foreach}
										</tr>
										<tr><td>End Time</td>

											{foreach $bs as $ks}
												<td><input type="time" name="end[]" value="{$ks['end_time']}"></td>
											{/foreach}

										</tr>

									</table>
								{else}
									<table class="mb-0 table table-hover">
										<tr><td>Day</td><td>Mon<br>	<input type="checkbox"  name="day[]" value="Mon" checked></td><td>Tue<br>	<input type="checkbox"  name="day[]" value="Tue" checked></td><td>Wed<br>	<input type="checkbox"  name="day[]" value="Wed" checked></td><td>Thur<br>	<input type="checkbox"  name="day[]" value="Thur" checked></td><td>Fri<br>	<input type="checkbox"  name="day[]" value="Fri" checked> </td><td> Sat<br>	<input type="checkbox"  name="day[]" value="Sat" checked></td><td>Sun<br>	<input type="checkbox"  name="day[]" value="Sun" checked></td></tr>
										<tr><td>Begin Time</td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td></tr>
										<tr><td>End Time</td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td></tr>
									</table>
								{/if}

							</div>
						</div>
						</div>
                                                                  <div class="form-group">
								<label class="col-md-2 control-label">Mac-Address</label>
																	  <div class="col-md-6">
																		  <input type="text" class="form-control" placeholder="e8:7g:k8:v4" name="mac2" value="{$mac}">
																	 <br>
																	<!--	  OR
																		  <br>


									<select id="personSelect"  name="mac" class="form-control" >
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
								<label class="col-md-2 control-label">IP Address</label>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="192.168.2.3" name="ip" value="{$ip}">
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
						<label class="col-md-2 control-label">Remarks</label>
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
