<?php
session_start();
$userId = $_SESSION['uid'];
// $user_json = $_SESSION['userObj'];

// avoid jump
include "db/avoidJump.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115062914-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-115062914-1');
    </script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap4 CSS&JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- my css and js -->
    <link rel="stylesheet" type="text/css" href="css/main_modules.css">
    <link rel="stylesheet" type="text/css" href="css/demographics_style.css">
    <link rel="stylesheet" type="text/css" href="css/MusicSurvey_style.css">

    <script type="text/javascript" src="js/globalsetting.js"></script>
    <script type="text/javascript" src="js/quesBasicFunctions.js"></script>
    <script type="text/javascript" src="js/checkItem.js"></script>

    <title>NTU Music Study</title>
</head>

<body>
    <div id="bg-img"></div>
    <section class="main_block card">

        <div class="MusicAbilityCard">
            <div class="form-t1">Musical Ability, Attitude, and Beliefs Survey</div>
            <article class="intro-article">
                <div class="a">
                    The purpose of this questionnaire is to describe your perception of your musical ability, attitude
                    toward music, and beliefs
                    and expectations about music that may influence your response to music.
                    <!-- "&nbsp;" creates space in HTML5 -->
                </div>
                <div class="a">
                    <span class="highlight">Directions:</span> Please place the mark on the scale that best indicates
                    your
                    position between the two sides on each question.
                </div>
            </article>
            <div class="anchor_opinion_area">
                <div class="anchor_descrp">1. When I listen to a musical performance:</div>
                <div class="anchor_res_block">
                    <span class="labal_polar1">I cannot give a specific label to any musical feature</span>
                    <input class="anchor_range" type="range" name="item1" id="MAAB1" min="0" max="100" step="0.01"
                        value="50" data-check="">
                    <span class="labal_polar2">I can recognize elements like harmonic progressions, motive
                        transformations,
                        and formal features</span>
                </div>
            </div>
            <hr>
            <div class="anchor_opinion_area">
                <div class="anchor_descrp">2. I attend concerts:</div>
                <div class="anchor_res_block">
                    <span class="labal_polar1">rarely</span>
                    <input class="anchor_range" type="range" name="item2" id="MAAB2" min="0" max="100" step="0.01"
                        value="50" data-check="">
                    <span class="labal_polar2">at least twice a month</span>
                </div>
            </div>
            <hr>
            <div class="anchor_opinion_area">
                <div class="anchor_descrp">3. I choose to listen to recorded music:</div>
                <div class="anchor_res_block">
                    <span class="labal_polar1">rarely</span>
                    <input class="anchor_range" type="range" name="item3" id="MAAB3" min="0" max="100" step="0.01"
                        value="50" data-check="">
                    <span class="labal_polar2">at every opportunity</span>
                </div>
            </div>
            <hr>
            <div class="anchor_opinion_area">
                <div class="anchor_descrp">4. The music I choose to listen to:</div>
                <div class="anchor_res_block">
                    <span class="labal_polar1">is primarily of one style</span>
                    <input class="anchor_range" type="range" name="item4" id="MAAB4" min="0" max="100" step="0.01"
                        value="50" data-check="">
                    <span class="labal_polar2">includes music of all popular and classical styles</span>
                </div>
            </div>
            <hr>
            <div class="anchor_opinion_area">
                <div class="anchor_descrp">5. The purpose of "classical" music is to:</div>
                <div class="anchor_res_block">
                    <span class="labal_polar1">move the emotion</span>
                    <input class="anchor_range" type="range" name="item5" id="MAA5" min="0" max="100" step="0.01" value="50"
                        data-check="">
                    <span class="labal_polar2">stimulate the mind</span>
                </div>
            </div>
            <!-- part1 finishing -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="NextToDemo_btn g-btn">Next Step</div>
                </div>
            </div>
        </div>

        <form action="" id="demoForm">
            <div class="container-fluid demoCard">
                <p class="form-t1 text-center">Basic Information Survey</p>
                <article class="intro-article text-center">
                    <div class="a">
                        In the last session, please fill in some information. All data will implement de-idenficattion,
                        which means other people
                        could not retrieve the data with your personal information. After submit the form, the
                        experiment
                        is finished.
                    </div>
                </article>

                <hr class="long_dv">
                <div class="row item-container">
                    <div class="col-md-4 formLabel">Age</div>
                    <div class="col-md-8" id="age_range">
                        <input type="text" class="form-control" name="age" id="ageInput" placeholder="Age">
                        <small id="ageHelp" class="form-text text-muted">Please Fill in a number</small>
                    </div>
                </div>
                <div class="row item-container">
                    <div class="col-4 formLabel">Gender</div>
                    <div class="col-8" id="sex_radio">
                        <label for="sexInput_male" class="radioLabel">Male</label>
                        <input type="radio" name="sex" id="sexInput_male" value="1">
                        <label for="sexInput_female" class="radioLabel">Female</label>
                        <input type="radio" name="sex" id="sexInput_female" value="2">
                        <label for="sexInput_other" class="radioLabel">Other</label>
                        <input type="radio" name="sex" id="sexInput_other" value="3">
                    </div>
                </div>
                <div class="row item-container">
                    <div class="col-md-4 formLabel">Years of Musical<br> Training</div>
                    <div class="col-md-8" id="Training_range">
                        <input type="text" class="form-control" name="training" id="TrainingInput" placeholder="Training Years">
                        <small id="TrainingHelp" class="form-text text-muted">Please Fill in a number</small>
                    </div>
                </div>
                <div class="row item-container">
                    <div class="col-4 formLabel">
                        <label for="eduInput">Education level</label>
                    </div>
                    <div class="col-8" id="edu">
                        <select name="education" form="demoForm" class="form-control custom-select" id="eduInput">
                            <option selected>--Please Select--</option>
                            <option>Under junior high school</option>
                            <option>Senior high school</option>
                            <option>Bachelor degree</option>
                            <option>Graduate school</option>
                        </select>
                    </div>
                </div>
                <div class="row item-container">
                    <div class="col-md-4 formLabel">E-mail</div>
                    <div class="col-md-8" id="age_range">
                        <input type="email" class="form-control" name="email" id="emailInput" placeholder="E-mail">
                    </div>
                </div>
                <div class="row item-container">
                    <div class="col-md-4 formLabel"> Suggestions <br> of the <br> Experiment (optional)</div>
                    <div class="col-md-8" id="ExpBox">
                        <textarea rows="5" name="ExpComments" id="ExpComments" class="ExpComments"></textarea>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="g-btn" id="form_submit">Submit</div>
                </div>
            </div>
            <!-- Recording -->
            <input type="hidden" name="uid" id="user_id">
            <input type="hidden" name="finishTime" id="user_finish_time">
            <input type="hidden" name="MAABResponse" id="MAAB_response">
            <input type="hidden" name="inattentionP4" id="inattention_P4">
        </form>

        <!-- initializing -->
        <script type="text/javascript">
            // Avoid closing window
            window.onbeforeunload = function () { return "糟糕！別走！" };

            // Display setting
            $(".demoCard").css("display", "none");



            // Anchor
            $('input[class=anchor_range]').change(function () {
                $(this).attr("data-check", "on");
                // console.log($(this).attr("id"));
            })

            // Go to the second part
            $('.NextToDemo_btn').click(function () {
                // verifying
                var checking = checkRange(5); //the number should equal to the last item
                if (checking == "finished") {
                    // recording
                    MAAB_response = {
                        MAAB1: $('input[id=MAAB1]').val(),
                        MAAB2: $('input[id=MAAB2]').val(),
                        MAAB3: $('input[id=MAAB3]').val(),
                        MAAB4: $('input[id=MAAB4]').val(),
                        MAAB5: $('input[id=MAAB5]').val(),

                    }
                    // animation
                    $('.MusicSurveyCard').addClass("hiding");
                    $(".demoCard").addClass("showing");
                    $('html, body').animate({
                        scrollTop: $("body").offset().top
                    }, 700);
                    setTimeout(function () {
                        $(".MusicAbilityCard").hide();
                        $(".demoCard").show();
                        // $(window).scrollTop(0);
                    }, 700)
                }
            });

            //submit the form
            $("#form_submit").click(function () {
                window.onbeforeunload = null;
                // form validating
                var check = checkAllDemo();
                if (check == "allFinished") {
                    // record finishing time
                    var time = new Date();
                    var time_info = time.toDateString() + "/" + time.toTimeString();
                    // data inserting
                    $("#MAAB_response").attr("value", JSON.stringify(MAAB_response));

                    // $("#hoverTimeRec").attr("value", hover_time_record.toString());
                    $("#user_finish_time").attr("value", time_info);
                    // $("user_id").attr("value", uid);

                    // form submission
                    $("form").attr("action", "db/d_demo.php");
                    $("form").attr("method", "POST");
                    $("form").submit();
                }
            })




        </script>
</body>

</html>