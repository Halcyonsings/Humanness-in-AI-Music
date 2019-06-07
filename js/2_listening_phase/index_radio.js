/**
 * @author Doublebite r05921030@g.ntu.edu.tw
 * @fileoverview - 使用music.js跟memc.js初始化的問卷跟音樂物件以執行問卷功能的script
 */




// The umber of questions to render and the current page
// Declare the variable for the play list of musics
let currentTrial = 1;
let playList;
var allAnswers = {};

// Render the questions
MEMC.render("memc");


// Get the music list(a csv file) from server, save to our play list, and then play the first song
$.ajax({

    url: "clips_information.csv",
    dataType: "text",

})
    .done(function (csv) {

        // Get an object with each music item taking its ID as key.
        const musicItems = $.csv.toObjects(csv) // Returns an array:  Array[0] = {clips_id: "1", pairs: "1", author: "AI", music_file: "music/AIBachHCII.mp3"}
        // console.log("Music items", musicItems);

        // Ramdon sample two numbers in range 1 to 8, and get the musics which pair id is in the sampled IDs
        // Sample the control music.

        // ===== stratified sampling =====
        let BHC = shuffle([1, 2]).slice(0, 1);
        // let BBC = shuffle([3, 4]).slice(0, 1);
        // let MPC = shuffle([5, 6]).slice(0, 1);
        // let MSY = shuffle([7, 8]).slice(0, 1);
        sampledIDs = BHC
        // .concat(BBC).concat(MPC).concat(MSY);

        // ===== All random selcet =====
        // let sampledIDs = shuffle([1, 2, 3, 4, 5, 6, 7, 8]).slice(0, 1); // set trial numbers

        let sampledMusics = musicItems.filter(item => sampledIDs.includes(+item.pairs));

        // If control music is needed
        // let controlMusic = musicItems[shuffle([16, 17])[0]];

        // Set our play list

        // If control music is needed
        // playList = sampledMusics.concat(controlMusic).map(item => item.music_file);

        // If control music is nit needed
        playList = sampledMusics.map(item => item.music_file);

        // playList = sampledMusics;
        playList = shuffle(playList);
        // console.log("Play list", playList);

        // Play the first song
        Spectrum.load(playList[currentTrial - 1]);

    });



/**
 * The function to execute when the "Next" button is clicked.
 * @param {null} 
 * @return {null}
 */


/// Record playing time of an excerpt
var playTime = {};
var songTime = 0;
setInterval(function () {
    if (Spectrum.isPlaying() == true) {
        //console.log("Sucessful record");
        songTime = (Number(songTime) + 0.01).toFixed(2); // Number() change the string into number 
        $('#TimeCount').text("Play Time" + songTime);
    }
}, 10);

// start furst trial information
$(document).ready(function () { $('#currinfo').html("&nbsp(1/" + playList.length + ")") }); // &nbsp to add space

var trialRT = {};
currTrail_start = 0;
currTrail_end = 0;

// start fisrt trial clock
$(document).ready(function () { currTrail_start = performance.now() });



function nextStep() {
    // Get answers and 
    let phase = MEMC.getCurrentPhase();
    let phaseAnswers = MEMC.getAnswers(phase);
    temp = phaseAnswers

    // Check answers, submit the answers and jump to next page.
    // Phase 1 check
    if (phase === "phase1" && Object.values(phaseAnswers).every((val, i, arr) => val === arr[0])) {
        // If the the answers contain null, alert the user.
        alert("Please do not report the same value of number for all answers.");

    }
    // Phase 2 check
    else if (Object.values(phaseAnswers).includes(undefined)) {
        // If the the answers contain null, alert the user.
        alert("Please finish questions: \n" + getAllIndexes(Object.values(phaseAnswers), undefined).map(e => e + 1).join(", "));
    }
    else {

        MEMC.toggle();

        if (phase === "phase1")
            return false;
        else {
            let answers = MEMC.getAnswers();
            // Do something to send these answers to server.
            // console.log(playList[currentTrial - 1], answers);
            allAnswers[playList[currentTrial - 1]] = answers;
            playTime[playList[currentTrial - 1]] = songTime;

            // Record trial RT
            currTrail_end = performance.now()
            currTrailRT = currTrail_end - currTrail_start;
            trialRT[playList[currentTrial - 1]] = currTrailRT;

            // Jump to next page
            if (currentTrial == playList.length) {
                // The last trial is over. Do something.
                // console.log(allAnswers);
                // $(document).trigger('ListeningPhaseEnd', { 'playTime': playTime, 'allAnswers': allAnswers });

                // Stringify JSON data to save in backend
                // var playTime_json = JSON.stringify(playTime);    // Fail: playTime_json will be empaty collection {}
                // var allAnswers_json = JSON.stringify(allAnswers);

                window.onbeforeunload = null;
                $("#user_id").attr("value", uid);
                $("#play_Time").attr("value", JSON.stringify(playTime));
                $("#all_Answers").attr("value", JSON.stringify(allAnswers));
                $("#all_RT").attr("value", JSON.stringify(trialRT));
                $("#inattention_P2").attr("value", inattention);
                // $("#user_object").attr("value", user_json);

                // form submission
                $("form").attr("action", "db/b_listening_phase.php");
                $("form").attr("method", "POST");
                $("form").submit();
            } else {
                currentTrial++;
                Spectrum.load(playList[currentTrial - 1]);
                MEMC.shuffle();
                songTime = 0;
                currTrail_start = performance.now()
                $('#currinfo').html("&nbsp(" + currentTrial + "/" + playList.length + ")"); // update current trial info
                // $('.WaitMusic').toggle(1800).hide();
                $('.ButtonSet').hide().delay(2000).show(300);


                $('#memc').hide();
                $('#MEMCscale').hide();
                // console.log(allAnswers);
                // console.log(playTime);
            }
        }
    }
}



/**
 * Get the indexes of the input val occuring on the input array.
 */
function getAllIndexes(arr, val) {
    var indexes = [];
    for (let i = 0; i < arr.length; i++)
        if (arr[i] === val)
            indexes.push(i);
    return indexes;
}