<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>{$_title}</title>
	<link rel="shortcut icon" href="{$_theme}/images/logo.png" type="image/x-icon" />
	
	<!-- Icons -->
	<link rel="stylesheet" href="{$_theme}/fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="{$_theme}/fonts/font-awesome/css/font-awesome.min.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="{$_theme}/styles/plugins/waves.css">
	<link rel="stylesheet" href="{$_theme}/styles/plugins/perfect-scrollbar.css">
	<link rel="stylesheet" href="{$_theme}/styles/plugins/select2.css">
	<link rel="stylesheet" href="{$_theme}/styles/plugins/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="{$_theme}/styles/plugins/bootstrap-slider.css">
	<link rel="stylesheet" href="{$_theme}/styles/plugins/bootstrap-datepicker.css">
	<link rel="stylesheet" href="{$_theme}/styles/plugins/summernote.css">

	<!-- Css/Less Stylesheets -->

	<link rel="stylesheet" href="{$_theme}/styles/bootstrap.min.css">
	<link rel="stylesheet" href="{$_theme}/styles/main.min.css"> 


	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Match Media polyfill for IE9 -->
	<!--[if IE 9]> <script src="{$_theme}/scripts/ie/matchMedia.js"></script>  <![endif]--> 
{if isset($xheader)}
	{$xheader}
{/if}
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


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

