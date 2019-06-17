
<?php
session_start();
$userId = $_SESSION['uid'];
$user_json = $_SESSION['userObj'];

// avoid jump
// include "db/avoidJump.php";


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
    <link rel="stylesheet" type="text/css" href="css/4_demographics/demographics_style.css">
    <link rel="stylesheet" type="text/css" href="css/4_demographics/MusicSurvey_style.css">

    <script type="text/javascript" src="js/globalsetting.js"></script>
    <script type="text/javascript">
        // 4-digits number generator
        Mturkcode = Math.floor(1000 + Math.random() * 9000);





    </script>
    <style>
        img {
    height: 30px;
    margin: 10px;
}


    </style>
    <title>NTU Music Study</title>
</head>

<body>
    <div id="bg-img"></div>
    <section class="main_block card">

        <div class="MusicAbilityCard">
            <div class="form-t1">Musical Ability, Attitude, and Beliefs Survey</div>
            <article class="intro-article">
                <div class="a">
                The purpose of this questionnaire is to understand (1) your perception of musical ability (2) attitude toward music (3) beliefs and expectations on music.
                 These may influence your response to music.
                    <!-- "&nbsp;" creates space in HTML5 -->
                </div>
                <div class="a">
                    <span class="highlight">Directions:</span> Please drag the bar on the scale to the position
                    that best indicates your opinion for each question.
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
                    <div class="NextToDemo_btn g-btn">Next Page</div>
                </div>
            </div>
        </div>

        <form action="" id="demoForm">
            <div class="container-fluid demoCard">
                <p class="form-t1 text-center">Personal  Information</p>
                <article class="intro-article">
                    <div class="a">
                        In this last section, please fill in your personal information. Your responses to this survey
                        will be anonymous. Please do not write any identifying information on your answer sheet. You
                        have
                        to answer
                        all the questions except the last one. After submitting the form, the
                        experiment is complete.
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
                        <input type="text" class="form-control" name="training_yr" id="TrainingInput1" placeholder="Training Years (e.g., 4)">
                        <small id="TrainingHelp" class="form-text text-muted">Please fill in a number</small>
                    </div>
                </div>
                <div class="row item-container">
                    <div class="col-md-4 formLabel">Practicing<br>on Music</div>
                    <div class="col-md-8" id="Training_range">
                        <input type="text" class="form-control" name="training_min" id="TrainingInput2" placeholder="Practicing Minutes (e.g., 60)">
                        <small id="TrainingHelp" class="form-text text-muted">Please fill in the minutes that you practice
                            music per day</small>
                    </div>
                </div>
                <div class="row item-container">
                    <div class="col-4 formLabel">
                        <label for="eduInput">Education Level</label>
                    </div>
                    <div class="col-8" id="edu">
                        <select name="education" form="demoForm" class="form-control custom-select" id="eduInput">
                            <option selected>--Please Select--</option>
                            <option>Junior high school or under</option>
                            <option>Senior high school</option>
                            <option>Bachelor degree</option>
                            <option>Graduate school</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="row item-container">
                    <div class="col-md-4 formLabel">E-mail</div>
                    <div class="col-md-8" id="age_range">
                        <input type="email" class="form-control" name="email" id="emailInput" placeholder="E-mail">
                    </div>
                </div> -->
                <div class="row item-container">
                    <div class="col-md-4 formLabel"> Suggestions of <br> the Experiment<br> (optional)</div>
                    <div class="col-md-8" id="ExpBox">
                        <textarea rows="5" name="ExpComments" id="ExpComments" class="ExpComments"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="g-btn NextToFinal_btn">Next Page</div>
                </div>
            </div>

            <div class="container-fluid endingCard">
                <p class="form-t1 text-center">The End</p>
                <article class="intro-article">
                    <div class="a">The experiment is now complete. Thank you for participating in our experiment. To
                        get the reward, please enter the 4-digit number below on the Amazon Mechanical Turk then
                        return to this page and<span class="highlight"> click the submit button.</span>
                        <br>
                    </div>
                </article>
                <span class="highlight">
                    <script type="text/javascript">document.write(Mturkcode)</script></span><br>
                <br>
                <br>
                <br>
                Modeling & Imformatics Lab<br>
                Department of Psychology, NTU<br>
                Address: No. 1, Sec. 4, Roosevelt Rd., Taipei 10617, Taiwan (R.O.C.)<br>
                <a href="https://www.facebook.com/ntumilab/"><img src="asset/fb_icon.png" /></a>
                <a href="mailto:R05227104@ntu.edu.tw?subject=NTU Music Study"><img src="asset/email_icon.png" /></a>
                <br>
                <div class="row justify-content-center">
                    <div class="g-btn" id="form_submit">Submit</div>
                </div>
            </div>
            <!-- Recording -->
            <input type="hidden" name="uid" id="user_id">
            <input type="hidden" name="MturkToken" id="Mturk_token">
            <input type="hidden" name="finishTime" id="user_finish_time">
            <input type="hidden" name="MAABResponse" id="MAAB_response">
            <input type="hidden" name="inattentionP4" id="inattention_P4">
        </form>


</body>
<script type="text/javascript" src="js/checkItem.js"></script>
<script type="text/javascript" src="js/4_demo/animation.js"></script>

</html>