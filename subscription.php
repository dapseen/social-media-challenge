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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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


<div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"> 7 PASTORS that BLESSED My Life: Part 1- A Generation That Curses Fathers</h4>
      </div>
      <div class="card-body">
      <p>
        <video width="320" height="240" autoplay>
            <source src="https://res.cloudinary.com/dtjf3tix6/video/upload/c_fill,w_320/v1588333536/scm/WhatsApp_Video_2020-05-01_at_12.04.14_PM.mp4" type="video/mp4">
            <source src="https://res.cloudinary.com/dtjf3tix6/video/upload/v1588333536/scm/WhatsApp_Video_2020-05-01_at_12.04.14_PM.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video>
      </p>
        <a href="https://www.youtube.com/watch?v=Wd_B6FFyQUs&t=2036s?sub_confirmation=1" id="sub1" class="btn btn-lg btn-block btn-primary">Watch Now</a>
      </div>
    </div>




    <a href=""
    id="sub1">
   
    </a>
    <br>
    <br>
<br>
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
        $('#sub1').click(function(){
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
if( isset($_SESSION['views']) && $_SESSION['views'] >= 2 ){
$_SESSION['views'] = 0;
}
?>
</body>
</html>