<body id="app" class="app off-canvas">

	<header class="site-head" id="site-head">
		<ul class="list-unstyled left-elems">
			<li>
				<a href="#" class="nav-trigger ion ion-drag"></a>
			</li>
			{if $_admin['user_type'] eq 'Admin' || $_admin['user_type'] eq 'Technician'}
			<li>
				<div class="form-search hidden-xs">
					<form id="site-search" method="post" action="{$_url}customers/list/">
						<input type="search" class="form-control" name="username" placeholder="{$_L['Search_Contact']}">
						<button type="submit" class="ion ion-ios-search-strong"></button>
					</form>
				</div>
			</li>
			{/if}
			<li>
				<div class="site-logo visible-xs">
					<a href="{$_url}dashboard" class="text-uppercase h3">
						<span class="text">{$_L['Logo']}</span>
					</a>
				</div>
			</li>
			<li class="fullscreen hidden-xs">
				<a href="#"><i class="ion ion-qr-scanner"></i></a>
			</li>
			<!-- Notification on progress, hide it  -->
			<li class="notify-drop hidden-xs dropdown hidden">
				<a href="#" data-toggle="dropdown">
					<i class="ion ion-chatboxes"></i>
					<span class="badge badge-danger badge-xs circle">3</span>
				</a>
				<div class="panel panel-default dropdown-menu">
					<div class="panel-heading">
						You have 3 new message 
						<a href="#" class="right btn btn-xs btn-pink mt-3">Show All</a>
					</div>
						{if isset($notify)}
	{$notify}
	{/if}
	<div class="panel-body">
						Coming Soon!!! Next Version...
					</div>
				</div>
			</li>
		</ul>
		<ul class="list-unstyled right-elems">
			<li class="logout hidden-xs">
				<a href="{$_url}logout"><i class="ion ion-power"></i> {$_L['Logout']}</a></a>
			</li>
		</ul>
	</header>

	<div class="main-container clearfix">
		<aside class="nav-wrap" id="site-nav" data-perfect-scrollbar>
			<div class="nav-head">
				<a href="{$_url}dashboard" class="site-logo text-uppercase">
					<i class="ion ion-wifi"></i>
					<span class="text">{$_c['CompanyName']}</span>
				</a>
			</div>

			<nav class="site-nav clearfix" role="navigation">
			{if $_admin['user_type'] eq 'Admin' || $_admin['user_type'] eq 'Technician'}
				<div class="profile clearfix mb15">
					<img src="system/uploads/admin.png" alt="admin"> 
					<div class="group">
						<div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{$_admin['fullname']}<span class="caret"></a></span>
							<ul class="dropdown-menu">
								<li><a href="{$_url}settings/users-edit/{$_admin['id']}"><i class="ion ion-person"></i> {$_L['My_Account']}<div class="ripple-wrapper"></div></a></li>
								<li><a href="{$_url}settings/change-password"><i class="ion ion-settings"></i> {$_L['Change_Password']}</a></li>
								<li><a href="{$_url}logout"><i class="ion ion-power"></i> {$_L['Logout']}</a></li>
							</ul>
						</div>
						<small class="desig">{if $_admin['user_type'] eq 'Admin'} {$_L['Administrator']} {else} Technician {/if}</small>
					</div>
				</div>
                                        
			{else}
				<div class="profile clearfix mb15">
					<img src="system/uploads/user.jpg" alt="admin">
					<div class="group">
						<div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{$_user['fullname']}<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{$_url}accounts/profile"><i class="ion ion-person"></i> {$_L['My_Account']}<div class="ripple-wrapper"></div></a></li>
								<li><a href="{$_url}accounts/change-password"><i class="ion ion-settings"></i> {$_L['Change_Password']}</a></li>
								<li><a href="{$_url}logout"><i class="ion ion-power"></i> {$_L['Logout']}</a></li>
							</ul>
						</div>
						<small class="desig">{$_L['Member']}</small>
					</div>
				</div>
			{/if}
				
				<ul id="leftMenu" class="list-unstyled clearfix nav-list mb15">
					<li {if $_system_menu eq 'dashboard'}class="active"{/if}>
						<a href="{$_url}dashboard">
							<i class="ion ion-monitor"></i>
							<span class="text">{$_L['Dashboard']}</span>
						</a>
					</li>
					<!-- Message on progress, hide it  -->
					
				{if $_admin['user_type'] eq 'Admin' || $_admin['user_type'] eq 'Technician'}
					<li {if $_system_menu eq 'customers'}class="open"{/if}>
						<a href="#" onmouseover="toggleDropdownMobile(this)">
							<i class="ion ion-android-contacts"></i>
							<span class="text">{$_L['Customers']}</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
							<li {if $_system_menu eq 'customers'}class="active"{/if}><a href="{$_url}customers/add">{$_L['Add_Contact']}</a></li>
							<li {if $_system_menu eq 'customers'}class="active"{/if}><a href="{$_url}customers/list">{$_L['List_Contact']}</a></li>
						</ul>
					</li>
                                    
					<li {if $_system_menu eq 'prepaid'}class="open"{/if} >
						<a href="#"  >
							<i class="ion ion-card" ></i>
							<span class="text" >Recharge</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled" >
							<li {if $_system_menu eq 'prepaid'}class="active"{/if}><a href="{$_url}prepaid/list">{$_L['Prepaid_User']}</a></li>

							<li {if $_system_menu eq 'prepaid'}class="active"{/if}><a href="{$_url}prepaid/voucher">{$_L['Prepaid_Vouchers']}</a></li>
							<li {if $_system_menu eq 'prepaid'}class="active"{/if}><a href="{$_url}prepaid/refill">{$_L['Refill_Account']}</a></li>
							<li {if $_system_menu eq 'prepaid'}class="active"{/if}><a href="{$_url}prepaid/recharge">{$_L['Recharge_Account']}</a></li>

						</ul>
					</li>
					<li {if $_system_menu eq 'accounting'}class="open"{/if} >
						<a href="#" onClick="toggleDropdownMobile(this)" >
							<i class="ion ion-card" ></i>
							<span class="text" >Accounting</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled" >
							<li {if $_system_menu eq 'accounting'}class="active"{/if}><a href="{$_url}prepaid/mpesa">Mpesa Transactions</a></li>
							<li {if $_system_menu eq 'accounting'}class="active"{/if}><a href="{$_url}prepaid/recharget">Recharge Transactions</a></li>
							<li {if $_system_menu eq 'accounting'}class="active"{/if}><a href="{$_url}prepaid/custagpay">Customer Vs Payment</a></li>
							<li {if $_system_menu eq 'accounting'}class="active"{/if}><a href="{$_url}prepaid/invoice">Invoices</a></li>

						</ul>
					</li>
					<li {if $_system_menu eq 'services'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="ion ion-cube"></i>
							<span class="text">{$_L['Services']}</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
                                                        <li {if $_system_menu eq 'services'}class="active"{/if}><a href="{$_url}services/redirect">Redirect Server</a></li>
                                                        <li {if $_system_menu eq 'services'}class="active"{/if}><a href="{$_url}services/ip">IP Plan</a></li>
							<li {if $_system_menu eq 'services'}class="active"{/if}><a href="{$_url}services/hotspot">{$_L['Hotspot_Plans']}</a></li>
							<li {if $_system_menu eq 'services'}class="active"{/if}><a href="{$_url}services/pppoe">{$_L['PPPOE_Plans']}</a></li>
							<li {if $_system_menu eq 'services'}class="active"{/if}><a href="{$_url}bandwidth/list">{$_L['Bandwidth_Plans']}</a></li>
						</ul>
					</li>
                                        
                                           <li {if $_system_menu eq 'noc'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="ion ion-stats-bars"></i>
							<span class="text">NOC</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
							<li {if $_system_menu eq 'noc'}class="active"{/if}><a href="{$_url}noc/live_before">Live View</a></li>
							<li {if $_system_menu eq 'noc'}class="active"{/if}><a href="{$_url}noc/graphs">Consumption Graphs</a></li>
		
						</ul>
					</li>
                                        <li {if $_system_menu eq 'site'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="ion ion-wifi"></i>
							<span class="text">Site</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
							<li {if $_system_menu eq 'site'}class="active"{/if}><a href="{$_url}site/b_user">Online User</a></li>
							<li {if $_system_menu eq 'site'}class="active"{/if}><a href="{$_url}site/b_ap">Ap Online</a></li>
							<li {if $_system_menu eq 'site'}class="active"{/if}><a href="{$_url}site/b_consumption">User/Interface Consumption</a></li>
                                                        <li {if $_system_menu eq 'site'}class="active"{/if}><a href="{$_url}site/b_uptime">Uptime</a></li>
						</ul>
					</li>
					<li {if $_system_menu eq 'sms'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="ion ion-android-mail"></i>
							<span class="text">SMS</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
                                                        <li {if $_system_menu eq 'sms'}class="active"{/if}><a href="{$_url}sms/compose">Compose SMS</a></li>
							<li {if $_system_menu eq 'sms'}class="active"{/if}><a href="{$_url}sms/template">SMS Template</a></li>
							<li {if $_system_menu eq 'sms'}class="active"{/if}><a href="{$_url}sms/sent_sms">Sent SMS</a></li>
						</ul>
					</li>
					{if $_admin['user_type'] eq 'Admin'}
					<li {if $_system_menu eq 'reports'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="ion ion-clipboard"></i>
							<span class="text">Reports</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
							<li {if $_system_menu eq 'reports'}class="active"{/if}><a href="{$_url}reports/customers">Customer Reports</a></li>
							<li {if $_system_menu eq 'reports'}class="active"{/if}><a href="{$_url}reports/daily-report">{$_L['Daily_Report']}</a></li>
							<li {if $_system_menu eq 'reports'}class="active"{/if}><a href="{$_url}reports/by-period">{$_L['Period_Reports']}</a></li>
						</ul>
					</li>
                              {/if}
                                        
				{else}
					<li {if $_system_menu eq 'voucher'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="ion ion-card"></i>
							<span class="text">{$_L['Voucher']}</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
							<li {if $_system_menu eq 'voucher'}class="active"{/if}><a href="{$_url}voucher/activation">{$_L['Voucher_Activation']}</a></li>
							<li {if $_system_menu eq 'voucher'}class="active"{/if}><a href="{$_url}voucher/list-activated">{$_L['List_Activated_Voucher']}</a></li>
						</ul>
					</li>
					<li {if $_system_menu eq 'order'}class="active"{/if}>
						<a href="{$_url}order">
							<i class="ion ion-ios-cart"></i>
							<span class="text">{$_L['Order_Voucher']}</span>
						</a>
					</li>
					<li {if $_system_menu eq 'accounts'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="ion ion-gear-a"></i>
							<span class="text">{$_L['My_Account']}</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
							<li {if $_system_menu eq 'accounts'}class="active"{/if}><a href="{$_url}accounts/profile">{$_L['My_Profile']}</a></li>
							<li {if $_system_menu eq 'accounts'}class="active"{/if}><a href="{$_url}accounts/change-password">{$_L['Change_Password']}</a></li>
							<li>&nbsp;</li>
						</ul>
					</li>
					
				{/if}
				{if $_admin['user_type'] eq 'Admin'}
					<li {if $_system_menu eq 'network'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="ion ion-network"></i>
							<span class="text">{$_L['Network']}</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
                                                    
							<li {if $_system_menu eq 'network'}class="active"{/if}><a href="{$_url}routers/list">Router Config</a></li>
							<li {if $_system_menu eq 'network'}class="active"{/if}><a href="{$_url}pool/list">Ip Pools</a></li>
						</ul>
					</li>
					
					<li {if $_system_menu eq 'settings'}class="open"{/if}>
						<a href="#" onClick="toggleDropdownMobile(this)">
							<i class="ion ion-gear-a"></i>
							<span class="text">{$_L['Settings']}</span>
							<i class="arrow ion-chevron-left"></i>
						</a>
						<ul class="inner-drop list-unstyled">
							<li {if $_system_menu eq 'settings'}class="active"{/if}><a href="{$_url}settings/app">{$_L['General_Settings']}</a></li>
							<li {if $_system_menu eq 'settings'}class="active"{/if}><a href="{$_url}settings/localisation">{$_L['Localisation']}</a></li>
							<li {if $_system_menu eq 'settings'}class="active"{/if}><a href="{$_url}settings/users">System Users</a></li>
							<li {if $_system_menu eq 'settings'}class="active"{/if}><a href="{$_url}settings/dbstatus">{$_L['Backup_Restore']}</a></li>
							<li>&nbsp;</li>
						</ul>
					</li>
					
				{/if}
				</ul>
				
			</nav>

			<footer class="nav-foot">
				<p>{date('Y')} &copy; <span>{$_c['CompanyName']}</span></p>
			</footer>
		</aside>
		<script>
		// i find bug that dropdown menu in mobile browser doesnt active, so i force to show all
		var mobile = false;
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			mobile = true;
		}
		function toggleDropdownMobile(node){
			if(mobile){
				$(node).parent('li').addClass('open');
			}
		}
		</script> 
		<div class="content-container" id="content">
			<div class="page {if $_system_menu eq 'dashboard'}page-dashboard{/if}{if $_system_menu eq 'reports'}page-invoice{/if}">

			{if isset($notify)}
				{$notify}
			{/if}