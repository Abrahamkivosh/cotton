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
						</div>Edit Amcos User</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}amcos/amcos-edit-post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="{$d['id']}">
                    
					<div class="form-group">
						<label class="col-md-2 control-label">Village Name</label>
						<div class="col-md-6">
							<select id="plan" name="village_id" class="form-control">
								<option value="{$d['village_id']}">

									{{$b = ORM::for_table('tbl_villages')->find_one($d['village_id'])}}
									{$b->village_name}</option>
								{foreach $village as $cs}
									<option value="{$cs['id']}">{$cs['village_name']}</option>
								{/foreach}
							</select>

						</div>
					</div>
					  <div class="form-group">
						<label class="col-md-2 control-label">Amcos Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="fullname" name="name" value="{$d['name']}">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Physical Address</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="address" name="address" value="{$d['address']}">
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Phone number</label>
						<div class="col-md-6">
							<input type="number"  class="form-control" min="100000000"  name="phonenumber" value="{$d['phonenumber']}" required>
						</div>
                    </div>
                     <div class="form-group">
						<label class="col-md-2 control-label">Amcos Users</label>
					
                    </div>
				   <table>
				  {foreach $amcos_user as $ke}
				  <input type="hidden" class="form-control" value="{$ke['id']}" name="idv[]">
				   <tr><td> <div class="form-group">
						<label class="col-md-12 control-label">Fullnames</label>
						<div class="col-md-12">
							<input type="text" class="form-control" value="{$ke['fullname']}" name="fullname[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Username</label>
						<div class="col-md-12">
							<input type="text" class="form-control" value="{$ke['username']}"  name="username[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">phonenumber</label>
						<div class="col-md-12">
							<input type="number" class="form-control" value="{$ke['phonenumber']}" name="phonenumberv[]">
						</div>
                    </div></td><td><div class="form-group">
						<label class="col-md-12 control-label">Password</label>
						<div class="col-md-12">
							<input type="text" class="form-control" value="{$ke['password']}" name="password[]">
						</div>
                    </div></td><tr>
				 {/foreach}  
				   </table>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}amcos/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
