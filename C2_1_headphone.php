<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);


session_start();
$userId = $_SESSION['uid'];
// $user_json = $_SESSION['userObj'];

// avoid jump
// include "db/C2_avoidJump.php"; close because it will alert reload

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NTU Music Study</title>


    <link rel="stylesheet" type="text/css" href="css/main_modules.css">
    <link rel="stylesheet" type="text/css" href="css/1_headphone/HeadphoneCheckStyle.css">

    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/globalsetting.js"></script>
    <script type="text/javascript" src="js/1_headphone/HeadphoneCheck.js"></script>
    <!-- <script type="text/javascript" src="js/1_headphone/TurnPage.js"></script> -->
</head>
<script>
    // Detect mobile phone
    if (/iPhone|iPad|iPod|Android|webOS|BlackBerry|Windows Phone/i.test(navigator.userAgent)
        || screen.availWidth < 480) {
            alert("Please use computers to participate in this experiment. You will automatically leave the page."); 
            window.onbeforeunload=null; 
            window.location="https://www.mturk.com/" 
        }
    
    // Avoid closing window
    window.onbeforeunload = function () { return "糟糕！別走！" };
    
    // Bind callback to hcHeadphoneCheckEnd event
    $(document).on('hcHeadphoneCheckEnd', function (event, data) {
        var results = data.data;
        var config = data.config;
        var didPass = data.didPass;
        // Stringify JSON data to save in backend
        var results_json = JSON.stringify(results);
        var uid = '<?php echo $userId;?>';
        
        if (headphoneCheckData.totalCorrect < 5) {
            window.onbeforeunload = null;
            window.location.reload();
            // console.log(headphoneCheckData.totalCorrect);
        }
        else {  
        window.onbeforeunload = null;
        $("#user_id").attr("value", uid);
        // console.log("end");
        $("#did_Pass").attr("value", didPass);
        // console.log(didPass);
        $("#total_Correct").attr("value", headphoneCheckData.totalCorrect);
        // console.log(results.totalCorrect);
        // console.log("else:"+headphoneCheckData.totalCorrect);
        // console.log("else:"+headphoneCheckData.totalCorrect<5);

        $("#inattention_P1").attr("value", inattention);
        // console.log(inattention);
        $("#HC_All_Data").attr("value", results_json);
        // form submission
        $("form").attr("action", "db/C2_a_headphone.php")
        $("form").attr("method", "POST")
        $("form").submit()
        // window.location = "2_listening_phase.html"
        }  
    });
</script>



<body onload="HeadphoneCheck.runHeadphoneCheck();">
    <!-- Header image -->
    <header>
        <div id="bg-img"></div>
    </header>
    <section class="main_block card">
        <div class="form-t1">Headphone Test</div>
        <div id="hc-container"></div>
        <form id="hc-task">
            <input type="hidden" name="uid" id="user_id">
            <input type="hidden" name="didPass" id="did_Pass">
            <input type="hidden" name="totalCorrect" id="total_Correct">
            <input type="hidden" name="inattentionP1" id="inattention_P1">
            <input type="hidden" name="HCAllData" id="HC_All_Data">

        </form>

</body>