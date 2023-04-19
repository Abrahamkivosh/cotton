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
						</div>Manage Support Ticket</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
				{$notify}
				{/if}
				<div class="card-body">
                <h1>Ticket Details</h1>
				 Assigned To: 	{$user=ORM::for_table('tbl_users')->find_one($ticket->user_id)}
								{$user->fullname}
								 <br>
				 Client Name: {$client=ORM::for_table('tbl_customers')->find_one($ticket->client_id)}
							  {$client->fullname}	
							  <br>
				 Created Date: {$ticket->date}
				  <br>
				 Status:                 {if $ticket->status=="pending"}
										<label class="badge badge-danger">Pending</label>
										{else if $ticket->status=="assigned"}
										<label class="badge badge-warning">Assigned</label>
										{else if $ticket->status=="customer reply"}	
										<label class="badge badge-success">Customer reply</label>
										{else if $ticket->status=="closed"}
										<label class="badge badge-success">Closed</label>
									 	{/if}	
				 <br>
			    Subject: {$ticket->subject}	
				<br>
				Message: {$ticket->message}		
				</div>
				</div>
			</div>
			<div class="main-card mb-3 card">
			
				<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}ticket/change_status" >            
                   <input type="hidden" name="id" value="{$ticket->id}">
				    <div class="form-group">
						<label class="col-md-2 control-label">Assign to:</label>
						<div class="col-md-6">
							<select id="personSelect"  name="user_id" class="form-control"s tyle="width: 100%" data-placeholder="Select Client...">
						           	<option value="{$ticket->user_id}">Assigned User</option>          
										{foreach $userd as $users}
											<option value="{$users['id']}">{$users['fullname']}--{$users['username']}</option>
										{/foreach}
						</select>
						</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Status</label>
						<div class="col-md-6">
                                                    <select id="personSelect" class="form-control" name="status">
                                                        <option>{$ticket->status}</option>
														<option>pending</option>
														<option>assigned</option>
														<option>customer reply</option>
														<option>closed</option>
                                                    </select>
							
						</div>
                    </div>
                   
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
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
