<?php
session_start();
$userId = $_SESSION['uid'];
$user_json = $_SESSION['userObj'];

// avoid jump
// include "db/avoidJump.php";

$MturkCode = $_SESSION["MturkToken"];
// echo $MturkCode
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

    <!-- <script type="text/javascript" src="js/globalsetting.js"></script> -->
    <script type="text/javascript">
        // 4-digits number generator
        // Mturkcode = Math.floor(1000 + Math.random() * 9000);

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
            <div class="container-fluid endingCard">
                <p class="form-t1 text-center">The End</p>
                <article class="intro-article">
                    <div class="a">The experiment is now complete. Thank you for participating in our experiment. To
                        get the reward, please enter the 4-digit number below on Amazon Mechanical Turk. You will <span class="highlight">not</span>
                         automatically exit the experiment if you click on other tabs in this page. 
                    </div>
                </article>
                <span class="highlight"><?php echo $MturkCode;?> </span><br>
                <br>
                <br>
                <br>
                Modeling & Imformatics Lab<br>
                Department of Psychology, NTU<br>
                No. 1, Sec. 4, Roosevelt Rd., Taipei 10617, Taiwan (R.O.C.)<br>
                <a href="https://www.facebook.com/ntumilab/"><img src="asset/fb_icon.png" /></a>
                <a href="mailto:R05227104@ntu.edu.tw?subject=NTU Music Study"><img src="asset/email_icon.png" /></a>
                <br>
            </div>


        <script type="text/javascript">
            $(document).ready(function () {
            // disable the key "back to last page"
            // the drop out subjects cannot come back to experiment
            window.history.forward(1);
            });
            
        
        </script>
</body>

</html>