//detect idle time
var idleTime = 0;
var inattention = 0
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000); // 60 sec

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });

});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 2) { // 5 minutes
        alert('There have been no response for 5 miniutes. We hope that you will come back and focus on the experiment.');
        inattention = inattention + 1;  //record inatteional subjects
    }
}

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