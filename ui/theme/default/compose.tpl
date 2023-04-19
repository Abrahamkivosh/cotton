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
						</div>Send SMS	</div></div>
			</div>

			<div class="main-card mb-3 card">
				<div class="card-body">
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<a href="{$_url}sms/sms_send_selected"><button class="btn btn-primary waves-effect waves-light">Send To Selected Customers</button></a>
									<br>
									OR
									<br>
								</div>

							</div>
                <form class="form-horizontal" method="post" role="form" action="{$_url}sms/sms_send_post" >

					<div class="form-group">
						<label class="col-md-2 control-label">Agents</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="phone" value="+255"><br>OR<br>
							<select id="personSelect"  name="phonenumber" class="form-control"style="width: 100%" data-placeholder="Select Agents...">
								<option value="ooo">Select Customer</option>
								<option value="all">Send to all</option>
								<option value="active">Send to Active Agents</option>
								<option value="inactive">Send to Inactive Agents</option>
                                                                       
										{foreach $c as $cs}
											<option value="{$cs['phonenumber']}">{$cs['fullname']}--{$cs['username']}</option>
										{/foreach}
						</select><br>OR
							<br>

							<select id="plan"  name="group_id" class="form-control"style="width: 100%" data-placeholder="Select SMS Group..">
								<option value="">Select SMS Group</option>
								{foreach $sms as $cs}
									<option value="{$cs['id']}">{$cs['group_name']}</option>
								{/foreach}
							</select>
							
						</div>


                    </div>
                                                   <div class="form-group">
						<label class="col-md-2 control-label">Compose Message</label>
						<div class="col-md-6">
                                                    <textarea name="messaga" class="form-control" cols="20" rows="5"></textarea>
                                                    <br>OR
						</div>
                                                   </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Select template</label>
						<div class="col-md-6">
                                                     <select id="template"  name="message" class="form-control" style="width: 100%" data-placeholder="Select SMS template...">
                                                         <option value="">Kindly select Template</option>
										{foreach $t as $ct}
											<option value="{$ct['message']}"><b style="text-transform: uppercase;">{$ct['purpose']}</b>--{$ct['message']}</option>
										{/foreach}
						</select>
						</div>
                    </div>	
                
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Send</button>
							Or <a href="{$_url}sms/sms_sent">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
