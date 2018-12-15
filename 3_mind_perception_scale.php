<?php
// Start the session
if(!$_SESSION){ session_start(); }

//import php function
// require_once "database/avoidJump.php";

date_default_timezone_set( "Asia/Taipei" );
$_SESSION['startTime'] = date("Y-m-d H:i:s");
?>

<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <!-- Notice: jQuery-UI should put behind jQuery -->
  <!-- slide bar need jqueryUI -->
  <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="jspsych.js"></script>
   <script type="text/javascript" src="js/globalsetting.js"></script> 
  <!-- my css -->
  <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
  <link rel="stylesheet" href="css/jspsych.css">

  <link rel="stylesheet" type="text/css" href="css/main_modules.css">
  <link rel="stylesheet" href="css/MP_range_bar.css" rel="stylesheet" />

<style type="text/css">


</style>
</head>
<title>NTU Music Study</title>
<body>
    <div id="bg-img"></div>
    <section class="main_block card"> 
        <div class="form-t1">Mind Perception</div>
        <article class="intro-article">
        <div class="a">
        Please judge about the perceived mental capacities of eight targets. Each of which was accompanied by a brief description. Please indicate the extent to which you perceived each target to be capable of six capacities on a scale from<span class="highlight"> 0 (not at all) to 6 (very much).</span>
        </div>
        </article>
    <form action="/~hsiang/db/c_mind_perception_scale.php" id="MPscale" method="post"> <!-- send to backend -->




        <div class="clearfix">
                    <button type="button" id="next" class="g-btn MPbutton"   onclick="nextPage();">
                            <span>Next Page<span>
                    </button>
        </div>
        <input type="hidden" id="Response" name="Response">
        <input type="hidden" id="ResponseTime" name="ResponseTime">
    </form>
