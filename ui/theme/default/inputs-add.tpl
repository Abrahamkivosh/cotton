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
						</div>Add Input</div></div>
			</div>

	<div class="main-card mb-3 card">
				{if isset($notify)}
	{$notify}
	{/if}
	<div class="card-body">
                <form class="form-horizontal" method="post" role="form" action="{$_url}input/inputs-add-post" >            
                    <div class="form-group">
						<label class="col-md-2 control-label">Input Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control"  name="name">
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label">Category</label>
						<div class="col-md-6">
						<select name="category" class="form-control" required>
										<option>Seeds</option>
										<option>Fertilizer</option>	
										<option>Pesticides</option>	
					    </select>
						</div>
                    </div>
					  <div class="form-group">
						<label class="col-md-2 control-label">Unit</label>
						<div class="col-md-6">
						<select name="unit" class="form-control" required>
										<option>pcs</option>
										<option>litres</option>
										<option>grams</option>
										<option>kgs</option>
										<option>bags</option>			
					    </select>
						</div>
                    </div>
					 <div class="form-group">
						<label class="col-md-2 control-label">QTY per Acre</label>
						<div class="col-md-6">
							<input type="number" class="form-control"  name="rate_per_acre" required>
						</div>
                    </div>

					
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary waves-effect waves-light" type="submit">{$_L['Save']}</button>
							Or <a href="{$_url}input/list">{$_L['Cancel']}</a>
						</div>
					</div>
                </form>
				
					</div>
				</div>
			</div>
		</div>
</div>
{include file="sections/footer.tpl"}
