// Avoid closing window
window.onbeforeunload = function () { return "糟糕！別走！" };




$(document).ready(function () {
    // Display setting
    $(".demoCard").css("display", "none");
    $(".endingCard").css("display", "none");



    // Anchor
    $('input[class=anchor_range]').click(function () {
        $(this).attr("data-check", "on");
        // console.log($(this).attr("id"));
    })



    $('.anchor_range').mousedown(function () {
        $(this).css('background-color', '#c56868');
    });
})

var genre_response = [];

// Go to the second part
$('.NextToDemo_btn').click(function () {
    // verifying
    var checkMAAB = checkAllMAAB();
    if (checkMAAB == "allFinished") {
        // recording
        $.each($("input[name='genre']:checked"), function () {
            genre_response.push($(this).val());
        });

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

//submit the form
$("#form_submit").click(function () {
    window.onbeforeunload = null;

    var checkDemo = checkAllDemo();
    if (checkDemo == "allFinished") {
        // record finishing time
        var time = new Date();
        var time_info = time.toDateString() + "/" + time.toTimeString();
        // data inserting
        $("#Genre_response").attr("value", JSON.stringify(genre_response));

        // $("#hoverTimeRec").attr("value", hover_time_record.toString());
        $("#user_finish_time").attr("value", time_info);
        // $("user_id").attr("value", uid);
        $("#inattention_P4").attr("value", inattention);
        // form submission
        $("form").attr("action", "db/d_demo.php");
        $("form").attr("method", "POST");
        $("form").submit();
    }
})


