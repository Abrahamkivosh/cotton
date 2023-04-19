
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123150765-1"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Pinnovatech System">
    <title>{$_title}</title>
    <meta name="description" charset="utf-8" content="Pinnovatech Systems ISP billing systems">
    <meta name="keywords" content="Pinnovatech Systems ISP billing systems">
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

<div style="background: purple;">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top"   id="mainNav">
        <div class="container"  style="background: purple;">
            <a  class="navbar-brand js-scroll-trigger" href="/" >{$_c['CompanyName']}</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive" >
                <ul class="navbar-nav ml-auto" style="background: purple">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{$_url}main">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{$_url}home/help">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{$_url}voucher/buy-bundle">Internet Plans</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>

    <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row">

                <div class="col-lg-5 mx-auto" >


                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {$msg}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h2>Verify its You</h2>

                    <div style="font-size: 15px">
                        <table ><tr><td style="text-align: left"> Enter the code</td><td style="text-align: right; color: #ffc400"> <a style="color: deepskyblue" href="{$_url}register/resend">resend code?</a></td></tr></table>

                        <form  class="form-horizontal" action="{$_url}register/verify-post" method="post">
                            <input type="number"  name="code" class="form-control" placeholder="Enter 4 digit code" style="height: 33px; border: 0px; width: 100%;"  required/>


                           <br>
                           <input type="submit" class="btn btn-primary btn-xl js-scroll-trigger" style="background: purple; padding: 8px ; color: white; width: auto; " value="Verify">
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
{include file="sections/user-footer_new.tpl"}