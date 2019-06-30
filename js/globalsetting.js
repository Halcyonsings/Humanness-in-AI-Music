//detect idle time
var idleTime = 0;
var inattention = 0;
var idleInterval;

$(document).ready(function () {
    //Increment the idle time counter every minute.
    idleInterval = setInterval(timerIncrement, 60000); // 60 sec
    // console.log("what is your function?", idleInterval)

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });

});

function timerIncrement() {
    idleTime = idleTime + 1;
    console.log(idleTime);
    if (idleTime > 4) { // about 5 minutes
        alert("There has been no response for 5 miniutes. You will automatically exit the experiment.");
        inattention = inattention + 1;  //record inatteional subjects
        console.log("Times", inattention)
        // drop the subject if he idle too many times. 
        if (inattention > 0) {
            window.onbeforeunload = null;
            window.location = "https://www.mturk.com/"
        }
    }
}


// Page Visibility API
var offview = 0
var vis = (function () {
    var stateKey, eventKey, keys = {
        hidden: "visibilitychange",
        webkitHidden: "webkitvisibilitychange",
        mozHidden: "mozvisibilitychange",
        msHidden: "msvisibilitychange"
    };
    for (stateKey in keys) {
        if (stateKey in document) {
            eventKey = keys[stateKey];
            break;
        }
    }
    return function (c) {
        if (c) document.addEventListener(eventKey, c);
        return !document[stateKey];
    }
})();

// Excute when the window change, cannot excute well on IOS
document.addEventListener("visibilitychange", function () {
    // console.log(document.hidden);
    if (document.hidden == true) {
        offview = offview + 1;
        console.log("Distracted", offview);
        alert("Because you open other tabs or minimize the window, you will automatically exit the experiment.");
        if (offview > 0) {
            window.onbeforeunload = null;
            window.location = "https://www.mturk.com/"
        }
    }
});




function shuffle(array) {
    var rand, index = -1,
        length = array.length,
        result = Array(length)
    while (++index < length) {
        rand = Math.floor(Math.random() * (index + 1))
        result[index] = result[rand];
        result[rand] = array[index];
    }
    return result;
}

function range(start, end) {
    return Array(end - start + 1).fill().map((_, idx) => start + idx)
}


// function - uid generator
function uuidGenerator() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        // console.log(v.toString(16));
        return v.toString(16);
    });
}