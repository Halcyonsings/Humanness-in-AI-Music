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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115062914-1"></script> -->
    <!-- <script> -->
 <!--        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-115062914-1'); -->
    <!-- </script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- original size sr=etting, see the HTML5 book's page 247 -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap4 CSS&JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- social optimizing -->
    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="css/main_modules.css">
    <link rel="stylesheet" type="text/css" href="css/consent_style.css">
    
    <script type="text/javascript" src="js/globalsetting.js"></script> 
    
    <title>NTU Music Study</title>
</head>
<body>
    <div id="bg-img"></div>
    <div class="main_block card">
        <div class="container instruction">
            <div class="title">Informed Consent Form</div>
            <hr>
            <p>Thank you for joining in our experiment. First of all, the requirements of participating this research are listed below:</p>
            <ol>
                <li>Fluent in <b>English</b> reading</li>
                <li>Familiar with website usage</li>
                <li>Using a computer with stable website connection</li>
            </ol>
            <p>If you fulfill the requriements, please read the following information：</p>
            <p>This study is conducted by Modeling & Informatics Lab (MIL) at Department of Psychology, National Taiwan University. This experiment aims to delve more into mechanism of musical emotion.</p>
            <p><b>Procedure</b>:  While you listen to some music pieces in the first session, you will need to fill in 2 questionnaires. After the listening session, we will collect the responses of other 2 question sheets. It usually takes about <span class="highlight"> 15 minutes </span> to complete all the task. For the accuracy, please focus on the instruction and questions on the screen. Do not open other tabs during the experiment.
            <p><b>Benefit</b>: You will gain <span class="highlight"> $0.5 </span> and know more about music after completing all the sessions. </p>
            <p><b>Privacy</b>: We will collect and store your responses of the experiment permanently. However, no one could access the data except researchers listed below. If you want to retrieve your data, please send an e-mail to the researchers. Moreover, the outcome of the experiments is not related to any commercial use. </p>
            <p><b>Other ethical issues</b>: (1) this research is self-financing (2) Although the experiments do not have any risk to hurt the subjects, you can quit freely during the experiment. </p>
            <p>Principal Investigators：<span class="mobile_just">Department of Psychology, National Taiwan University </span><span class="mobile_just">Tsung-Ren Huang, assitant professor;</span><span class="mobile_just">Department of Economics, National Taiwan University</span>Chenying Huang, professor</p>
            <p>Developer & Researcher：<span class="mobile_just">Department of Psychology, National Taiwan University </span><span class="mobile_just">Zih-Hsiang Wang, graduate student</span></p>
        </div>
        <!-- form part -->
        <form>
            <div class="container">
                <input type="hidden" name="uid" id="user_id">
                <input type="hidden" name="ip" id="user_ip">
                <input type="hidden" name="browser" id="user_browser">
                <input type="hidden" name="start_time" id="user_start_time">
                <input type="hidden" name="userObj" id="user_object">
                <input type="hidden" name="inattention" id="inattention">
                <div class="row justify-content-center">
                    <div class="g-btn" id="go_to_consent_btn">Agree & Start</div>
                </div>
                <div class="row testing justify-content-center"></div>
            </div>
        </form>
    </div>
    <!-- initializing -->
    <script type="text/javascript">
        var uid = uuidGenerator();
        // console.log(uid);
        var uid = uid.replaceAll('-','').substring(0,16);
        console.log(uid);

        // user object
        var user = init_exp(uid);
        // console.log(user.opinion.part1.)
        var user_json = JSON.stringify(user);

        // user device
        var user_ip = '<?php echo $ip;?>';
        var user_browser = navigator.userAgent;
        var time = new Date();
        var time_info = time.toDateString() + "/" + time.toTimeString();
        $('.testing').text("測試ID: " + uid);
        $('#go_to_consent_btn').click(function(){
            $("#user_id").attr("value", uid);
            $("#user_ip").attr("value", user_ip);
            $("#user_browser").attr("value", user_browser);
            $("#user_start_time").attr("value", time_info);
            $("#user_object").attr("value", user_json);
            
            // form submission
            $("form").attr("action","db/exp_init.php")
                $("form").attr("method","POST")
                $("form").submit()
        })
    </script>
</body>
</html>