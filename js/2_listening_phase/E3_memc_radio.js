/**
 * @author - Doublebite r05921030@g.ntu.edu.tw
 * @fileoverview - 此script負責定義問卷的題目、以及相關操作的function。
 * MEMC本身是ㄧ個object，無論是題目或是相關操作都可以透過MEMC.xxx來使用。
 * 相關操作的function包括：
 *          1. render: 繪製題目container 及題目到所指定的 div 
 *          2. shuffle: 重新整理題目，並把 select 歸零
 *          3. getAnswers: 得到所填寫的問卷答案
 */



// Define question text
let MEMC = {
    // Musical Emotion
    "1": "\nFilled with wonder, Amazed",
    "2": "\nMoved, Touched",
    "3": "\nEnchanted,    In awe",
    "4": "\nInspired, Enthusiastic",
    "5": "\nEnergetic, Lively",
    "6": "\nJoyful, Wanting to dance",
    "7": "\nPowerful, Strong",
    "8": "\nFull of tender, Warmhearted",
    "9": "\nRelaxed, Peaceful",
    "10": "\nSad, Melancholic",
    "11": "\nNostalgic, Sentimental",
    "12": "\nIndifferent, Bored",
    "13": "\nTense,    Uneasy",
    "14": "\nAgitated, Aggressive",
    // Musical Cognition
    "15": "\nStructured",
    "16": "\nOrderly",
    "17": "\nBalanced",
    "18": "\nArtistic",
    "19": "\nClear",
    "20": "\nComplex",
    "21": "\nOrnate",
    "22": "\nSubtle",
    "23": "\nDelicate",
    // Add by experimenters
    "24": "\nFamiliar",
    "25": "\nAwkward",
    // Catch trial
    "26": "Select 2 here.",
    // Special questions
    "27": "What is your overall preference of the clip (from 1 to 5)? You like it _____.",
    "28": "In my recall, this clip is composed by ____. (H = Human)",
}


// The state variable to record the current page
MEMC.phase = "phase1"; // Phase1 for question 1-26, phase 2 for question 27, 28.

// Phase 1 question IDs.
MEMC.phase1Ids = Array(26).fill().map((i, v) => v + 1); // 1-25
// MEMC.phase1Ids = [1, 2, 3, 4, 5];

// Phase 2 question IDs.
MEMC.phase2Ids = [27, 28]; //In condition 2 and 3, this should be "= [27, 28]"


/**
 * 繪製題目container 及題目到所指定的 div ID，首先會先畫出 M x N 個container，然後再對每一個container填上題目
 * @param {string} divToRender - The div ID to render problems.
 */
MEMC.render = function (divToRender) {

    let $memc = $(`#${divToRender}`);
    this.memc = $memc;

    // Render phase-1 container with the 1-26 questions
    let $phase1Container = $(`<div class="question-container" id="phase1"></div>`);
    $memc.append($phase1Container);
    this.renderEmptyCards("phase1", MEMC.phase1Ids.length, pn = 1);
    this.renderQuestions("phase1", MEMC.phase1Ids, isRandom = true);
    this.phase1Container = $phase1Container;

    // Render the phase-2 container with the 27, 28 question
    let $phase2Container = $(`<div class="question-container" id="phase2"></div>`);
    $memc.append($phase2Container);
    this.renderEmptyCards("phase2", MEMC.phase2Ids.length, pn = 2);
    this.renderQuestions("phase2", MEMC.phase2Ids, isRandom = false);
    this.phase2Container = $phase2Container;
    this.phase2Container.hide();


    // Set the conatiners property for our object
    // Make our select more functional with Jquery UI 
    // Add click listener
    this.cards = $(".question-card");
    //     this.cards.find("select").selectmenu({
    //         classes: {
    //             "ui-selectmenu-button": " question-menu",
    //         },
    //         width: '80%'
    //     });
    //     this.cards.click(function () {
    //         $(this).find("select").selectmenu("open");
    //     });

}


/**
 * 繪製問卷card到所指定的container，問卷container裡面首先會先畫出 M x N 個card
 * @param {string} divToRender - The div ID to render problems.
 * @param {int} numQuestion - The number of questions to render.
 * @param {int} numQuesPerRow - The number of questions per row.
 * @return {null}
 */
MEMC.renderEmptyCards = function (divId, numQuestion, pn) { // pn = Phase Number
    // alert(pn);
    numQuesPerRow = 6;
    let $memcContainer = $(`#${divId}`); // The questionnaire container
    let numRow = Math.ceil(numQuestion / numQuesPerRow); // The number of row to render
    let counter = 0;

    // Draw M x N empty containers to render our question text.
    for (let i = 0; i < numRow; i++) {

        let $memcRow = $(`<div class="row" id="memc-row-${i}"></div>`);
        $memcContainer.append($memcRow);

        for (let j = 1; j <= numQuesPerRow; j++) {
            // autocomplete "off" to delete the last answer
            let quesCard = `<div class="col-12 MEMCCard col-sm-2">` + // col-sm-2: set the quetion card 1/6 width
                `<div class="row btn-info align-items-center question-card" id="question-card-${i * 6 + j}">` +
                ` <div class="col-12">` +
                `<h5></h5>` +
                `</div>` +
                `<div class="col-12 d-flex justify-content-center">` +
                `<div class="MEMCLabel" id=label-${pn}-${i * 6 + j}>1&nbsp&nbsp2&nbsp&nbsp3&nbsp&nbsp4&nbsp&nbsp5</div>` +
                `<group class="inline-radio MEMCbutton">` +
                `<input type="radio" value="1" id="fisrtOP-${i * 6 + j}" name="amplitude-${pn}-${i * 6 + j}" autocomplete="off"/>&nbsp` +
                `<input type="radio" value="2" id="secondOP-${i * 6 + j}" name="amplitude-${pn}-${i * 6 + j}" autocomplete="off"/>&nbsp` +
                `<input type="radio" value="3" id="thirdOP-${i * 6 + j}" name="amplitude-${pn}-${i * 6 + j}" autocomplete="off"/>&nbsp` +
                `<input type="radio" value="4" id="fourthOP-${i * 6 + j}" name="amplitude-${pn}-${i * 6 + j}" autocomplete="off"/>&nbsp` +
                `<input type="radio" value="5" id="fifthOP-${i * 6 + j}" name="amplitude-${pn}-${i * 6 + j}" autocomplete="off"/>` +
                `</group>` +
                `</div>` +
                `</div>` +
                `</div>`;
            $memcRow.append(quesCard);
            counter += 1;
            if (counter === numQuestion) break;
        }

    }

}


