{include file="sections/header.tpl"}

<div class="row">
	<div class="col-sm-8 col-md-8">
		<div class="panel panel-hovered mb20 panel-default">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
							</i>
						</div>Add Role Rights</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}settings/roles-post" >
					<div class="form-group">
					<label class="col-md-2 control-label">Access Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					</div>
					<br><br>
					{$i=0}
						<table class="mb-0 table table-hover">
										<thead>
											<tr>
												<th>Right Name</th>
												<th>Check</th>
                                                <th>Description</th>
											</tr>
										</thead>
										<tbody>
					{foreach $d as $r}
                     <tr>
					 <td>{$r['name']}</td>
					 <td><input type="checkbox" name="rights[]" value="{$r['id']}" ></td>
					 <td>{$r['description']}</td>
					 <tr>	
                    </div>
                    {/foreach}
                                      </body>
                                          </table>


					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}settings/roles">{$_L['Cancel']}</a>
						</div>
					</div>

                </form>
						</div>
				</div>
			</div>
		</div>
</div>

{include file="sections/footer.tpl"}
