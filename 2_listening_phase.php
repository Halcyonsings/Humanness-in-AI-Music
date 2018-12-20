<?php
session_start();
$userId = $_SESSION['uid'];
// $user_json = $_SESSION['userObj'];

// avoid jump
// include "database/avoidJump.php";

?>



<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTU Music Study</title>

    <!--   Bootstrap CSS & Jquery & Popper.js & Bootstrap JS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!--   Jquery UI CSS & JS ||   Notice: jQuery-UI should put behind jQuery   -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!--   Jquery CSV  ||  To read the csv file of music list-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.8.3/jquery.csv.min.js"></script>

    <!-- Wavesurfer JS -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.6/wavesurfer.min.js"></script>
    <!--     <script src="jspsych.js"></script> -->
    <!--     <script src="http://parsleyjs.org/dist/parsley.min.js"></script> -->
    <script type="text/javascript" src="js/globalsetting.js"></script>
    
    <!-- Add icon library -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--   Custom CSS   -->
    <link rel="stylesheet" href="css/jspsych.css">
    <!--     <link rel="stylesheet" href="css/listening_style.css"> -->
    <link rel="stylesheet" href="css/main_modules.css">
    <!--     <link rel="stylesheet" href="css/range_bar.css" /> -->
    <link rel="stylesheet" href="css/2_listening_phase/style.css">
    <link rel="stylesheet" href="css/2_listening_phase/memc.css">
</head>


<body>

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
                            <div class="form-t1">Listening Session</div>
                            <article class="intro-article">
                                Please fill the questionnaire after listening.The form will show up
                                <span class="highlight">3 seconds later</span> after clicking the mp3.
                            </article>
                        </div>
                    </div>
                </section>

                <!--       The section for music and button group             -->
                <section class="col-12" id="music-section">

                    <!-- Create a div where the audio waves will be shown -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6">
                            <div id="audio-spectrum" class="InsertNote"></div>
                        </div>
                    </div>

                    <!-- Create action buttons -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6">
                            <div class="row justify-content-between">
                                <!-- Before being turned on by JS, the default value of button is set to disabled -->
                                <button id="btn-play" class="MusicButtonDesign" disabled="disabled"><i class="material-icons">play_arrow</i>Play</button>
                                <button id="btn-pause" class="MusicButtonDesign" disabled="disabled"><i class="material-icons">pause</i>Pause</button>
                                <button id="btn-Restart" class="MusicButtonDesign" disabled="disabled"><i class="material-icons">replay</i>Restart</button>
                                <button class="ClockDesign">
                                    <i class="fa fa-clock-o"></i>
                                    <div id="TimeInformation"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>


                <!--         The section for MEMC             -->
                <section class="col-12" id="memc">

                    <form id="MEMCscale">
                        <input type="hidden" name="uid" id="user_id">
                        <input type="hidden" name="playTime" id="play_Time">
                        <input type="hidden" name="allAnswers" id="all_Answers">
                        <input type="hidden" name="inattentionP2" id="inattention_P2">
                        <div class="clearfix">
                            <button type="button" id="next" class="g-btn MEMCbutton" onclick="nextStep()">
                                <span>Next Page<span>
                            </button>
                        </div>
  
                    </form>
                </section>

            </div>
        </div>
    </main>


    <!-- Custom JS -->
    <script type="text/javascript" src="js/globalsetting.js"></script>
    <script type="text/javascript" src="./js/2_listening_phase/memc.js"></script>
    <script type="text/javascript" src="./js/2_listening_phase/music.js"></script>
    <script type="text/javascript" src="./js/2_listening_phase/index.js"></script>
    <script>

        // Stringify JSON data to save in backend
        // var playTime_json = JSON.stringify(playTime);    // Fail: playTime_json will be empaty collection {}
        // var allAnswers_json = JSON.stringify(allAnswers);
        var uid = '<?php echo $userId;?>';

    

    </script>
</body>

</html>