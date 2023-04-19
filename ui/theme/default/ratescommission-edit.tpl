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
						</div>Rates & Commission Edit</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}ratescommissions/ratescommission-edit-post" >
				<input type="hidden" name="id" value="{$d['id']}">				
                     <div class="form-group">
								<label class="col-md-2 control-label">District </label>
								<div class="col-md-6">
									<select id="plan" name="district_id" class="form-control">
									<option>{$d['district_id']}</option>
										{foreach $district as $cs}
											<option value="{$cs['id']}">{$cs['name']}</option>
										{/foreach}
									</select>
								</div>
					</div>
				  <div class="form-group">
						<label class="col-md-2 control-label">Mininimum Cotton Rate @ Tshs/Kg<</label>
						<div class="col-md-6">
							<input name="min_rate" class="form-control" value="{$d['min_rate']}" required>
						</div>
                    </div>
					  <div class="form-group">
						<label class="col-md-2 control-label">Cess /Buying price %</label>
						<div class="col-md-6">
							<input name="cess" class="form-control" value="{$d['cess']}" required>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">CDTF @ Tshs/Kg</label>
						<div class="col-md-6">
							<input name="cdtf" class="form-control" value="{$d['cdtf']}" required>
						</div>
                    </div>	
					  <div class="form-group">
						<label class="col-md-2 control-label">AMCOS commission @ Tshs/Kg</label>
						<div class="col-md-6">
							<input name="amcos_rate" class="form-control" value="{$d['amcos_rate']}" required>
						</div>
                    </div>
					 <div class="form-group">
						<label class="col-md-2 control-label">Educational levy @ Tshs/Kg</label>
						<div class="col-md-6">
							<input name="educational" class="form-control" value="{$d['educational']}" required>
						</div>
                    </div>
					  <div class="form-group">
						<label class="col-md-2 control-label">System commission rate %</label>
						<div class="col-md-6">
							<input name="system_rate" class="form-control"  value="{$d['system_rate']}" required>
						</div>
                    </div>	

                    
					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}ratescommissions/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
