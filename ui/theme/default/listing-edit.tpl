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
						</div>Sub Category Edit</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}listing/listing-edit-post" >
				<input type="hidden" name="id" value="{$d['id']}">				

            <div class="form-group">
						<label class="col-md-2 control-label"> Name *</label>
						<div class="col-md-6">
							<input name="name" class="form-control"  value="{$d['name']}" required>

						</div>
                    </div>	
					<div class="form-group">
						<label class="col-md-2 control-label"> Description (optional)</label>
						<div class="col-md-6">
							<input name="description"  value="{$d['description']}" class="form-control" >

						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label"> Location (optional)</label>
						<div class="col-md-6">
							<input name="location" value="{$d['location']}" class="form-control"  id="searchTextField">

						</div>
                    </div>	
					<div class="form-group">
						<label class="col-md-2 control-label"> Contact(s)*</label>
						<div class="col-md-6">
							<input name="contact"  value="{$d['contact']}"  class="form-control" required>

						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label"> Email (optional)</label>
						<div class="col-md-6">
							<input name="email" value="{$d['email']}" class="form-control" >

						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label"> Address (optional)</label>
						<div class="col-md-6">
							<input name="address" value="{$d['address']}" class="form-control" >

						</div>
                    </div>	
                 
					<div class="form-group">
								<label class="col-md-2 control-label">Listing Sub Category *</label>
								<div class="col-md-6">
									<select id="plan" name="sub_category_id" class="form-control" required>
										<option>{$d['sub_category_id']}</option>
										{foreach $main as $cs}
											<option value="{$cs['id']}">{$cs['name']}</option>
										{/foreach}
									</select>

								</div>
							</div>
                    
					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}listing/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
