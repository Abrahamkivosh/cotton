<?php /* Smarty version Smarty-3.1.13, created on 2022-05-09 11:35:37
         compiled from "ui/theme/default/load_before.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13802352986278d259096dd6-87798903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a37009c193377c516b692d9eaa743bb68458ca1' => 
    array (
      0 => 'ui/theme/default/load_before.tpl',
      1 => 1651455034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13802352986278d259096dd6-87798903',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_title' => 0,
    '_theme' => 0,
    '_url' => 0,
    '_c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6278d2590f7622_80063976',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6278d2590f7622_80063976')) {function content_6278d2590f7622_80063976($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Pinnovatech System Business directory">
    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <meta name="description" charset="utf-8" content="Pinnovatech Systems Business directory">
    <meta name="keywords" content="Pinnovatech Systems Business directory">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/magnific-popup.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/loadme.js"></script>
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/creative.css" rel="stylesheet">
<script>
// this function must be defined in the global scope
window.fadeOut = function(obj) {
    $(obj).fadeOut(4000);

}
var timer = setTimeout(function() {
            window.location='<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/login_now'
        }, 4000);
</script>
</head>

<body id="page-top"  style="
background-color: orange;
">

    <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-5 mx-auto" >
           
              
            <br>
            <br>
            <br>
<div id="image">
    <center>  <img id="preload" onload="fadeOut(this)" src="<?php echo $_smarty_tpl->tpl_vars['_c']->value['company_logo'];?>
" style="width:60%;" /></center>
</div>


              
            </div>
        </div>
    </header>
<?php echo $_smarty_tpl->getSubTemplate ("sections/user-footer_new.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>