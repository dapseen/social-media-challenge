<?php
session_start();
include 'vendor/autoload.php';
//include 'fb-callback.php';

$fb = new Facebook\Facebook([
    'app_id' => '1985095261743329', // Replace {app-id} with your app id
    'app_secret' => '2b9be034265ef3264b96e5d713a0b3eb',
    'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

$redirectUrl = "http://".$_SERVER['SERVER_NAME'] . ':3000'."/fb-callback.php";
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($redirectUrl, $permissions);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> HEllo </title>
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
    <div class="row">
        <?php if(isset($_SESSION['FBID'])):{ ?>

        <p>
            Welcome: <?php echo $_SESSION['FULLNAME']; ?>
        </p>
        <?php }else: ?>

        <h3 style="text-align: center">
            login to participate in the challenge
        </h3>
        <div class="fb-login-button" data-max-rows="1" data-size="large"
             data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true">
        </div>
        <?php
        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
        ?>
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