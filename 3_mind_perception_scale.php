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
  <script type="text/javascript" src="js/checkItem.js"></script> 
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
    <div class="ACCard">    
        <div class="form-t1">Survey Check List</div>
        <article class="intro-article">
            <div class="a">
                The purpose of this questionnaire is to assess your setting during the experiment, including five questions.
                <!-- "&nbsp;" creates space in HTML5 -->
            </div>
        </article>


        <div class="Attention_check_area">
            <div class="Attention_check_descrp">1. What color is the sky? Please answer this incorrectly, on purpose, by
                choosing RED instead of blue.</div>
            <div class="AC_res_block">
                <input type="radio" class="AC_option" name="AC1" value="Green">Green
                <BR>
                <input type="radio" class="AC_option" name="AC1" value="Red">Red
                <BR>
                <input type="radio" class="AC_option" name="AC1" value="Blue">Blue
                <BR>
                <input type="radio" class="AC_option" name="AC1" value="Yellow">Yellow

            </div>
        </div>
        <hr>
        <div class="Attention_check_area">
            <div class="Attention_check_descrp">2. Did you wear headphones while listening to the sounds in this HIT? Please
                answer honestly. <span class="highlight">Your payment does NOT depend on your response to this question.</span></div>
            <div class="AC_res_block">
                <input type="radio" class="AC_option" name="AC2" value="Yes">Yes
                <BR>
                <input type="radio" class="AC_option" name="AC2" value="No">No
            </div>
        </div>
        <hr>
        <div class="Attention_check_area">
            <div class="Attention_check_descrp">3. Turkers are working on this HIT in many different places. Please tell
                us about the place where you worked on this HIT. Please answer honestly. <span class="highlight">Your payment
                    does NOT depend on your response to this question.</span></div>
            <div class="AC_res_block">
                <input type="radio" class="AC_option" name="AC3" value="very noisy">I worked on this HIT in a very noisy
                place
                <BR>
                <input type="radio" class="AC_option" name="AC3" value="somewhat noisy">I worked on this HIT in a somewhat
                noisy place
                <BR>
                <input type="radio" class="AC_option" name="AC3" value="somewhat quiet">I worked on this HIT in a somewhat
                quiet place
                <BR>
                <input type="radio" class="AC_option" name="AC3" value="very quiet">I worked on this HIT in a very quiet
                place.
            </div>
        </div>
        <hr>
        <div class="Attention_check_area">
            <div class="Attention_check_descrp">4. Turkers are working on this HIT with many different devices, browsers,
                and internet connections. Please tell us about whether you had difficulty loading the sounds. Please answer
                honestly. <span class="highlight">Your payment does NOT depend on your response to this question.</span></div>
            <div class="AC_res_block">
                <input type="radio" class="AC_option" name="AC4" value="all">There were problems loading all of the sounds
                <BR>
                <input type="radio" class="AC_option" name="AC4" value="most">There were problems loading most of the sounds
                <BR>
                <input type="radio" class="AC_option" name="AC4" value="some">There were problems loading some of the sounds
                <BR>
                <input type="radio" class="AC_option" name="AC4" value="no">There were no problems loading any of the sounds
            </div>
        </div>
        <hr>
        <div class="Attention_check_area">
            <div class="Attention_check_descrp">5. How carefully did you complete this survey? Please answer honestly. <span
                    class="highlight">Your payment does NOT depend on your response to this question.</span></div>
            <div class="AC_res_block">
                <input type="radio" class="AC_option" name="AC5" value="Not at all">Not at all carefully
                <BR>
                <input type="radio" class="AC_option" name="AC5" value="Slightly">Slightly carefully
                <BR>
                <input type="radio" class="AC_option" name="AC5" value="Moderately">Moderately carefully
                <BR>
                <input type="radio" class="AC_option" name="AC5" value="Quite">Quite carefully
                <BR>
                <input type="radio" class="AC_option" name="AC5" value="Very">Very carefully
            </div>
        <!-- part1 finishing -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="NextToMP_btn g-btn">Next Step</div>
                </div>
            </div>
        </div>
    </div>
        
        
    <!-- </section>
    <section class="main_block card"> -->
        <div class="MPCard">
            <div class="form-t1">Mind Perception</div>
            <article class="intro-article">
            <div class="a">
            Please judge about the perceived mental capacities of eight targets. Each of which was accompanied by a brief description. Please indicate the extent to which you perceived each target to be capable of six capacities on a scale from<span class="highlight"> 0 (not at all) to 6 (very much).</span>
            </div>
            </article>
        <form action="/~hsiang/db/c_mind_perception_scale.php" id="MPscale" method="post"> <!-- send to backend -->

            <div class="clearfix">
                    <button type="button" id="next" class="g-btn MPbutton"   onclick="nextPage();">
                            <span>Next Page<span>
                    </button>
            </div>
            <input type="hidden" id="AC_Response" name="ACResponse">
            <input type="hidden" id="MP_Response" name="Response">
            <input type="hidden" id="MP_ResponseTime" name="ResponseTime">
        </form>
        </div>
    </section>
<script type="text/javascript">
    // Avoid closing window
    window.onbeforeunload = function(){return "糟糕！別走！"};
    
    // Display setting
    $(".MPCard").css("display", "none");


    // Go to the second part
    $('.NextToMP_btn').click(function () {
                // verifying
                var checking = checkRadios(5); //the number should equal to the last item
                if (checking == "finished") {
                    // recording
                    AC_Response = {
                        AC1: $('input[name=AC1]').val(),
                        AC2: $('input[name=AC2]').val(),
                        AC3: $('input[name=AC3]').val(),
                        AC4: $('input[name=AC4]').val(),
                        AC5: $('input[name=AC5]').val(),

                    }
                    // animation
                    $('.ACCard').addClass("hiding");
                    $(".MPCard").addClass("showing");
                    $('html, body').animate({
                        scrollTop: $("body").offset().top
                    }, 700);
                    setTimeout(function () {
                        $(".ACCard").hide();
                        $(".MPCard").show();
                        // $(window).scrollTop(0);
                    }, 700)
                }
            });

</script>


</body>
</html>