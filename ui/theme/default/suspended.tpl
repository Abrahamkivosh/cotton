
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>{$_title} - Suspended</title>
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
					<div class="col-md-6">
						<div class="main-card mb-2 card">
							<div class="card-body">
                                       
                          	
								<h1 class="text-normal h5 text-center">
								<img width="30%" class="rounded-circle" src="http://pinnovatech.co.ke/assets/img/logo.png" alt=""><br>
								{if $_c['system_type']=="one_off"}
								PINNO CLOUD HOSTING service is <b>SUSPENDED </b>
								{else}
                                PINNO WISP billing system is <b>SUSPENDED </b>
								{/if}
								kindly renew your service of amount <b>ksh. {$amount} </b> to<br>
								Paybill no. <b> 4045089</b> and account no. <b> {$_c['account']}  </b></h1>
								
							</div>
						</div>
						
					</div>
					<div class="col-md-3">
						</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{$_theme}/assets/scripts/main.js"></script></body>
</body>
</html>