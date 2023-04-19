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
						</div>Create Support Ticket</div></div>
			</div>

			<div class="main-card mb-3 card">
				<div class="card-body">
						
                <form class="form-horizontal" method="post" role="form" action="{$_url}ticket/create_post" >
					<div class="form-group">
						<label class="col-md-2 control-label">Client</label>
						<div class="col-md-6">
							<select id="personSelect"  name="client_id" class="form-control"style="width: 100%" data-placeholder="Select Client..." required>
								<option value="">Select Client</option>          
										{foreach $c as $cs}
											<option value="{$cs['id']}">{$cs['fullname']}--{$cs['username']}</option>
										{/foreach}
						</select>
						</div>
                    </div>
						<div class="form-group">
						<label class="col-md-2 control-label">Assign to:</label>
						<div class="col-md-6">
							<select id="personSelect"  name="user_id" class="form-control"style="width: 100%" data-placeholder="Select Client...">
							<option value="">Select Technician (Auto)</option>          
										{foreach $user as $users}
											<option value="{$users['id']}">{$users['fullname']}--{$users['username']}</option>
										{/foreach}
						</select>
						</div>
				   		
                        </div>

					 <div class="form-group">
						<label class="col-md-2 control-label">Ticket Subject</label>
						<div class="col-md-6">
                          <input class="form-control"  name="subject" type="text" required>                       
						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label">Ticket Message</label>
						<div class="col-md-6">
                        <textarea name="message" class="form-control" cols="20" rows="5"></textarea>
                                                 
						</div>
                    </div>
                   
                
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Create Ticket</button>
							Or <a href="{$_url}ticket/view">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
