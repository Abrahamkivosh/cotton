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
	<link rel="stylesheet" href="{$_theme}/styles/plugins/select2.css">
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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

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

<body >
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
	<div class="app-header header-shadow" >
		<div class="app-header__logo">
			<div class="logo">{$_c['CompanyName']}</div>
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
				<div class="search-wrapper" ">
					My Wallet: Ksh. {number_format('300',2)}
				</div>
			</div>
			<div class="app-header-right">
				<div class="header-btn-lg pr-0">
					<div class="widget-content p-0">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="btn-group">
									<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
										<img width="42" class="rounded-circle"src="https://robohash.org/{$_user['id']}?set=set3&size=100x100&bgset=bg1" alt="">
										<i class="fa fa-angle-down ml-2 opacity-8"></i>
									</a>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
											<a href="#"><button type="button" tabindex="0" class="dropdown-item">{$_user['fullname']}</button></a>
											<a href="{$_url}accounts/profile"><button type="button" tabindex="0" class="dropdown-item">{$_L['My_Account']}</button></a>
											<a href="{$_url}accounts/change-password"><button type="button" tabindex="0" class="dropdown-item">{$_L['Change_Password']}</button></a>
											<a href="{$_url}logout" ><button type="button" tabindex="0" class="dropdown-item">{$_L['Logout']}</button></a>
										</div>

								</div>
							</div>
							<div class="widget-content-left  ml-3 header-user-info">
								<div class="widget-heading">
									<small class="desig">{$_L['Member']}</small>
								</div>

							</div>

						</div>
					</div>
				</div>        </div>
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
			</div>    <div class="scrollbar-sidebar">
				<div class="app-sidebar__inner">
					<ul class="vertical-nav-menu">
						<li>
							<br>
							<a href="{$_url}home"  {if $_system_menu eq 'home'}class="mm-active"{/if} >

								<i class="metismenu-icon pe-7s-monitor "></i>
								Dashboard
							</a>
						</li>

							<li>
								<a href="#" {if $_system_menu eq 'voucher'}class="mm-active"{/if}>
									<i class="metismenu-icon pe-7s-users"></i>
									My Billing
									<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
								</a>
								<ul>
									<li {if $_system_menu eq 'voucher'}class="mm-active"{/if}><a href="{$_url}voucher/package_change">Change Package</a></li>
									<li {if $_system_menu eq 'voucher'}class="mm-active"{/if}><a href="{$_url}voucher/activation">Payment Activation</a></li>
									<li {if $_system_menu eq 'voucher'}class="mm-active"{/if}><a href="{$_url}voucher/list-activated">List Payment</a></li>
								</ul>
							</li>
							<li {if $_system_menu eq 'accounts'}{/if} >
								<a href="#"  >
									<i class="metismenu-icon pe-7s-timer" ></i>
									<span class="text" >My Account</span>
									<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
								</a>
								<ul class="inner-drop list-unstyled" >
									<li {if $_system_menu eq 'accounts'}class="mm-active"{/if}><a href="{$_url}accounts/profile">{$_L['My_Profile']}</a></li>
									<li {if $_system_menu eq 'accounts'}class="mm-active"{/if}><a href="{$_url}accounts/change-password">{$_L['Change_Password']}</a></li>

								</ul>
							</li>

					</ul>
				</div>
			</div>
		</div>

		<div class="app-main__outer">
			<div class="app-main__inner">