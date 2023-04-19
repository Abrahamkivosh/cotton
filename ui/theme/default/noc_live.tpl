{include file="sections/header.tpl"}




    <div class="col-md-12">
        <h1>{$router}</h1>
        <div class="box-header with-border">
            <i class="fa fa-bar-chart-o"></i>
            <h3 class="box-title">{$interface[$i]}</h3>
        </div>
        <div class="chart">
            <div id="container" style="height: 400px;"></div>
        </div>

        <select  name="interface"  id="interface" class="form-control" >

            {$num =count($interface)}
            {for $i=0; $i<$num; $i++}

                <option value="{$url}/index.php?_route=noc/show_live/{$router}/{$interface[$i]}">{preg_replace("/[^a-zA-Z0-9]/", "", $interface[$i])}</option>

            {/for}

        </select>

    </div>


{include file="sections/footer.tpl"}
