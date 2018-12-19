<?php
// Start the session
if(!$_SESSION){ session_start(); }

//import php function
// require_once "database/avoidJump.php";

date_default_timezone_set( "Asia/Taipei" );
$_SESSION['startTime'] = date("Y-m-d H:i:s");
?>

<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <!-- Notice: jQuery-UI should put behind jQuery -->
  <!-- slide bar need jqueryUI -->
  <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="jspsych.js"></script>
  <!-- my js -->
  <script type="text/javascript" src="js/globalsetting.js"></script> 
  <script type="text/javascript" src="js/3_mind_perception_scale/MP.js"></script>   
  <!-- my css -->
  <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
  <link rel="stylesheet" href="css/jspsych.css">

  <link rel="stylesheet" type="text/css" href="css/main_modules.css">
  <link rel="stylesheet" href="css/MP_range_bar.css" rel="stylesheet" />

<style type="text/css">


</style>
</head>
<title>NTU Music Study</title>
<body>
    <div id="bg-img"></div>
    <section class="main_block card"> 
        <div class="form-t1">Mind Perception</div>
        <article class="intro-article">
        <div class="a">
        Please judge about the perceived mental capacities of eight targets. Each of which was accompanied by a brief description. Please indicate the extent to which you perceived each target to be capable of six capacities on a scale from<span class="highlight"> 0 (not at all) to 6 (very much).</span>
        </div>
        </article>
    </section>
    <form action="/~hsiang/db/c_mind_perception_scale.php" id="MPscale" method="post"> <!-- send to backend -->




        <div class="clearfix">
                    <button type="button" id="next" class="g-btn MPbutton"   onclick="nextPage();">
                            <span>Next Page<span>
                    </button>
        </div>
        <input type="hidden" id="Response" name="Response">
        <input type="hidden" id="ResponseTime" name="ResponseTime">
    </form>
<script type="text/javascript">
  // Avoid closing window
  window.onbeforeunload = function(){return "糟糕！別走！"};



</script>


</body>
</html>