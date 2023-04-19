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
						</div>SMS Settings</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}settings/sms-post" >

					<div class="form-group">
						<label class="col-md-2 control-label">Gateway</label>
						<div class="col-md-6">
							<select id="other" name="sms_gateway" class="form-control" required>
								<option value="{$_c['sms_gateway']}">{$_c['sms_gateway']}</option>
								<option value="kibabasms">Kibaba SMS</option>
								<option value="africantalkings">AfricanTalkings</option>
								<option value="ujumbesms">Ujumbe SMS</option>
								<option value="movesms">Move SMS</option>
								<option value="mspace">MSpace</option>
								<option value="phitech">Phitech SMS</option>
								<option value="juamobile">Jua Mobile</option>
								<option value="advanta">Advanta</option>
                                <option value="smsonlinegh">smsonlinegh</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">username</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="sms_username" value="{$_c['sms_username']}"  >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Sender ID Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="sms_sender_id" value="{$_c['sms_sender_id']}" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Api Key</label>
						<div class="col-md-6">
							<textarea class="form-control"  name="sms_api_key" rows="3">{$_c['sms_api_key']}</textarea>

						</div>

					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Password(optional)</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="sms_password" value="{$_c['sms_password']}">

						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
