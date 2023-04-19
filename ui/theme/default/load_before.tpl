
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Pinnovatech System Business directory">
    <title>{$_title}</title>
    <meta name="description" charset="utf-8" content="Pinnovatech Systems Business directory">
    <meta name="keywords" content="Pinnovatech Systems Business directory">
    <!-- Bootstrap core CSS -->
    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{$_theme}/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{$_theme}/css/magnific-popup.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <script src="{$_theme}/loadme.js"></script>
    <link href="{$_theme}/css/creative.css" rel="stylesheet">
<script>
// this function must be defined in the global scope
window.fadeOut = function(obj) {
    $(obj).fadeOut(4000);

}
var timer = setTimeout(function() {
            window.location='{$_url}login/login_now'
        }, 4000);
</script>
</head>

<body id="page-top"  style="
background-color: orange;
">

    <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-5 mx-auto" >
           
              
            <br>
            <br>
            <br>
<div id="image">
    <center>  <img id="preload" onload="fadeOut(this)" src="{$_c['company_logo']}" style="width:60%;" /></center>
</div>


              
            </div>
        </div>
    </header>
{include file="sections/user-footer_new.tpl"}
