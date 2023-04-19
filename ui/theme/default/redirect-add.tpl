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
						</div>Add Server</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}services/redirect-add-post" >
							<div class="form-group">
								<label class="col-md-2 control-label">Server Name</label>
								<div class="col-md-6">
                                                                    <input type="text" class="form-control"  name="server_name" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-2 control-label">Address</label>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="14.14.14.1" name="address">
								</div>
							</div>
                                                        <div class="form-group">
								<label class="col-md-2 control-label">Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control"  name="name">
								</div>
							</div>
							
                                                        <div class="form-group">
								<label class="col-md-2 control-label">Interface</label>
								<div class="col-md-6">
									<select id="personSelect"  name="interface" class="form-control" required>
										<option value=''>Select Interface</option>
										 {$num =count($ARRAY)}
										{for $i=0; $i<$num; $i++}
       
											<option value="{$ARRAY[$i]['name']}">{$ARRAY[$i]['name']}</option>
										{/for}
                                            
									</select>
								</div>
							</div>
								<div class="form-group">
								<label class="col-md-2 control-label">Router</label>
								<div class="col-md-6">
									<select id="personSelect" name="routers" class="form-control">

										<option value="{$r}">{$r}</option>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">{$_L['Pool']}</label>
								<div class="col-md-6">
									<select id="personSelect" name="pool" class="form-control">
										<option value=''>{$_L['Select_Pool']}</option>
                                                                                {foreach $p as $rs}
											<option value="{$rs['pool_name']}">{$rs['pool_name']}</option>
										{/foreach}
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
									Or <a href="{$_url}services/redirect">{$_L['Cancel']}</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
