/**
 * @author Doublebite r05921030@g.ntu.edu.tw
 * @fileoverview Manages the configuration settings for the widget.
 */




// The umber of questions to render and the current page
// Declare the variable for the play list of musics
let numQuestions = 25;
let currentTrial = 1;
let playList;


// Render the questions
MEMC.render("memc", numQuestions);


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


function nextStep() {

    // Get answers
    let answers = MEMC.getAnswers();

    if (Object.values(answers).includes(null)) {
        alert("Please finish questions: \n" + getAllIndexes(Object.values(answers), null).map(e => e + 1).join(", "));
    } else {
        // Do something to send these answers to server.
        console.log(playList[currentTrial - 1], answers);

        // Go to the next step
        if (currentTrial == playList.length) {
            // The last trial is over. Do something.
        } else {
            currentTrial++;
            Spectrum.load(playList[currentTrial - 1]);
            MEMC.shuffle();
            $('#memc').hide();
            $('#MEMCscale').hide();

        }
    }
}


function getAllIndexes(arr, val) {
    var indexes = [];
    for (let i = 0; i < arr.length; i++)
        if (arr[i] === val)
            indexes.push(i);
    return indexes;
}