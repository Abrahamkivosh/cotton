
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123150765-1"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Pinnovatech System">
	<title>{$_title}</title>
	<meta name="description" charset="utf-8" content="Koranet is a internet company in Mombasa, Kenya. Many part's of Mombasa town do not have access to reliable internet connections. Ideal Network's has full coverage in any part of Malindi, Lamu, Kilifi. Please visit our office in Malindi Town.">
	<meta name="keywords" content="Internet, Malindi, Fibre, fast internet, malindi, internet, Ideal Networks , internet malindi, internet kenya, Ideal internet, Ideal malindi">
	<!-- Bootstrap core CSS -->
	<link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template -->
	<link href="{$_theme}/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="icon" href="img/logo_black.png">

	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- Plugin CSS -->
	<link href="{$_theme}/css/magnific-popup.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="{$_theme}/css/creative.css" rel="stylesheet">
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
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQMx8UbAoT0mkNdBYBOjt2gY0nR6RzUAU&libraries=places"></script>
       
	
       <script>

	   
      function initialize() {

		var options = {
		componentRestrictions: {
		country: "et",

		}
		};

		var input = document.getElementById('searchTextField');
		new google.maps.places.Autocomplete(input, options);
		
		}
			
       google.maps.event.addDomListener(window, 'load', initialize);
	
	   
       </script>
<body id="page-top" background="{$_c['background_image']}" style="
background-position: center center;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
">
<!-- Navigation -->

<div style="background: purple;">
	<nav class="navbar navbar-expand-lg navbar-light fixed-top"   id="mainNav">
		<div class="container"  style="background: purple;">
			<a  class="navbar-brand js-scroll-trigger" href="{$_url}home" >{$_c['CompanyName']}</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive" >
				<ul class="navbar-nav ml-auto" style="background: purple">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="{$_url}home">Home</a>
					</li>

					<!--
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="{$_url}home/help">Help</a>
					</li>
					-->
					
				
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="{$_url}logout">Log Out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>
<br>