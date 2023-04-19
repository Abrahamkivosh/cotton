<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>{$_title}</title>
	<link rel="shortcut icon" href="{$_theme}/images/logo.png" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">
	<link rel="stylesheet" href="{$_theme}/styles/plugins/select2.css">
	<link rel="stylesheet" href="{$_theme}/styles/plugins/bootstrap-datepicker.css">
	<link href="{$_theme}/styles/main.css" rel="stylesheet">


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
	 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQMx8UbAoT0mkNdBYBOjt2gY0nR6RzUAU&libraries=places"></script>
       
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	   
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
	<script>
		var chart;
		function requestDatta(interface) {
			$.ajax({
				url: interface,
				datatype: "json",
				success: function(data) {
					var midata = JSON.parse(data);

					if( midata.length > 0 ) {
						var TX=parseInt(midata[0].data);
						var RX=parseInt(midata[1].data);
						var x = (new Date()).getTime();
						shift=chart.series[0].data.length > 19;
						chart.series[0].addPoint([x, TX], true, shift);
						chart.series[1].addPoint([x, RX], true, shift);
						document.getElementById("trafico").innerHTML=TX + " / " + RX;
					}else{
						document.getElementById("trafico").innerHTML="- / -";
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown);
				}
			});
		}

		$(document).ready(function() {
			Highcharts.setOptions({
				global: {
					useUTC: false
				}
			});


			chart = new Highcharts.Chart({
				chart: {
					renderTo: 'container',
					animation: Highcharts.svg,
					type: 'spline',
					events: {
						load: function () {
							setInterval(function () {
								requestDatta(document.getElementById("interface").value);
							}, 1000);
						}
					}
				},
				title: {
					text: 'Monitoring'
				},
				xAxis: {
					type: 'datetime',
					tickPixelInterval: 150,
					maxZoom: 20 * 1000
				},
				yAxis: {
					minPadding: 0.2,
					maxPadding: 0.2,
					title: {
						text: 'Trafic in MB/S ',
						margin: 80
					}
				},
				series: [{
					name: 'TX',
					data: []
				}, {
					name: 'RX',
					data: []
				}]
			});
		});
	</script>


	<script>
		function popup(url,name,windowWidth,windowHeight){
			myleft=(screen.width)?(screen.width-windowWidth)/2:100;
			mytop=(screen.height)?(screen.height-windowHeight)/2:100;
			properties = "width="+windowWidth+",height="+windowHeight;
			properties +=",scrollbars=yes, top="+mytop+",left="+myleft;
			window.open(url,name,properties);
		}
		$(function () {

			/**
			 * Get the current time
			 */
			function getNow () {
				var now = new Date();

				return {
					hours: now.getHours() + now.getMinutes() / 60,
					minutes: now.getMinutes() * 12 / 60 + now.getSeconds() * 12 / 3600,
					seconds: now.getSeconds() * 12 / 60
				};
			};

			/**
			 * Pad numbers
			 */
			function pad(number, length) {
				// Create an array of the remaining length +1 and join it with 0's
				return new Array((length || 2) + 1 - String(number).length).join(0) + number;
			}

			var now = getNow();

			// Create the chart
			$('#container1').highcharts({

						chart: {
							type: 'gauge',
							plotBackgroundColor: null,
							plotBackgroundImage: null,
							plotBorderWidth: 0,
							plotShadow: false,
							height: 200
						},

						credits: {
							enabled: false
						},

						title: {
							text: 'The Highcharts clock'
						},

						pane: {
							background: [{
								// default background
							}, {
								// reflex for supported browsers
								backgroundColor: Highcharts.svg ? {
									radialGradient: {
										cx: 0.5,
										cy: -0.4,
										r: 1.9
									},
									stops: [
										[0.5, 'rgba(255, 255, 255, 0.2)'],
										[0.5, 'rgba(200, 200, 200, 0.2)']
									]
								} : null
							}]
						},

						yAxis: {
							labels: {
								distance: -20
							},
							min: 0,
							max: 12,
							lineWidth: 0,
							showFirstLabel: false,

							minorTickInterval: 'auto',
							minorTickWidth: 1,
							minorTickLength: 5,
							minorTickPosition: 'inside',
							minorGridLineWidth: 0,
							minorTickColor: '#666',

							tickInterval: 1,
							tickWidth: 2,
							tickPosition: 'inside',
							tickLength: 10,
							tickColor: '#666',
							title: {
								text: 'Powered by<br/>Marango',
								style: {
									color: '#BBB',
									fontWeight: 'normal',
									fontSize: '8px',
									lineHeight: '10px'
								},
								y: 10
							}
						},

						tooltip: {
							formatter: function () {
								return this.series.chart.tooltipText;
							}
						},

						series: [{
							data: [{
								id: 'hour',
								y: now.hours,
								dial: {
									radius: '60%',
									baseWidth: 4,
									baseLength: '95%',
									rearLength: 0
								}
							}, {
								id: 'minute',
								y: now.minutes,
								dial: {
									baseLength: '95%',
									rearLength: 0
								}
							}, {
								id: 'second',
								y: now.seconds,
								dial: {
									radius: '100%',
									baseWidth: 1,
									rearLength: '20%'
								}
							}],
							animation: false,
							dataLabels: {
								enabled: false
							}
						}]
					},

					// Move
					function (chart) {
						setInterval(function () {
							var hour = chart.get('hour'),
									minute = chart.get('minute'),
									second = chart.get('second'),
									now = getNow(),
									// run animation unless we're wrapping around from 59 to 0
									animation = now.seconds == 0 ?
											false :
											{
												easing: 'easeOutElastic'
											};

							// Cache the tooltip text
							chart.tooltipText =
									pad(Math.floor(now.hours), 2) + ':' +
									pad(Math.floor(now.minutes * 5), 2) + ':' +
									pad(now.seconds * 5, 2);

							hour.update(now.hours, true, animation);
							minute.update(now.minutes, true, animation);
							second.update(now.seconds, true, animation);

						}, 1000);

					});
		});

		// Extend jQuery with some easing (copied from jQuery UI)
		$.extend($.easing, {
			easeOutElastic: function (x, t, b, c, d) {
				var s=1.70158;var p=0;var a=c;
				if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
				if (a < Math.abs(c)) { a=c; var s=p/4; }
				else var s = p/(2*Math.PI) * Math.asin (c/a);
				return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
			}
		});
	</script>
	<script type="text/javascript" >
		function date_time(id) {
			date = new Date;
			year = date.getFullYear();
			month = date.getMonth();
			months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dev');
			d = date.getDate();
			day = date.getDay();
			days = new Array('sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
			h = date.getHours();
			if (h < 10) {
				h = "0" + h;
			}
			m = date.getMinutes();
			if (m < 10) {
				m = "0" + m;
			}
			s = date.getSeconds();
			if (s < 10) {
				s = "0" + s;
			}
			result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
			document.getElementById(id).innerHTML = result;
			setTimeout('date_time("' + id + '");', '1000');
			return true;
		}

	</script>

</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
	<div class="app-header header-shadow">
		<div class="app-header__logo">
			<div class="logo"></div>
			<div class="header__pane ml-auto">
				<div>
					<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
					</button>
				</div>
			</div>
		</div>
		<div class="app-header__mobile-menu">
			<div>
				<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
				</button>
			</div>
		</div>
		<div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
		</div>    <div class="app-header__content">
			<div class="app-header-left">
				<div class="search-wrapper">
					<div class="input-holder">
						<form id="site-search" method="post" action="{$_url}customers/list/">
							<input type="text" name="username" class="search-input" placeholder="{$_L['Search_Contact']}">
						</form>
						<button  class="search-icon"><span></span></button>
					</div>
					<button class="close"></button>
				</div>
			</div>
			<div class="app-header-right">
				<div class="header-btn-lg pr-0">
					<div class="widget-content p-0">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="btn-group">
									<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
										<img width="42" class="rounded-circle" src="{$_admin['user_image']}" alt="">
										<i class="fa fa-angle-down ml-2 opacity-8"></i>
									</a>
									{if $_admin['user_type'] eq 'Admin' || $_admin['user_type'] eq 'Technician'}
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
											<a href="{$_url}settings/users-edit/{$_admin['id']}"><button type="button" tabindex="0" class="dropdown-item">{$_L['My_Account']}</button></a>
											<a href="{$_url}settings/change-password"><button type="button" tabindex="0" class="dropdown-item">{$_L['Change_Password']}</button></a>
											<a href="{$_url}logout" ><button type="button" tabindex="0" class="dropdown-item">{$_L['Logout']}</button></a>
										</div>
									{else}
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
											<a href="{$_url}settings/users-edit/{$_admin['id']}"><button type="button" tabindex="0" class="dropdown-item">{$_L['My_Account']}</button></a>
											<a href="{$_url}settings/change-password"><button type="button" tabindex="0" class="dropdown-item">{$_L['Change_Password']}</button></a>
											<a href="{$_url}logout" ><button type="button" tabindex="0" class="dropdown-item">{$_L['Logout']}</button></a>
										</div>
									{/if}
								</div>
							</div>
							<div class="widget-content-left  ml-3 header-user-info">
								<div class="widget-heading">
									{{$_admin['fullname']}}
								</div>
								<div class="widget-subheading">
									{{$_admin['user_type']}}
								</div>
							</div>

						</div>
					</div>
				</div>        </div>
		</div>
	</div>

	<div class="ui-theme-settings">
	    <!--	
	    <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
			<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
		</button>
		-->
		<div class="theme-settings__inner">
			<div class="scrollbar-container">
				<div class="theme-settings__options-wrapper">
					<h3 class="themeoptions-heading">Layout Options
					</h3>
					<div class="p-3">
						<ul class="list-group">
							<li class="list-group-item">
								<div class="widget-content p-0">
									<div class="widget-content-wrapper">
										<div class="widget-content-left mr-3">
											<div class="switch has-switch switch-container-class" data-class="fixed-header">
												<div class="switch-animate switch-on">
													<input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
												</div>
											</div>
										</div>
										<div class="widget-content-left">
											<div class="widget-heading">Fixed Header
											</div>
											<div class="widget-subheading">Makes the header top fixed, always visible!
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="widget-content p-0">
									<div class="widget-content-wrapper">
										<div class="widget-content-left mr-3">
											<div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
												<div class="switch-animate switch-on">
													<input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
												</div>
											</div>
										</div>
										<div class="widget-content-left">
											<div class="widget-heading">Fixed Sidebar
											</div>
											<div class="widget-subheading">Makes the sidebar left fixed, always visible!
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="widget-content p-0">
									<div class="widget-content-wrapper">
										<div class="widget-content-left mr-3">
											<div class="switch has-switch switch-container-class" data-class="fixed-footer">
												<div class="switch-animate switch-off">
													<input type="checkbox" data-toggle="toggle" data-onstyle="success">
												</div>
											</div>
										</div>
										<div class="widget-content-left">
											<div class="widget-heading">Fixed Footer
											</div>
											<div class="widget-subheading">Makes the app footer bottom fixed, always visible!
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<h3 class="themeoptions-heading">
						<div>
							Header Options
						</div>
						<button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
							Restore Default
						</button>
					</h3>
					<div class="p-3">
						<ul class="list-group">
							<li class="list-group-item">
								<h5 class="pb-2">Choose Color Scheme
								</h5>
								<div class="theme-settings-swatches">
									<div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
									</div>
									<div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
									</div>
									<div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-dark">
									</div>
									<div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-dark">
									</div>
									<div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark">
									</div>
									<div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light">
									</div>
									<div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark">
									</div>
									<div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light">
									</div>
									<div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light">
									</div>
									<div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light">
									</div>
									<div class="divider">
									</div>
									<div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
									</div>
									<div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
									</div>
									<div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light">
									</div>
									<div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light">
									</div>
									<div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light">
									</div>
									<div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light">
									</div>
									<div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark">
									</div>
									<div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark">
									</div>
									<div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark">
									</div>
									<div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark">
									</div>
									<div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark">
									</div>
									<div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
									</div>
									<div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark">
									</div>
									<div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light">
									</div>
									<div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark">
									</div>
									<div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light">
									</div>
									<div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light">
									</div>
									<div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
									</div>
									<div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark">
									</div>
									<div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light">
									</div>
									<div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light">
									</div>
									<div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light">
									</div>
									<div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light">
									</div>
									<div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light">
									</div>
									<div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light">
									</div>
									<div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
									</div>
								</div>
							</li>
						</ul>
					</div>
					<h3 class="themeoptions-heading">
						<div>Sidebar Options</div>
						<button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
							Restore Default
						</button>
					</h3>
					<div class="p-3">
						<ul class="list-group">
							<li class="list-group-item">
								<h5 class="pb-2">Choose Color Scheme
								</h5>
								<div class="theme-settings-swatches">
									<div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
									</div>
									<div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light">
									</div>
									<div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light">
									</div>
									<div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light">
									</div>
									<div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light">
									</div>
									<div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light">
									</div>
									<div class="divider">
									</div>
									<div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
									</div>
									<div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
									</div>
									<div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light">
									</div>
									<div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
									</div>
									<div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
									</div>
									<div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light">
									</div>
									<div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
									</div>
									<div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light">
									</div>
									<div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light">
									</div>
									<div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
									</div>
									<div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark">
									</div>
									<div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light">
									</div>
									<div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light">
									</div>
									<div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light">
									</div>
									<div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light">
									</div>
									<div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light">
									</div>
									<div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light">
									</div>
									<div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
									</div>
								</div>
							</li>
						</ul>
					</div>
					<h3 class="themeoptions-heading">
						<div>Main Content Options</div>
						<button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
						</button>
					</h3>
					<div class="p-3">
						<ul class="list-group">
							<li class="list-group-item">
								<h5 class="pb-2">Page Section Tabs
								</h5>
								<div class="theme-settings-swatches">
									<div role="group" class="mt-2 btn-group">
										<button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
											Line
										</button>
										<button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
											Shadow
										</button>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="app-main">
	
		<div class="app-sidebar sidebar-shadow">
			<div class="app-header__logo">
				<div class="logo-src"></div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
						</button>
					</div>
				</div>
			</div>
			<div class="app-header__mobile-menu">
				<div>
					<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
					</button>
				</div>
			</div>
			<div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
			</div>    
           
			<div class="scrollbar-sidebar">
				<div class="app-sidebar__inner">
					<ul class="vertical-nav-menu">
						<li>
							<br>
							<a href="{$_url}dashboard"  {if $_system_menu eq 'dashboard'}class="mm-active"{/if} >

								<i class="metismenu-icon pe-7s-monitor "></i>
								Dashboard
							</a>
						</li>

                 <!-- AMCOS -->
				  {if $_admin['user_type'] eq 'AMCOS'}
				 	<li>
							<br>
							<a href="{$_url}dashboard"  {if $_system_menu eq 'dashboard'}class="mm-active"{/if} >

								<i class="metismenu-icon pe-7s-monitor "></i>
								<strong>Amcos Menu</strong>
							</a>
						</li>
				    <li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-users"></i>
								Farmers
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}farmer/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}farmer/list">List</a></li>
							{/if}
							</ul>
				    </li>
					<li>
							<a href="{$_url}input_amcos/list" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								My Inputs 
								
							</a>
							
				     </li>
					 <li>
							<a href="{$_url}input_amcos/issue_input_sec1" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								Issue Inputs
								
							</a>
							
				      </li>
					  				 <li>
							<a href="{$_url}input_amcos/inputs-issued-list" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								Issued Inputs
								
							</a>
							
				      </li>
	                <li>
							<a href="{$_url}cotton/collect" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-timer"></i>
								Collect Cotton
							</a>
						
				    </li>

					<li>
							<a href="{$_url}order/create-order" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								Generate Order
								
							</a>
							
				</li>
				             <li>
							<a href="{$_url}cotton/list" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								Cotton Collection Record
							</a>
						
			            	</li>


				          <li>
							<a href="{$_url}order/list" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								My Orders
								
								{$order_w=ORM::for_table('orders')->where('amcos_id',$_admin['id'])->where('status','1')->count()}
								{$order_a=ORM::for_table('orders')->where('amcos_id',$_admin['id'])->where('status','3')->count()}
								{$order_r=ORM::for_table('orders')->where('amcos_id',$_admin['id'])->where('status','4')->count()}
								<label class="badge badge-warning">{$order_w}</label><label class="badge badge-danger">{$order_r}</label><label class="badge badge-success">{$order_a}</label>	
							</a>
							
				         </li>
						 <li>
							<a href="{$_url}payment/farmer-amcos" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								Farmers Payments
								
							</a>
							
			           	</li>
                		 <li>
							<a href="{$_url}payment/amcos-amcos" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								My Payments
								
							</a>
							
				         </li>

			

				<li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								Reports
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/input-amcos-before">Issued Inputs</a></li>
							{/if}
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/cotton-amcos-before">Cotton Collection</a></li>
							{/if}
								{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/farmer-amcos-before">Farmers Payment</a></li>
							{/if}
							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/order-amcos-before">My Order Report</a></li>
							{/if}
							</ul>
				</li>
           {/if}
           <!-- Board  -->
		   {if $_admin['user_type'] eq 'ADMIN' || $_admin['user_type'] eq 'BOARD'}
		   	<li>
							<br>
							<a href="{$_url}dashboard"  {if $_system_menu eq 'dashboard'}class="mm-active"{/if} >

								<i class="metismenu-icon pe-7s-monitor "></i>
								<strong>Board Menu</strong>
							</a>
						</li>

                <li>
					<a href="{$_url}farmer/list-board" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-users"></i>
								Farmer List
						
							</a>
							
				</li>
				 <li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-timer"></i>
								Input Inventory
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}input/add">Add Inputs</a></li>
							{/if}
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}input/add_stock">Restock Inputs</a></li>
							{/if}		

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}input/list">List Inputs</a></li>
							{/if}
							</ul>
				</li>
				 <li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-timer"></i>
								Issue Input
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}input/issue_input_sec1">Issue Inputs</a></li>
							{/if}
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}input/inputs-issued-list">Issued Inputs List</a></li>
							{/if}		
							</ul>
				</li>


				   	<li>
							<a href="{$_url}payment/farmer-gin" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Farmer Payment
							</a>
							<a href="{$_url}payment/amcos-gin" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Amcos Payment
							</a>
							<a href="{$_url}payment/system-gin" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator"></i>
							    Service Payment
							</a>
					
				     </li>

					 <li>
							<a href="{$_url}cotton/list-board" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-timer"></i>
								Cotton Collection
							
							</a>
							
				</li>

                <li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-users"></i>
								Ginner
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}ginner/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}ginner/list">List</a></li>
							{/if}
							</ul>
				</li>
				
				<li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-users"></i>
								AMCOS'
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}amcos/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}amcos/list">List</a></li>
							{/if}
							</ul>
				</li>

			    
				
				
				<li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Commission & Rates
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}ratescommissions/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}ratescommissions/list">List</a></li>
							{/if}
							</ul>
				</li>


				<li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								Reports
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/general_summary">General Summary Report</a></li>
							{/if}

							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/farmer_summary">Farmers Summary Report</a></li>
							{/if}
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/acreage_summary">Acreage Summary Report</a></li>
							{/if}
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/input_summary">Input Summary Report</a></li>
							{/if}
							<!--{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/farmer_categorical_before">Input Categorical Report</a></li>
							{/if}-->

							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}#">Collection Summary Report</a></li>
							{/if}
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}#">Farmers Payment Report</a></li>
							{/if}
								{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}#">Amcos Payment Report</a></li>
							{/if}	
						    {if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}#">Service Payment Report</a></li>
							{/if}			
							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}#">Ginner Order Summary</a></li>
							{/if}
							</ul>
				</li>

                <li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								Region
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}region/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}region/list">List</a></li>
							{/if}
							</ul>
				</li>
				<li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								District
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}district/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}district/list">List</a></li>
							{/if}
							</ul>
				</li>
                <li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								Ward
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}ward/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}ward/list">List</a></li>
							{/if}
							</ul>
				</li>
				<li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								Villages
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}villages/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}villages/list">List</a></li>
							{/if}
							</ul>
				</li>
				<li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								Sub Villages
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}subvillages/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}subvillages/list">List</a></li>
							{/if}
							</ul>
				</li>

 


               {/if}
            <!-- GINNER -->
            {if $_admin['user_type'] eq 'GINNER'}
			<li>
							<br>
							<a href="{$_url}dashboard"  {if $_system_menu eq 'dashboard'}class="mm-active"{/if} >

								<i class="metismenu-icon pe-7s-monitor "></i>
								<strong>Ginner Menu</strong>
							</a>
						</li>
			       <li>
							<a href="{$_url}order/list-gin" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								My Orders
								{$order_w=ORM::for_table('orders')->where('ginner_id',$_admin['id'])->where('status','1')->count()}
								{$order_a=ORM::for_table('orders')->where('ginner_id',$_admin['id'])->where('status','3')->count()}
								{$order_r=ORM::for_table('orders')->where('ginner_id',$_admin['id'])->where('status','4')->count()}
								<label class="badge badge-warning">{$order_w}</label><label class="badge badge-danger">{$order_r}</label><label class="badge badge-success">{$order_a}</label>	
							</a>
							
				</li>
              
				<li>
							<a href="{$_url}payment/farmer-gin" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Farmer Payment
							</a>
							<a href="{$_url}payment/amcos-gin" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Amcos Payment
							</a>
							<a href="{$_url}payment/system-gin" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-calculator"></i>
							    Service Payment
							</a>
					
				</li>
				

				<li>
							
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-menu"></i>
								Reports
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/amcos-gin-before">Amcos Payment</a></li>
							{/if}
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/farmer-gin-before">Farmers Payment</a></li>
							{/if}
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/system-gin-before">Service Payment</a></li>
							{/if}		
							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}reports/order-gin-before">My Order Report</a></li>
							{/if}
							
							</ul>

				</li>
                {/if}
            <!-- Super Admin -->
			
			{if $_admin['user_type'] eq 'ADMIN'}
				<li>
							<br>
							<a href="{$_url}dashboard"  {if $_system_menu eq 'dashboard'}class="mm-active"{/if} >

								<i class="metismenu-icon pe-7s-monitor "></i>
								<strong>Super Admin</strong>
							</a>
						</li>


	             <li>
							<a href="#" {if $_system_menu eq 'listing'}class="mm-active"{/if}>
								<i class="metismenu-icon pe-7s-users"></i>
								BOARD users
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							{if $rights['client_add']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}board_user/add">Add</a></li>
							{/if}	

							{if $rights['client_view']}
								<li {if $_system_menu eq 'listing'}class="mm-active"{/if}><a href="{$_url}board_user/list">List</a></li>
							{/if}
							</ul>
				</li>
					{if $rights['sms']}
						<li {if $_system_menu eq 'sms'}class="open"{/if}>
							<a href="#" onClick="toggleDropdownMobile(this)">
								<i class="metismenu-icon pe-7s-mail"></i>
								<span class="text">SMS</span>
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul class="inner-drop list-unstyled">
								{if $rights['compose']}
								<li {if $_system_menu eq 'sms'}class="mm-active"{/if}><a href="{$_url}sms/compose">Compose SMS</a></li>
								{/if}
								{if $rights['template_view']}
								<li {if $_system_menu eq 'sms'}class="mm-active"{/if}><a href="{$_url}sms/template">SMS Template</a></li>
								{/if}
                
								<li {if $_system_menu eq 'sms'}class="mm-active"{/if}><a href="{$_url}sms/sent_sms">Sent SMS</a></li>
							   
								{if $rights['sms_group']}
								<li {if $_system_menu eq 'sms'}class="mm-active"{/if}><a href="{$_url}sms/group">SMS Group</a></li>
							    {/if}
							</ul>
						</li>
					{/if}

                   
					{if $rights['user']}
					     <li {if $_system_menu eq 'users'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="metismenu-icon pe-7s-users"></i>
							<span class="text">System Users</span>
							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
						{if $rights['user_role']}
							<!--<li {if $_system_menu eq 'users'}class="active"{/if}><a href="{$_url}settings/roles">Roles</a></li>-->
						{/if}
						{if $rights['user_view']}
							<li {if $_system_menu eq 'users'}class="active"{/if}><a href="{$_url}settings/users">System Users</a></li>
						{/if}
						</ul>
					    </li>
                     {/if}
 				<!--	{if $rights['report']}
						<li {if $_system_menu eq 'reports'}class="open"{/if}>
							<a href="#" onClick="toggleDropdownMobile(this)">
								<i class="metismenu-icon pe-7s-menu"></i>
								<span class="text">Reports</span>
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							
							<ul class="inner-drop list-unstyled">
							{if $rights['customer_report']}
							    <li {if $_system_menu eq 'reports'}class="mm-active"{/if}><a href="{$_url}reports/attendance-before">Agent Attendance Reports</a></li>
							    <li {if $_system_menu eq 'reports'}class="mm-active"{/if}><a href="{$_url}reports/logs-before">Logs Reports</a></li>
								<li {if $_system_menu eq 'reports'}class="mm-active"{/if}><a href="{$_url}reports/directory-before">Directory Annalysis report</a></li>
								
							{/if}
						
							</ul>
						</li>
					{/if}	
					-->
                       {if $rights['setting']}
						<li {if $_system_menu eq 'settings'}class="open"{/if}>
							<a href="#" onClick="toggleDropdownMobile(this)">
								<i class="metismenu-icon pe-7s-config"></i>
								{$_L['Settings']}
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul class="inner-drop list-unstyled">
							{if $rights['general']}
								<li {if $_system_menu eq 'settings'}class="mm-active"{/if}><a href="{$_url}settings/app">{$_L['General_Settings']}</a></li>
								{/if}
								<!--{if $rights['localization']}
								<li {if $_system_menu eq 'settings'}class="mm-active"{/if}><a href="{$_url}settings/localisation">{$_L['Localisation']}</a></li>
								{/if}
							  	{if $rights['payment']}
								<li {if $_system_menu eq 'settings'}class="mm-active"{/if}><a href="{$_url}settings/payment">Payment Settings</a></li>
								{/if} -->
								{if $rights['email']}
								<li {if $_system_menu eq 'settings'}class="mm-active"{/if}><a href="{$_url}settings/email">Email Settings</a></li>
								{/if}
								{if $rights['setting_sms']}
								<li {if $_system_menu eq 'settings'}class="mm-active"{/if}><a href="{$_url}settings/sms">SMS Settings</a></li>
								{/if}
								<!--{if $rights['setting_invoice']}
								<li {if $_system_menu eq 'settings'}class="mm-active"{/if}><a href="{$_url}settings/invoice">Invoice Settings</a></li>
                                {/if}
								-->
								<li {if $_system_menu eq 'settings'}class="mm-active"{/if}><a href="{$_url}settings/dbstatus">{$_L['Backup_Restore']}</a></li>
								<li>&nbsp;</li>
							</ul>
						</li>
                        {/if}
						{/if}
						
					</ul>
				</div>
			</div>
		</div>

		<div class="app-main__outer">
			<div class="app-main__inner">