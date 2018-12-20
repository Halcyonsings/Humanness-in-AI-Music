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
    // Bind callback to hcHeadphoneCheckEnd event
    $(document).on('hcHeadphoneCheckEnd', function (event, data) {
        var results = data.data;
        var config = data.config;
        var didPass = data.didPass;
        // Stringify JSON data to save in backend
        var results_json = JSON.stringify(results);
        var uid = '<?php echo $userId;?>';
        
        window.onbeforeunload = null;
        $("#user_id").attr("value", uid);
        // console.log("end");
        $("#did_Pass").attr("value", didPass);
        // console.log(didPass);
        $("#total_Correct").attr("value", headphoneCheckData.totalCorrect);
        // console.log(results.totalCorrect);
        $("#inattention_P1").attr("value", inattention);
        // console.log(inattention);
        $("#HC_All_Data").attr("value", results_json);
        // form submission
        $("form").attr("action", "db/a_headphone.php")
        $("form").attr("method", "POST")
        $("form").submit()
        // window.location = "2_listening_phase.html"
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