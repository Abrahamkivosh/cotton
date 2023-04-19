<?php /* Smarty version Smarty-3.1.13, created on 2022-11-22 13:35:11
         compiled from "ui/theme/default/sections/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1308485562627820306fa695-13032504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dc0448d224ed7a18b922a1d5dbf8482c777f574' => 
    array (
      0 => 'ui/theme/default/sections/header.tpl',
      1 => 1669110830,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1308485562627820306fa695-13032504',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_62782030762e51_85124630',
  'variables' => 
  array (
    '_title' => 0,
    '_theme' => 0,
    '_url' => 0,
    '_L' => 0,
    '_admin' => 0,
    '_system_menu' => 0,
    'rights' => 0,
    'order_w' => 0,
    'order_r' => 0,
    'order_a' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62782030762e51_85124630')) {function content_62782030762e51_85124630($_smarty_tpl) {?><!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/images/logo.png" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/styles/plugins/select2.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/styles/plugins/bootstrap-datepicker.css">
	<link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/styles/main.css" rel="stylesheet">


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
						<form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/list/">
							<input type="text" name="username" class="search-input" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search_Contact'];?>
">
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
										<img width="42" class="rounded-circle" src="<?php echo $_smarty_tpl->tpl_vars['_admin']->value['user_image'];?>
" alt="">
										<i class="fa fa-angle-down ml-2 opacity-8"></i>
									</a>
									<?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type']=='Admin'||$_smarty_tpl->tpl_vars['_admin']->value['user_type']=='Technician'){?>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['_admin']->value['id'];?>
"><button type="button" tabindex="0" class="dropdown-item"><?php echo $_smarty_tpl->tpl_vars['_L']->value['My_Account'];?>
</button></a>
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password"><button type="button" tabindex="0" class="dropdown-item"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change_Password'];?>
</button></a>
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout" ><button type="button" tabindex="0" class="dropdown-item"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logout'];?>
</button></a>
										</div>
									<?php }else{ ?>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['_admin']->value['id'];?>
"><button type="button" tabindex="0" class="dropdown-item"><?php echo $_smarty_tpl->tpl_vars['_L']->value['My_Account'];?>
</button></a>
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password"><button type="button" tabindex="0" class="dropdown-item"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change_Password'];?>
</button></a>
											<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout" ><button type="button" tabindex="0" class="dropdown-item"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logout'];?>
</button></a>
										</div>
									<?php }?>
								</div>
							</div>
							<div class="widget-content-left  ml-3 header-user-info">
								<div class="widget-heading">
									<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_admin']->value['fullname'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>

								</div>
								<div class="widget-subheading">
									<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_admin']->value['user_type'];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>

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
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
dashboard"  <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='dashboard'){?>class="mm-active"<?php }?> >

								<i class="metismenu-icon pe-7s-monitor "></i>
								Dashboard
							</a>
						</li>

                 <!-- AMCOS -->
				  <?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type']=='AMCOS'){?>
				 	<li>
							<br>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
dashboard"  <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='dashboard'){?>class="mm-active"<?php }?> >

								<i class="metismenu-icon pe-7s-monitor "></i>
								<strong>Amcos Menu</strong>
							</a>
						</li>
				    <li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-users"></i>
								Farmers
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/list">List</a></li>
							<?php }?>
							</ul>
				    </li>
					<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input_amcos/list" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								My Inputs 
								
							</a>
							
				     </li>
					 <li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input_amcos/issue_input_sec1" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								Issue Inputs
								
							</a>
							
				      </li>
					  				 <li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input_amcos/inputs-issued-list" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								Issued Inputs
								
							</a>
							
				      </li>
	                <li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/collect" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-timer"></i>
								Collect Cotton
							</a>
						
				    </li>

					<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/create-order" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								Generate Order
								
							</a>
							
				</li>
				             <li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/list" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								Cotton Collection Record
							</a>
						
			            	</li>


				          <li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								My Orders
								
								<?php $_smarty_tpl->tpl_vars['order_w'] = new Smarty_variable(ORM::for_table('orders')->where('amcos_id',$_smarty_tpl->tpl_vars['_admin']->value['id'])->where('status','1')->count(), null, 0);?>
								<?php $_smarty_tpl->tpl_vars['order_a'] = new Smarty_variable(ORM::for_table('orders')->where('amcos_id',$_smarty_tpl->tpl_vars['_admin']->value['id'])->where('status','3')->count(), null, 0);?>
								<?php $_smarty_tpl->tpl_vars['order_r'] = new Smarty_variable(ORM::for_table('orders')->where('amcos_id',$_smarty_tpl->tpl_vars['_admin']->value['id'])->where('status','4')->count(), null, 0);?>
								<label class="badge badge-warning"><?php echo $_smarty_tpl->tpl_vars['order_w']->value;?>
</label><label class="badge badge-danger"><?php echo $_smarty_tpl->tpl_vars['order_r']->value;?>
</label><label class="badge badge-success"><?php echo $_smarty_tpl->tpl_vars['order_a']->value;?>
</label>	
							</a>
							
				         </li>
						 <li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payment/farmer-amcos" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator" ></i>
								Farmers Payments
								
							</a>
							
			           	</li>
                		 <li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payment/amcos-amcos" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								My Payments
								
							</a>
							
				         </li>

			

				<li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								Reports
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/input-amcos-before">Issued Inputs</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/cotton-amcos-before">Cotton Collection</a></li>
							<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/farmer-amcos-before">Farmers Payment</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/order-amcos-before">My Order Report</a></li>
							<?php }?>
							</ul>
				</li>
           <?php }?>
           <!-- Board  -->
		   <?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type']=='ADMIN'||$_smarty_tpl->tpl_vars['_admin']->value['user_type']=='BOARD'){?>
		   	<li>
							<br>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
dashboard"  <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='dashboard'){?>class="mm-active"<?php }?> >

								<i class="metismenu-icon pe-7s-monitor "></i>
								<strong>Board Menu</strong>
							</a>
						</li>

                <li>
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
farmer/list-board" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-users"></i>
								Farmer List
						
							</a>
							
				</li>
				 <li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-timer"></i>
								Input Inventory
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/add">Add Inputs</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/add_stock">Restock Inputs</a></li>
							<?php }?>		

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/list">List Inputs</a></li>
							<?php }?>
							</ul>
				</li>
				 <li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-timer"></i>
								Issue Input
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/issue_input_sec1">Issue Inputs</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
input/inputs-issued-list">Issued Inputs List</a></li>
							<?php }?>		
							</ul>
				</li>


				   	<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payment/farmer-gin" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Farmer Payment
							</a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payment/amcos-gin" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Amcos Payment
							</a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payment/system-gin" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator"></i>
							    Service Payment
							</a>
					
				     </li>

					 <li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cotton/list-board" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-timer"></i>
								Cotton Collection
							
							</a>
							
				</li>

                <li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-users"></i>
								Ginner
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ginner/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ginner/list">List</a></li>
							<?php }?>
							</ul>
				</li>
				
				<li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-users"></i>
								AMCOS'
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
amcos/list">List</a></li>
							<?php }?>
							</ul>
				</li>

			    
				
				
				<li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Commission & Rates
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ratescommissions/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ratescommissions/list">List</a></li>
							<?php }?>
							</ul>
				</li>


				<li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								Reports
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/general_summary">General Summary Report</a></li>
							<?php }?>

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/farmer_summary">Farmers Summary Report</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/acreage_summary">Acreage Summary Report</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/input_summary">Input Summary Report</a></li>
							<?php }?>
							<!--<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/farmer_categorical_before">Input Categorical Report</a></li>
							<?php }?>-->

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
#">Collection Summary Report</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
#">Farmers Payment Report</a></li>
							<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
#">Amcos Payment Report</a></li>
							<?php }?>	
						    <?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
#">Service Payment Report</a></li>
							<?php }?>			
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
#">Ginner Order Summary</a></li>
							<?php }?>
							</ul>
				</li>

                <li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								Region
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
region/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
region/list">List</a></li>
							<?php }?>
							</ul>
				</li>
				<li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								District
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
district/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
district/list">List</a></li>
							<?php }?>
							</ul>
				</li>
                <li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								Ward
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ward/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ward/list">List</a></li>
							<?php }?>
							</ul>
				</li>
				<li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								Villages
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
villages/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
villages/list">List</a></li>
							<?php }?>
							</ul>
				</li>
				<li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								Sub Villages
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
subvillages/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
subvillages/list">List</a></li>
							<?php }?>
							</ul>
				</li>

 


               <?php }?>
            <!-- GINNER -->
            <?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type']=='GINNER'){?>
			<li>
							<br>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
dashboard"  <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='dashboard'){?>class="mm-active"<?php }?> >

								<i class="metismenu-icon pe-7s-monitor "></i>
								<strong>Ginner Menu</strong>
							</a>
						</li>
			       <li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/list-gin" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								My Orders
								<?php $_smarty_tpl->tpl_vars['order_w'] = new Smarty_variable(ORM::for_table('orders')->where('ginner_id',$_smarty_tpl->tpl_vars['_admin']->value['id'])->where('status','1')->count(), null, 0);?>
								<?php $_smarty_tpl->tpl_vars['order_a'] = new Smarty_variable(ORM::for_table('orders')->where('ginner_id',$_smarty_tpl->tpl_vars['_admin']->value['id'])->where('status','3')->count(), null, 0);?>
								<?php $_smarty_tpl->tpl_vars['order_r'] = new Smarty_variable(ORM::for_table('orders')->where('ginner_id',$_smarty_tpl->tpl_vars['_admin']->value['id'])->where('status','4')->count(), null, 0);?>
								<label class="badge badge-warning"><?php echo $_smarty_tpl->tpl_vars['order_w']->value;?>
</label><label class="badge badge-danger"><?php echo $_smarty_tpl->tpl_vars['order_r']->value;?>
</label><label class="badge badge-success"><?php echo $_smarty_tpl->tpl_vars['order_a']->value;?>
</label>	
							</a>
							
				</li>
              
				<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payment/farmer-gin" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Farmer Payment
							</a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payment/amcos-gin" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator"></i>
								Amcos Payment
							</a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
payment/system-gin" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-calculator"></i>
							    Service Payment
							</a>
					
				</li>
				

				<li>
							
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-menu"></i>
								Reports
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/amcos-gin-before">Amcos Payment</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/farmer-gin-before">Farmers Payment</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/system-gin-before">Service Payment</a></li>
							<?php }?>		
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/order-gin-before">My Order Report</a></li>
							<?php }?>
							
							</ul>

				</li>
                <?php }?>
            <!-- Super Admin -->
			
			<?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type']=='ADMIN'){?>
				<li>
							<br>
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
dashboard"  <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='dashboard'){?>class="mm-active"<?php }?> >

								<i class="metismenu-icon pe-7s-monitor "></i>
								<strong>Super Admin</strong>
							</a>
						</li>


	             <li>
							<a href="#" <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>>
								<i class="metismenu-icon pe-7s-users"></i>
								BOARD users
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul>
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_add']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
board_user/add">Add</a></li>
							<?php }?>	

							<?php if ($_smarty_tpl->tpl_vars['rights']->value['client_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='listing'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
board_user/list">List</a></li>
							<?php }?>
							</ul>
				</li>
					<?php if ($_smarty_tpl->tpl_vars['rights']->value['sms']){?>
						<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='sms'){?>class="open"<?php }?>>
							<a href="#" onClick="toggleDropdownMobile(this)">
								<i class="metismenu-icon pe-7s-mail"></i>
								<span class="text">SMS</span>
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul class="inner-drop list-unstyled">
								<?php if ($_smarty_tpl->tpl_vars['rights']->value['compose']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='sms'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/compose">Compose SMS</a></li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['rights']->value['template_view']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='sms'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/template">SMS Template</a></li>
								<?php }?>
                
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='sms'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/sent_sms">Sent SMS</a></li>
							   
								<?php if ($_smarty_tpl->tpl_vars['rights']->value['sms_group']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='sms'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/group">SMS Group</a></li>
							    <?php }?>
							</ul>
						</li>
					<?php }?>

                   
					<?php if ($_smarty_tpl->tpl_vars['rights']->value['user']){?>
					     <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='users'){?>class="open"<?php }?>>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="metismenu-icon pe-7s-users"></i>
							<span class="text">System Users</span>
							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
						<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_role']){?>
							<!--<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='users'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/roles">Roles</a></li>-->
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['rights']->value['user_view']){?>
							<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='users'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users">System Users</a></li>
						<?php }?>
						</ul>
					    </li>
                     <?php }?>
 				<!--	<?php if ($_smarty_tpl->tpl_vars['rights']->value['report']){?>
						<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='reports'){?>class="open"<?php }?>>
							<a href="#" onClick="toggleDropdownMobile(this)">
								<i class="metismenu-icon pe-7s-menu"></i>
								<span class="text">Reports</span>
								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							
							<ul class="inner-drop list-unstyled">
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['customer_report']){?>
							    <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='reports'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/attendance-before">Agent Attendance Reports</a></li>
							    <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='reports'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/logs-before">Logs Reports</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='reports'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/directory-before">Directory Annalysis report</a></li>
								
							<?php }?>
						
							</ul>
						</li>
					<?php }?>	
					-->
                       <?php if ($_smarty_tpl->tpl_vars['rights']->value['setting']){?>
						<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='settings'){?>class="open"<?php }?>>
							<a href="#" onClick="toggleDropdownMobile(this)">
								<i class="metismenu-icon pe-7s-config"></i>
								<?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>

								<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
							</a>
							<ul class="inner-drop list-unstyled">
							<?php if ($_smarty_tpl->tpl_vars['rights']->value['general']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='settings'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/app"><?php echo $_smarty_tpl->tpl_vars['_L']->value['General_Settings'];?>
</a></li>
								<?php }?>
								<!--<?php if ($_smarty_tpl->tpl_vars['rights']->value['localization']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='settings'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/localisation"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Localisation'];?>
</a></li>
								<?php }?>
							  	<?php if ($_smarty_tpl->tpl_vars['rights']->value['payment']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='settings'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/payment">Payment Settings</a></li>
								<?php }?> -->
								<?php if ($_smarty_tpl->tpl_vars['rights']->value['email']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='settings'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/email">Email Settings</a></li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['rights']->value['setting_sms']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='settings'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/sms">SMS Settings</a></li>
								<?php }?>
								<!--<?php if ($_smarty_tpl->tpl_vars['rights']->value['setting_invoice']){?>
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='settings'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/invoice">Invoice Settings</a></li>
                                <?php }?>
								-->
								<li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value=='settings'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/dbstatus"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Backup_Restore'];?>
</a></li>
								<li>&nbsp;</li>
							</ul>
						</li>
                        <?php }?>
						<?php }?>
						
					</ul>
				</div>
			</div>
		</div>

		<div class="app-main__outer">
			<div class="app-main__inner"><?php }} ?>