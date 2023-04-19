<?php /* Smarty version Smarty-3.1.13, created on 2022-11-20 09:56:15
         compiled from "ui/theme/default/sections/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1481354462627820307673a8-84829867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03f37743b98e0b5712f080c541c00e7e6b6a4c24' => 
    array (
      0 => 'ui/theme/default/sections/footer.tpl',
      1 => 1668927372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1481354462627820307673a8-84829867',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6278203076e2b6_58550828',
  'variables' => 
  array (
    '_theme' => 0,
    'xfooter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6278203076e2b6_58550828')) {function content_6278203076e2b6_58550828($_smarty_tpl) {?><!--fixed-footer -->
<div class="app-wrapper-footer ">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
             <!--   <ul class="nav">
                    <li class="nav-item">
                        Pinno ISP Copyright@
                        <a href="https://pinnovatech.co.ke/" >
                           Pinnovatech Systems
                        </a>  <?php ob_start();?><?php echo date('Y');?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>

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

<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/scripts/vendors.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/scripts/plugins/select2.min.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/scripts/plugins/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/scripts/custom.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/scripts/form-elements.init.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/assets/scripts/main.js"></script>
<script type="text/javascript" src="ui/lib/highchart/js/oki.js"></script>
<script type="text/javascript" src="ui/lib/highchart/js/highcharts-more.js"></script>
<script type="text/javascript" src="ui/lib/highchart/js/modules/exporting.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQMx8UbAoT0mkNdBYBOjt2gY0nR6RzUAU&libraries=places"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/maps.js"></script>
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

<?php if (isset($_smarty_tpl->tpl_vars['xfooter']->value)){?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }?>


</body>
</html>
<?php }} ?>