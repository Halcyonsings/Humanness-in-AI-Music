//detect idle time
var idleTime = 0;
var inattention = 0;
var idleInterval;

$(document).ready(function () {
    // disable the key "back to last page"
    // the drop out subjects cannot come back to experiment
    window.history.forward(1);


    document.oncontextmenu = function () {
        window.event.returnValue = false; // block mouse right key
    }

    //Increment the idle time counter every minute.
    idleInterval = setInterval(timerIncrement, 60000); // 60 sec
    // console.log("what is your function?", idleInterval)

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
        clearInterval(idleInterval);
        idleInterval = setInterval(timerIncrement, 60000); // 60 sec
        // console.log("reset", idleTime);
    });

});

function timerIncrement() {
    idleTime = idleTime + 1;
    console.log(idleTime);
    if (idleTime > 4) { // about 5 minutes
        alert("There has been no response for 5 minutes. You will automatically exit the experiment.");
        inattention = inattention + 1;  //record inatteional subjects
        console.log("Times", inattention)
        // drop the subject if he idle too many times. 
        if (inattention > 0) {
            window.onbeforeunload = null;
            window.location = "https://www.google.com/"
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
$(document).ready(function () {document.addEventListener("visibilitychange", function () {
    // console.log(document.hidden);
    // if (document.hidden == true) {
    if (document.visibilityState === 'hidden') {    
        offview = offview + 1;
        console.log("This massage can not be seen.", offview);
        // alert("Because you open other tabs or minimize the window, you will automatically exit the experiment.");
    }
    if (document.visibilityState === 'visible' && offview == 1) {
            window.onbeforeunload = null;
            var yes = confirm("Because you open other tabs or minimize the window, you will automatically exit the experiment.");

            if (yes) {
                confirm('You will be directed to Google.');
                setTimeout(function (){
                    // Something you want delayed.
                    window.location = "https://www.google.com/"
                    },1500); 
            } else {
                confirm('You will be directed to Google.');
                setTimeout(function (){
                    // Something you want delayed.
                    window.location = "https://www.google.com/"
                    }, 1500); 
            }
            
            
            // alert("Because you open other tabs or minimize the window, you will automatically exit the experiment.");
            // setTimeout(function (){
            //     // Something you want delayed.
            //     window.location = "https://www.google.com/"
            //   }, 3000); 
            // console.log("Hi");
        }
    }
);
})

// function userCheated() {
//     // The user cheated by leaving this window (e.g opening another window)
//     // Do something
//     window.onbeforeunload = null;
//     var yes = confirm("Because you open other tabs or minimize the window, you will automatically exit the experiment.");

//     if (yes) {
//         confirm('You will direct to Google');
//         setTimeout(function (){
//             // Something you want delayed.
//             window.location = "https://www.google.com/"
//             }, 500); 
//     } else {
//         confirm('You will direct to Google');
//         setTimeout(function (){
//             // Something you want delayed.
//             window.location = "https://www.google.com/"
//             }, 500); 
//     }
// }

// $(document).ready(function () {$(window).onblur(userCheated)});





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

// prevent double clicks in the whole website
// $(document).ready(function(){
//     $("*").click(function( ){
//         $("*").click(false);
//         setTimeout(function () {
//             $("*").click(true);
//             console.log("Prevent Double Clicks");
//         }, 1000);
//     });   
//   });

$(document).ready(function(){
    $("*").dblclick(false);
});

// $(document).ready(function(){
//     $("*").click(false);
// });

// $(document).ready(function(){
//     $("*").click(function () {
//     $(this).prop('disabled', true);
//     //LOGIC
//     setTimeout(function () { $(this).prop('disabled', false); }, 100);
// });
// });
