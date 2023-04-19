{include file="sections/header.tpl"}

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-hovered mb20 panel-default">
								<div class="panel-heading">AP Online</div>
									{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
									<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
										<div class="col-md-8">
										
											<form id="site-search" method="post" action="{$_url}site/ap_online/">
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
												<th>Interface</th>
												<th>Identity</th>
												<th>Address</th>
												<th>Mac Address</th>
                                                                                                <th>Version</th>
                                                                                                
                                                                                                
											</tr>
										</thead>
										<tbody>
										
                                                                                {$num =count($ARRAY)}
                                                                                {$num2 =count($ARRAY2)}
                                                                                {$num3 =count($ARRAY3)}
										{for $i=0; $i<$num; $i++}
                                                                                     {$no=$i+1}
                                                                                     
											<tr>
												<td align="center">{$no}</td>
												<td>{$ARRAY[$i]['interface']}</td>
                                                                                                <td>{$ARRAY[$i]['identity']}</td>
												<td>{$ARRAY[$i]['address']}</td>
                                                                                                <td>{$ARRAY[$i]['mac-address']}</td>
                                                                                                <td>{$ARRAY[$i]['version']}</td>
                                                                                                
												
											</tr>
										{/for}
										</tbody>
									</table>
									
								</div>
							</div>
						</div>
					</div>

{include file="sections/footer.tpl"}
