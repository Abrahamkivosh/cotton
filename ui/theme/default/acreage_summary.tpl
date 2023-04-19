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
						</div>Acreage Summary Report
						<br>
							Acreage Report:
							
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
									
									<tbody>
										
                                        <tr>
										<td><div class="main-card mb-3 card">
                <div class="no-gutters row">
              
                   <div class="col-md-4">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success"><b style="color:black;font-size:20px;">Total Farmer Acreage</b> {number_format($total_acreage,0)} Acre</div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
          
                </div>
            </div>
			
			</td>
										</tr>

										
									</tbody>
								</table>
                                  <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <b>Acreage By Region</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Region Name</th><th>Acreage</th><tr>

                                </thead>
                                <tbody>
                                {$seeds_delivered_r=0}
                                {$seeds_issued_r=0}
                                {foreach $regions as $ds}
                                <tr>
                                <td>{$ds['name']}</td><td>

                                {$districtz=ORM::for_table('tbl_district')->where('region_id',$ds['id'])->find_many()}
                                {$farm_coun=0}
                                {foreach $districtz as $ad}
                                {$wardz=ORM::for_table('tbl_ward')->where('district_id',$ad['id'])->find_many()}
                                {foreach $wardz as $aw}
                                {$villagez=ORM::for_table('tbl_villages')->where('ward_id',$aw['id'])->find_many()}
                                {foreach $villagez as $az}
                                {$farm_count = ORM::for_table('farmer')->where('village_id',$az['id'])->sum('acre')}
                                {$farm_coun=$farm_count+$farm_coun}
                                {/foreach}
                                {/foreach}
                                {/foreach}
                                {number_format($farm_coun,0)}
                                </td>
                                </tr>
                                {/foreach}

                                </tbody>


                                </table>
 <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <b>Acreage By District</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>District Name</th><th>Acreage</th><tr>

                                </thead>
                                <tbody>
                                {$seeds_delivered_r=0}
                                {$seeds_issued_r=0}
                                {foreach $districts as $ds}
                                <tr>
                                <td>{$ds['name']}</td><td>

                    
                                {$wardz=ORM::for_table('tbl_ward')->where('district_id',$ds['id'])->find_many()}
                                {$farm_coun=0}
                                {foreach $wardz as $aw}
                                {$villagez=ORM::for_table('tbl_villages')->where('ward_id',$aw['id'])->find_many()}
                                {foreach $villagez as $az}
                               {$farm_count = ORM::for_table('farmer')->where('village_id',$az['id'])->sum('acre')}
                                {$farm_coun=$farm_count+$farm_coun}
                                {/foreach}
                                {/foreach}
                               
                                {number_format($farm_coun,0)}
                                </td>
                               
                                </tr>
                                {/foreach}

                                </tbody>


                                </table>
 <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <b>Acreage By Ward</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Ward Name</th><th>Acreage</th><tr>

                                </thead>
                                <tbody>
                                {$seeds_delivered_r=0}
                                {$seeds_issued_r=0}
                                {foreach $wards as $ds}
                                <tr>
                                <td>{$ds['name']}</td><td>

                    
                               
                                {$farm_coun=0}
                               
                                {$villagez=ORM::for_table('tbl_villages')->where('ward_id',$ds['id'])->find_many()}
                                {foreach $villagez as $az}
                                {$farm_count = ORM::for_table('farmer')->where('village_id',$az['id'])->sum('acre')}
                                {$farm_coun=$farm_count+$farm_coun}
                                {/foreach}
                                
                               
                                {number_format($farm_coun,0)}
                                </td>
                                
                                </tr>
                                {/foreach}

                                </tbody>


                                </table>                               
 <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <b>Acreage By Village</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Village Name</th><th>Acreage</th><tr>

                                </thead>
                                <tbody>
                                {foreach $villages as $ds}
                                <tr>
                                <td>{$ds['village_name']}</td><td>
                                {$farm_count = ORM::for_table('farmer')->where('village_id',$ds['id'])->sum('acre')}
                              
                                {number_format($farm_count,0)}
                                </td>
                                
                                </tr>
                                {/foreach}

                                </tbody>


                                </table>
                  <div class="main-card mb-3 card">
                    <div class="no-gutters row">
              
                    <div class="col-md-12">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                              
                                <div class="widget-content-left">
                                    <div class="widget-heading">Acreage Per Sub Village</div>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>
                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Sub Village Name</th><th>Acreage</th><tr>

                                </thead>
                                <tbody>
                                {foreach $sub_villages as $ds}
                                <tr>
                                <td>{$ds['name']}</td><td>
                                {$farm_count = ORM::for_table('farmer')->where('sub_village_id',$ds['id'])->sum('acre')}
                               
                                {number_format($farm_count,0)}
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
<script>
    window.onload(function() {
        // initiate layout and plugins

            window.print();
            //return false;

    });
</script>
