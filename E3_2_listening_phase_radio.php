<?php
# Session lifetime of 3 hours
ini_set('session.gc_maxlifetime', 10800);

# Enable session garbage collection with a 1% chance of
# running on each session_start()
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

session_save_path("/home/hsiang/public_html/sessions");

// each client should remember their session id for EXACTLY 3 hour
session_set_cookie_params(10800);

session_start();
$userId = $_SESSION['uid'];
$user_json = $_SESSION['userObj'];

// avoid jump
// include "db/E3_avoidJump.php";

// count times of loading the page 
if (isset($_SESSION['count'])){
    $_SESSION['count'] = $_SESSION['count'] + 1;
} else {
    $_SESSION['count'] = 1;
}

// "ctrl + shift + R" could not clear the session
// echo "You have looked at this page " .$_SESSION['count']." times.";
?>



<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTU Music Study</title>

    <!--   Bootstrap CSS & Jquery & Popper.js & Bootstrap JS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!--   Jquery UI CSS & JS ||   Notice: jQuery-UI should put behind jQuery   -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!--   Jquery CSV  ||  To read the csv file of music list-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.8.3/jquery.csv.min.js"></script>

    <!-- Wavesurfer JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.6/wavesurfer.min.js"></script>
    <!--     <script src="jspsych.js"></script> -->
    <!--     <script src="http://parsleyjs.org/dist/parsley.min.js"></script> -->
    <script type="text/javascript" src="js/intro.js"></script>

    <!-- Add icon library -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--   Custom CSS   -->
    <link rel="stylesheet" href="css/jspsych.css">

    <link rel="stylesheet" href="css/main_modules.css">

    <link rel="stylesheet" href="css/2_listening_phase/style.css">
    <link rel="stylesheet" href="css/2_listening_phase/E3_memc_radio.css">
    <!-- <link rel="stylesheet" href="css/2_listening_phase/loader.css"> -->

    <!-- Add IntroJs styles -->
    <link href="css/introjs.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hidebutton {
            visibility: hidden;
        }

        li{
            padding-top: 10px;
        }
    </style>
</head>

<!-- to fix music stop when adjusting the screen -->

