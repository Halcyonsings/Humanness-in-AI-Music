
// if (canContinue) {
$('#go_to_listening_btn').click(function () {
    // console.log("end");
    $("#did_Pass").attr("value", didPass);
    $("#total_Correct").attr("value", headphoneCheckData.totalCorrect);
    $("#inattention_P1").attr("value", inattention);
    $("#HC_All_Data").attr("value", headphoneCheckData);
    // form submission
    $("form").attr("action", "db/a_headphone.php")
    $("form").attr("method", "POST")
    $("form").submit()
    // window.location = "2_listening_phase.html"
})
// }