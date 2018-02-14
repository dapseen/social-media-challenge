<?php session_start();
$count = $_SESSION['views'] = 1;
echo $count + 1;

?>


<html lang="en" xmlns="http://www.w3.org/1999/html">
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
<div class="container">

<div id="sub1">
    <input type="button" value="SUB1">
</div>
<br>
<div id="sub2">
    <input type="button" value="SUB2">
</div>
<br>
<div id="sub3">
    <input type="button" value="SUB3">
</div>
    <p id="result"></p>
</div>

    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script>
    $(".button-collapse").sideNav();

    //click function
    (function (){
        var count = 0;
        $('#sub1,#sub2,#sub3').click(function(){
            count++ ;
            document.getElementById('result').innerHTML = count;
        })
    })();

</script>
<?php
if( isset($_SESSION['views']) && $_SESSION['views'] > 3){
unset($_SESSION['views']);
}
?>
</body>
</html>
