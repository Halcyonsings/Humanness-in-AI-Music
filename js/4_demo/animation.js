// Avoid closing window
window.onbeforeunload = function () { return "糟糕！別走！" };




$(document).ready(function () {
    // Display setting
    $(".demoCard").css("display", "none");
    $(".endingCard").css("display", "none");



    // Anchor
    $('input[class=anchor_range]').change(function () {
        $(this).attr("data-check", "on");
        // console.log($(this).attr("id"));
    })



    $('.anchor_range').mousedown(function () {
        $(this).css('background-color', '#c56868');
    });
})
// Go to the second part
$('.NextToDemo_btn').click(function () {
    // verifying
    var checking = checkRange(5); //the number should equal to the last item
    if (checking == "finished") {
        // recording
        MAAB_response = {
            MAAB1: $('input[id=MAAB1]').val(),
            MAAB2: $('input[id=MAAB2]').val(),
            MAAB3: $('input[id=MAAB3]').val(),
            MAAB4: $('input[id=MAAB4]').val(),
            MAAB5: $('input[id=MAAB5]').val(),

        }
        // animation
        $('.MusicSurveyCard').addClass("hiding");
        $(".demoCard").addClass("showing");
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 700);
        setTimeout(function () {
            $(".MusicAbilityCard").hide();
            $(".demoCard").show();
            // $(window).scrollTop(0);
        }, 700)
    }
});

// Go to the Ending Page
$(".NextToFinal_btn").click(function () {
    window.onbeforeunload = null;
    // form validating
    var check = checkAllDemo();
    if (check == "allFinished") {
        // animation
        $('.demoCard').addClass("hiding");
        $(".endingCard").addClass("showing");
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 700);
        setTimeout(function () {
            $(".demoCard").hide();
            $(".endingCard").show();
            // $(window).scrollTop(0);
        }, 700)
    }
})


//submit the form
$("#form_submit").click(function () {
    window.onbeforeunload = null;

    // record finishing time
    var time = new Date();
    var time_info = time.toDateString() + "/" + time.toTimeString();
    // data inserting
    $("#MAAB_response").attr("value", JSON.stringify(MAAB_response));

    // $("#hoverTimeRec").attr("value", hover_time_record.toString());
    $("#user_finish_time").attr("value", time_info);
    // $("user_id").attr("value", uid);
    $("#inattention_P4").attr("value", inattention);
    $("#Mturk_token").attr("value", Mturkcode);
    // form submission
    $("form").attr("action", "db/d_demo.php");
    $("form").attr("method", "POST");
    $("form").submit();

})


