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
						</div>Email Settings</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}settings/email-post" >
					<div class="form-group">
						<label class="col-md-2 control-label">Enable/Disable Email</label>
						<div class="col-md-6">
							<select id="other" name="invoice_enabled" class="form-control" required>
								<option value="{$_c['invoice_enabled']}">{if $_c['invoice_enabled']=="1"}
								Enabled
									{else}
									Disabled
									{/if}
								</option>
								<option value="1">Enable</option>
								<option value="0">Disabled</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Domain</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="domain.com"    name="domain" value="{$_c['domain']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email SMTP host</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="smtp.domain.com" name="smtp" value="{$_c['smtp']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Encryption</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="ssl" name="security" value="{$_c['security']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Port</label>
						<div class="col-md-6">
							<input type="number" class="form-control" placeholder="587" name="port" value="{$_c['port']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Address</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="yourmail@domain.com"  name="email" value="{$_c['email']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Password</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="password" value="{$_c['password']}">
						</div>
					</div>
						<div class="form-group">
						<label class="col-md-2 control-label">Email Subject</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="subject" value="{$_c['subject']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email body </label>
						<div class="col-md-6">
							<textarea class="form-control" id="note" name="note" rows="3">{$_c['note']}</textarea>
							<span class="help-block">{$_L['You_can_use_html_tag']}</span>
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
