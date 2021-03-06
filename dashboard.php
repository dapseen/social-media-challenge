<?php session_start();

include 'vendor/autoload.php';

include 'user.php';
include 'user_query.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// URL

$URL = getenv("URL");

$fb = new Facebook\Facebook([
    'app_id' => getenv('FB_ID'), // Replace {app-id} with your app id
    'app_secret' => getenv('FB_SECRET'),
    'default_graph_version' => 'v5.0',
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
$url ="http://".$_SERVER['SERVER_NAME']."/subscription.php/?id=" . $_SESSION['FBID'];

checkUser($_SESSION['FBID'],$_SESSION['FULLNAME'],$_SESSION['EMAIL'],$url);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> My Ranking </title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">S.M.A.C (V1)</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-4x fa-bars"></i> </a>
        <ul class="right hide-on-med-and-down">
            <li><a href="./dashboard.php">My Ranking</a></li>
            <li><a href="./how-it-works.html">How it works</a></li>
            <li><a href="./logout.php">Logout</a></li>
        </ul>

        <ul class="side-nav" id="mobile-demo">
            <li><a href="./dashboard.php">My Ranking</a></li>
            <li><a href="./how-it-works.html">How it works</a></li>
            <li><a href="./logout.php">LogOut</a></li>
        </ul>

    </div>
</nav>
<div class="container">


<p>
    <?php $user_info = user_load($_SESSION['FBID']);
    
    ?>
</p>
<h6>
     Name :<?php echo $user_info[1];  ?>
    <br>
    <?php echo 'Email: ' . $_SESSION['EMAIL']; ?>

</h6>

<h1>
    <?php $number = user_subscribed($user_info[0]);
    if($number >= 1){
        echo $number;
    }else{
        echo 'start inviting people to increase your scores with your unique referral link below';
    }

    ?>
</h1>

<p>
    <!-- The text field -->
    <input type="text" value="<?php echo $URL."/subscription.php?id=".$user_info[0]; ?>" id="myInput">
   
    <a  href="https://api.whatsapp.com/send?phone=&text=<?php echo $URL."/subscription.php?id=".$user_info[0]; ?>%20Visit%20url%20to%20subscribe%20to%20Youtube%20channel%20&source=&data=&app_absent=" class="waves-effect waves-light btn" >Share Via WhatsApp</a>

    <button class="waves-effect waves-light btn" onclick="myFunction()">Click to Copy Link</button>

</p>
    <h6>
        The number above represents total number of people that have successfully <b>subscribed to Dr Isaiah Wealth's Youtube Channel</b> via your unique link
    </h6>
    </h2>
</div>
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script>
    function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();

        /* Copy the text inside the text field */
        document.execCommand("Copy");

        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
    }
    $(".button-collapse").sideNav();
</script>
</body>
</html>
