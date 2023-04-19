
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

</head>

<body id="page-top" style="background-color: white;">
<!-- Navigation -->
<div style="background: purple;">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top"   id="mainNav">
        <div class="container"  style="background: purple;">
            <a  class="navbar-brand js-scroll-trigger" href="{$_url}main" >{$_c['CompanyName']}</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive" >
                <ul class="navbar-nav ml-auto" style="background: purple">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{$_url}home">Home</a>
                    </li>
                   <!-- <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{$_url}home/help">Help</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{$_url}voucher/buy-bundle">Internet Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{$_url}home">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{$_url}logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
    <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-5 mx-auto" style="color: grey; line-height: 30px;">
                    {if isset($notify)}

                        <center>{$notify}</center>

                    {/if}
                    <h2>{$_c['CompanyName']}</h2>
                    Top Up your account
                    <br><br>
                    <fieldset style="border-top:6px solid grey;"></fieldset>
                    <br>
                    <div style="text-align: left;">
                    Kindly pay to till/ Paybill number Against<br>
                    Your account no. {$_SESSION['username']}
                    </div>
                    <!--
                    <div style="text-align: left;">
                    1. Go to M-PESA on your Phone<br>
                    2. Select Lipa na Mpesa<br>
                    3. Select Buy Goods and Services<br>
                    4. Enter <strong>4031259</strong> as the till number<br>
                    5. Enter the amount of your choice<br>
                    6. Enter your M-PESA PIN and send<br>
                    7. You will receive a confirmation SMS from M-PESA<br>
                    8. Buy your preferred internet bundle<br>
                    9. You are online<br>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </header>
{include file="sections/user-footer_new.tpl"}