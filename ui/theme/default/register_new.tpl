
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>{$_title} - New Client Registration</title>
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
			<form  action="{$_url}register/post" method="post">
				<div class="row">
					<div class="col-md-3">
						<div class="main-card mb-2 card">
					     	<div class="card-body">
	                        <h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold">OUR PACKAGES</h1>
							<br>
                            {foreach $d as $che}
						     <h1 class="text-normal h5 text-center">	
						     <div class="position-relative form-group"><label>
                            {$che['name_plan']} @ Ksh. {$che['price']} 
							</label>
							</div>
							</h1>
							  
							{/foreach}	
							<div class="position-relative form-group"><label>
                             Kindly pay for package to <br>
							 Paybill no. <b>{$_c['paybill']} </b> and account no. <b> {$account} </b>
							</label></div>
							</div>
					   </div>
					</div>
					<div class="col-md-3">
						<div class="main-card mb-2 card">
							<div class="card-body">

								<h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold">
									<img width="100" class="rounded-circle" src="{$_c['company_logo']}" alt=""><br>
									{$_c['CompanyName']}</h1>
								<h5 class="text-normal h5 text-center">NEW CLIENT REGISTRATION</h5>
								{if isset($notify)}
									{$notify}
								{/if}

								<div class="panel-body">
									
										<div class="position-relative form-group"><label for="exampleEmail" class="">{$_L['Username']}</label>
											<input name="username" value="{$account}" placeholder="username" type="text" class="form-control" readonly>
										</div>
											<div class="position-relative form-group"><label for="exampleEmail" class="">Full name*</label>
											<input name="fullname"  placeholder="Full name" type="text" class="form-control" required>
										</div>
												<div class="position-relative form-group"><label for="exampleEmail" class="">Email address</label>
											<input name="address"  placeholder="clien@client.com" type="email" class="form-control" >
										</div>
											<div class="position-relative form-group"><label  class="">Phone Number</label>
											<input name="phonenumber"  placeholder="07168817711" type="text" class="form-control" required>
										</div>
										
										
									
								</div>
							</div>
						</div>
					</div>

						<div class="col-md-3">
							<div class="main-card mb-2 card">
							 <div class="card-body">

								<div class="panel-body">
								
			
										<div class="position-relative form-group"><label for="examplePassword" class="">{$_L['Password']}</label>
											<input name="password"   type="password" placeholder="password" class="form-control" required>
										</div>

										<div class="position-relative form-group"><label for="examplePassword" class="">Confirm {$_L['Password']}</label>
											<input name="cpassword"   type="password" placeholder="password" class="form-control" required>
										</div>

										<div class="position-relative form-group">
					                     	<label >{$_L['Service_Plan']}</label>
						                  
						                   	<select  name="plan_id" class="form-control" required>
											    
											     {foreach $d as $che}
						     	                
                                                <option value="{$che['id']}">{$che['name_plan']} @ Ksh. {$che['price']} </option>
						                     	{/foreach}	
							                	
							                </select>
						                </div
										<br><br>

										<button type="submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block">Register</button>
										
										<a href="{$_url}login" ><b class="mb-2 mr-2 btn btn-danger btn-lg btn-block">Cancel</b></a>
									
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{$_theme}/assets/scripts/main.js"></script></body>
</body>
</html>