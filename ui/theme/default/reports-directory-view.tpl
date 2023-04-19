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
						</div>Directory Listing Annalysis Report
						<br>
							  Directory Listing Annalysis Report:
							[ {$fdate} - {$tdate}]
						</div>
					</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
				<br>
							<div class="col-lg-12">
								<div class="main-card mb-3 card">
									<div class="card-body">

										<table class="mb-0 table table-hover">
									<thead>
										<tr>
										
                                <th class="text-center">Directory Name</th>
                                <th class="text-center">Search count</th>
                                <th class="text-center">Date</th>
                                 <th class="text-center">Sub Category</th>
                               
										</tr>
									</thead>
									<tbody>
										{foreach $d as $ds}
                                        <tr>
											                                  <td class="text-center">
                                {$pc = ORM::for_table('listings')->find_one($ds['listing_id'])}
                                {$pc->name}-
                                
                                </td>
                                <td class="text-center">{$ds['views']}</td>
								 <td class="text-center">{$ds['date']}</td>
								
                                <td class="text-center"> {$list_c = ORM::for_table('sub_category')->find_one($pc->sub_category_id)}
                                {$list_c->name}
                                </td>
								
                                        </tr>
										{/foreach}
									</tbody>
								</table>

							</div>
						</div>
					</div>
						</div>
					</div>
				</div>
			</div>




{include file="sections/footer.tpl"}
