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
						</div>Payment Settings</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}settings/payment-post" >

					<div class="form-group">
						<label class="col-md-2 control-label">Gateway</label>
						<div class="col-md-6">
							<select id="other" name="mpesa_type" class="form-control" required>
								<option value="{$_c['mpesa_type']}">{$_c['mpesa_type']}</option>
								<option value="paybill">Paybill</option>
								<option value="till">Till</option>
							</select>
						</div>
					</div>

                    <div class="form-group">
						<label class="col-md-2 control-label">Mpesa Paybill C2B URL</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="company" name="mpesa_url" value="{$_c['mpesa_url']}">
							<span class="help-block">https://mpesa-url.com</span>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Mpesa C2B Consumer Key</label>
						<div class="col-md-6">
							<input class="form-control" id="address" name="mpesa_consumer_key"  value="{$_c['mpesa_consumer_key']}">
							<span class="help-block">C2B Consumer Key</span>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Mpesa C2B Secret Key</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="mpesa_secret_key" value="{$_c['mpesa_secret_key']}">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Paypal CheckOut URL</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="paypal_url" value="{$_c['paypal_url']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Paypal API Key</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="paypayl_api_key" value="{$_c['paypayl_api_key']}">
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