<script type="text/javascript">
  // Avoid closing window
  window.onbeforeunload = function(){return "糟糕！別走！"};

  //Preventing send the data repeatedly
  $("#MPscale").submit(function(){
    $("#MPbutton").prop('disabled', true); 
  });

  Agent = {
        "1":"1. Adult Human Female. <I>Sharon Harvey</I>. Sharon Harvey, 38, works at an advertising agency in Chicago.",
        "2":"2. Adult Human Male. <I>Todd Billingsly</I>. Todd Billingsly is a 30-yold accountant who lives in New York City.",

        }


        MPSixQ = {
        "1":'(a) How capable of feeling fear do you think "Sharon" is?',
        "2":'(b) How capable of exercising self-control do you think "Sharon" is?',
        "3":'(c) How capable of feeling pleasure do you think "Sharon" is?',
        "4":'(d) How capable of remembering do you think "Sharon" is?',
        "5":'(e) How capable of feeling hunger do you think "Sharon" is?',
        "6":'(f) How capable of acting morally do you think "Sharon" is?',
        "7":'(a) How capable of feeling fear do you think "Todd" is?',
        "8":'(b) How capable of exercising self-control do you think "Todd" is?',
        "9":'(c) How capable of feeling pleasure do you think "Todd" is?',
        "10":'(d) How capable of remembering do you think "Todd" is?',
        "11":'(e) How capable of feeling hunger do you think "Todd" is?',  
        "12":'(f) How capable of acting morally do you think "Todd" is?',
        }


        //問卷分頁參數
        var Qlength = Object.keys(MPSixQ).length
        // var Qorder = shuffle(range(1,Qlength)) //radom order
        var Qorder = range(1, Qlength) // non random order
        var itemsPrePage = 12 //一頁幾題
        var Npage = Math.ceil(Qlength / itemsPrePage) //共有幾頁
        var currentPage = 1 //沒有指導語頁面0
        var Response = {}
        var ResponseTime = {}
        var starttime, endtime

        window.onload = function(){
            //get startTime
            starttime = performance.now()
            // prepare Object
            for (var i = 0; i < Qlength; i++){
                ResponseTime[(i+1)] = 0
            }
        }

        function nextPage() {
            if (validateSlider()) {
                if (currentPage == Npage) {
                    // last page, do something
                    window.onbeforeunload = null;
                    $("#Response").attr("value", JSON.stringify(Response));
                    $("#ResponseTime").attr("value", JSON.stringify(ResponseTime));

                    $("form").attr("action", "db/c_mind_perception_scale.php")
                    $("form").attr("method", "POST")
                    $("form").submit()


                }else {
                    $('html, body').animate({
                        scrollTop: $("#page" + (currentPage + 1)).offset().top - ($(window).height() - $("#page" + (currentPage + 1)).outerHeight(true)) / 2
                    }, 200);
                    $(".page").addClass("Hide")
                    $("#page" + (currentPage + 1)).removeClass("Hide").fadeIn(500)
                    currentPage++
                    if (currentPage == Npage){
                        $("#next").html("Finished")
                    }
                }
            }
        }

        // validate if response in currentPage
        function validateSlider() {
            var validate = 0
            $("#page" + currentPage + " .rangebar").each(function (index) {
                var response = $(this).slider("option", "value")
                if (response == null) {
                    $(this).prev(".MPitemcontent").addClass("forgethint")
                    validate++
                } else {
                    // Response[$(this).data("item")] = response
                }
            });

            if (validate != 0) {
                $('html, body').animate({
                    scrollTop: $(".forgethint").offset().top - ($(window).height() - $(".forgethint").outerHeight(true)) / 2
                }, 200);
                return false
            } else {
                return true
            }
        }

        //append items
        //start from 1 because no instruction
        $(function () {
            for (var i = 1; i <= Npage; i++) {
                $("form").prepend("<div class='page Hide' id='page" + i + "'></div>")
                for (var j = 0; j < itemsPrePage; j++) {
                    var itemOrder = (i - 1) * itemsPrePage + (j + 1)
                    // New code
                    var MPbigQ = parseInt(itemOrder / 6) + 1;  //show agents' description per six items
                    if (itemOrder%6 == 1){
                        $("#page" + i).append("<div class='AgentIntro'>"+ Agent[Qorder[MPbigQ-1]]+"</div>") 

                    }
                    

                    if (itemOrder <= Qlength){
                        $("#page" + i).append("<div class='itembox'><div class='MPitemcontent'>" + MPSixQ[Qorder[itemOrder - 1]] + "</div><div data-item='" + (Qorder[itemOrder - 1]) + "' class='rangebar'></div></div>")
                    }
                }
            }
            $("#page1").removeClass("Hide").fadeIn(500)
            if (currentPage == Npage){
                $("#next").html("Finished")
            }
        })

        //make rangebar
        $(function () {
            $(".rangebar").each(function () {
                $(this).empty().slider({
                    value: null,
                    min: 0,
                    max: 6,
                    range: "min",
                    animate: "fast",
                    slide: function (event, ui) { //slide function supposes to be same as start
                        var item = $(this).data("item")
                        Response[item] = ui.value //store data
                        if ($(this).slider("option", "value") == null){
                            $(this).slider("value", ui.value) //resolve no slide no value and animate
                        }
                        endtime = performance.now()
                        ResponseTime[item] = Number((ResponseTime[item] + (endtime - starttime)).toFixed(0))
                        starttime = performance.now()
                        $(this).prev(".MPitemcontent").removeClass("forgethint")
                        return $("[data-item='" + item + "'] .ui-slider-handle").html(ui.value);
                    },
                    start: function (event, ui) {
                        var item = $(this).data("item")
                        Response[item] = ui.value //store data
                        if ($(this).slider("option", "value") == null){
                            $(this).slider("value", ui.value) //resolve no slide no value and animate
                        }
                        endtime = performance.now()
                        ResponseTime[item] = Number((ResponseTime[item] + (endtime - starttime)).toFixed(0))
                        starttime = performance.now()
                        $(this).prev(".MPitemcontent").removeClass("forgethint")
                        return $("[data-item='" + item + "'] .ui-slider-handle").html(ui.value);
                    },
                    stop: function (event, ui) {

                    }
                });
                //make slider value under div
                // Get the options for this slider
                var opt = $(this).data().uiSlider.options;
                // Get the number of possible values
                var vals = opt.max - opt.min;
                
                //label character you want to show
                var indexvalue = { "1": "Not at all", "2": "", "3": "", "4": "", "5": "" ,"6":"", "7":"Very much"}
                // Space out values
                for (var i = 0; i <= vals; i++) {
                    var el = $('<label>' + indexvalue[i + 1] + '</label>').css({'left': (i / vals * 100) + '%',
                                                                                'width': '85px' //use multiple CSS to set the label inline
                                                                                });
                   
                    $(this).append(el);
                }
            });
        })


</script>


</body>
</html>