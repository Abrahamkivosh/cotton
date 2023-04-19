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
						</div>Invoice Settings</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}settings/invoice-post" >

					<div class="form-group">
						<label class="col-md-2 control-label">Invoice Template</label>
						<div class="col-md-6">
							<select id="other" name="invoice_template" class="form-control" required>
								<option value="{$_c['invoice_template']}">{$_c['invoice_template']}</option>
								<option value="PinnoSpace">PinnoSpace</option>
								<option value="PinnoHumble">PinnoHumble</option>
							</select>
						</div>
					</div>

					

					<div class="form-group">
						<label class="col-md-2 control-label">Invoice Footer</label>
						<div class="col-md-6">
							<textarea class="form-control" id="note" name="invoice_footer" rows="3">{$_c['invoice_footer']}</textarea>
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
