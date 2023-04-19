
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

<body id="page-top" background="{$_c['background_image']}" style="
background-position: center center;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
">
<!-- Navigation -->



    <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-5 mx-auto" >
                   <center> <a href="{$_url}/main"><img src="{$_c['company_logo']}" width="40%;"></a></center>
                    {if isset($notify)}
                        <center>{$notify}</center>
                    {/if}
                    <br><h2>Request Username</h2><br>
                   Enter the Phone Number You registered with<br><br>
                    <div style="font-size: 15px">
                       <form class="form-horizontal" action="{$_url}register/forgot-username-post" method="post">
                             <input type="number" max="251999999999" min="100000000" name="phone" class="form-control" style="height: 33px; width: 100%;" value="251" />
                           <br>
                           <br>
                           <input type="submit" class="btn btn-primary btn-xl js-scroll-trigger" style="background: purple; padding: 8px ; color: white; width: 20%; " value="Submit">
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
{include file="sections/user-footer_new.tpl"}