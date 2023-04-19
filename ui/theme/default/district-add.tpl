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
						</div> Add district</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}district/district-add-post" >

                    <div class="form-group">
						<label class="col-md-2 control-label"> Name</label>
						<div class="col-md-6">
							<input name="name" class="form-control" required>
						</div>
                    </div>
					
                     <div class="form-group">
								<label class="col-md-2 control-label">Region </label>
								<div class="col-md-6">
									<select id="personSelect"  name="region_id" class="form-control" required>
										<option></option>
										{foreach $region as $cs}
											<option value="{$cs['id']}">{$cs['name']}</option>
										{/foreach}
									</select>

								</div>
					</div>
	
			
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}district/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
