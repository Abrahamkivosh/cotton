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
						</div>Router Uptime</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="row">
						<div class="col-md-8">


						<form id="site-search" method="post" action="{$_url}site/uptime/">
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
												<th>#</th>
												<th>Name</th>
												<th>Date</th>
												<th>Uptime</th>
												
                                                                                                
                                                                                                
											</tr>
										</thead>
										<tbody>
										
                                                                               
                                                                                 
										{for $i=0 ;$i<$n ;$i++}
                                                                                    
											<tr>
												<td align="center">{$i+1}</td>
												<td>{$pc['name'][$i]}</td>
                                                                                                <td>{$pc['datetime'][$i]}</td>
												<td>{$color=number_format((($pc['up'][$i]-$pc['down'][$i])/$pc['up'][$i])*100,2) }
                                                                                                {if $color==100}
                                                                                                    <div style="background-color: greenyellow; width:{$color}%;   ">{number_format((($pc['up'][$i]-$pc['down'][$i])/$pc['up'][$i])*100,2) }%</div>
                                                                                                    {/if}
                                                                                                    {if $color>=90 and $color<100}
                                                                                                    <div style="background-color: #00b0f6; width:{$color}%;  ">{number_format((($pc['up'][$i]-$pc['down'][$i])/$pc['up'][$i])*100,2) }%</div>
                                                                                                    {/if}
                                                                                                      {if $color<90}
                                                                                                    <div style="background-color: red; width:{$color}%;  ">{number_format((($pc['up'][$i]-$pc['down'][$i])/$pc['up'][$i])*100,2) }%</div>
                                                                                                    {/if}
                                                                                                </td>
                                                                                                
                                                                                               
                                                                                              
												
											</tr>
										{/for}
                                                                               
										</tbody>
									</table>
									{$paginator['contents']}
								</div>
							</div>
						</div>
					</div>
		</div>
	</div>
</div>

{include file="sections/footer.tpl"}
