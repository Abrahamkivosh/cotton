<!--fixed-footer -->
<div class="app-wrapper-footer ">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
             <!--   <ul class="nav">
                    <li class="nav-item">
                        Pinno ISP Copyright@
                        <a href="https://pinnovatech.co.ke/" >
                           Pinnovatech Systems
                        </a>  {{date('Y')}}
                    </li>

                </ul>

                -->
            </div>

        </div>
    </div>
</div>
</div>
</div>

</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script src="{$_theme}/scripts/vendors.js"></script>
<script src="{$_theme}/scripts/plugins/select2.min.js"></script>

<script src="{$_theme}/scripts/plugins/bootstrap-datepicker.min.js"></script>
<script src="{$_theme}/scripts/custom.js"></script>
<script src="{$_theme}/scripts/form-elements.init.js"></script>
<script type="text/javascript" src="{$_theme}/assets/scripts/main.js"></script>
<script type="text/javascript" src="ui/lib/highchart/js/oki.js"></script>
<script type="text/javascript" src="ui/lib/highchart/js/highcharts-more.js"></script>
<script type="text/javascript" src="ui/lib/highchart/js/modules/exporting.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQMx8UbAoT0mkNdBYBOjt2gY0nR6RzUAU&libraries=places"></script>
<script type="text/javascript" src="{$_theme}/js/maps.js"></script>
<script>

    $("#router").select2( {
        placeholder: "Select Router",
        allowClear: true
    } );
    $("#subvillage").select2( {
        placeholder: "Select Village",
        allowClear: true
    } );
 
    $("#plan").select2( {
        placeholder: "Select Plan",
        allowClear: true
    } );
    $("#planv").select2( {
        placeholder: "Select Burst Plan",
        allowClear: true
    } );
    $("#mac").select2( {
        placeholder: "Select Mac address",
        allowClear: true
    } );
    $("#template").select2( {
        placeholder: "Select Template",
        allowClear: true
    } );
    $("#other").select2( {
        placeholder: "Kindly select",
        allowClear: true
    } );
    $("#interface").select2( {
        placeholder: "Kindly select",
        allowClear: true
    } );
    $("#servervv").select2( {
        placeholder: "Kindly select",
        allowClear: true
    } );
</script>

{if isset($xfooter)}
    {$xfooter}
{/if}


</body>
</html>
