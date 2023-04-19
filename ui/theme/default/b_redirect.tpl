{include file="sections/header.tpl"}

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default panel-hovered panel-stacked mb30">
            <div class="panel-heading">Select Router For Redirect server</div>
            	{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">

                <form class="form-horizontal" method="post" role="form" action="{$_url}services/redirect-add" >

                    <div class="form-group">
                        <label class="col-md-2 control-label">{$_L['Routers']}</label>
                        <div class="col-md-6">
                            <select id="personSelect" id="routers" name="router" class="form-control">
                                {foreach $r as $rs}
                                    <option value="{$rs['name']}">{$rs['name']}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Proceed</button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}
