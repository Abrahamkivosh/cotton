{include file="sections/header.tpl"}

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-hovered mb20 panel-default">
								<div class="panel-heading">Users Online</div>
									{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
									<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
										<div class="col-md-8">
										
											<form id="site-search" method="post" action="{$_url}site/users_online/">
											<div class="input-group">
												<div class="input-group-addon">
													<span class="fa fa-search"></span>
												</div>
												<input type="text" name="name" class="form-control" placeholder="{$_L['Search_by_Name']}...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</form>
										</div>
										&nbsp;
									</div>
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th>Account</th>
												<th>Datetime</th>
												<th>Data used(MBS)</th>
												
                                                                                                
                                                                                                
											</tr>
										</thead>
										<tbody>
										{$i = 0}
                                                                               
										{foreach $pc as $as}
                                                                                    
											<tr>
												<td align="center">{$i++}</td>
												<td>{$as['account']}</td>
                                                                                                <td>{$as['datetime']}</td>
												<td>{$as['data']}</td>
                                                                                               
                                                                                              
												
											</tr>
										{/foreach}
                                                                               
										</tbody>
									</table>
									{$paginator['contents']}
								</div>
							</div>
						</div>
					</div>

{include file="sections/footer.tpl"}
