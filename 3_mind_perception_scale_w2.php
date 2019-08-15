<?php
session_start();
$userId = $_SESSION['uid'];
$user_json = $_SESSION['userObj'];

// avoid jump
// include "db/avoidJump.php";


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
    <!-- <script type="text/javascript" src="js/3_mind_perception_scale/MP_content.js"></script>
    <script type="text/javascript" src="js/3_mind_perception_scale/animation_MP.js"></script> -->
    <!-- my css -->
    <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="css/jspsych.css">

    <link rel="stylesheet" type="text/css" href="css/main_modules.css">
    <link rel="stylesheet" href="css/3_mind_perception_scale/MP_AC.css" rel="stylesheet" />

</head>
<title>NTU Music Study</title>

<body>
    <div id="bg-img"></div>
    <section class="main_block_w2 card">
        <div class="ACCard">
            <div class="form-t1">Survey Check List</div>
            <article class="intro-article">
                <div class="a">
                    The purpose of this questionnaire is to know your setting and condition during the experiment.
                    Please answer the following eight questions. <span class="highlight"> The amount of your
                        compensation
                        for participation in our experiment does NOT depend on your response to the questions. </span>
                    <!-- "&nbsp;" creates space in HTML5 -->
                </div>
            </article>


            <div class="Attention_check_area">
                <div class="Attention_check_descrp">1. What color is the sky? Please answer this incorrectly, on
                    purpose, by
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
                <div class="Attention_check_descrp">2. Did you wear headphones while listening to the clips
                    in the listening session? Please
                    answer honestly. </div>
                <div class="AC_res_block">
                    <input type="radio" class="AC_option" name="AC2" value="Yes">Yes
                    <BR>
                    <input type="radio" class="AC_option" name="AC2" value="No">No
                </div>
            </div>
            <hr>
            <div class="Attention_check_area">
                <div class="Attention_check_descrp">3. Subjects participate in this experiment in many different places.
                    Please
                    tell
                    us about the place where you completed this experiment. Please answer honestly. </div>
                <div class="AC_res_block">
                    <input type="radio" class="AC_option" name="AC3" value="very noisy">I worked on this experiment in
                    a very
                    noisy
                    place
                    <BR>
                    <input type="radio" class="AC_option" name="AC3" value="somewhat noisy">I worked on this experiment
                    in a
                    somewhat
                    noisy place
                    <BR>
                    <input type="radio" class="AC_option" name="AC3" value="somewhat quiet">I worked on this experiment
                    in a
                    somewhat
                    quiet place
                    <BR>
                    <input type="radio" class="AC_option" name="AC3" value="very quiet">I worked on this experiment in
                    a very
                    quiet
                    place
                </div>
            </div>
            <hr>
            <div class="Attention_check_area">
                <div class="Attention_check_descrp">4. Subjects participate in this experiment with many different
                    devices,
                    browsers,
                    and internet connection speeds. Please tell us whether you had difficulty loading the sounds.
                    Please answer
                    honestly.</div>
                <div class="AC_res_block">
                    <input type="radio" class="AC_option" name="AC4" value="all">There were problems loading all of the
                    sounds
                    <BR>
                    <input type="radio" class="AC_option" name="AC4" value="most">There were problems loading most of
                    the sounds
                    <BR>
                    <input type="radio" class="AC_option" name="AC4" value="some">There were problems loading some of
                    the sounds
                    <BR>
                    <input type="radio" class="AC_option" name="AC4" value="no">There were no problems loading any of
                    the sounds
                </div>
            </div>
            <hr>
            <div class="Attention_check_area">
                <div class="Attention_check_descrp">5. How carefully did you complete this survey? Please answer
                    honestly.</div>
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
            </div>
            <hr>
            <div class="Attention_check_area">
                <div class="Attention_check_descrp">6. Did you smoke tobacco (e.g., a puff of cigarette, cigar, pipe,
                    etc)
                    in the <span class="highlight"> past one hour</span>? Please answer honestly.</div>
                <div class="AC_res_block">
                    <input type="radio" class="AC_option" name="AC6" value="Yes">Yes
                    <BR>
                    <input type="radio" class="AC_option" name="AC6" value="No">No
                </div>
            </div>
            <hr>
            <div class="Attention_check_area">
                <div class="Attention_check_descrp">7. Did you consume alcohol in the <span class="highlight"> past 12
                        hours</span>? Please answer honestly.
                </div>
                <div class="AC_res_block">
                    <input type="radio" class="AC_option" name="AC7" value="Yes">Yes
                    <BR>
                    <input type="radio" class="AC_option" name="AC7" value="No">No
                </div>
            </div>
            <hr>
            <div class="Attention_check_area">
                <div class="Attention_check_descrp">8. What is your overall attitude toward modern technology?</span>
                </div>
                <div class="AC_res_block">
                    <input type="radio" class="AC_option" name="AC8" value="1">Extremely negative
                    <BR>
                    <input type="radio" class="AC_option" name="AC8" value="2">Moderately negative
                    <BR>
                    <input type="radio" class="AC_option" name="AC8" value="3">Slightly negative
                    <BR>
                    <input type="radio" class="AC_option" name="AC8" value="4">Neutral
                    <BR>
                    <input type="radio" class="AC_option" name="AC8" value="5">Slightly positive
                    <BR>
                    <input type="radio" class="AC_option" name="AC8" value="6">Moderately positive
                    <BR>
                    <input type="radio" class="AC_option" name="AC8" value="7">Extremely positive
                </div>
            </div>
            <!-- part1 finishing -->
            <form>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="NextToMP_btn g-btn">Next Step</div>
                    </div>
                </div>
                <input type="hidden" id="AC_Response" name="ACResponse">
                <input type="hidden" name="inattentionP3" id="inattention_P3">
            </form>

        </div>

        <!-- ================= Mind Perception Scale =================    -->
        <!-- </section>
    <section class="main_block card"> -->
        <!-- <div class="MPCard">
            <div class="form-t1">Mind Perception</div>
            <article class="intro-article">
            <div class="a">
            Please judge about the perceived mental capacities of eight targets. Each of which was accompanied by a brief description. Please indicate the extent to which you perceived each target to be capable of six capacities on a scale from<span class="highlight"> 0 (not at all) to 6 (very much).</span>
            </div>
            </article>
        <form action="/~hsiang/db/c_mind_perception_scale.php" id="MPscale" method="post"> send to backend -->

        <!-- <div class="clearfix">
                    <button type="button" id="next" class="g-btn MPbutton"   onclick="nextPage();">
                            <span>Next Page<span>
                    </button>
            </div>
            <input type="hidden" id="AC_Response" name="ACResponse">
            <input type="hidden" id="MP_Response" name="Response">
            <input type="hidden" id="MP_ResponseTime" name="ResponseTime">
            <input type="hidden" name="inattentionP3" id="inattention_P3">
        </form>
        </div> -->

    </section>
    <script type="text/javascript">
        // Avoid closing window
        window.onbeforeunload = function () { return "糟糕！別走！" };

        //submit the form
        $(".NextToMP_btn").click(function () {
            // verifying
            var checking = checkRadios(8); //the number should equal to the last item
            if (checking == "finished") {
                // recording
                AC_Response = {
                    AC1: $('input[name=AC1]:checked').val(), // Radio buttons need "checked". 
                    AC2: $('input[name=AC2]:checked').val(), // Unless, it will only get the opition in each question.  
                    AC3: $('input[name=AC3]:checked').val(),
                    AC4: $('input[name=AC4]:checked').val(),
                    AC5: $('input[name=AC5]:checked').val(),
                    AC6: $('input[name=AC6]:checked').val(),
                    AC7: $('input[name=AC7]:checked').val(),
                    AC8: $('input[name=AC8]:checked').val(),
                }

                window.onbeforeunload = null;

                // data inserting
                $("#AC_Response").attr("value", JSON.stringify(AC_Response));
                $("#inattention_P3").attr("value", inattention);
                // form submission
                $("form").attr("action", "db/c_mind_perception_scale.php");
                $("form").attr("method", "POST");
                $("form").submit();

            }
        })

    </script>



</body>

</html>