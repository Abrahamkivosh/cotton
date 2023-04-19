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
						</div>{$_L['Edit_Contact']}</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}customers/edit-post" >
							<input type="hidden" name="id" value="{$d['id']}">
								<div class="form-group">
									<label class="col-md-2 control-label">Account Name</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="username" name="username" value="{$d['username']}" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">{$_L['Full_Name']}</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="fullname" name="fullname" value="{$d['fullname']}">
									</div>
								</div>
								<div class="form-group">
								<label class="col-md-2 control-label">Password</label>
								<div class="col-md-6">
									<input type="text" value="{$d['password']}" class="form-control" id="password" name="password" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Repeat Password</label>
								<div class="col-md-6">
									<input type="text"  value="{$d['password']}" class="form-control" id="cpassword" name="cpassword" readonly>
								</div>
							</div>
							
							
								<div class="form-group">
									<label class="col-md-2 control-label">Email Address</label>
									<div class="col-md-6">
                                                                            <input type="email" class="form-control" id="address" name="address" value="{$d['address']}">
									
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">{$_L['Phone_Number']}</label>
									<div class="col-md-6">
										<input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{$d['phonenumber']}">
									</div>
								</div>
                                                                           <div class="form-group">
								<label class="col-md-2 control-label">Discount Amount </label>
								<div class="col-md-6">
									<input type="number" class="form-control"  name="discount" value="{$d['discount']}">
								</div>
							</div>
							           <div class="form-group">
								<label class="col-md-2 control-label">Wallet Amount</label>
								<div class="col-md-6">
									<input type="number" class="form-control"  value="{$d['credit']}" name="credit">
								</div>
							</div>
                                                                <div class="form-group">
								<label class="col-md-2 control-label">Location</label>
								<div class="col-md-6">
									<input type="text" class="form-control"  name="location" value="{$d['location']}">
								</div>
							</div>
							  <div class="form-group">
								<label class="col-md-2 control-label">Router</label>
								<div class="col-md-6">
                                                                    <select  name="routers" class="form-control">
																		<option>{$d['routers']}</option>
                                                                        {foreach $de as $cs}
											<option value="{$cs['name']}">{$cs['name']}</option>
										{/foreach}
                                                                    </select>
									
								</div>
							</div>

					<div class="form-group">
						<label class="col-md-2 control-label">SMS Group</label>
						<div class="col-md-6">
							<select id="plan" name="sms_group_id" class="form-control">
								<option value="{$d['sms_group_id']}">

									{{$b = ORM::for_table('sms_group')->find_one($d['sms_group_id'])}}
									{$b->group_name}</option>
								{foreach $sms as $cs}
									<option value="{$cs['id']}">{$cs['group_name']}</option>
								{/foreach}
							</select>

						</div>
					</div>

								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
										Or <a href="{$_url}customers/list">{$_L['Cancel']}</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
