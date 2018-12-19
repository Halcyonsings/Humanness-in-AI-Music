// checking all radio in the page
function checkRadios(itemAmout) {
    // check the 'data-item-check'
    var counter = 0;
    for (var ci = 1; ci <= itemAmout; ci++) {
        if ($('input[name=AC' + ci + ']:checked').val() == undefined) {
            alert('Question' + ci + ' is not answered.');
            counter++;
            break
        }
    }
    if (counter == 0) { return "finished" }
}

// checking range item
function checkRange(itemAmout) {
    var counter = 0;
    for (var ci = 1; ci <= itemAmout; ci++) {
        // checkMsg = "item" + ci + "_on";
        if ($('input[name=item' + ci + ']').attr("data-check") != "on") {
            alert('Question' + ci + ' is not answered.');
            counter++;
            break
        }
    }
    if (counter == 0) { return "finished" }
}

// check the item in demographical form
// maybe object is better
validateDemo = {
    "age": function () {
        if (isNaN(parseInt($("input[name='age']").val()))) {
            alert("Please enter your age (number).");
        } else {
            return "finished"
        }
        $("input[name='age']").val()
    },
    "sex": function () {
        if ($("input[name='sex']:checked").val() == undefined) {
            alert("Please response your gender.");
        } else {
            return "finished"
        }
    },
    "training": function () {
        if (isNaN(parseInt($("input[name='training']").val()))) {
            alert("Please enter your training years (number).");
        } else {
            return "finished"
        }
        $("input[name='training']").val()
    },

    "edu": function () {
        if ($("select[name='education']").val() == "--Please Select--") {
            alert("Please your education level.");
        } else {
            return "finished"
        }
    },
    "email": function () {
        var emailANS = $("input[name='email']").val()
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (re.test(String(emailANS).toLowerCase())) {
            return "finished"
        } else {
            alert("請填寫email")
        }
    },
}

function checkAllDemo() {
    var counter = 0;
    for (var i in validateDemo) {
        var checking = validateDemo[i]();
        if (checking == undefined) {
            counter++;
            break;
        }
    }
    if (counter == 0) {
        return "allFinished"
    }
}