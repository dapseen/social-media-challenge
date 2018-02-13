<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Subscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">SCM</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-4x fa-bars"></i> </a>
        <ul class="right hide-on-med-and-down">
            <li><a href="sass.html">About Challenge</a></li>
            <li><a href="badges.html">Gospel Pillars</a></li>
            <li><a href="collapsible.html">Dr. Isaiah Wealth</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">About Challenge</a></li>
            <li><a href="badges.html">Gospel Pillars</a></li>
            <li><a href="collapsible.html">Dr. Isaiah Wealth</a></li>
        </ul>

    </div>
</nav>


<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script>
    $(".button-collapse").sideNav();
</script>
</body>
</html>
