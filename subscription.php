<?php session_start();
if (!isset($_SESSION['views'])) {
    $_SESSION['views'] = 0;
}

$_SESSION['views'] = $_SESSION['views']+1;


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
        <a href="#!" class="brand-logo">S.M.C(V 1)</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-4x fa-bars"></i> </a>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="./index.php">Login</a></li>
            <li><a href="./how-it-works.html">How it works</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <a href="https://www.youtube.com/channel/UCcbjsobn9lYHUM5S7qQgU5A?sub_confirmation=1"
    id="sub1">
        Subscribe to Isaiah wealth
    </a>
    <br>
    <br>
<br>
    <a href="https://www.youtube.com/channel/UCyNwPPMr09qhVAqwHrTWvJQ?sub_confirmation=1"
       id="sub2">
        Click here to subscribe to Spirit and Bride TV
    </a>

    <br>
    <br>
<br>
    <a href="https://www.youtube.com/channel/UCAAbIfFN-vy1PIo2Mdl5evg?sub_confirmation=1"
       id="sub3">
        Click here to subscribe to Gospel pillars Church Channel
    </a>


    <p id="result"></p>

    <p>
        Click on done button below
    </p>

    <form action="done.php" method="post">
        <input type="hidden" id="jsresult" name="jscount" value="">
        <input type="hidden" id="idcount" name="idcount" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" id="phpresult" name="phpcount" value="<?php echo $_SESSION['views']; ?>">
        <input type="submit" class="waves-effect waves-light btn" value="Done">
    </form>
</div>

    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script>

    $(".button-collapse").sideNav();

    //click function
    (function (){
        var count = 0;
        $('#sub1,#sub2,#sub3').click(function(){
            count++;
            console.log(count);
            window.localStorage.clickCount = count;
            document.getElementById('jsresult').value = window.localStorage.clickCount;
        });
        $('a').click(function() {
            window.open($(this).attr('href'),'title', 'width=800, height=700');
            return false;
        });
    })();

</script>
<?php
if( isset($_SESSION['views']) && $_SESSION['views'] > 2){
unset($_SESSION['views']);
}
?>
</body>
</html>
