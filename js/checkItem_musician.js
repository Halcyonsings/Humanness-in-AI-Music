// checking all radio in the page
function checkNotice(itemAmout) {
    // check the 'data-item-check'
    var counter = 0;
    for (var ci = 1; ci <= itemAmout; ci++) {
        if ($('input[name=ICnotice' + ci + ']:checked').val() == undefined) {
            alert('Please check the box.');
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
    var unanswerQ = []
    for (var ci = 1; ci <= itemAmout; ci++) {
        if ($('input[name=AC' + ci + ']:checked').val() == undefined) {
            counter++;
            unanswerQ.push(ci);
        }
    }
    if (counter == 0) { return "finished" }
    else { alert('Please answer Question ' + unanswerQ + '.'); } // show unanswered questions at the same time
}

// checking range item
// function checkRange(itemAmout) {
//     var counter = 0;
//     for (var ci = 1; ci <= itemAmout; ci++) {
//         // checkMsg = "item" + ci + "_on";
//         if ($('input[name=item' + ci + ']').attr("data-check") != "on") {
//             alert('Question ' + ci + ' is not answered.');
//             counter++;
//             break
//         }
//     }
//     if (counter == 0) { return "finished" }
// }

validMAAB = {
    "1": function () { // question 1:listening_hours
        if (isNaN(parseInt($("input[name='listening_hours']").val()))) {
            console.log("Please enter your listening hours.");
        } else {
            return "finished"
        }
        $("input[name='listening_hours']").val()
    },
    "2": function () { // question 2:spend_money
        if (isNaN(parseInt($("input[name='spend_money']").val()))) {
            console.log("Please enter how much do you spend.");
        } else {
            return "finished"
        }
        $("input[name='spend_money']").val()
    },
    "3": function () { // question 3:source
        if ($("input[name='source']:checked").val() == undefined) {
            console.log("Please select your music source.");
        } else {
            return "finished"
        }
    },
    "4": function () { // question 4:self_image
        if ($("input[name='self_image']:checked").val() == undefined) {
            console.log("Please indicate your identity.");
        } else {
            return "finished"
        }
    },
    "5": function () { // question 5:instrument
        var text_instrument = $("input[name='instrument']").val();
        if (text_instrument == null || text_instrument == "") {
            console.log("Please indicate your major instruments.");
        } else {
            return "finished"
        }
        $("input[name='training_min']").val();
    },
    "6": function () { // question 6:training_yr
        if (isNaN(parseInt($("input[name='training_yr']").val()))) {
            console.log("Please enter your training years.");
        } else {
            return "finished"
        }
        $("input[name='training_yr']").val();
    },
    "7": function () { // question 7:training_min
        if (isNaN(parseInt($("input[name='training_min']").val()))) {
            console.log("Please enter your practicing minutes.");
        } else {
            return "finished"
        }
        $("input[name='training_min']").val();
    },
    "8": function () { // question 8:advisors
    var text_advisors = $("input[name='advisors']").val();
        if (text_advisors == null || text_advisors == "") {
            console.log("Please enter your advisors' name.");
        } else {
            return "finished"
        }
        $("input[name='training_min']").val();
    },
    "10": function () { // question 10:genre
        if ($("input[name='genre']:checked").val() == undefined) {
            console.log("Please select the music genres you like.");
        } else {
            return "finished"
        }
    },
}

var validatePostCode = function (postCode) {
    var parsePostCode = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
    return parsePostCode.test(postCode);
};

// check the item in demographic form
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
        // if (validatePostCode(document.getElementById("postcode").value) == false) {
        if (isNaN(parseInt($("input[name='spend_money']").val()))) {
            alert("Please fill in the zip code.");
        }
        else {
            return "finished"
        }
    },
    // "MturkWorkerID": function () {
    //     var text_workerID = $("input[name='MturkWorkerID'").val();
    //     if (text_workerID == null || text_workerID == "") {
    //         alert("Please indicate your Mturk Worker ID.");
    //     } else {
    //         return "finished"
    //     }
    //     $("input[name='MturkWorkerID']").val();
    // },
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
    //         alert("Please enter your E-mail.")
    //     }
    // },
}

function checkAllMAAB() {
    var counter = 0;
    var unanswerMAAB = []
    for (var i in validMAAB) {
        var checking = validMAAB[i]();
        if (checking == undefined) {
            counter++;
            unanswerMAAB.push(i);
        }
    }
    if (counter == 0) {
        return "allFinished"
    } else {
        alert('Please answer Question ' + unanswerMAAB + '.');
    } // show unanswered questions at the same time

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