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
						</div>{$_L['Add_Voucher']}</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}prepaid/voucher-post" >            
                    <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Type']}</label>
						<div class="col-md-6">
							<input type="radio" id="Hot" name="type" value="Hotspot"> {$_L['Hotspot_Plans']} 
							<input type="radio" id="POE" name="type" value="PPPOE"> {$_L['PPPOE_Plans']} 
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">{$_L['Routers']}</label>
						<div class="col-md-6">
							<select id="personSelect" id="server" name="server" class="form-control">
								<option value=''>{$_L['Select_Routers']}</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Service_Plan']}</label>
						<div class="col-md-6">
							<select id="personSelect" id="plan" name="plan" class="form-control">
								<option value=''>{$_L['Select_Plans']}</option>
                            </select>
						</div>
                    </div>
					
					<div class="form-group">
						<label class="col-md-2 control-label">{$_L['Number_of_Vouchers']}</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="numbervoucher" value="1">
						</div>
                    </div>
					
					<div class="form-group">
						<label class="col-md-2 control-label">{$_L['Length_Code']}</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="lengthcode" value="12">
						</div>
                    </div>
					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit">{$_L['Generate']}</button> 
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
