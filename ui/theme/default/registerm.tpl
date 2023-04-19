<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Mambo Tokens- Register</title>
	<link rel="shortcut icon" href="../../../../../ui/theme/default/images/logo.png" type="image/x-icon" />
	
	<!-- Css/Less Stylesheets -->
	<link rel="stylesheet" href="../../../../../ui/theme/default/styles/bootstrap.min.css">
	<link rel="stylesheet" href="../../../../../ui/theme/default/styles/main.min.css">

 	<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'> -->
	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="/scripts/ie/matchMedia.js"></script>  <![endif]--> 

</head>
<body>
	<div class="container">
		<div class="hidden-xs" style="height:15px"></div>
		<div class="form-head mb20">
			<h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold" style="text-shadow: 2px 2px 4px #757575;">Mambo Tokens </h1>
                        <p>Call: 0707 820 936</p>
			<hr>
		</div>
		
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="panel panel-default">
				<div class="panel-heading">How To Register</div>
				<div class="panel-body" style="height:400px;max-height:296px;overflow:scroll;">
                                    From your phone<br>
                                    Go to <b> M-PESA</b><br>
                                    <b>Lipa na M-PESA</b><br>
                                    <b>Paybill</b><br>
                                    Enter Business no.<b> 430082</b><br>
                                     Enter Account no.<b> Your Account</b><br>
                                    Press OK<br>
                                    Enter Amount<br>
                                    Press OK<br>
                                    Enter Mpesa PIN Then SEND<br>
                                    You will receive an MPESA transaction message with the name <b>Mambo Tokens</b> on it<br>
                                    After payment you shall automatically be activated.
                                    
				</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Register</div>
					<div class="panel-body" style="height:150px;max-height:296px;">
						<div class="form-container">
							<form class="form-horizontal" action="{$_url}login/post" method="post">
								<div class="md-input-container md-float-label">
									<input type="text" name="phone" placeholder="7123334444"  class="md-input">
									<label>PhoneNumber</label>
								</div>
								
								<div class="btn-group btn-group-justified mb15">
									
									<div class="btn-group">
                                                                            <button class="btn btn-success" type="submit">Register</button>
										
									</div>
								</div> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="scripts/vendors.js"></script>
</body>
</html>