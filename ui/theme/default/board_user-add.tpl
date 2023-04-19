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
						</div>Add New Board user</div></div>
			</div>

	<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}board_user/board_user-add-post" >            
                    <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Username']}</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="username" name="username">
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Full_Name']}</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="fullname" name="fullname">
						</div>
                    </div>

					<div class="form-group">
						<label class="col-md-2 control-label">Phone number</label>
						<div class="col-md-6">
							<input type="number" value="254" class="form-control" min="100000000"  name="phonenumber" required>
						</div>
                    </div>
						<div class="form-group">
						<label class="col-md-2 control-label">Email address</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="email"  >
						</div>
                    </div>
                   
						<div class="form-group">
						<label class="col-md-2 control-label">Other details</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="details"  >
						</div>
                    </div>

                   
                    <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Password']}</label>
						<div class="col-md-6">
							<input type="password" class="form-control" id="password" name="password">
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Confirm_Password']}</label>
						<div class="col-md-6">
							<input type="password" class="form-control" id="cpassword" name="cpassword">
						</div>
                    </div>
                     <div class="form-group">
								<label class="col-md-2 control-label">SMS Group</label>
								<div class="col-md-6">
									<select id="plan" name="sms_group_id" class="form-control">
										<option value="0"></option>
										{foreach $sms as $cs}
											<option value="{$cs['id']}">{$cs['group_name']}</option>
										{/foreach}
									</select>

								</div>
							</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}agent/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