/**
 * (Axiliary function) Render the questions to each container
 * @param {boolean} isRandom - whether to randomly render
 * @return {null}
 */
MEMC.renderQuestions = function (containerId, questionIds, isRandom) {

    let $memcContainer = $(`#${containerId}`); // The questionnaire container
    let $cards = $memcContainer.find(".question-card");
    let ids = questionIds;
    if (isRandom)
        ids = shuffle(ids);
    console.log("The order of question IDs", ids);

    //   Render the text to each container one by one.
    ids.forEach(function (id, index) {
        $cards.eq(index).find("h5").html(`${index + 1}.<br/>${MEMC[id]}`);
        $cards.eq(index).find("group").attr("id", `question-${id}`);
    });
}



/**
 * 重新整理continaer1的題目，並把 select 歸零
 * @param {null} 
 * @return {null}
 */
MEMC.shuffle = function () {
    // Re-render the questions
    this.renderQuestions("phase1", MEMC.phase1Ids, isRandom = true);
    // clear the selections.
    this.clear();
}



/**
 * 得到所填寫的問卷答案，並回傳一個object，key是問卷題號，value是針對該題的回答。
 * @param {null}
 * @return {Object} answers- 
 */
MEMC.getAnswers = function (phase = "all") {

    let targetContainer;
    if (phase === "phase1")
        targetContainer = this.phase1Container;
    else if (phase === "phase2")
        targetContainer = this.phase2Container;
    else
        targetContainer = this.memc;

    // Collect answers
    let answers = {};
    targetContainer.find('group').each(function (index) {
        answers[$(this).attr("id")] = $(this).children("input:checked").val();
    });
    return answers
}


/**
 * Demonstrates how top-level functions follow the same rules.  This one
 */
MEMC.getCurrentPhase = function () {
    return this.phase;
}



/**
 * Toggle the memc phase1 and phase2
 * Able or Disable Button 
 */
MEMC.toggle = function () {

    if (this.phase === "phase1") {
        this.phase = "phase2";
        // adjust the card height/ width for phase 2
        $(".MEMCCard").removeClass("col-sm-2");
        $(".MEMCCard").addClass("col-sm-6");

        // customized label
        $("#label-2-2").html("&nbspH&nbsp&nbsp&nbsp&nbsp&nbspAI&nbsp&nbsp&nbspForget").css("width", "85px");;
        $("#label-2-1").html("1&nbsp&nbsp2&nbsp&nbsp3&nbsp&nbsp4&nbsp&nbsp5");
        // $(".TuringLabel").show();
        $("#secondOP-2, #fourthOP-2").addClass("hidebutton");
        this.phase1Container.hide();
        this.phase2Container.show();
    } else {
        this.phase = "phase1";
        // set the quetion card of phase1 25% width
        $(".MEMCCard").removeClass("col-sm-6");
        $(".MEMCCard").addClass("col-sm-2");
        $('#btn-play').removeClass("once-button");

        // $(".TuringLabel").show();
        $(".MEMCLabel").html("1&nbsp&nbsp2&nbsp&nbsp3&nbsp&nbsp4&nbsp&nbsp5");
        $("#secondOP-2, #fourthOP-2").removeClass("hidebutton");
        this.phase1Container.show();
        this.phase2Container.hide();
    }
    return this.phase
}


/**
 * (Axiliary function) Clear the selections.
 * Reference ---- Select Menu: The reply of Stephen James on https://stackoverflow.com/questions/6305253/jquery-ui-selectmenu-how-to-reset-dropdown-on-form-reset-button
 * Reference ---- Radio Button: The reply of lambacck on https://stackoverflow.com/questions/977137/how-to-reset-radiobuttons-in-jquery-so-that-none-is-checked
 * @param {null}
 * @return {null}
 */
MEMC.clear = function () {
    this.cards.find('group').each(function (index) {
        $(this).children('input[type="radio"]').prop('checked', false);
    });
}



// ====================================================================
// First timing setting
// ====================================================================


//Warning before existing
// var AttemptLeave = 0


// if (window.onbeforeunload== !null) {
//   AttemptLeave += 1;
// };




/* hide the questionires first */
$('#MEMCscale').hide();
$('#memc').hide();
$('#music-section').show();

// $('.WaitMusic').hide();
// $('.WaitMusic').delay(3000).hide();


//Preventing send the data repeatedly
$("#MEMCscale").submit(function () {
    $("#MEMCbutton").prop('disabled', true);
});

//Submitting the form
$(".submit_btn").click(function () {
    window.onbeforeunload = null; //prevent window.onbeforeunload event being triggered by button
});