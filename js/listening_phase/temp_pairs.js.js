
var AIArray = ['music/AIBachHCII.mp3', 'music/AIBachHCIII.mp3', 'music/AIBachBCI.mp3', 'music/AIBachBCII.mp3', 'music/AIBachBCIII.mp3', 'music/AIMozartSII.mp3', 'music/AIMozartSIII.mp3', 'music/AIMozartSIV.mp3'] /* AI's execerpts list */
var ControlArray = ['music/HumanControl1.mp3', 'music/HumanControl2.mp3'] /* control list */
var HumanArray = ['music/HBachBCI_temp.mp3', 'music/HBachBCII_temp.mp3', 'music/HBachBCIII_temp.mp3', 'music/HBachHC1III_temp.mp3', 'music/HBachHC7II_temp.mp3',
    'music/HMozartS10I_temp.mp3', 'music/HMozartS41II_temp.mp3', 'music/HMozartS41III_temp.mp3']; /* humans' execerpts list */
// var random_music = TrialsArray[Math.floor(Math.random() * TrialsArray.length)];

function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

// random select MP3files
function sampleMusic() {
    sampleArray = [];
    // push array directly will have sub-array in the new array
    // use "..." to solve this sub-array 
    sampleArray.push(...shuffle(AIArray).slice(0, 2));  // random select two trails from AI lists (get the first two elements of suffled AI array)
    sampleArray.push(...shuffle(ControlArray).slice(0, 1));
    sampleArray.push(...shuffle(HumanArray).slice(0, 2));
    sampleArray = shuffle(sampleArray);  // suffle the five trails again
    return sampleArray;
}


/*Append <source> tag after audio*/
/*$(document).ready(function(){
  $('.InsertTag').append('<source type="audio/mp3" src='+random_music+'>')
});*/


