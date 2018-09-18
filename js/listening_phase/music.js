//--------------------------------------- wavesurfer variables ---------------------------------------
// Store the 3 buttons in some object
// 


$(function() {


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
        height: 128,
        barHeight: 1,
        // normalize: true, // positive correlate with volume
        barWidth: 4,
        minPxPerSec: 25
    });

    // Handle Play button
    buttons.play.addEventListener("click", function() {
        Spectrum.play();

        // Enable/Disable respectively buttons
        buttons.Restart.disabled = false;
        buttons.pause.disabled = false;
        buttons.play.disabled = true;
    }, false);

    // Handle Pause button
    buttons.pause.addEventListener("click", function() {
        Spectrum.pause();

        // Enable/Disable respectively buttons
        buttons.pause.disabled = true;
        buttons.play.disabled = false;
    }, false);


    // Handle Restart button
    buttons.Restart.addEventListener("click", function() {
        Spectrum.stop();

        // Enable/Disable respectively buttons
        buttons.pause.disabled = true;
        buttons.play.disabled = false;
        buttons.Restart.disabled = true;
    }, false);


    // Add a listener to enable the play button once it's ready
    Spectrum.on('ready', function() {
        buttons.play.disabled = false;
    });

    // If you want a responsive mode (so when the user resizes the window)
    // the spectrum will be still playable
    window.addEventListener("resize", function() {
        // Get the current progress according to the cursor position
        var currentProgress = Spectrum.getCurrentTime() / Spectrum.getDuration();

        // Reset graph
        Spectrum.empty();
        Spectrum.drawBuffer();
        // Set original position
        Spectrum.seekTo(currentProgress);

        // Enable/Disable respectively buttons
        buttons.pause.disabled = true;
        buttons.play.disabled = false;
        buttons.Restart.disabled = false;
    }, false);


    //--------------------------------------- record listening time ---------------------------------------



    //     var songTime = 0;
    //     setInterval(function() {
    //         if (Spectrum.isPlaying() == true) {
    //             //console.log("Sucessful record");
    //             songTime = (Number(songTime) + 0.01).toFixed(2); // Number() change the string into number 
    //             $('#TimeCount').text("Play Time" + songTime);
    //         }
    //     }, 10);

    // Set the time information in "X:XX" form
    var formatTime = function(time) {
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
    Spectrum.on('ready', function() {
        //console.log("Sucessfully assess current time");
        $('#TimeInformation').text(formatTime(Spectrum.getCurrentTime()) + " / " + formatTime(Spectrum.getDuration()));
    });


    Spectrum.on('audioprocess', function() {
        //console.log("Sucessfully assess current time");
        $('#TimeInformation').text(formatTime(Spectrum.getCurrentTime()) + " / " + formatTime(Spectrum.getDuration()));
    });


    Spectrum.on('seek', function() {
        //console.log("Sucessfully assess current time");
        $('#TimeInformation').text(formatTime(Spectrum.getCurrentTime()) + " / " + formatTime(Spectrum.getDuration()));
    });



    // 一開始先 load 第0首
    var idx = 0;
    var random_music = sampleMusic();
    Spectrum.load(random_music[idx]); // random assign music here 

    //  記錄每一首歌的時間
    var listeningTime = {};
    setInterval(function() {
        if (Spectrum.isPlaying() === true) {

            // 如果music 已經有紀錄，就取出之前紀錄的時間，不然songTime就設為0
            let music = random_music[idx];
            let songTime = (music in listeningTime) ? listeningTime[music] : 0;

            // 累加時間
            //console.log("Sucessful record");
            songTime = (Number(songTime) + 0.01).toFixed(2); // Number() change the string into number 
            $('#TimeCount').text("Play Time" + songTime);

            // 把時間存回去            
            listeningTime[music] = songTime;
            console.log(listeningTime);
        }
    }, 10);


    $("#next").click(function() {

        // TODO: 上傳分數 要吃music ID 當 參數


        // TODO: 上傳完要做判斷，如果是第五個就是問卷結束
        if (idx === 5) {

        }

        // TODO: 繼續 清掉range bar
        idx += 1;
        Spectrum.load(random_music[idx]); // random assign music here 
        reloadRangebar();
        $('#MEMCscale').hide();

    });





})