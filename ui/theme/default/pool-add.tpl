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
								</div>
					{$_L['Add_Pool']}	</div></div>
					</div>

					<div class="main-card mb-3 card">
						{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}pool/add-post" >            
                    <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Pool_Name']}</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="name" name="name">
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Range_IP']}</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="ex: 192.168.88.2-192.168.88.254">
						</div>
                    </div>	
                    <div class="form-group">
						<label class="col-md-2 control-label">{$_L['Routers']}</label>
						<div class="col-md-6">
							<select id="personSelect" id="routers" name="routers" class="form-control">
                                {foreach $r as $rs}
									<option value="{$rs['name']}">{$rs['name']}</option>
                                {/foreach}
                            </select>
						</div>
                    </div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}pool/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>

				</div>
			</div>
		</div>
		</div>

{include file="sections/footer.tpl"}
