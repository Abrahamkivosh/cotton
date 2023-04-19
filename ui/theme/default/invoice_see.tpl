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
						</div>Invoices</div></div>
			</div>


				{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

				<div class="row">
					<div class="col-md-8">
											<form id="site-search" method="post" action="{$_url}prepaid/invoice/">
											<div class="input-group">


														<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
												<input type="text" name="invoice_no" class="form-control" placeholder="{$_L['Search_by_Name']}...">
												<div class="input-group-btn">
													<button class="btn btn-success">{$_L['Search']}</button>
												</div>
											</div>
												</div>
											</form>
										</div>
										&nbsp;
									</div>


				<div class="col-lg-12">
					<div class="main-card mb-3 card">
						<div class="card-body">

							<table class="mb-0 table table-hover">
							<thead>
								<tr>
									<th>Date</th>
									<th>Invoice No.</th>
                                                                        <th>Customer</th>
									<th>Description</th>
									<th>Amount</th>

									<th>Action</th>
									
								</tr>
							</thead>
							<tbody>
							{foreach $d as $ds}
								<tr>
									<td>{$ds['created_at']}</td>
									<td><a href="{$_url}prepaid/preview/{$ds['id']}">INV-{$ds['id']}</a></td>
									<td>{$v=ORM::for_table('tbl_customers')->where('id',$ds['customer_id'])->find_one()}
									{$v['fullname']}</td>
                                                                        <td>{$ds['planname']}</td>
                                                                        <td>{$ds['amount']} </td>

									<td><a href="{$_url}prepaid/sendnot/{$ds['id']}" class="btn btn-primary" ><i class="ion-android-send"></i>Email & SMS</a>
										<a href="{$_url}prepaid/gen_pdf/{$ds['id']}" class="btn btn-primary" ><i class="fa fa-file-pdf"></i>Generate PDF</a></td>
									
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
