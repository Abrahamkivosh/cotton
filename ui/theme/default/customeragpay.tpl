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
						</div>Customer Vs payment</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

				<div class="row">
					<div class="col-md-8">
						<form id="site-search" method="post" action="{$_url}prepaid/custagpay/">
							<div class="input-group">
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
								<input type="text" name="username" class="form-control" placeholder="Search by name, username, phone...">
								<div class="input-group-btn">
									<button class="btn btn-success">{$_L['Search']}</button>
								</div>
							</div>

						</form>
					</div>
					<div class="col-md-4">

					</div>&nbsp;
				</div>

				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
					<thead>
					<tr>
						<th>{$_L['Username']}-Fullname-Contact</th>
						<th>Mpesa Transactions</th>
						<th>Recharge Transactions</th>
						<th>Invoice Generated</th>
						<th>Payment status</th>
					</tr>
					</thead>
					<tbody>
					{foreach $d as $ds}
						<tr>
							<td>{$ds['username']}-{$ds['fullname']}-{$ds['phonenumber']}
							</td>
							<td>{$pm = ORM::for_table('pesapi_payment')->where('account', $ds['username'])->order_by_desc('id')->find_many()}
								{if count($pm)>0}
									<table id="datatable" class="table table-striped table-bordered">
									<tr><th>Receipt</th><th>Date</th><th>Amount</th></tr>
									{$i=0}
								{foreach $pm as $mp}
									<tr><td>{$mp['receipt']}</td><td>{$mp['time']}</td><td>{$mp['amount']}</td></tr>

								{/foreach}
									<tr><td colspan="3">{$totalm = ORM::for_table('pesapi_payment')->where('account', $ds['username'])->sum('amount')}
											<b>Total Amount: {$totalm}</b>
										</td></tr>
								</table>
								{/if}
							</td>
							<td>{$pt = ORM::for_table('tbl_transactions')->where('username', $ds['username'])->order_by_desc('id')->find_many()}
								{$totalt=0}
								{if count($pt)>0}
									<table id="datatable" class="table table-striped table-bordered">
										<tr><th>Rech-No</th><th>Date</th><th>Amount</th></tr>
										{$i=0}
										{foreach $pt as $tp}
											<tr><td>{$tp['invoice']}</td><td>{$tp['recharged_on']}</td><td>{$tp['price']}</td></tr>

										{/foreach}
										<tr><td colspan="3">{$totalt = ORM::for_table('tbl_transactions')->where('username', $ds['username'])->sum('price')}
												<b>Total Amount: {$totalt}</b>
											</td></tr>
									</table>
								{/if}
							</td>
							<td>{$pi = ORM::for_table('tbl_invoices')->where('customer_id', $ds['id'])->order_by_desc('id')->find_many()}
								{$totali=0}
								{if count($pi)>0}
									<table id="datatable" class="table table-striped table-bordered">
										<tr><th>Invoice-ID</th><th>Date</th><th>Amount</th></tr>
										{$i=0}
										{foreach $pi as $ip}
											<tr><td><a href="{$_url}prepaid/preview/{$ip['id']}">INV-{$ip['id']}</a></td><td>{$ip['created_at']}</td><td>{$ip['amount']}</td></tr>

										{/foreach}
										<tr><td colspan="3">{$totali = ORM::for_table('tbl_invoices')->where('customer_id', $ds['id'])->sum('amount')}
												<b>Total Amount: {$totali}</b>
											</td></tr>
									</table>
								{/if}
							</td>
							<td>
								{if $totali<$totalt}
									<label class="btn-tag btn-tag-success">Paid</label>
									{else}
									<label class="btn-tag btn-tag-danger">Not Paid</label>
								{/if}
							</td>

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
</div>


{include file="sections/footer.tpl"}
