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
						</div>Edit Order</div></div>
			</div>

	<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}order/order-edit-post" >            
                   	<input type="hidden" name="id" value="{$d['id']}">	
				   <div class="form-group">
								<label class="col-md-2 control-label">Ginner Name</label>
								<div class="col-md-6">
									<select id="plan" name="ginner_id" class="form-control" required>
										<option value="{$d['ginner_id']}"></option>
										{foreach $ginner as $cs}
											<option value="{$cs['id']}">{$cs['fullname']}-{$cs['phonenumber']}</option>
										{/foreach}
									</select>

								</div>
					</div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Cotton Quantity</label>
						<div class="col-md-6">
							<input type="number" class="form-control"  name="qty" value="{$d['qty']}" required>
						</div>
                    </div>
					 <div class="form-group">
						<label class="col-md-2 control-label">Price per qty</label>
						<div class="col-md-6">
							<input type="number" class="form-control" min="{$min}"  name="price" value="{$d['price']}"  required>
						</div>
                    </div>
                  
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}order/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
