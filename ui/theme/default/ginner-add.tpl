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
						</div>Add Ginner</div></div>
			</div>

	<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}ginner/ginner-add-post" >            
                     <div class="form-group">
						<label class="col-md-2 control-label">Ginner Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Ginner Address</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="address">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Phone number</label>
						<div class="col-md-6">
							<input type="number" value="255" class="form-control" min="100000000"  name="phonenumber" required>
						</div>
                    </div>
                 
					<div class="form-group">
						<label class="col-md-2 control-label">Email</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="email" >
						</div>
                    </div>
                     <div class="form-group">
						<label class="col-md-2 control-label">Location</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="location" >
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Paybill Account</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="paybill" >
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">B2C Paybill callback url</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="paybill_url" >
						</div>
                    </div>
                       <div class="form-group">
						<label class="col-md-2 control-label">Ginner Users</label>
					
                    </div>
				   <table>
				  
				   <tr><td> <div class="form-group">
						<label class="col-md-12 control-label">Fullnames</label>
						<div class="col-md-12">
							<input type="text" class="form-control"  name="fullname[]">
						</div>
                    </div></td>
					
			
					<td><div class="form-group">
						<label class="col-md-12 control-label">Email Address</label>
						<div class="col-md-12">
							<input type="text" class="form-control" placeholder="abc@abc.com"  name="emailv[]">
						</div>
                    </div></td>
					<td><div class="form-group">
						<label class="col-md-12 control-label">phonenumber</label>
						<div class="col-md-12">
							<input type="number" class="form-control"  name="phonenumberv[]">
						</div>
                    </div></td>
					<td><div class="form-group">
						<label class="col-md-12 control-label">Role</label>
						<div class="col-md-12">
                            <select id="plan" name="role[]" class="form-control" required>
										<option>admin</option>
										<option>entrypoint</option>
										<option>manager</option>
						 </select>
							
						</div>
                    </div></td>
					
					<tr>
					
				   </table>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}ginner/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
