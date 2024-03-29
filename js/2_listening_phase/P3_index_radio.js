/**
 * @author Doublebite r05921030@g.ntu.edu.tw
 * @fileoverview - 使用music.js跟memc.js初始化的問卷跟音樂物件以執行問卷功能的script
 */

function random_item(items) {

    return items[Math.floor(Math.random() * items.length)];

}

var x = document.createElement('script');
x.src = 'http://mil.psy.ntu.edu.tw/~hsiang/js/2_listening_phase/music.js';

// The umber of questions to render and the current page
// Declare the variable for the play list of musics
let currentTrial = 1;
let playList;
var allAnswers = {};

// Render the questions
MEMC.render("memc");


// Get the music list(a csv file) from server, save to our play list, and then play the first song
$.ajax({

    url: "positive_EDE_clips_information.csv",
    dataType: "text",

})
    .done(function (csv) {

        // Get an object with each music item taking its ID as key.
        const musicItems = $.csv.toObjects(csv) // Returns an array:  Array[0] = {clips_id: "1", pairs: "1", author: "AI", music_file: "music/AIBachHCII.mp3"}
        // console.log("Music items", musicItems);

        // Ramdon sample two numbers in range 1 to 8, and get the musics which pair id is in the sampled IDs
        // Sample the control music.

        // ===== All random selcet =====
        // let sampledIDs = shuffle([1~48]).slice(0, 12); // set trial numbers

        // ===== Stratified Pair Sampling =====
        AIBBCfastmajor = shuffle([1, 2]).slice(0, 1);
        HBBCfastmajor = shuffle([25, 28]).slice(0, 1);
        BBCfastminorpair = [4, 27]
        BBCslowpair = [3, 26];
        BBCfastmajorpair = AIBBCfastmajor.concat(HBBCfastmajor);
        BBCpair = random_item([BBCslowpair, BBCfastminorpair, BBCfastmajorpair, BBCfastmajorpair]);
        // console.log("BBC Pair", BBCpair);

        BHCMovOne = [5, 29];
        BHCslowpair = [6, 30];
        BHCMovThreeminor = [7, 32];
        BHCMovThreemajor = [8, 31];
        BHCpair = random_item([BHCMovOne, BHCslowpair, BHCMovThreeminor, BHCMovThreemajor]);
        // console.log("BHC Pair", BHCpair);

        AIBHImajor = shuffle([10, 12]).slice(0, 1);
        HBHImajor = shuffle([33, 35]).slice(0, 1); // BMV774 = Invention 3; BMV779 = Invention 8
        BHImajorpair = AIBHImajor.concat(HBHImajor)
        AIBHIminor = shuffle([9, 11]).slice(0, 1);
        HBHIminor = shuffle([34, 36]).slice(0, 1); // BMV778 = Invention 7; BMV784 = Invention 13
        BHIminorpair = AIBHIminor.concat(HBHIminor);
        BHIpair = random_item([BHImajorpair, BHIminorpair]);
        // console.log("BHIpair", BHIpair);

        MSMovOne = [13, 37];
        MSMovTwo = [14, 38];
        MSMovThree = [15, 39];
        MSMovFour = [16, 40];
        MSpair = random_item([MSMovOne, MSMovTwo, MSMovThree, MSMovFour]);
        // console.log("MSpair", MSpair);

        AIMPCfast = shuffle([17, 18, 20]).slice(0, 1);
        HMPCfast = shuffle([41, 43, 44]).slice(0, 1);
        MPCslowpair = [19, 42];
        MPCfastpair = AIMPCfast.concat(HMPCfast);
        MPCpair = random_item([MPCslowpair, MPCfastpair, MPCfastpair, MPCfastpair]);
        // console.log("MPC Pair", MPCpair);

        AIMPSfast = shuffle([21, 24]).slice(0, 1);
        HMPSfast = shuffle([45, 46]).slice(0, 1);
        MPSfastpair = AIMPSfast.concat(HMPSfast);
        MPSslowmajorpair = [23, 47];
        MPSslowminorpair = [22, 48];
        MPSpair = random_item([MPSfastpair, MPSfastpair, MPSslowmajorpair, MPSslowminorpair]);
        // console.log("MPS Pair", MPSpair);

        sampledIDs = BBCpair.concat(BHCpair).concat(BHIpair).concat(MSpair).concat(MPCpair).concat(MPSpair)



        // ===== Stratified Pairs Sampling =====
        let sampledMusics = musicItems.filter(item => sampledIDs.includes(+item.clips_id));

        // If control music is needed
        // let controlMusic = musicItems[shuffle([16, 17])[0]];

        // Set our play list

        // If control music is needed
        // playList = sampledMusics.concat(controlMusic).map(item => item.music_file);

        // playList = sampledMusics;
        sampledMusics = shuffle(sampledMusics);
        // console.log(sampledMusics);

        // If control music is not needed
        playList = sampledMusics.map(item => item.music_file);

        // ********** Condition 3: author information **********
        authorList = sampledMusics.map(item => item.author);

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
songTime = 0;

// start furst trial information
$(document).ready(function () {
    // $('.ButtonSet').hide();

    // Show button only after music loaded
    Spectrum.on('ready', (e) => {
        // alert("READY")
        // $('.ButtonSet').show(300);
        $('#currinfo').html("&nbsp(1/" + playList.length + ")");
    })
}); // &nbsp to add space

var trialRT = {};
currTrial_start = 0;
currTrial_end = 0;

temp = 0

// start fisrt trial clock
function DelayMEMC() {
    $('#btn-play').addClass("once-button");
    let ClipDur = (Spectrum.getDuration()) * 1000; // get the duration of the clip
    // temp = ClipDur
    $('#memc').delay(ClipDur).show(300);
    $('#MEMCscale').delay(ClipDur).show(300).scrollTop(0);
    // $('#MEMCguide').delay(ClipDur).hide(300);
    $('#music-section').delay(ClipDur).hide(300);
    $('html, body').animate({
        scrollTop: $('#memc').offset().top - 300
    }, 'slow');

    // Count response time after the questionnaire show
    setTimeout(function () {
        currTrial_start = performance.now();
    }, ClipDur);
    // [2019071] correct PlayTime record 
    // Useless code
    // let StopPlaying = Spectrum.getDuration() - 10;
    // temp = StopPlaying
    // if (songTime == StopPlaying) {
    //     Spectrum.pause();
    //     console.log("forced stop");
    // }
}

var hurrysubject = 0;

function nextStep() {
    // Get answers and 
    let phase = MEMC.getCurrentPhase();
    let phaseAnswers = MEMC.getAnswers(phase);
    // temp = phaseAnswers
    // let ClipDur = Spectrum.getDuration() + 1; // get the duration of the clip
    // check_end = performance.now()
    // let checkRT = (check_end - currTrial_start) / 1000; // the duration that subjects have listened

    // Send the end time 
    songTime = Spectrum.getCurrentTime();
    songTime = songTime.toFixed(2);

    // Check time, submit the answers and jump to next page.
    // Phase 1 check
    // if (phase === "phase1") { //  && checkRT < ClipDur
    //     // If the clip is not finished, alert the user.
    //     alert("Please listen to the clip till the end.");
    //     hurrysubject = hurrysubject + 1;
    //     console.log("do not want to do", hurrysubject)
    // }
    // Phase 2 check
    if (Object.values(phaseAnswers).includes(undefined)) {
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
            currTrial_end = performance.now()
            currTrialRT = currTrial_end - currTrial_start;
            currTrialRT = currTrialRT / 1000;
            currTrialRT = currTrialRT.toFixed(2);
            trialRT[playList[currentTrial - 1]] = currTrialRT;

            // Jump to next page
            if (currentTrial == playList.length) {
                // The last trial is over. Do something.
                // console.log(allAnswers);
                // $(document).trigger('ListeningPhaseEnd', { 'playTime': playTime, 'allAnswers': allAnswers });

                // Stringify JSON data to save in backend
                // var playTime_json = JSON.stringify(playTime);    // Fail: playTime_json will be empaty collection {}
                // var allAnswers_json = JSON.stringify(allAnswers);
                
                // Hide question when finished
                $('#MEMCscale').hide();
                $('#memc').hide();

                window.onbeforeunload = null;
                $("#user_id").attr("value", uid);
                $("#play_Time").attr("value", JSON.stringify(playTime));
                $("#all_Answers").attr("value", JSON.stringify(allAnswers));
                $("#all_RT").attr("value", JSON.stringify(trialRT));
                $("#hurry_subject").attr("value", hurrysubject);
                $("#inattention_P2").attr("value", inattention);
                // $("#user_object").attr("value", user_json);

                // form submission
                $("form").attr("action", "db/P3_b_listening_phase.php");
                $("form").attr("method", "POST");
                $("form").submit();
            } else {
                currentTrial++;
                Spectrum.load(playList[currentTrial - 1]);
                MEMC.shuffle();
                songTime = 0;
                ClipDur = 0;
                currTrial_start = 0;

                // $('.WaitMusic').toggle(1800).hide();
                $('#curr-author').html("Please wait for loading music");
                $('#memc').hide();
                $('#MEMCscale').hide();
                $('.ButtonSet').hide();
                $('#music-section').show();
                
                // Show button only after music loaded
                Spectrum.on('ready', (e) => {
                    // alert("READY")
                    $('.ButtonSet').show(300);

                    // ********** Condition 3: author information **********
                    $(document).ready(function () { $('#curr-author').html(authorList[currentTrial - 1]).show() });


                    $('#currinfo').html("&nbsp(" + currentTrial + "/" + playList.length + ")"); // update current trial info
                })


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