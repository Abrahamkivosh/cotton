<?php /* Smarty version Smarty-3.1.13, created on 2022-05-14 07:22:58
         compiled from "ui/theme/default/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:350055786278d25d6536a0-56470502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0e964801e2587c54981454b2eab9caeb83ad231' => 
    array (
      0 => 'ui/theme/default/login.tpl',
      1 => 1652501991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '350055786278d25d6536a0-56470502',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6278d25d67fd95_30715855',
  'variables' => 
  array (
    '_title' => 0,
    '_theme' => 0,
    '_c' => 0,
    'notify' => 0,
    '_url' => 0,
    'mac' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6278d25d67fd95_30715855')) {function content_6278d25d67fd95_30715855($_smarty_tpl) {?>
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

    <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-5 mx-auto" >
                    <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>

                        <center><?php echo $_smarty_tpl->tpl_vars['notify']->value;?>
</center>

                    <?php }?>
                <div id="showprogress" style="line-height: 2.5;display:none;">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        You have clicked Login, Kindly wait.....
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                 <center> <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
/main"><img src="<?php echo $_smarty_tpl->tpl_vars['_c']->value['company_logo'];?>
" width="40%;"></a></center>
                 <br>
<a class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:#0056b3; padding: 12px ;width: auto;  " href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin">Manager Log in</a>
              
                <div id="loginpro">
                  <!--  <hr class="new1"> --><br>
                   Enter your details below...
                  <!--  <hr class="new1"> -->
                    <div  style="font-size: 15px">
                       <form class="form-horizontal" onsubmit="document.getElementById('loginpro').style.display = 'none';document.getElementById('showprogress').style.display = 'block';" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/post" method="post" onsubmit="return validateForm()" >
                          <input name="mac" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['mac']->value;?>
">
                           <table  border="0" width="100%" style="border-top: 0px;border: 0px;"><tr><td style="width: 30%;border:0px; text-align: left"> Username|የተጠቃሚ ስም</td><td style="text-align: right;border: 0px; color: #ffc400"> <a style="color: blue" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
register/change-username">Forgot Username?|የተጠቃሚ ስም ረሱ?</a></td></tr></table>
                           <input type="text" class="form-control" style="border: 0px; height: 33px;" name="username"/>
                           <table  border="0" width="100%"><tr><td style="width: 50%; border: 0px; text-align: left"> PIN|ፒን</td><td style="text-align: right; color: #ffc400; border: 0px;"> <a style="color: blue" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
register/change-pin">Forgot PIN?|ፒን ረሱ?</a></td></tr></table>
                           <input type="password" class="form-control" style=" border: 0px; height: 33px;" name="password"/>
                            <table  border="0" width="100%"><tr><td style="width: 50%; border: 0px; text-align: left"> Phone number Last 4 digits </td><td style="text-align: right;  border: 0px;">| ስልክ ቁጥር የመጨረሻዎቹ 4 አሃዞች</td></tr></table>
                           <input type="number" class="form-control" style=" border: 0px; height: 33px;" name="phone"/>
                           <br>
                           <input type="submit" class="btn btn-primary btn-xl js-scroll-trigger" style="background: #ffc400; border: 0px; padding: 8px ; color: #0b0b0b; width: 100%; " value="Login">
                           <br>
                           <br><br>
                    <div style="font-size: 13px;">  <input style="background-color: blue;" type="checkbox" name="agree" checked required><a>Accept Our Terms & Conditions</a></div>
                       </form>
                    </div>
                </div>    

                </div>
            </div>
        </div>
    </header>

<?php echo $_smarty_tpl->getSubTemplate ("sections/user-footer_new.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>