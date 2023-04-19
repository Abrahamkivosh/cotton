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
						</div>Farmers Summary Report
						<br>

							Farmer Report:
							
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
              
                    <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                               
                                    <div class="widget-numbers text-success"> <b style="color:black;font-size:20px;">Total Farmers</b> {number_format($total_farmers,0)}</div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                           <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-success"><b style="color:black;font-size:20px;"> Male Farmers</b> {number_format($male_farmers,0)}</div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
            
                       <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess"><b style="color:black;font-size:20px;"> Female Farmers</b> {number_format($female_farmers,0)}</div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="widget-content">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right ml-0 mr-3">
                                    <div class="widget-numbers text-sucess"><b style="color:black;font-size:20px;"> Verified Farmers</b> {number_format($verified_farmers,0)}</div>
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
                                    <b>Farmer By Region</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Region Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

                                </thead>
                                <tbody>
                                {$seeds_delivered_r=0}
                                {$seeds_issued_r=0}
                                {foreach $regions as $ds}
                                <tr>
                                <td>{$ds['name']}</td><td>

                                {$districtz=ORM::for_table('tbl_district')->where('region_id',$ds['id'])->find_many()}
                                 {$allc=0}
                                {$malec=0}
                                {$femalec=0}
                                {$verifiedc=0}
                                {$unverifiedc=0}
                                {foreach $districtz as $ad}
                                {$wardz=ORM::for_table('tbl_ward')->where('district_id',$ad['id'])->find_many()}
                                {foreach $wardz as $aw}
                                {$villagez=ORM::for_table('tbl_villages')->where('ward_id',$aw['id'])->find_many()}
                                {foreach $villagez as $az}
                                 {$all = ORM::for_table('farmer')->where('village_id',$az['id'])->count()}
                                {$male = ORM::for_table('farmer')->where('gender',"male")->where('village_id',$az['id'])->count()}
                                {$female = ORM::for_table('farmer')->where('gender',"female")->where('village_id',$az['id'])->count()}
                                {$verified = ORM::for_table('farmer')->where('status',"on")->where('village_id',$az['id'])->count()}
                                {$unverified = ORM::for_table('farmer')->where('status',"off")->where('village_id',$az['id'])->count()}
                                {$allc=$all+$allc}
                                {$malec=$male+$malec}
                                {$femalec=$female+$femalec}
                                {$verifiedc=$verified+$verifiedc}
                                {$unverifiedc=$unverified+$unverifiedc}
                                {/foreach}
                                {/foreach}
                                {/foreach}

                                {number_format($allc,0)}
                                </td>
                                <td>
                                 {number_format($malec,0)}
                                </td>
                                <td>
                                 {number_format($femalec,0)}
                                </td>
                                <td>
                                 {number_format($verifiedc,0)}
                                </td>
                                <td>
                                 {number_format($unverifiedc,0)}
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
                                    <b>Farmer By District</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>District Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

                                </thead>
                                <tbody>
                                {$seeds_delivered_r=0}
                                {$seeds_issued_r=0}
                                {foreach $districts as $ds}
                                <tr>
                                <td>{$ds['name']}</td><td>

                     
                                {$wardz=ORM::for_table('tbl_ward')->where('district_id',$ds['id'])->find_many()}
                                 {$allc=0}
                                {$malec=0}
                                {$femalec=0}
                                {$verifiedc=0}
                                {$unverifiedc=0}
                                {foreach $wardz as $aw}
                                {$villagez=ORM::for_table('tbl_villages')->where('ward_id',$aw['id'])->find_many()}
                                {foreach $villagez as $az}
                                {$all = ORM::for_table('farmer')->where('village_id',$az['id'])->count()}
                                {$male = ORM::for_table('farmer')->where('gender',"male")->where('village_id',$az['id'])->count()}
                                {$female = ORM::for_table('farmer')->where('gender',"female")->where('village_id',$az['id'])->count()}
                                {$verified = ORM::for_table('farmer')->where('status',"on")->where('village_id',$az['id'])->count()}
                                {$unverified = ORM::for_table('farmer')->where('status',"off")->where('village_id',$az['id'])->count()}
                                 {$allc=$all+$allc}
                                {$malec=$male+$malec}
                                {$femalec=$female+$femalec}
                                {$verifiedc=$verified+$verifiedc}
                                {$unverifiedc=$unverified+$unverifiedc}
                                {/foreach}
                                {/foreach}
                               
                                 {number_format($allc,0)}
                                </td>
                                <td>
                                 {number_format($malec,0)}
                                </td>
                                <td>
                                 {number_format($femalec,0)}
                                </td>
                                <td>
                                 {number_format($verifiedc,0)}
                                </td>
                                <td>
                                 {number_format($unverifiedc,0)}
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
                                    <b>Farmer By Ward</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>

                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Ward Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

                                </thead>
                                <tbody>
                                {$seeds_delivered_r=0}
                                {$seeds_issued_r=0}
                                {foreach $wards as $ds}
                                <tr>
                                <td>{$ds['name']}</td><td>


                                {$allc=0}
                                {$malec=0}
                                {$femalec=0}
                                {$verifiedc=0}
                                {$unverifiedc=0}
                               
                                {$villagez=ORM::for_table('tbl_villages')->where('ward_id',$ds['id'])->find_many()}
                                {foreach $villagez as $az}
                                {$all = ORM::for_table('farmer')->where('village_id',$az['id'])->count()}
                                {$male = ORM::for_table('farmer')->where('gender',"male")->where('village_id',$az['id'])->count()}
                                {$female = ORM::for_table('farmer')->where('gender',"female")->where('village_id',$az['id'])->count()}
                                {$verified = ORM::for_table('farmer')->where('status',"on")->where('village_id',$az['id'])->count()}
                                {$unverified = ORM::for_table('farmer')->where('status',"off")->where('village_id',$az['id'])->count()}

                                {$allc=$all+$allc}
                                {$malec=$male+$malec}
                                {$femalec=$female+$femalec}
                                {$verifiedc=$verified+$verifiedc}
                                {$unverifiedc=$unverified+$unverifiedc}
                                {/foreach}
                                
                               
                                {number_format($allc,0)}
                                </td>
                                <td>
                                 {number_format($malec,0)}
                                </td>
                                <td>
                                 {number_format($femalec,0)}
                                </td>
                                <td>
                                 {number_format($verifiedc,0)}
                                </td>
                                <td>
                                 {number_format($unverifiedc,0)}
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
                                    <b>Farmer By Village</b>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>
                 <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Village Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

                                </thead>
                                <tbody>
                                {foreach $villages as $ds}
                                <tr>
                                <td>{$ds['village_name']}</td><td>
                                {$farm_count = ORM::for_table('farmer')->where('village_id',$ds['id'])->count()}
                                {$farm_count}
                                </td><td>
                                {$farm_count = ORM::for_table('farmer')->where('gender',"male")->where('village_id',$ds['id'])->count()}
                                {$farm_count}
                                </td><td>
                                {$farm_count = ORM::for_table('farmer')->where('gender',"female")->where('village_id',$ds['id'])->count()}
                                {$farm_count}
                                </td>
                                <td>
                                {$farm_count = ORM::for_table('farmer')->where('status',"on")->where('village_id',$ds['id'])->count()}
                                {$farm_count}
                                </td>
                                <td>
                                {$farm_count = ORM::for_table('farmer')->where('status',"off")->where('village_id',$ds['id'])->count()}
                                {$farm_count}
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
                                    <div class="widget-heading">Farmer Per Sub Village</div>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                  </div>
                                <table class="mb-0 table table-hover">
                                <thead>

                                 <tr><th>Sub Village Name</th><th>Total Farmers</th><th>Male</th><th>Female</th><th>Verified</th><th>Not Verified</th><tr>

                                </thead>
                                <tbody>
                                {foreach $sub_villages as $ds}
                                <tr>
                                <td>{$ds['name']}</td><td>
                                {$farm_count = ORM::for_table('farmer')->where('sub_village_id',$ds['id'])->count()}
                                {$farm_count}
                                </td><td>
                                {$farm_count = ORM::for_table('farmer')->where('gender',"male")->where('sub_village_id',$ds['id'])->count()}
                                {$farm_count}
                                </td><td>
                                {$farm_count = ORM::for_table('farmer')->where('gender',"female")->where('sub_village_id',$ds['id'])->count()}
                                {$farm_count}
                                </td>
                                <td>
                                {$farm_count = ORM::for_table('farmer')->where('status',"on")->where('sub_village_id',$ds['id'])->count()}
                                {$farm_count}
                                </td>
                                <td>
                                {$farm_count = ORM::for_table('farmer')->where('status',"off")->where('sub_village_id',$ds['id'])->count()}
                                {$farm_count}
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
