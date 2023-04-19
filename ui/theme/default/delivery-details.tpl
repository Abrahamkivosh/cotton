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
						</div>Delivery Details</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}order/deliverya-gin" >
				<input type="hidden" name="id" value="{$id}">				

                     <div class="form-group">
						<label class="col-md-2 control-label">Driver Name</label>
						<div class="col-md-6">
							<input name="trans_name" class="form-control" value="{$d['trans_name']}" required>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label"> Driver Telephone Number</label>
						<div class="col-md-6">
							<input name="trans_phonenumber" class="form-control" value="{$d['trans_phonenumber']}" required>
						</div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">  Truck Registration</label>
						<div class="col-md-6">
							<input name="trans_truck" class="form-control" value="{$d['trans_truck']}" required>
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">  Trailer Registration</label>
						<div class="col-md-6">
							<input name="trans_trailer" class="form-control" value="{$d['trans_trailer']}" required>
						</div>
                    </div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}order/list-gin">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
	</div>
</div>
{include file="sections/footer.tpl"}
