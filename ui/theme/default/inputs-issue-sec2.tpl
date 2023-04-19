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
						</div>Issue Input </div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
					
					<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}input/issue_input_order/">
											<input type="hidden" name="amcos_id" value="{$amcos_id}">
											<input type="hidden" name="ref_id" value="{$ref_id}">

												<div class="form-group">
										     	<select id="personSelect" name="input_id" class="form-control" required>
													{foreach $input as $ac}
													<option value="{$ac['id']}">{$ac['name']}</option>
													{{/foreach}}					
												</select>
												<input type="number" name="input_qty" placeholder="QTY" class="form-control" required> 
												<div class="form-group-btn">
													<button class="btn btn-success">Confim</button>
												</div>
											    </div>
											
											</form>



					</div>

									

									<div class="col-lg-12">
										<div class="main-card mb-3 card">
											<div class="card-body">

												<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Input Name</th>
												<th>Unit</th>
												<th>qty</th>
												<th>{$_L['Manage']}</th>
											</tr>
										</thead>
										<tbody>
										{foreach $input_order as $ds}
											<tr>
												<td>{$inu=ORM::for_table('inputs')->find_one($ds['input_id'])}
												    {$inu->name}
												</td>
												<td>{$inu->unit}</td>
												<td>{$ds['input_qty']}</td>
												<td>
												{if $rights['user_delete']}
													{if ($_admin['username']) neq ($ds['username'])}
														<a onClick="javascript: return confirm('Please confirm deletion');" href="{$_url}input/issue_input_delete/{$amcos_id}/{$ref_id}/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger btn-sm delete">{$_L['Delete']}</a>
													{/if}
												{/if}
												</td>
											</tr>
										{/foreach}
										</tbody>
									</table>
									</div>
									{$paginator['contents']}
									<a onClick="javascript: return confirm('Please confirm input order');" href="{$_url}input/issue_input_order_post/{$amcos_id}/{$ref_id}/{$ds['id']}"  class="btn btn-success">Confim Issue Input</a>
								</div>
							</div>
						</div>
					</div>
						</div>
					</div>


{include file="sections/footer.tpl"}
