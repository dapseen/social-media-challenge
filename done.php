<?php

include 'dbconfig.php';

//query logged in user

$jsCount = $_POST['jscount'];
$idcount = $_POST['idcount'];
$phpCount = $_POST['phpcount'];

$totalCount = $jsCount + $phpCount;

if($totalCount >= 4){
    $countNUmber = 1;
    //perform insert
    $sql = "INSERT INTO count (UID,subscribers,time_created) VALUES ('$idcount','$countNUmber',current_time )";
    $conn->query($sql);
    $congrats = "Thanks for subscribing to our Channels. Please invite your friends";
}else{
    echo 'It seems you have not Subscribed to the 3 channels, Please try again';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> THanks For Subscribing </title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=1985095261743329&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">SCM</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-4x fa-bars"></i> </a>
        <ul class="right hide-on-med-and-down">
            <li><a href="./dashboard.php">My Ranking</a></li>
            <li><a href="./how-it-works.html">How it works</a></li>
            <li><a href="./logout.php">Logout</a></li>

        </ul>

        <ul class="side-nav" id="mobile-demo">
            <li><a href="index.php">Login</a></li>
            <li><a href="how-it-works.html">How it works</a>
        </ul>

    </div>
</nav>
<div class="container">
    <h4>
        <?php echo $congrats; ?>
    </h4>

    <a href="index.php">Visit here to Become an Ambassador and help spread the Gospel</a>
</div>


<script>
    $(".button-collapse").sideNav();
</script>
</body>
</html>