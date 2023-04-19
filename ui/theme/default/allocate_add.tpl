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
						</div>Allocate Burst</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}prepaid/allocate_burst" >

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
						<label class="col-md-2 control-label">{$_L['Service_Plan']} Group</label>
						<div class="col-md-6">
							<select id="plan" id="id_plan" name="id_plan" class="form-control">
                                  <option></option>
								{foreach $p as $ps}
									<option value="{$ps['id']}">{$ps['name_plan']}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Burst {$_L['Service_Plan']}</label>
						<div class="col-md-6">
							<select  id="planv" name="burst_plan_id" class="form-control">
								<option value=''>{$_L['Select_Plans']}</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Burst Begin Day</label>
						<div class="col-md-6">
							<input type="date" name="d1" class="form-control"  required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Burst End Day</label>
						<div class="col-md-6">
							<input type="date" name="d2" class="form-control"  required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Burst Days Of the Week (Don't uncheck Days)</label>
						<div class="col-md-6">
							<table class="mb-0 table table-hover">
								<tr><td>Day</td><td>Mon<br>	<input type="checkbox"  name="day[]" value="Mon" checked></td><td>Tue<br>	<input type="checkbox"  name="day[]" value="Tue" checked></td><td>Wed<br>	<input type="checkbox"  name="day[]" value="Wed" checked></td><td>Thur<br>	<input type="checkbox"  name="day[]" value="Thur" checked></td><td>Fri<br>	<input type="checkbox"  name="day[]" value="Fri" checked> </td><td> Sat<br>	<input type="checkbox"  name="day[]" value="Sat" checked></td><td>Sun<br>	<input type="checkbox"  name="day[]" value="Sun" checked></td></tr>
								<tr><td>Begin Time</td></t><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td><td><input type="time" name="time[]" value="00:00"></td></tr>
								<tr><td>End Time</td></t><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td><td><input type="time" name="end[]" value="00:00"></td></tr>
							</table>

						</div>
					</div>


					<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
									Or <a href="{$_url}prepaid/allocate_list">{$_L['Cancel']}</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
