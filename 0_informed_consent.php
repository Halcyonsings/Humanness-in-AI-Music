<?php
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
};
$ip = get_client_ip();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- TODO: Add google track    -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115062914-1"></script> -->
    <!-- <script> -->
    <!--        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-115062914-1'); -->
    <!-- </script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- original size sr=etting, see the HTML5 book's page 247 -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap4 CSS&JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- social optimizing -->
    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="css/main_modules.css">
    <link rel="stylesheet" type="text/css" href="css/0_consent/consent_style.css">

    <script type="text/javascript" src="js/globalsetting.js"></script>
    <script type="text/javascript" src="js/checkItem.js"></script>
    <title>NTU Music Study</title>
</head>

<body>
    <div id="bg-img"></div>
    <div class="main_block card">
        <div class="container instruction" id="Detail_Card">
            <div class="title">Informed Consent Form</div>
            <hr>
            <p>Thank you for participating in our experiment.
                <br />The requirements to participate in this research are
                listed below:</p>
            <ol>
                <li>Make sure your computer has a stable Internet connection. </li>
                <li><span class="highlight">Do not participate in this experiment with IE (Internet Explorer)
                        browser.</span> </li>
                <li><span class="highlight">Do not participate in this experiment with a smartphone.</span> </li>
                <li>You should be fluent in English reading.</li>
                <li>Please wear headphones during the experiment.</li>
            </ol>
            <p>If you meet the requirements, please read the following information:</p>
            <p>This study is conducted by Modeling & Informatics Lab at Department of Psychology, National Taiwan
                University. This experiment aims to look into the mechanism of musical perception.</p>
            <p><b>Procedure</b>: In the first session, we will examine whether participants are wearing headphones or
                not. You will then listen to some music pieces as you simultaneously fill in a questionnaire. After the
                listening session, you will be given some surveys.</p>
            <p><b>Duration</b>:
                It will take about <span class="highlight"> 40 minutes </span> to complete all the tasks. Please
                concentrate on the instructions and questions on the screen. Do not: </p>
            <ol>
                <li>open other tabs
                <li>minimize/ maxmize the active window during the experiment
                <li>become idle for more than 5 minutes
            </ol>
            <p>In doing so, we will drop you out of the experiment.
                <span class="highlight"> You will not get any payment in that case. </span> </p>
            <p><b>Benefit</b>: You will receive <span class="highlight"> $5.0 </span> if you successfully
                complete
                all the tasks in the experiment. </p>
            <p><b>Privacy</b>: We will collect and store your responses of the experiment permanently. However,
                no
                one can access the data except researchers listed below.
                <br /><br />If you want to retrieve your data,
                please e-mail the researchers (r05227104@ntu.edu.tw). The results of the
                experiments will not be used for any commercial purposes. </p>
            <p><b>Other Ethical Issues</b>:
                <br />(1) This research is self-financed.
                <br />(2) This study has been approved by Research Ethics Office of National Taiwan University.
                 You can e-mail the office if you have further questions (nturec@ntu.edu.tw).
                <br />(3) There is no potential risk in this study. However, you have the right to decline to answer any or all questions. You may
                terminate your involvement at any time if you choose to. </p>
            <br>
            <p class="devInfo"><b>Principal Investigators</b>:<br>
                Tsung-Ren Huang, Assistant Professor, Department of Psychology, National Taiwan University<br>
                Chen-Ying Huang, Professor, Department of Economics, National Taiwan University<br>
                Wen-Ya Tan, Lecturer, Department of Music, Tunghai University
            </p>
            <p class="devInfo"><b>Developer & Researcher</b>:<br>Zih-Hsiang Wang, graduate student, Department
                of
                Psychology, National Taiwan University </p>
            <br />
            <br />
            <div class="container">
                <div class="row justify-content-center">
                    <div class="NextToCheckBox_btn g-btn">Next Page</div>
                </div>
            </div>
        </div>
        <!-- form part -->
        <form id="Consent_Check_Card">
            <div class="container">
                <div class="title">Informed Consent Form</div>
                <hr>
                <p> Please make sure you agree to the following before proceeding. </p>
                <input type="checkbox" class="notice" name="ICnotice1" value="check" id="Not_Discuss" /> I will not
                discuss the experiment on the forum such as TurkerNation. <br>
                <input type="checkbox" class="notice" name="ICnotice2" value="check" id="Know_Exit" /> I know that I
                will
                <span class="highlight"> automatically
                    exit the experiment without recieving payment</span> if I open other tabs, minimize/ maxmize the active window during the experiment,
                     or become idle for more than 5 minutes.
                <input type="hidden" name="uid" id="user_id" />
                <input type="hidden" name="ip" id="user_ip" />
                <input type="hidden" name="browser" id="user_browser" />
                <input type="hidden" name="start_time" id="user_start_time" />
                <input type="hidden" name="userObj" id="user_object" />
                <input type="hidden" name="inattentionP0" id="inattention_P0" />
                <div class="row justify-content-center">
                    <div class="g-btn" id="go_to_consent_btn">Agree & Start</div>
                </div>
            </div>
        </form>
    </div>
    <!-- initializing -->
    <script type="text/javascript">
        // Avoid closing window
        window.onbeforeunload = function () { return "糟糕！別走！" };

        $(document).ready(function () {
            // Display setting
            $("#Consent_Check_Card").css("display", "none");
        });

        var uid = uuidGenerator();
        // console.log(typeof uid);
        // var uid = uid.replaceAll('-','').substring(0,16);  
        // [20181208] js does not have a function "replaceAll"
        var uid = uid.split("-").join("").substring(0, 16);
        console.log(uid);
        // TODO: Add whole JSON [20181208] temptive do not use these code
        // // user object
        // var user = init_exp(uid);
        // // console.log(user.opinion.part1.)
        // var user_json = JSON.stringify(user);


        // user device
        var user_ip = '<?php echo $ip;?>';
        var user_browser = navigator.userAgent;
        var time = new Date();
        var time_info = time.toDateString() + "/" + time.toTimeString();
        // $('.testing').text("測試ID: " + uid); // [20181208] success

        // Two-Page Informed Consent
        $(".NextToCheckBox_btn").click(function () {
            // animation
            $("#Detail_Card").addClass("hiding");
            $("#Consent_Check_Card").addClass("showing");
            $('html, body').animate({
                scrollTop: $("body").offset().top
            }, 700);
            setTimeout(function () {
                $("#Detail_Card").hide();
                $("#Consent_Check_Card").show();
                // $(window).scrollTop(0);
            }, 700)
        });

        $('#go_to_consent_btn').click(function () {
        
        window.onbeforeunload = null; 
        var check = checkNotice(2); 
        if (check == "finished") {
            $("#user_id").attr("value", uid);
            $("#user_ip").attr("value", user_ip);
            $("#user_browser").attr("value", user_browser);
            $("#user_start_time").attr("value", time_info); 
            $("#inattention_P0").attr("value", inattention); //
            // $("#user_object").attr("value", user_json); 
            
            // form submission 
            $("form").attr("action", "db/exp_init.php" )
            $("form").attr("method", "POST"); 
            $("form").submit();
            }
        })  
</script>
</body> 
</html>