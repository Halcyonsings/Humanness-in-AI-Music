/**
 * @author Doublebite r05921030@g.ntu.edu.tw
 * @fileoverview - 使用music.js跟memc.js初始化的問卷跟音樂物件以執行問卷功能的script
 */




// The umber of questions to render and the current page
// Declare the variable for the play list of musics
let currentTrial = 1;
let playList;
let allAnswers = {};

// Render the questions
MEMC.render("memc");


// Get the music list(a csv file) from server, save to our play list, and then play the first song
$.ajax({

        url: "clips_information.csv",
        dataType: "text",

    })
    .done(function(csv) {

        // Get an object with each music item taking its ID as key.
        const musicItems = $.csv.toObjects(csv) // Returns an array:  Array[0] = {clips_id: "1", pairs: "1", author: "AI", music_file: "music/AIBachHCII.mp3"}
        console.log("Music items", musicItems);

        // Ramdon sample two numbers in range 1 to 8, and get the musics which pair id is in the sampled IDs
        // Sample the control music.
        let sampledIDs = shuffle([1, 2, 3, 4, 5, 6, 7, 8]).slice(0, 2);
        let sampledMusics = musicItems.filter(item => sampledIDs.includes(+item.pairs));
        let controlMusic = musicItems[shuffle([16, 17])[0]];

        // Set our play list
        playList = sampledMusics.concat(controlMusic).map(item => item.music_file);
        playList = shuffle(playList);
        console.log("Play list", playList);

        // Play the first song
        Spectrum.load(playList[currentTrial - 1]);

    });



/**
 * The function to execute when the "Next" button is clicked.
 * @param {null} 
 * @return {null}
 */
function nextStep() {
    // Phase1 指的是第一階段的1-25題，phase2是第二階段的26 27
    let phase = MEMC.getCurrentPhase();
    let phaseAnswers = MEMC.getAnswers(phase);

    // Check answers, submit the answers and jump to next page. 
    if (Object.values(phaseAnswers).includes(null)) {
        // If the the answers contain null, alert the user.
        alert("Please finish questions: \n" + getAllIndexes(Object.values(phaseAnswers), null).map(e => e + 1).join(", "));
    } else {
        //不管怎樣都要換頁
        MEMC.toggle();

        // 如果是phase1就繼續做phase2
        if (phase === "phase1")
            return false;
        // 如果是phase2 就把答案存起來，看要上傳或是繼續做下去。
        else {
            let answers = MEMC.getAnswers();

            // Do something to send these answers to server.
            console.log(playList[currentTrial - 1], answers);
            allAnswers[playList[currentTrial - 1]] = answers;

            // 跳下一首歌。 Jump to next page
            if (currentTrial == playList.length) {
                // The last trial is over. Do something.
                console.log(allAnswers);
            } else {
                currentTrial++;
                Spectrum.load(playList[currentTrial - 1]);
                MEMC.shuffle();
                $('#memc').hide();
                $('#MEMCscale').hide();
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