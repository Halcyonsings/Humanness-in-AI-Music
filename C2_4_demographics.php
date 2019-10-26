<?php
session_start();
$userId = $_SESSION['uid'];
$user_json = $_SESSION['userObj'];

// avoid jump
// include "db/C2_avoidJump.php";

// Assign a MD5 code from PHP
$csvfile = "md5 Mturk Code.csv";
$file_handle = fopen($csvfile, "r");
$line_of_text = array();

while (!feof($file_handle) ) {
    $line_of_text[] = fgetcsv($file_handle, 1024);
}
fclose($file_handle);

// Random Row
$random_row = array_rand($line_of_text);
// echo $line_of_text[$random_row][0];
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

    <script type="text/javascript">

        Mturkcode = <?php echo json_encode($line_of_text[$random_row][0]);?>;
        // alert(Mturkcode);

    </script>
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
                    <div class="anchor_descrp">3. What is your primary source of music? (check one)</div>
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
                <hr />
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">4. Please indicate your level of experience with music performance.</div>
                    <div class="MAAB_res_block">
                        <div class="b"><input type="radio" name="self_image" value="Professional Musician"> Professional Musician <br></div>
                        <div class="b"><input type="radio" name="self_image" value="Conservatory Level"> Conservatory Level <br></div>
                        <div class="b"><input type="radio" name="self_image" value="Childhood"> Childhood <br></div>
                        <div class="b"><input type="radio" name="self_image" value="None"> None <br></div>
                    </div>    
                </div>
                <hr />
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">5. What are your major instruments, if any?</div>
                    <input type="text" name="instrument" id="instrument">
                    <small id="instrumentHelp" class="form-text text-muted">Please fill "none" if you don't have any.</small>
                </div>
                <hr />
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">6. Please specify how many years have you played your major instruments.</div>
                    <input type="text" name="training_yr" id="TrainingInput1">
                    <small id="TrainingHelp" class="form-text text-muted">Please fill in a number. </small>
                </div>
                <hr />                
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">7. Please specify how many minutes have you practiced your major instruments per day.
                    </div>
                    <input type="text" name="training_min" id="TrainingInput2">
                    <small id="TrainingHelp2" class="form-text text-muted">Please fill in the minutes that you
                        practice
                        music per day</small>
                </div>
                <hr />
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">8. Please provide detail of your music experience (e.g., diplomas, awards, musical ensembles). (Optional) </div>
                    <textarea rows="5" name="music_experience" id="MusicExperience" class="MusicExperience"></textarea>
                </div>
                <hr />
                <!-- music genres categorize same as AllMusic 2019: https://www.allmusic.com/genres -->
                <div class="anchor_opinion_area">
                    <div class="anchor_descrp">9. What genres of music do you typically willing to listen to? (check
                        all
                        that apply)</div>
                    <div class="MAAB_res_block">
                        <ul class="checkboxes">
                            <li><input type="checkbox" name="genre" id="type1" value="Avant-Garde"> Avant-Garde<br></li>
                            <li><input type="checkbox" name="genre" id="type2" value="Blues"> Blues<br></li>
                            <li><input type="checkbox" name="genre" id="type3" value="Children"> Children's<br></li>
                            <li><input type="checkbox" name="genre" id="type4" value="Classical Opera"> Classical/ Opera<br>
                            </li>
                            <li><input type="checkbox" name="genre" id="type5" value="Comedy Spoken"> Comedy/ Spoken<br>
                            </li>
                            <li><input type="checkbox" name="genre" id="type6" value="Country"> Country<br></li>
                            <li><input type="checkbox" name="genre" id="type7" value="EasyListening"> Easy Listening<br>
                            </li>
                            <li><input type="checkbox" name="genre" id="type8" value="Electronic"> Electronic<br></li>
                            <li><input type="checkbox" name="genre" id="type9" value="Folk"> Folk<br></li>
                            <li><input type="checkbox" name="genre" id="type10" value="Holiday"> Holiday<br></li>
                            <li><input type="checkbox" name="genre" id="type11" value="International"> International<br></li>
                            <li><input type="checkbox" name="genre" id="type12" value="Jazz"> Jazz<br></li>
                            <li><input type="checkbox" name="genre" id="type13" value="Latin"> Latin<br></li>
                            <li><input type="checkbox" name="genre" id="type14" value="NewAge"> New Age<br></li>
                            <li><input type="checkbox" name="genre" id="type15" value="Pop Rock"> Pop/ Rock<br></li>
                            <li><input type="checkbox" name="genre" id="type16" value="R&B Soul"> R&B/ Soul<br></li>
                            <li><input type="checkbox" name="genre" id="type17" value="Rap"> Rap<br></li>
                            <li><input type="checkbox" name="genre" id="type18" value="Reggae"> Reggae<br></li>
                            <li><input type="checkbox" name="genre" id="type19" value="Religious"> Religious<br></li>
                            <li><input type="checkbox" name="genre" id="type20" value="Stage Screen"> Stage/ Screen<br></li>
                            <li><input type="checkbox" name="genre" id="type21" value="Vocal"> Vocal<br></li>
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
                        <small id="ZipHelp1" class="form-text text-muted">Please fill in a 5-digit number</small>
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
            <input type="hidden" name="MturkToken" id="Mturk_token">
        </form>
    </section>

</body>
<script type="text/javascript" src="js/checkItem.js"></script>
<script type="text/javascript" src="js/4_demo/C2_animation.js"></script>
<script>
// "globalsetting.js" without automatically dropping subjects
//detect idle time
var idleTime = 0;
var inattention = 0;
var idleInterval;

$(document).ready(function () {
    // disable the key "back to last page"
    // the drop out subjects cannot come back to experiment
    window.history.forward(1);


    document.oncontextmenu = function () {
        window.event.returnValue = false; // block mouse right key
    }

    //Increment the idle time counter every minute.
    idleInterval = setInterval(timerIncrement, 60000); // 60 sec
    // console.log("what is your function?", idleInterval)

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
        clearInterval(idleInterval);
        idleInterval = setInterval(timerIncrement, 60000); // 60 sec
        // console.log("reset", idleTime);
    });

});

function timerIncrement() {
    idleTime = idleTime + 1;
    console.log(idleTime);
    if (idleTime > 4) { // about 5 minutes
        alert("There has been no response for 5 miniutes. You will automatically exit the experiment.");
        inattention = inattention + 1;  //record inatteional subjects
        console.log("Times", inattention)
        // drop the subject if he idle too many times. 
        if (inattention > 0) {
            window.onbeforeunload = null;
            window.location = "https://www.mturk.com/"
        }
    }
}


</script>
</html>