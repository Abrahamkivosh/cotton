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
						</div>Receive Order</div></div>
			</div>

			<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}order/receivea-gin"  onSubmit="return confirm('Are you sure to confirm?')" >
				<input type="hidden" name="id" value="{$id}">
                      <div class="form-group">
						<label class="col-md-2 control-label">Weight Bridge Ref. no</label>
						<div class="col-md-6">
							<input type="number" name="empty_weight" class="form-control" value="{$d['empty_weight']}" required>
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Received QTY</label>
							<div class="col-md-3">
							<input type="number" name="received_qty" class="form-control"  value="{$qty}" required>
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
