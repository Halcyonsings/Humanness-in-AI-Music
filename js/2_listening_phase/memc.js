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
    "1": "Filled with wonder, amazed",
    "2": "Moved, touched",
    "3": "Enchanted, in awe",
    "4": "Inspired, enthusiastic",
    "5": "Energetic, lively",
    "6": "Joyful, wanting to dance",
    "7": "Powerful, strong",
    "8": "Full of tender, warmhearted",
    "9": "Relaxed, peaceful",
    "10": "Melancholic, sad",
    "11": "Nostalgic, sentimental",
    "12": "Indifferent, bored",
    "13": "Tense, uneasy",
    "14": "Agitated, aggressive",
    // Musical Cognition
    "15": "Structured",
    "16": "Orderly",
    "17": "Balanced",
    "18": "Artistic",
    "19": "Clear",
    "20": "Complex",
    "21": "Ornate",
    "22": "Subtle",
    "23": "Delicate",
    // Add by experimenters
    "24": "Familiar",
    "25": "Awkward",
    // Special questions
    "26": "What is your overall preference of the excerpt (from 1 to 5)? You like it _____.",
    "27": "Do you think the excerpts compose by Mozart (from 1 to 5)? ",
}


// The state variable to record the current page
MEMC.phase = "phase1"; // Phase1 for question 1-25, phase 2 for question 26, 27.

// Phase 1 question IDs.
MEMC.phase1Ids = Array(25).fill().map((i, v) => v + 1); // 1-25
// MEMC.phase1Ids = [1, 2, 3, 4, 5];

// Phase 2 question IDs.
MEMC.phase2Ids = [26]; //In condition 2 and 3, this should be "= [26, 27]"


/**
 * 繪製題目container 及題目到所指定的 div ID，首先會先畫出 M x N 個container，然後再對每一個container填上題目
 * @param {string} divToRender - The div ID to render problems.
 */
MEMC.render = function (divToRender) {

    let $memc = $(`#${divToRender}`);
    this.memc = $memc;

    // Render phase-1 container with the 1-25 questions
    let $phase1Container = $(`<div class="question-container" id="phase1"></div>`);
    $memc.append($phase1Container);
    this.renderEmptyCards("phase1", MEMC.phase1Ids.length);
    this.renderQuestions("phase1", MEMC.phase1Ids);
    this.phase1Container = $phase1Container;

    // Render the phase-2 container with the 26, 27 question
    let $phase2Container = $(`<div class="question-container" id="phase2"></div>`);
    $memc.append($phase2Container);
    this.renderEmptyCards("phase2", MEMC.phase2Ids.length);
    this.renderQuestions("phase2", MEMC.phase2Ids);
    this.phase2Container = $phase2Container;
    this.phase2Container.hide();


    // Set the conatiners property for our object
    // Make our select more functional with Jquery UI 
    // Add click listener
    this.cards = $(".question-card");
    this.cards.find("select").selectmenu({
        classes: {
            "ui-selectmenu-button": " question-menu",
        },
        width: '80%'
    });
    this.cards.click(function () {
        $(this).find("select").selectmenu("open");
    });

}


/**
 * 繪製問卷card到所指定的container，問卷container裡面首先會先畫出 M x N 個card
 * @param {string} divToRender - The div ID to render problems.
 * @param {int} numQuestion - The number of questions to render.
 * @param {int} numQuesPerRow - The number of questions per row.
 * @return {null}
 */
MEMC.renderEmptyCards = function (divId, numQuestion, numQuesPerRow = 5) {

    let $memcContainer = $(`#${divId}`); // The questionnaire container
    let numRow = Math.ceil(numQuestion / numQuesPerRow); // The number of row to render
    let counter = 0;

    // Draw M x N empty containers to render our question text.
    for (let i = 0; i < numRow; i++) {

        let $memcRow = $(`<div class="row" id="memc-row-${i}"></div>`);
        $memcContainer.append($memcRow);

        for (let j = 1; j <= numQuesPerRow; j++) {

            let quesCard = `<div class="col-12 col-sm">` +
                `<div class="row btn-info align-items-center question-card" id="question-card-${i * 5 + j}">` +
                ` <div class="col-12">` +
                `<h5></h5>` +
                `</div>` +
                `<div class="col-12 d-flex justify-content-center">` +
                `<select>` +
                `<option hidden disabled selected value>Choose</option>` +
                `<option name="test1">5 / Very much</option>` +
                `<option name="test1">4 / Quite a lot</option>` +
                `<option name="test1">3 / Moderately</option>` +
                `<option name="test2">2 / Somewhat</option>` +
                `<option name="test2">1 / Not at all</option>` +
                `</select>` +
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
MEMC.renderQuestions = function (containerId, questionIds, isRandom = true) {

    let $memcContainer = $(`#${containerId}`); // The questionnaire container
    let $cards = $memcContainer.find(".question-card");
    let ids = questionIds;
    if (isRandom)
        ids = shuffle(ids);
    console.log("The order of question IDs", ids);

    //   Render the text to each container one by one.
    ids.forEach(function (id, index) {
        $cards.eq(index).find("h5").text(`${index + 1}. ${MEMC[id]}`);
        $cards.eq(index).find("select").attr("id", `question-${id}`);
    });
}



/**
 * 重新整理continaer1的題目，並把 select 歸零
 * @param {null} 
 * @return {null}
 */
MEMC.shuffle = function () {
    // Re-render the questions
    this.renderQuestions("phase1", MEMC.phase1Ids);
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
    targetContainer.find('select').each(function (index) {
        answers[$(this).attr("id")] = $(this).val();
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
 */
MEMC.toggle = function () {

    if (this.phase === "phase1") {
        this.phase = "phase2";
        this.phase1Container.hide();
        this.phase2Container.show();
    } else {
        this.phase = "phase1";
        this.phase1Container.show();
        this.phase2Container.hide();
    }
    return this.phase
}





/**
 * (Axiliary function) Clear the selections.
 * Reference: The reply of Stephen James on https://stackoverflow.com/questions/6305253/jquery-ui-selectmenu-how-to-reset-dropdown-on-form-reset-button
 * @param {null}
 * @return {null}
 */
MEMC.clear = function () {
    this.cards.find("select").each(function (index) {
        $(this)[0].selectedIndex = 0;
        $(this).selectmenu("refresh");
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


/* show the scale after click the MP3 file */
$('#btn-play').on('click', function () {
    $('#memc').delay(30000).show(300);
    $('#MEMCscale').delay(30000).show(300).scrollTop(0);
    $('html, body').animate({
        scrollTop: $('#memc').offset().top - 300
    }, 'slow');

});




//Preventing send the data repeatedly
$("#MEMCscale").submit(function () {
    $("#MEMCbutton").prop('disabled', true);
});

//Submitting the form
$(".submit_btn").click(function () {
    window.onbeforeunload = null; //prevent window.onbeforeunload event being triggered by button
});