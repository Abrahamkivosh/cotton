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
						</div>Add New farmer </div></div>
			</div>

	<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}farmer/farmer-add-post" >            
                
                    <div class="form-group">
						<label class="col-md-2 control-label">First Name *</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="firstname" required>
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Father's Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="middlename">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Family Name *</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="lastname" required>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Gender *</label>
						<div class="col-md-6">
					 <input type="radio" name="gender" value="male" checked> Male<br>
                     <input type="radio" name="gender" value="female"> Female<br>
                     <input type="radio" name="gender" value="other"> Other
					 	</div>
                    </div>

					<div class="form-group">
						<label class="col-md-2 control-label">phonenumber *</label>
						<div class="col-md-6">
							<input type="password" id="phone1"  class="form-control" min="100000000" max="0799999999" name="phonenumber" required>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Confirm phonenumber*</label>
						<div class="col-md-6">
							<input type="number" id="phone1"  class="form-control" min="100000000" max="799999999" name="phonenumber1" required>
						</div>
						<div id="phone_confirm">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Year of Birth</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="idno" >
						</div>
                    </div>
                
                     <div class="form-group">
								<label class="col-md-2 control-label">Sub Village Name</label>
								<div class="col-md-6">
									<select id="personSelect"  name="sub_village_id" class="form-control" required>
										<option></option>
										{foreach $sub_village as $cs}
											<option value="{$cs['id']}">{$cs['name']}</option>
										{/foreach}
									</select>

								</div>
					</div>
					<div class="form-group">
								<label class="col-md-2 control-label">No. Acre</label>
								<div class="col-md-6">
									<select id="personSelect"  name="acre" class="form-control" required>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
									</select>

								</div>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}farmer/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
