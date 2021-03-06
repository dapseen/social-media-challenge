<?php
session_start();
include 'vendor/autoload.php';
//include 'fb-callback.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$fb = new Facebook\Facebook([
    'app_id' => getenv('FB_ID'), // Replace {app-id} with your app id
    'app_secret' => getenv('FB_SECRET'),
    'default_graph_version' => 'v5.0',
]);

$helper = $fb->getRedirectLoginHelper();

$redirectUrl = getenv("URL")."/fb-callback.php";
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($redirectUrl, $permissions);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> SMAC</title>
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
        <a href="#!" class="brand-logo">S.M.A.C(V1)</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-4x fa-bars"></i> </a>
        <?php if(isset($_SESSION['FBID'])){ ?>
        <ul class="right hide-on-med-and-down">
            <li><a href="./dashboard.php">My Ranking</a></li>
            <li><a href="./how-it-works.html">How it works</a></li>
            <li><a href="./logout.php">Log out</a></li>
        </ul>

        <ul class="side-nav" id="mobile-demo">
            <li><a href="./dashboard.php">My Ranking</a></li>
            <li><a href="./how-it-works.html">How it works</a></li>
            <li><a href="./logout.php">Logout</a></li>
        </ul>
        <?php }; ?>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="./how-it-works.html">How it works</a></li>
        </ul>

    </div>
</nav>
<div class="container">
    <div class="row">
        <?php if(isset($_SESSION['FBID'])):{ ?>

        <p>
            Welcome: <?php echo $_SESSION['FULLNAME']; ?>
        </p>
        <?php }else: ?>

        <h3 style="text-align: center">
            login to participate in the challenge
        </h3>
            <?php
            echo '<a href="' . htmlspecialchars($loginUrl) . '"><img src="./assets/img/fb_image.jpg" alt="">';
            ?>
            </a>
        <?php endif; ?>
    </div>
</div>


<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script>
    $(".button-collapse").sideNav();
</script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1985095261743329',
            cookie     : true,
            xfbml      : true,
            version    : 'v2.12'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>