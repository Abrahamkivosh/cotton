
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123150765-1"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Pinnovatech System">
    <title>{$_c['CompanyName']}</title>
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
                  <!--  <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{$_url}home/help">Help</a>
                    </li>
                    -->
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
<header  class=" " style="color: white;align-content: center; text-align: center;">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-12 ">
                <br><br>
                <center> <img src="{$_c['company_logo']}" width="40%;"></center>
                <br><br>
                
                Get fast and affordable internet packages from here
                <br>
                <br>
                   {if isset($notify)}

                        <center>{$notify}</center>

                    {/if}
                <div id="showprogress" style="line-height: 2.5;display:none;">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        You have clicked your prefered package, Kindly wait.....
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
                

                <div id="package" style="line-height: 2.5;">
                    {$i=0}
                    {foreach $p as $che}
                        {$i=$i+1}
                        <a href="
                        {if $p->type=="Hotspot"}
                        {$_url}voucher/bundle_purchase/{$che['id']}/{$mac}
                        {/if}
                        " class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:
                        {if $i<=3}
                        purple;
                        {elseif $i<=7 and $i>3}
                                orange;
                        {elseif $i<=10 and $i>7}
                                #0056b3;
                        {else}
                                purple;
                        {/if}
                         padding:3px 3px ;width:      {if $i<=3}
                                auto;
                        {elseif $i<=6 and $i>3}
                                50%;
                        {else}
                                70%;
                        {/if}; font-size: 13px;" onclick="document.getElementById('package').style.display = 'none';document.getElementById('showprogress').style.display = 'block';">{$che['name_plan']} @ {$che['price']}/-</a>
                    {/foreach}

                </div>
                <br>
                <a href="tel:{$_c['phone']}" class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:limegreen; padding:12px;width: 25%;  " >Call Us</a>
                <br><br>

            </div>
        </div>
    </div>
</header>
{include file="sections/user-footer_new.tpl"}