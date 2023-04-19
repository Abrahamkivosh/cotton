<?php /* Smarty version Smarty-3.1.13, created on 2022-11-20 19:12:21
         compiled from "ui/theme/default/amcos_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107354722462a23e7d175710-38665647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbb8b6136fb5c1ed88a6abca399a5b09117b7b77' => 
    array (
      0 => 'ui/theme/default/amcos_login.tpl',
      1 => 1668927151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107354722462a23e7d175710-38665647',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62a23e7d19a930_68062965',
  'variables' => 
  array (
    '_title' => 0,
    '_theme' => 0,
    '_c' => 0,
    'notify' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62a23e7d19a930_68062965')) {function content_62a23e7d19a930_68062965($_smarty_tpl) {?><!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
-User Login</title>
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/images/logo.png" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">

	<link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/styles/main.css" rel="stylesheet">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<style type="text/css">
		@media only screen and (max-width: 1200px) {
			thead th:not(:first-child) {
				display: none;
			}

			td, th {
				display: block;
			}

			td[data-th]:before  {
				content: attr(data-th);
			}
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			padding: 12px 16px;
			z-index: 1;
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}

	</style>

</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
	<div class="app-main">
<div class="app-main__outer">
	<div class="app-main__inner">
	<div class="row">
	<div class="col-md-1">
	</div>
 

	<div class="col-md-2">
	</div>
	<br>
	</div>
		<div class="row">
			<div class="col-md-3">
			
			</div>
			<div class="col-md-3">
			
				<div class="main-card mb-2 card">
					<div class="card-body">

						<h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold">
						
							<img width="100" class="rounded-circle" src="<?php echo $_smarty_tpl->tpl_vars['_c']->value['company_logo'];?>
" alt=""><br>
							<?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</h1>
						<h5 class="text-normal h5 text-center">AMCOS Login</h5>
						<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
							<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

						<?php }?>

	<div class="panel-body">
	
						<form  action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/post-amcos" method="post">
							<div class="position-relative form-group"><label for="exampleEmail" class=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
</label>
								<input name="username"  placeholder="username" type="text" class="form-control" required>
							</div>
							<div class="position-relative form-group"><label for="examplePassword" class=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>
								<input name="password"   type="password" placeholder="password" class="form-control" required>
							</div>
							<button type="submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block">Login</button>
						</form>
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/assets/scripts/main.js"></script></body>
</body>
</html><?php }} ?>