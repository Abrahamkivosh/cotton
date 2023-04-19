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
						</div>Directory Lising Add</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}listing/listing-add-post" >

                    <div class="form-group">
						<label class="col-md-2 control-label"> Name *</label>
						<div class="col-md-6">
							<input name="name" class="form-control" required>

						</div>
                    </div>	
					<div class="form-group">
						<label class="col-md-2 control-label"> Description (optional)</label>
						<div class="col-md-6">
							<input name="description" class="form-control" >

						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label"> Location (optional)</label>
						<div class="col-md-6">
							<input type="text" name="location" class="form-control" id="searchTextField" />

						</div>
                    </div>	
					<div class="form-group">
						<label class="col-md-2 control-label"> Contact(s)*</label>
						<div class="col-md-6">
							<input name="contact" value="+251" class="form-control" required>

						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label"> Email (optional)</label>
						<div class="col-md-6">
							<input name="email" class="form-control" >

						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label"> Address (optional)</label>
						<div class="col-md-6">
							<input name="address" class="form-control" >

						</div>
                    </div>	
                 
					<div class="form-group">
								<label class="col-md-2 control-label">Listing Sub Category *</label>
								<div class="col-md-6">
									<select id="plan" name="sub_category_id" class="form-control" required>
										<option></option>
										{foreach $main as $cs}
											<option value="{$cs['id']}">{$cs['name']}</option>
										{/foreach}
									</select>

								</div>
							</div>
                
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}category/sub-list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