<body onresize="playaudio()">

    <header class="jumbotron">
        <div class="container">
            <!--             <h1>AI Music</h1> -->
        </div>
    </header>

    <!-- 主功能區 -->
    <main>
        <div class="container">
            <div class="row justify-content-center">

                <!--        The section for the instruction             -->
                <section class="col-12" id="instruction-section">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-8">
                            <div class="form-t1">Listening Session<span id="currinfo"></span></div>
                            <article id="MEMCguide" class="intro-article" data-step="1" data-intro="First, read the notice"
                                data-position="left">
                                Please read the notice before listening to the clips:
                                <ol>
                                    <li>Please<span class="highlight"> wear headphones</span> when listening.</li>
                                    <li>In this section, you will listen to 12 different clips.
                                        A questionnaire will appear below only after the music is completely played.
                                    </li>
                                    <li>You cannot skip any music clips. Each music clip will be <span
                                            class="highlight"> played once and only
                                            once.</span> So please listen carefully.</li>
                                    <li>In the questionnaire, you will have to answer 28 items. Please rate each music
                                        clip according to your feelings or musical features on a scale ranging from 1 (not at
                                        all) to 5 (very much). </li>
                                    <li>Each excerpt is composed <span class="highlight">by human or artificial intelligence (AI)</span>. The
                                        information of the composer is shown above the soundwave.</li>
                                </ol>
                            </article>
                        </div>
                    </div>
                </section>


                <!--       The section for music and button group             -->
                <section class="col-12" id="music-section">
                    <!-- AI or Human information show here -->
                    <div class="form-t1"><span id="curr-author"></span> Composer</div>
                    <!-- Create a div where the audio waves will be shown -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6">
                            <!-- avoid subjects realtime adjust soundwave -->
                            <div class="disabled-wave">
                                <div id="audio-spectrum" class="InsertNote"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Set the loader            
                    <div class="WaitMusic">
                        <div class="lds-ripple">
                            <div></div>
                            <div></div>
                        </div>
                    </div> -->

                    <!-- Create action buttons -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6">
                            <div class="row justify-content-between ButtonSet">
                                <!-- The button is disabled until that the clips is successfully load -->
                                <button id="btn-play" class="MusicButtonDesign" disabled="disabled" data-step="2"
                                    data-intro="Click here to play the music" data-position="left"
                                    onclick="DelayMEMC()"><i class="material-icons">play_arrow</i>Play</button>
                                <!-- <button id="btn-pause" class="MusicButtonDesign" disabled="disabled"><i
                                        class="material-icons">pause</i>Pause</button>
                                <button id="btn-Restart" class="MusicButtonDesign" disabled="disabled"><i
                                        class="material-icons">replay</i>Restart</button> -->
                                <button class="ClockDesign">
                                    <i class="fa fa-clock-o"></i>
                                    <div id="TimeInformation"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="MEMCmeaning">
                <div id="intro3" class="intro-article" data-step="3" data-intro="Questionnaire will show up here" data-position="left">
                    The 5-point Scale: <br />
                    1 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    2 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    3 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    4 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    5<br />
                    Not at all &nbsp&nbsp Somewhat &nbsp&nbsp Moderately &nbsp&nbsp Quite a lot &nbsp&nbsp Very much
                </div>
                </section>
                <!--         The section for MEMC             -->
                <section class="col-12" id="memc">
                    <!--  Question cards will appear here  -->
                </section>
                <form id="MEMCscale">
                    <input type="hidden" name="uid" id="user_id">
                    <input type="hidden" name="playTime" id="play_Time">
                    <input type="hidden" name="allAnswers" id="all_Answers">
                    <input type="hidden" name="allRT" id="all_RT">
                    <input type="hidden" name="hurrySubject" id="hurry_subject">
                    <input type="hidden" name="inattentionP2" id="inattention_P2">
                    <div class="clearfix">
                        <button type="button" id="next" class="g-btn" onclick="nextStep()">
                            <span>Next Page<span>
                        </button>
                    </div>

                </form>


            </div>
        </div>
    </main>


    <!-- Custom JS -->
    <script type="text/javascript" src="js/globalsetting.js"></script>
    <script type="text/javascript" src="./js/2_listening_phase/E3_memc_radio.js"></script>
    <script type="text/javascript" src="./js/2_listening_phase/music.js"></script>
    <script type="text/javascript" src="./js/2_listening_phase/E3_index_radio.js"></script>
    <script>
        // Avoid closing window
        window.onbeforeunload = function () { return "糟糕！別走！" };

        var uid = '<?php echo $userId;?>';


        $(document).ready(function () {

            var musicintro = introJs()
            musicintro.start();

            // cannot play the music 
            $('#btn-play').addClass("once-button");
            // Condition 3: Information of Author
            $('#curr-author').html("Human or AI");

            $('.introjs-skipbutton').hide();
            $('.introjs-prevbutton').hide();
            $('.introjs-nextbutton').css('border', '5px solid red');


            musicintro.onafterchange(function () {
                if (this._introItems.length - 1 == this._currentStep || this._introItems.length == 1) {
                    $('.introjs-skipbutton').show().css('border', '5px solid red');
                    $('.introjs-nextbutton').hide();
                }
            });


            musicintro.onexit(function () {
                // alert("Hi");
                $('#btn-play').removeClass("once-button");
                $('#MEMCguide').hide(300);
                // Condition 3: Information of Author
                $('#curr-author').html(authorList[currentTrial - 1]);
            });

            // musicintro.onbeforeexit(function() {
            //     // alert("Hi");
            //     console.log("on before exit")

            //     // returning false means don't exit the intro
            //     return false;
            // });
        });


        // Disable Enter Key On Play Button
        $("#btn-play, #next").keypress(function (e) {
            //Enter key
            if (e.which == 13) {
                return false;
            }
        });




    </script>
</body>

</html>