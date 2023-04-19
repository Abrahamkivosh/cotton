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
						</div>Ticket Support Template Edit</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}ticket/template-edit-post" > 
				<input type="hidden" name="id" value="{$d['id']}">				
                    <div class="form-group">
						<label class="col-md-2 control-label">Purpose</label>
						<div class="col-md-6">
                                                    <select id="personSelect" class="form-control" name="purpose">
                                                        <option>{$d['purpose']}</option>
														<option>pending</option>
														<option>assigned</option>
														<option>customer reply</option>
														<option>closed</option>
                                                    </select>
							
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Message</label>
						<div class="col-md-6">
                        <textarea class="textarea-wysihtml5 form-control"  name="message" >{$d['message']}</textarea>
						</div>
                    </div>	
                

                    
					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}sms/template">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
