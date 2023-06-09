<?php /* Smarty version Smarty-3.1.13, created on 2022-06-09 21:20:06
         compiled from "ui/theme/default/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10215723062a239d60f64f7-07991962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0d7f68c0d03e8a030b993639b55522dbb8658d4' => 
    array (
      0 => 'ui/theme/default/admin.tpl',
      1 => 1651115714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10215723062a239d60f64f7-07991962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_title' => 0,
    '_L' => 0,
    '_theme' => 0,
    '_c' => 0,
    'notify' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62a239d6119b72_70352369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62a239d6119b72_70352369')) {function content_62a239d6119b72_70352369($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['_L']->value['Login'];?>
</title>
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/images/logo.png" type="image/x-icon" />

	<!-- Icons -->
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/fonts/font-awesome/css/font-awesome.min.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/styles/plugins/waves.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/styles/plugins/perfect-scrollbar.css">

	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/styles/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/styles/main.min.css">

 	<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'> -->
	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/scripts/ie/matchMedia.js"></script>  <![endif]-->

</head>
<body id="app" class="app off-canvas body-full">
	<div class="main-container clearfix">
		<div class="content-container" id="content">
			<div class="page page-auth">
				<div class="auth-container">
					<div class="form-head mb20">
						<h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold"><?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</h1>
						<h5 class="text-normal h5 text-center">Admin Login in</h5>
					</div>
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
					<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

				<?php }?>
					<div class="form-container">
						<form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/post" method="post">
							<div class="md-input-container md-float-label">
								<input type="text" name="username" class="md-input">
								<label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
</label>
							</div>

							<div class="md-input-container md-float-label">
								<input type="password" name="password" class="md-input">
								<label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>
							</div>

							<div class="clearfix">
								<div class="ui-checkbox ui-checkbox-primary right">
									<label>
										<input type="checkbox"> 
										<span>Remember me</span>
									</label>
								</div>
							</div>
							<div class="btn-group btn-group-justified mb15">
								<div class="btn-group">
									<button type="submit" class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Login'];?>
</button>
								</div>
							</div> 
						</form>
						<br>
						<a class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:orange; padding: 12px ;width: 33%;  " href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin">Agent Log in</a>
                
					</div>

				</div>
			</div>
		</div> 
	</div>
	<script src="scripts/vendors.js"></script>
</body>
</html><?php }} ?>