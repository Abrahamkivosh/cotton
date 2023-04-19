{include file="sections/header.tpl"}


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>{$_L['Manage_Accounts']}</div></div>
			</div>


			{if isset($notify)}
				{$notify}
			{/if}
			<div class="panel-body">
			
                <form class="form-horizontal" method="POST" role="form" action="{$_url}sms/sms_send_post_s" >
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Send</button>
							Or <a href="{$_url}sms/sms_sent">{$_L['Cancel']}</a>
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
                                                     <select id="personSelect"  name="message" class="form-control" style="width: 100%" data-placeholder="Select SMS template...">
                                                         <option value="">Kindly select Template</option>
										{foreach $t as $ct}
											<option value="{$ct['message']}">{$ct['message']}</option>
										{/foreach}
						</select>
						</div>
                    </div>
					<div class="col-lg-8">
						<div class="main-card mb-3 card">
							<div class="card-body">

								<table class="mb-0 table table-hover">
						<thead>
						<tr>
							<th>
								Select
							</th>
							<th>Account  </th>
							<th>{$_L['Full_Name']}</th>
							<th>{$_L['Phone_Number']}</th>

						</tr>
						</thead>
						{foreach $d as $ds}
<tr>
							<td>
								<input type="checkbox" name="id[]" value="{$ds['id']}" class="">
							</td>
							<td>{$ds['username']}</td>
							<td>{$ds['fullname']}</td>
							<td>{$ds['phonenumber']}</td>
</tr>
							{/foreach}

					</table>
							</div>
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

{include file="sections/footer.tpl"}
