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
						</div>Confirm OTP Code to Issue input</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}input_amcos/issue_input_order_post2"  >
				<input type="hidden" name="farmer_id" value="{$farmer_id}">
				<input type="hidden" name="ref_id" value="{$ref_id}">	
					
                    <div class="form-group">
						<label class="col-md-2 control-label">OTP Code</label>
							<div class="col-md-3">
							<input type="number" name="code" class="form-control"  value="" required>
							</div>
                    </div>	

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit">Confirm OTP</button>
			
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
	</div>
</div>
{include file="sections/footer.tpl"}
