
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123150765-1"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Pinnovatech System">
    <title>{$_c['CompanyName']}</title>
    <meta name="description" charset="utf-8" content="">
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
background-size: cover;">


    <!-- Navigation -->
    <header class=" " style="color: white;align-content: center; text-align: center;">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-12 ">
                    <br>
                    <center> <a href="{$_url}/main"><img src="{$_c['company_logo']}" width="40%;"></a></center>
                    <br>
                    <!--
                    {if $mac==""}
                    
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         
                     <i>   Hello there , Seems you want to login in manually...<br>
                        Have you connected to our Network? Click redirect button if Yes.</i>

                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                         <a href="http://17.17.17.1" class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:orange;">Redirect</a>
                    </div>
                    {/if}

                    -->
                        <h1>
                    <a class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:#0056b3; padding: 12px ;width: 30%;  " href="{$_url}login/{$mac}">Sign In </a>
                    <a class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none;background: firebrick; color:white; padding: 12px ;width: 30%;  " href="{$_url}register">Register</a>
                        </h1>
                    <br><br>
                   
                    Our packages <br>

                    <br>
                    <div style="line-height: 2.5;">
                        {$i=0}
                        {foreach $p as $che}
                            {$i=$i+1}
                            <a href="#" class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:
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
                            {/if}; font-size: 13px;   " >{$che['name_plan']} @ {$che['price']}/-</a>
                        {/foreach}

                    </div>
                   
                    <br>
                    <a href="tel:{$_c['phone']}" class="btn btn-light btn-xl js-scroll-trigger" style="text-transform: none; color:white; background:limegreen; padding:12px;width: 25%;  " >Call Us</a>
                    <br><br>
                    <div style="font-size: 13px;">  <input type="checkbox" name="agree" checked disabled><a>Accept Our Terms & Conditions</a></div>
             </div>
            </div>
        </div>
    </header>
    {include file="sections/user-footer_new.tpl"}