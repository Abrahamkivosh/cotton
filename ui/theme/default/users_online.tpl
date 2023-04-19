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
						</div>Users Online</div>
				</div></div>
		</div>


			{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
			<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
				<div class="row">
					<div class="col-md-2">
											<form id="site-search" method="post" action="{$_url}site/user_online">
											<div class="col-md-12">
                            <select  id="plan" name="type" class="form-control">
							           <option value="all">Select Connection Type(ALL)</option>
			
									   <option>Hotspot</option>
									   <option>IP</option>
									   <option>PPPOE</option>
                              
                            </select>
							<br>
                        </div>
											  <div class="col-md-12">
                            <select onchange="this.form.submit()" id="personSelect" id="routers" name="router" class="form-control">
							           <option>Select Router</option>
                                {foreach $r as $rs}
                                    <option value="{$rs['name']}">{$rs['name']}</option>
                                {/foreach}
                            </select>
                        </div>
											</form>
										</div>
										
					<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}site/user_online">
											<div class="input-group">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="name" class="form-control" placeholder="{$_L['Search_by_Name']}...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
											</div>
											</form>
										</div>
										&nbsp;
									</div>
			</div>
			<div class="col-lg-12">
				<div class="main-card mb-3 card">
					<div class="card-body">

						<table class="mb-0 table table-hover">
										<thead>
											<tr>
												
												<th>Name</th>
												<th>Service</th>
												<th>Address</th>
												<th>Uptime</th>
												<th>Downloaded Data</th>
												<th>Uploaded Data</th>
                                                                                                
                                                       
											</tr>
										</thead>
										<tbody>
                                                                                    
                                                                                
										{foreach $d as $che}
                                            {$no=$i+1}
                                      
											<tr>
												
												<td>{$che['name']}</td>
												<td>{$che['service']}</td>
												<td>{$che['address']}</td>
												<td>{$che['uptime']}</td>
												<td style="color:blue;">{$che['download']} MBs</td>
												<td  style="color:brown;">{$che['upload']} MBs</td>
											</tr>
                                        {/foreach}                                                     
                                                                                
                                                                                
										</tbody>
									</table>
									{$paginator['contents']}
									
								</div>
							</div>
						</div>
					</div>
	</div>
</div>


{include file="sections/footer.tpl"}
