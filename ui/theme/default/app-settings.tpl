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
						</div>{$_L['General_Settings']}</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}settings/app-post" enctype="multipart/form-data">
                    <div class="form-group">
						<label class="col-md-2 control-label">Company Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="company" name="company" value="{$_c['CompanyName']}">
							<span class="help-block">{$_L['App_Name_Help_Text']}</span>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">{$_L['Address']}</label>
						<div class="col-md-6">
							<textarea class="form-control" id="address" name="address" rows="3">{$_c['address']}</textarea>
							<span class="help-block">{$_L['You_can_use_html_tag']}</span>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Admin {$_L['Phone_Number']}</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="phone" name="phone" value="{$_c['phone']}">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Company Logo</label>
						<div class="col-md-6">
							<input type="file" name="file" id="file" >
							<img width="100" class="rounded-circle" src="{$_c['company_logo']}" alt="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Background client login Image</label>
						<div class="col-md-6">
							<input type="file" name="file_b" id="file" >
							<img width="100" class="rounded-circle" src="{$_c['background_image']}" alt="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Account Prefix</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="prefix" value="{$_c['prefix']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Scheduler Time (Reminders, disconnection client time)</label>
						<div class="col-md-6">
							<input type="time" class="form-control"  name="time_scheduler" value="{$_c['time_scheduler']}">
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
