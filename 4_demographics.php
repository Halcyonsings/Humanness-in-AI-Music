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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- my css and js -->
    <link rel="stylesheet" type="text/css" href="css/main_modules.css">
    <link rel="stylesheet" type="text/css" href="css/4_demographics/demographics_style.css">
    <link rel="stylesheet" type="text/css" href="css/4_demographics/MusicSurvey_style.css">

    <script type="text/javascript" src="js/globalsetting.js"></script>

    <title>NTU Music Study</title>
</head>

<body>
    <div id="bg-img"></div>
    <section class="main_block card">
        <form action="" id="demoForm">
            <div class="MusicAbilityCard">
                <div class="form-t1">Musical Experience and Habit Survey</div>
                <article class="intro-article">
                    <div class="a">
                        The purpose of this questionnaire is to understand your musical experience and listening habit.
                        These may influence your response to music.
                        <!-- "&nbsp;" creates space in HTML5 -->
                    </div>
                    <div class="a">
                        <span class="highlight">Directions:</span> Please click on the bar to the position
                        that best indicates your opinion for each question.
                    </div>
                </article>
                <hr />
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">1. How many hours a week do you listen to music?</div>
                    <input type="text" name="listening_hours" id="ListeningInput">
                    <small id="ListeningHelp" class="form-text text-muted">Please fill in a number</small>
                </div>
                <hr />
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">2. How much do you spend on music (e.g., streaming service,
                        tickets to concerts, etc.) every month? (in US Dollar)</div>
                    <input type="text" name="spend_money" id="SpendingInput">
                    <small id="SpendingHelp" class="form-text text-muted">Please fill in a number</small>
                </div>
                <hr />
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">3. What is your primary source for listening music? (check one)</div>
                    <div class="MAAB_res_block">
                        <ul class="RadioTwoCol">
                            <li><input type="radio" name="source" value="Radio"> Broadcast radio<br></li>
                            <li><input type="radio" name="source" value="CD"> CD<br></li>
                            <li><input type="radio" name="source" value="GooglePlay"> Google Play<br></li>
                            <li><input type="radio" name="source" value="iTunes"> iTunes<br></li>
                            <li><input type="radio" name="source" value="Pandora"> Pandora<br></li>
                            <li><input type="radio" name="source" value="Sirius"> Sirius<br></li>
                            <li><input type="radio" name="source" value="Spotify"> Spotify<br></li>
                            <li><input type="radio" name="source" value="YouTube"> YouTube<br></li>
                            <li><input type="radio" name="source" value="Other"> Other<br></li>
                        </ul>
                    </div>
                </div>
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">4. Do you have a formal musical training diploma?</div>
                    <div class="MAAB_res_block">
                        <div class="b"><input type="radio" name="diploma" value="Yes"> Yes<br></div>
                        <div class="b"><input type="radio" name="diploma" value="No"> No<br></div>
                    </div>
                </div>
                <hr />
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">5. How many years have you learned musical instruments?</div>
                    <input type="text" name="training_yr" id="TrainingInput1">
                    <small id="TrainingHelp" class="form-text text-muted">Please fill in a number</small>
                </div>
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">6. How many minutes have you practiced musical instruments per day?
                    </div>
                    <input type="text" name="training_min" id="TrainingInput2">
                    <small id="TrainingHelp2" class="form-text text-muted">Please fill in the minutes that you
                        practice
                        music per day</small>
                </div>
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">7. What genres of music do you typically willing to listen to? (check
                        all
                        that apply)</div>
                    <div class="MAAB_res_block">
                        <ul class="checkboxes">
                            <li><input type="checkbox" name="genre" id="type1" value="Alternative"> Alternative<br></li>
                            <li><input type="checkbox" name="genre" id="type2" value="Blues"> Blues<br></li>
                            <li><input type="checkbox" name="genre" id="type3" value="Children"> Children's<br></li>
                            <li><input type="checkbox" name="genre" id="type4" value="Classical"> Classical/ Opera<br>
                            </li>
                            <li><input type="checkbox" name="genre" id="type5" value="ClassicRock"> Classic Rock<br>
                            </li>
                            <li><input type="checkbox" name="genre" id="type6" value="Country"> Country<br></li>
                            <li><input type="checkbox" name="genre" id="type7" value="Dance"> Dance<br></li>
                            <li><input type="checkbox" name="genre" id="type8" value="EasyListening"> Easy Listening<br>
                            </li>
                            <li><input type="checkbox" name="genre" id="type9" value="Electronic"> Electronic<br></li>
                            <li><input type="checkbox" name="genre" id="type10" value="Folk"> Folk<br></li>
                            <li><input type="checkbox" name="genre" id="type11" value="Gospel"> Gospel<br></li>
                            <li><input type="checkbox" name="genre" id="type12" value="Metal"> Hard Rock/ Heavy
                                Metal<br></li>
                            <li><input type="checkbox" name="genre" id="type13" value="HipHop"> Hip Hop/ Rap<br></li>
                            <li><input type="checkbox" name="genre" id="type14" value="Latin"> Latin<br></li>
                            <li><input type="checkbox" name="genre" id="type15" value="Musical"> Musical/ Stage<br></li>
                            <li><input type="checkbox" name="genre" id="type16" value="NewAge"> New Age<br></li>
                            <li><input type="checkbox" name="genre" id="type17" value="Oldies"> Oldies<br></li>
                            <li><input type="checkbox" name="genre" id="type18" value="Pop"> Pop<br></li>
                            <li><input type="checkbox" name="genre" id="type19" value="Reggae"> Reggae<br></li>
                            <li><input type="checkbox" name="genre" id="type20" value="RB"> R&B/ Soul<br></li>
                            <li><input type="checkbox" name="genre" id="type21" value="Rock"> Rock<br></li>
                            <li><input type="checkbox" name="genre" id="type22" value="World"> World<br></li>
                        </ul>
                    </div>
                </div>
                <!-- part1 finishing -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="NextToDemo_btn g-btn">Next Page</div>
                    </div>
                </div>
            </div>


            <div class="container-fluid demoCard">
                <p class="form-t1 text-center">Personal Information</p>
                <article class="intro-article">
                    <div class="a">
                        In this last section, please fill in your personal information. Your responses to this
                        survey
                        will be anonymous. Please do not write any identifying information on your answer sheet.
                        After
                        submitting the form, the
                        experiment is complete.
                    </div>
                </article>

                <hr class="long_dv">
                <div class="row item-container">
                    <div class="col-md-4 formLabel">Age</div>
                    <div class="col-md-8" id="age_range">
                        <input type="text" class="form-control" name="age" id="ageInput" placeholder="Age">
                        <small id="ageHelp" class="form-text text-muted">Please fill in a number</small>
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
                    <div class="col-md-4 formLabel">Zip Code</div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="ZipCode" id="postcode" pattern="[0-9]{5}"
                            title="Five digit zip code">
                        <small id="ZipHelp" class="form-text text-muted">Please fill in a 5-digit number</small>
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
                    <div class="col-4 formLabel">
                        <label for="RaceInput">Race</label>
                    </div>
                    <div class="col-8" id="RaceCol">
                        <select name="race" form="demoForm" class="form-control custom-select" id="RaceInput">
                            <option selected>--Please Select--</option>
                            <option>African-American</option>
                            <option>American Indian or Alaskan Native</option>
                            <option>Asian</option>
                            <option>Spanish, Hispanic, or Latino</option>
                            <option>White</option>
                            <option>From multiple races</option>
                            <option>Some other race</option>
                        </select>
                    </div>
                </div>
                <div class="row item-container">
                    <div class="col-md-4 formLabel"> Suggestions of <br> the Experiment<br> (optional)</div>
                    <div class="col-md-8" id="ExpBox">
                        <textarea rows="5" name="ExpComments" id="ExpComments" class="ExpComments"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="g-btn" id="form_submit">Next Page</div>
                </div>
            </div>
            <!-- Recording -->
            <input type="hidden" name="uid" id="user_id">
            <input type="hidden" name="finishTime" id="user_finish_time">
            <input type="hidden" name="Genre_response" id="Genre_response">
            <input type="hidden" name="inattentionP4" id="inattention_P4">
        </form>
    </section>

</body>
<script type="text/javascript" src="js/checkItem.js"></script>
<script type="text/javascript" src="js/4_demo/animation.js"></script>

</html>