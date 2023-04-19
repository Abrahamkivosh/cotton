<?php /* Smarty version Smarty-3.1.13, created on 2022-05-14 07:06:27
         compiled from "ui/theme/default/forgotusername.tpl" */ ?>
<?php /*%%SmartyHeaderCode:938645349627f2ac3792d37-45625839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b074aaee4eda3ace524a2b81dcd1271d973e828f' => 
    array (
      0 => 'ui/theme/default/forgotusername.tpl',
      1 => 1651113798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '938645349627f2ac3792d37-45625839',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_title' => 0,
    '_theme' => 0,
    '_c' => 0,
    '_url' => 0,
    'notify' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_627f2ac37b3db6_14501520',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_627f2ac37b3db6_14501520')) {function content_627f2ac37b3db6_14501520($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123150765-1"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Pinnovatech System">
    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <meta name="description" charset="utf-8" content="Koranet is a internet company in Mombasa, Kenya. Many part's of Mombasa town do not have access to reliable internet connections. Ideal Network's has full coverage in any part of Malindi, Lamu, Kilifi. Please visit our office in Malindi Town.">
    <meta name="keywords" content="Internet, Malindi, Fibre, fast internet, malindi, internet, Ideal Networks , internet malindi, internet kenya, Ideal internet, Ideal malindi">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="icon" href="img/logo_black.png">

    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Plugin CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/magnific-popup.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/creative.css" rel="stylesheet">

</head>

<body id="page-top" background="<?php echo $_smarty_tpl->tpl_vars['_c']->value['background_image'];?>
" style="
background-position: center center;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
">
<!-- Navigation -->



    <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-5 mx-auto" >
                   <center> <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
/main"><img src="<?php echo $_smarty_tpl->tpl_vars['_c']->value['company_logo'];?>
" width="40%;"></a></center>
                    <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
                        <center><?php echo $_smarty_tpl->tpl_vars['notify']->value;?>
</center>
                    <?php }?>
                    <br><h2>Request Username</h2><br>
                   Enter the Phone Number You registered with<br><br>
                    <div style="font-size: 15px">
                       <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
register/forgot-username-post" method="post">
                             <input type="number" max="251999999999" min="100000000" name="phone" class="form-control" style="height: 33px; width: 100%;" value="251" />
                           <br>
                           <br>
                           <input type="submit" class="btn btn-primary btn-xl js-scroll-trigger" style="background: purple; padding: 8px ; color: white; width: 20%; " value="Submit">
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php echo $_smarty_tpl->getSubTemplate ("sections/user-footer_new.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>