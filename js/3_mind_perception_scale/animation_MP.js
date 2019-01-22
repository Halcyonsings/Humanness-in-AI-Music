// Display setting
$(".MPCard").css("display", "none");


// Go to the second part
$('.NextToMP_btn').click(function () {
    // verifying
    var checking = checkRadios(5); //the number should equal to the last item
    if (checking == "finished") {
        // recording
        AC_Response = {
            AC1: $('input[name=AC1]').val(),
            AC2: $('input[name=AC2]').val(),
            AC3: $('input[name=AC3]').val(),
            AC4: $('input[name=AC4]').val(),
            AC5: $('input[name=AC5]').val(),

        }
        // animation
        $('.ACCard').addClass("hiding");
        $(".MPCard").addClass("showing");
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 700);
        setTimeout(function () {
            $(".ACCard").hide();
            $(".MPCard").show();
            // $(window).scrollTop(0);
        }, 700)
    }
});
