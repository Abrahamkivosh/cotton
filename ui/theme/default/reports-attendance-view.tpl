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
						</div>Agent Attendance Report
						<br>
							  Agent Attendance Report:
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
										
                                <th class="text-center">Agent name</th>
                                <th class="text-center">Time in</th>
                                <th class="text-center">Idle time </th>
                                 <th class="text-center">Working hours</th>
                                <th class="text-center">Directory search count</th>
								 <th class="text-center">Date</th>
										</tr>
									</thead>
									<tbody>
										{foreach $d as $ds}
                                        <tr>
											                                  <td class="text-center">
                                {$pc = ORM::for_table('agents')->find_one($ds['agent_id'])}
                                {$pc->fullname}-
                                {$pc->phonenumber}
                                </td>
                                <td class="text-center">{$ds['time_in']}</td>
                                <td class="text-center">{round($ds['idle_time']/60,2)}</td>
                                <td class="text-center">{round($ds['hours']/60,2)}</td>
                                <td class="text-center"> {$list_c = ORM::for_table('listing_annalysis')->where('agent_id',$ds['agent_id'])->where('date',$ds['date'])->sum('views')}
                                {$list_c}
                                </td>
								<td>{$ds['date']}</td>

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
