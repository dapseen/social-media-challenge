<?php session_start();

include 'vendor/autoload.php';
include 'user.php';
$fb = new Facebook\Facebook([
    'app_id' => '1985095261743329', // Replace {app-id} with your app id
    'app_secret' => '2b9be034265ef3264b96e5d713a0b3eb',
    'default_graph_version' => 'v2.2',
]);
try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get('/me?fields=id,name,email', $_SESSION['fb_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$user = $response->getGraphUser();

$_SESSION['FBID'] = $user['id'];
$_SESSION['FULLNAME'] = $user['name'];
$_SESSION['EMAIL'] = $user['email'];
$url ="http://localhost:3000/subscription.php/?id=" . $_SESSION['FBID'];

checkUser($_SESSION['FBID'],$_SESSION['FULLNAME'],$_SESSION['EMAIL'],$url);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> HEllo </title>
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

<h1>
    <?php echo 'Name: ' . $_SESSION['FULLNAME'] ?>
    <br>
    <?php echo 'Email: ' . $_SESSION['EMAIL']; ?>

</h1>
<p>
    http://localhost:3000/subscription.php?id=1234
</p>
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script>
    $(".button-collapse").sideNav();
</script>
</body>
</html>
