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
								</div>
								{$_L['Add_Contact']}
							</div></div>
					</div>

					<div class="main-card mb-3 card">
						{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}customers/add-upload"  enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-md-2 control-label">Download sample file</label>
									<div class="col-md-6">
										<a href="docs/sample.csv">Download CSV</a>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Upload Customer list</label>
									<div class="col-md-6">
										<input type="file" name="file" id="file" accept=".csv">

									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button class="btn btn-primary waves-effect waves-light" type="submit">Upload</button>
										Or <a href="{$_url}customers/list">{$_L['Cancel']}</a>
									</div>
								</div>
							</form>
						<form class="form-horizontal" method="post" role="form" action="{$_url}customers/add-post" >            
							<div class="form-group">
								<label class="col-md-2 control-label">Account Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" value="{$username}" name="username" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Full_Name']}</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="fullname" name="fullname">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Password</label>
								<div class="col-md-6">
								{$pass=strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)), 0, 6))}
									<input type="text" placeholder="password" class="form-control" id="password" name="password" value="{$pass}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Repeat Password</label>
								<div class="col-md-6">
									<input type="text"  placeholder="Repeat password"  class="form-control" id="cpassword" name="cpassword" value="{$pass}">
								</div>
							</div>
							
							
							<div class="form-group">
								<label class="col-md-2 control-label">Email Address</label>
								<div class="col-md-6">
                                                                    <input type="email" class="form-control" id="address" placeholder="m@m.com" name="address">
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Phone_Number']}</label>
								<div class="col-md-6">
									<input type="number" max="799999999" min="100000000" class="form-control" id="phonenumber" name="phonenumber" placeholder="0712345678">
								</div>
							</div>
                                                                <div class="form-group">
								<label class="col-md-2 control-label">Discount Amount</label>
								<div class="col-md-6">
									<input type="number" class="form-control" value="0" name="discount">
								</div>
							</div>
							                         <div class="form-group">
								<label class="col-md-2 control-label">Wallet Amount</label>
								<div class="col-md-6">
									<input type="number" class="form-control" value="0" name="credit">
								</div>
							</div>
                                                                <div class="form-group">
								<label class="col-md-2 control-label">Location</label>
								<div class="col-md-6">
									<input type="text" class="form-control"  name="location">
								</div>
							</div>
                                                              <div class="form-group">
								<label class="col-md-2 control-label">Router</label>
								<div class="col-md-6">
                                                                    <select id="personSelect" name="routers" class="form-control">
                                                                        {foreach $d as $cs}
											<option value="{$cs['name']}">{$cs['name']}</option>
										{/foreach}
                                                                    </select>
									
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
								<label class="col-md-2 control-label">New installation</label>
								<div class="col-md-6">
									<select id="plan" name="installation" class="form-control">
										<option value="1">Yes</option>
										<option value="0">No</option>
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
