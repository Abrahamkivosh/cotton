{include file="sections/header.tpl"}

{if ($_admin['user_type']) eq 'Admin' || ($_admin['user_type']) eq 'Sales'}





	<div class="col-md-12">
		<h1>{$router}</h1>
		<div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>

		</div>
		<div class="chart">
			<div id="container" style="height: 400px;"></div>
		</div>

		<select id="interfacef" name="interface"   class="form-control" >


		</select>

	</div>


{else}

{/if}

{include file="sections/footer.tpl"}
