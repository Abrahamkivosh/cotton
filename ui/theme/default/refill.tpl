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
                <form class="form-horizontal" method="post" role="form" action="{$_url}prepaid/refill-post" >
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Select_Account']}</label>
								<div class="col-md-6">
									<select id="personSelect" id="personSelect" name="id_customer" style="width: 100%" data-placeholder="{$_L['Select_Customer']}...">
									<option></option>
										{foreach $c as $cs}
											<option value="{$cs['id']}">{$cs['username']}</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Code_Voucher']}</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="code" name="code" placeholder="{$_L['Enter_Voucher_Code']}">
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
