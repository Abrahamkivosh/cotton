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
						</div>{$_L['Recharge_Account']}</h3></div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
					{$notify}
				{/if}
				<div class="card-body">
					<form class="form-horizontal" method="post" role="form" action="{$_url}prepaid/edit-post">
						<input type="hidden" name="id" value="{$d['id']}">
						<div class="form-group">
							<label class="col-md-2 control-label">{$_L['Select_Account']}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="username" name="username" value="{$d['username']}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">{$_L['Service_Plan']}</label>
							<div class="col-md-6">
								<select id="personSelect" id="id_plan" name="id_plan" class="form-control">

									{foreach $p as $ps}
										<option value="{$ps['id']}" {if $d['plan_id'] eq $ps['id']} selected {/if}>{$ps['name_plan']}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Burst {$_L['Service_Plan']}</label>
							<div class="col-md-6">
								<select id="planv"  name="burst_plan_id" class="form-control" required>
									{foreach $p as $ps}
										<option value="{$ps['id']}" {if $d['burst_plan_id'] eq $ps['id']} selected {/if}>{$ps['name_plan']}</option>
									{/foreach}
								</select>
							</div>
						</div>
							<div class="form-group">
						<label class="col-md-2 control-label">Burst Begin Day</label>
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
						<label class="col-md-2 control-label">Burst End Day</label>
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
						<div class="form-group">
							<label class="col-md-2 control-label">Mac-Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="e8:7g:k8:v4" name="mac" value="{$d['mac']}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">IP Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="192.168.2.3" name="ip" value="{$d['ip']}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">{$_L['Created_On']}</label>
							<div class="col-md-6">
								<div class="input-group date" id="datepicker1">
									<input type="date" class="form-control" name="recharged_on" value="{$d['recharged_on']}">
									<span class="input-group-addon ion ion-calendar"></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">{$_L['Expires_On']}</label>
							<div class="col-md-6">
								<div class="input-group date" id="datepicker2">
									<input type="date" class="form-control" id="expiration" name="expiration" value="{$d['expiration']}">
									<span class="input-group-addon ion ion-calendar"></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Time {$_L['Expires_On']}</label>
							<div class="col-md-6">
								<div class="input-group ">
									<input type="time" class="form-control"  name="timeex" value="{$d['time']}">
									<span class="input-group-addon ion ion-calendar"></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Remarks</label>
							<div class="col-md-6">
								<textarea cols="6" rows="3" name="comment" class="form-control">{$d['comment']}</textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success waves-effect waves-light" type="submit">{$_L['Edit']}</button>
								Or <a href="{$_url}prepaid/list">{$_L['Cancel']}</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

{include file="sections/footer.tpl"}
