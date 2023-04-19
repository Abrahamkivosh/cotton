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
						</div>General Summary Report
						 <br>
							Summary Report:
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

                                 <h1>General Summary Report</h1>

         <table class="mb-0 table table-hover">
                                <thead>
                                 <tr><th>Date</th><th>{date("Y-m-d")}</th><th>Region</th><th>District</th><th>Wards</th><th>Villages</th><th>Sub-Villages</th><th>Total B/F</th><th>Todays</th><th>Total C/F</th><tr>
                                 <tr><th></th><th></th><th>{$total_region}</th><th>{$total_district}</th><th>{$total_ward}</th><th>{$total_villages}</th><th>{$total_sub_villages}</th><th></th><th></th><th></th><tr>
                                </thead>
                                <tbody> 
                                <tr><td>Farmers</td><td></td><td></td><td></td><td></td><td></td><td></td><td>{number_format($total_farmers_b_today,0)}</td><td>{number_format($total_farmers-$total_farmers_b_today,0)}</td><td>{number_format($total_farmers,0)}</td></tr>
                                <tr><td>Acreage</td><td></td><td></td><td></td><td></td><td></td><td></td><td>{number_format($total_acreage_b_today,0)}</td><td>{number_format($total_acreage-$total_acreage_b_today,0)}</td><td>{$total_acreage}</td></tr>
                                <tr><td>Inputs</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                {foreach $inputs as $in}
                                <tr><td></td><td>{$in['name']}</td><td></td><td></td><td></td><td></td><td></td><td>
                                {$input_t = ORM::for_table('input_order')->where('input_id',$in['id'])->sum('used_qty')}
                                {$input_tod = ORM::for_table('amcos_input_order')->where('input_id',$in['id'])->where('date',date('Y-m-d'))->sum('input_qty')}
                             
                                {number_format($input_t-$input_tod,0)} {$in['unit']}
                                </td><td>
                                {number_format($input_tod,0)} {$in['unit']}
                                </td><td> 
                                {number_format($input_t,0)} {$in['unit']}
                               </td></tr>
                                {/foreach}

                              
                                </tbody>
         </table>
<table class="mb-0 table table-hover" style="width:50%;">
<thead>
<tr><th>Date</th><th>{date("Y-m-d")}</th><th colspan="3">Cummulative</th></tr>
<tr><th>Inputs</th><th>Unit</th><th>To Amcos</th><th>To Farmers</th><th>Stock with Amcos</th></tr>
</thead>
<tbody>
{foreach $inputs as $in}
<tr><td>{$in['name']}</td><td>{$in['unit']}</td><td>
 {$input_qty = ORM::for_table('input_order')->where('input_id',$in['id'])->sum('input_qty')}

 {$input_used = ORM::for_table('input_order')->where('input_id',$in['id'])->sum('used_qty')}
 {number_format($input_qty,0)}
</td><td>{number_format($input_used,0)}</td><td>{number_format($input_qty-$input_used,0)}</td></tr>
{/foreach}
</tbody>
</thead>

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
