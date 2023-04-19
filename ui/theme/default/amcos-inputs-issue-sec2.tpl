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
						</div>Issue Input to Farmer</div></div>
			</div>


	{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
					
					<div class="col-md-8">
					   <h1>Issue Inputs to {$farmer->firstname} {$farmer->lastname}</h1><br>
											<form id="site-search" method="post" action="{$_url}input_amcos/issue_input_order/">
											<input type="hidden" name="farmer_id" value="{$farmer_id}">
											<input type="hidden" name="ref_id" value="{$ref_id}">

												<div class="form-group">
										     	<select id="personSelect" name="input_id" class="form-control" required>
													{foreach $inputs as $ac}

													<option value="{$ac['input_id']}">{$inu=ORM::for_table('inputs')->find_one($ac['input_id'])}
		                                         {$inu->name}--Available QTY: {$ac['input_qty']-$ac['used_qty']}</option>
													{{/foreach}}					
												</select>
												<input type="number" name="input_qty" value="20" placeholder="QTY" class="form-control" required> 
												<div class="form-group-btn">
													<button class="btn btn-success">Confim</button>
												</div>
											    </div>
											
											</form>



					</div>

									

							<div class="col-lg-8">
							<div class="main-card mb-3 card">
								<div class="card-body">
                                
									<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Input Name</th>
												<th>qty</th>
												<th>Unit</th>
												<th>{$_L['Manage']}</th>
											</tr>
										</thead>
										<tbody>
										{$check=0}
										{foreach $input_order as $ds}
											<tr>
												<td>{$inu=ORM::for_table('inputs')->find_one($ds['input_id'])}
												    {$inu->name}
												</td>
												<td>{$inu->unit}</td>
												<td>{$ds['input_qty']}
												{$check=$ds['input_qty']+$check}
												</td>
												<td>
												{if $rights['user_delete']}
													{if ($_admin['username']) neq ($ds['username'])}
														<a  href="{$_url}input_amcos/issue_input_delete/{$farmer_id}/{$ref_id}/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
													{/if}
												{/if}
												</td>
											</tr>
										{/foreach}
										</tbody>
									</table>
								</div>
									{$paginator['contents']}
									{if $check>0}
									<a href="{$_url}input_amcos/issue_input_order_post/{$farmer_id}/{$ref_id}/{$ds['id']}"  class="btn btn-success">Confirm Issued Input</a>
							        {/if}
							</div>
							</div>

								<div class="col-lg-8">
							<div class="main-card mb-3 card">
								<div class="card-body">
                                <h1>Previously Issued Inputs </h1>
									<table class="mb-0 table table-hover">
										<thead>
											<tr>
											    <th>Ref ID</th>
												<th>Input Name</th>
												<th>qty</th>
												<th>Unit</th>
												<th>Issued By?</th>
												<th>Date & Time</th>
											</tr>
										</thead>
										<tbody>
										{foreach $input_issued as $dsk}
											<tr>
											    <td>{$dsk['ref_id']}</td>
												<td>{$inu=ORM::for_table('inputs')->find_one($dsk['input_id'])}
												    {$inu->name}
												</td>
												<td>{$dsk['input_qty']}</td>
												<td>{$inu->unit}</td>
												<td>{$amcos_u=ORM::for_table('amcos_users')->find_one($dsk['user_id'])}
		                                         {$amcos_u->fullname}</td>
                                               
												 <td>{$dsk['created_at']}</td>
											</tr>
										{/foreach}
										</tbody>
									</table>
								</div>
									{$paginator['contents']}
								
							</div>
							</div>
						</div>
					</div>
						</div>
					</div>


{include file="sections/footer.tpl"}
