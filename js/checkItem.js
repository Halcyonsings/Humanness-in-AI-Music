// checking all radio in the page
function checkNotice(itemAmout) {
    // check the 'data-item-check'
    var counter = 0;
    for (var ci = 1; ci <= itemAmout; ci++) {
        if ($('input[name=ICnotice' + ci + ']:checked').val() == undefined) {
            alert('Please check the boxes.');
            counter++;
            break
        }
    }
    if (counter == 0) { return "finished" }
}

// checking all radio in the page
function checkRadios(itemAmout) {
    // check the 'data-item-check'
    var counter = 0;
    for (var ci = 1; ci <= itemAmout; ci++) {
        if ($('input[name=AC' + ci + ']:checked').val() == undefined) {
            alert('Question ' + ci + ' is not answered.');
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
            alert('Question ' + ci + ' is not answered.');
            counter++;
            break
        }
    }
    if (counter == 0) { return "finished" }
}

validMAAB = {
    "listening_hours": function () {
        if (isNaN(parseInt($("input[name='listening_hours']").val()))) {
            alert("Please enter your listening hours.");
        } else {
            return "finished"
        }
        $("input[name='listening_hours']").val()
    },
    "spend_money": function () {
        if (isNaN(parseInt($("input[name='spend_money']").val()))) {
            alert("Please enter how much do you spend.");
        } else {
            return "finished"
        }
        $("input[name='spend_money']").val()
    },
    "source": function () {
        if ($("input[name='source']:checked").val() == undefined) {
            alert("Please select your music source.");
        } else {
            return "finished"
        }
    },
    "diploma": function () {
        if ($("input[name='diploma']:checked").val() == undefined) {
            alert("Please indicate whether you have a diploma or not.");
        } else {
            return "finished"
        }
    },
    "training_yr": function () {
        if (isNaN(parseInt($("input[name='training_yr']").val()))) {
            alert("Please enter your training years.");
        } else {
            return "finished"
        }
        $("input[name='training_yr']").val()
    },
    "training_min": function () {
        if (isNaN(parseInt($("input[name='training_min']").val()))) {
            alert("Please enter your practicing minutes.");
        } else {
            return "finished"
        }
        $("input[name='training_min']").val()
    },
    "genre": function () {
        if ($("input[name='genre']:checked").val() == undefined) {
            alert("Please select music genres you like.");
        } else {
            return "finished"
        }
    },
}

var validatePostCode = function (postCode) {
    var parsePostCode = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
    return parsePostCode.test(postCode);
};

// check the item in demographical form
// maybe object is better
validateDemo = {
    "age": function () {
        if (isNaN(parseInt($("input[name='age']").val()))) {
            alert("Please enter your age.");
        } else {
            return "finished"
        }
        $("input[name='age']").val()
    },
    "sex": function () {
        if ($("input[name='sex']:checked").val() == undefined) {
            alert("Please select your gender.");
        } else {
            return "finished"
        }
    },
    "ZipCode": function () {
        // if (isNaN(parseInt($("input[name='ZipCode']").val()))) {
        //     alert("Please select your zip code.");
        // }
        // else 
        if (validatePostCode(document.getElementById("postcode").value) == false) {
            alert("Please fill in a 5-digit number.");
        }
        else {
            return "finished"
        }
    },
    "edu": function () {
        if ($("select[name='education']").val() == "--Please Select--") {
            alert("Please select your education level.");
        } else {
            return "finished"
        }
    },
    "race": function () {
        if ($("select[name='race']").val() == "--Please Select--") {
            alert("Please select your race.");
        } else {
            return "finished"
        }
    },

    // "email": function () {
    //     var emailANS = $("input[name='email']").val()
    //     var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //     if (re.test(String(emailANS).toLowerCase())) {
    //         return "finished"
    //     } else {
    //         alert("請填寫email")
    //     }
    // },
}

function checkAllMAAB() {
    var counter = 0;
    for (var i in validMAAB) {
        var checking = validMAAB[i]();
        if (checking == undefined) {
            counter++;
            break;
        }
    }
    if (counter == 0) {
        return "allFinished"
    }
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