<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>{$_title}-User Login</title>
	<link rel="shortcut icon" href="{$_theme}/images/logo.png" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">

	<link href="{$_theme}/styles/main.css" rel="stylesheet">
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
	<div class="col-md-3">
	</div>
   
	  <div class="col-md-2">
   <div class="main-card mb-2 card">
	<a class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:dark; background:skyblue; padding: 12px ;width: 100%;  " href="{$_url}login/board">Board Login</a>
	</div>
	</div>
	  <div class="col-md-2">
   <div class="main-card mb-2 card">
	<a class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:dark; background:orange; padding: 12px ;width: 100%;  " href="{$_url}login/ginner">Ginner Login</a>
	</div>
	</div>

	<div class="col-md-2">
	</div>
	<br>
	</div>
		<div class="row">
			<div class="col-md-3">
			
			</div>
			<div class="col-md-4">
			
				<div class="main-card mb-2 card">
					<div class="card-body">

						<h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold">
						
							<img width="100" class="rounded-circle" src="{$_c['company_logo']}" alt=""><br>
							{$_c['CompanyName']}</h1>
						<h5 class="text-normal h5 text-center">Super Admin</h5>
						{if isset($notify)}
							{$notify}
						{/if}
	                    <div class="panel-body">
						<form  action="{$_url}admin/post" method="post">
							<div class="position-relative form-group"><label for="exampleEmail" class="">{$_L['Username']}</label>
								<input name="username"  placeholder="username" type="text" class="form-control" required>
							</div>
							<div class="position-relative form-group"><label for="examplePassword" class="">{$_L['Password']}</label>
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
<script type="text/javascript" src="{$_theme}/assets/scripts/main.js"></script></body>
</body>
</html>