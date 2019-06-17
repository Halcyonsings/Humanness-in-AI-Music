//--------------------------------------- wavesurfer variables ---------------------------------------
// Store the 3 buttons in some object
// 


// $(function() {


var buttons = {
    play: document.getElementById("btn-play"),
    pause: document.getElementById("btn-pause"),
    Restart: document.getElementById("btn-Restart")
};

// Create an instance of wave surfer with its configuration
var Spectrum = WaveSurfer.create({
    container: '#audio-spectrum',
    waveColor: 'violet',
    progressColor: 'purple',
    height: 80,
    barHeight: 2,
    // normalize: true, // positive correlate with volume
    barWidth: 4,
    minPxPerSec: 25
});

// Handle Play button
buttons.play.addEventListener("click", function () {
    Spectrum.play();

    // Enable/Disable respectively buttons
    buttons.Restart.disabled = false;
    buttons.pause.disabled = false;
    buttons.play.disabled = true;
}, false);

// // Handle Pause button
// buttons.pause.addEventListener("click", function () {
//     Spectrum.pause();

//     // Enable/Disable respectively buttons
//     buttons.pause.disabled = true;
//     buttons.play.disabled = false;
// }, false);


// // Handle Restart button
// buttons.Restart.addEventListener("click", function () {
//     Spectrum.stop();
//     // Enable/Disable respectively buttons
//     buttons.pause.disabled = true;
//     buttons.play.disabled = false;
//     buttons.Restart.disabled = true;
// }, false);


// Add a listener to enable the play button once it's ready
Spectrum.on('ready', function () {
    buttons.play.disabled = false;
});

// If you want a responsive mode (so when the user resizes the window)
// the spectrum will be still playable
window.addEventListener("resize", function () {
    // Get the current progress according to the cursor position
    var currentProgress = Spectrum.getCurrentTime() / Spectrum.getDuration();

    // Reset graph
    Spectrum.empty();
    Spectrum.drawBuffer();
    // Set original position
    Spectrum.seekTo(currentProgress);

    // Enable/Disable respectively buttons
    buttons.pause.disabled = false;
    buttons.play.disabled = true;
    buttons.Restart.disabled = false;
}, false);


//--------------------------------------- record listening time ---------------------------------------


// Set the time information in "X:XX" form
var formatTime = function (time) {
    return [
        Math.floor((time % 3600) / 60), // minutes
        ('00' + Math.floor(time % 60)).slice(-2) // seconds
    ].join(':');
};

// // Show current time
//   Spectrum.on('audioprocess', function () {
//   //console.log("Sucessfully assess current time");
//   $('.waveform-counter').text( "Current Time" + formatTime(Spectrum.getCurrentTime()) );
//   });

// // Show clip duration
//   Spectrum.on('ready', function () {
//   //console.log("Sucessfully assess duration");
//   $('.waveform-duration').text( "Duration"+ formatTime(Spectrum.getDuration()) );
//   });

//--------------------------------------- Update for time information ---------------------------------------
Spectrum.on('ready', function () {
    //console.log("Sucessfully assess current time");
    $('#TimeInformation').text(formatTime(Spectrum.getCurrentTime()) + " / " + formatTime(Spectrum.getDuration()));
});


Spectrum.on('audioprocess', function () {
    //console.log("Sucessfully assess current time");
    $('#TimeInformation').text(formatTime(Spectrum.getCurrentTime()) + " / " + formatTime(Spectrum.getDuration()));
});


Spectrum.on('seek', function () {
    //console.log("Sucessfully assess current time");
    $('#TimeInformation').text(formatTime(Spectrum.getCurrentTime()) + " / " + formatTime(Spectrum.getDuration()));
});

