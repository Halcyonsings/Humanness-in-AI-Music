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
}



/**
 * 繪製題目container 及題目到所指定的 div ID，首先會先畫出 M x N 個container，然後再對每一個container填上題目
 * @param {string} divToRender - The div ID to render problems.
 * @param {int} numQuestion - The number of questions to render.
 * @param {int} numQuesPerRow - The number of questions per row.
 * @return {null}
 */
MEMC.render = function(divToRender, numQuestions, numQuesPerRow = 5) {

    //  Get the div to render question text
    $memcArea = $(`#${divToRender}`);

    // Draw M x N empty containers to render our question text.
    // In our case is 5x5 containers.
    let numRow = Math.ceil(numQuestions / numQuesPerRow);

    for (let i = 0; i < numRow; i++) {
        let memcRow = `<div class="row" id="memc-row-${i}"></div>`;
        $memcArea.append(memcRow);
        let $memcRow = $memcArea.find(`#memc-row-${i}`);
        for (let j = 1; j <= numQuesPerRow; j++) {

            let quesContainer = `<div class="col-12 col-sm">` +
                `<div class="row btn-info align-items-center question-block" id="questionContainer-${i*5+j}">` +
                ` <div class="col-12">` +
                `<h5></h5>` +
                `</div>` +
                `<div class="col-12 d-flex justify-content-center">` +
                `<select>` +
                `<option hidden disabled selected value>Choose</option>` +
                `<option name="test1">Very much</option>` +
                `<option name="test1">Quite a lot</option>` +
                `<option name="test1">Moderately</option>` +
                `<option name="test2">Somewhat</option>` +
                `<option name="test2">Not at all</option>` +
                `</select>` +
                `</div>` +
                `</div>` +
                `</div>`

            $memcRow.append(quesContainer);
        }
    }

    // Set the conatiners property for our object
    // Make our select more functional with Jquery UI 
    // Add click listener
    this.containers = $("div[id^=questionContainer]");
    this.containers.find("select").selectmenu({
        classes: {
            "ui-selectmenu-button": " question-menu",
        },
        width: '80%'
    });
    this.containers.click(function() {
        $(this).find("select").selectmenu("open");
    });

    // Render questions to our container.
    this.renderQuestions();
}


/**
 * 重新整理題目，並把 select 歸零
 * @param {null} 
 * @return {null}
 */
MEMC.shuffle = function() {
    // Re-render the questions
    this.renderQuestions();
    // clear the selections.
    this.clear();
}



/**
 * 得到所填寫的問卷答案，並回傳一個object，key是問卷題號，value是針對該題的回答。
 * @param {null}
 * @return {Object} answers- 
 */
MEMC.getAnswers = function() {
    // Collect answers
    let answers = {};
    this.containers.find("select").each(function(index) {
        answers[$(this).attr("id")] = $(this).val();
    });
    return answers
}



/**
 * (Axiliary function) Render the questions to each container
 * @param {boolean} isRandom - whether to randomly render
 * @return {null}
 */
MEMC.renderQuestions = function(isRandom = true) {

    let IDs = Array(25).fill().map((i, v) => v + 1);
    if (isRandom)
        IDs = shuffle(IDs);
    console.log("The order of question IDs", IDs);

    //   Render the text to each container one by one.
    this.containers.each(function(index) {
        let questionID = IDs[index];
        $(this).find("h5").text(`${index+1}. ${MEMC[questionID]}`);
        $(this).find("select").attr("id", `question-${questionID}`);
    });
}



/**
 * (Axiliary function) Clear the selections.
 * Reference: The reply of Stephen James on https://stackoverflow.com/questions/6305253/jquery-ui-selectmenu-how-to-reset-dropdown-on-form-reset-button
 * @param {null}
 * @return {null}
 */
MEMC.clear = function() {
    this.containers.find("select").each(function(index) {
        $(this)[0].selectedIndex = 0;
        $(this).selectmenu("refresh");
    });
}





// ====================================================================
// Some old functions
// ====================================================================


//Warning before existing
// var AttemptLeave = 0
window.onbeforeunload = function() {
    return "糟糕！別走！"
};

// if (window.onbeforeunload== !null) {
//   AttemptLeave += 1;
// };



/* hide the questionires first */
$('#MEMCscale').hide();
$('#memc').hide();

/* show the scale after click the MP3 file */
$('#btn-play').on('click', function() {
    $('#memc').show();
    $('#MEMCscale').delay(3000).show(300).scrollTop(0);
    $('html, body').animate({
        scrollTop: $('#memc').offset().top - 300
    }, 'slow');

});






//問卷分頁參數
var Qlength = Object.keys(MEMC).length
// var Qorder = shuffle(range(1,Qlength)) //radom order
var Qorder = range(1, Qlength) // non random order
var itemsPrePage = 25 //一頁幾題
var Npage = Math.ceil(Qlength / itemsPrePage) //共有幾頁
// var currentPage = 1 //沒有指導語頁面0
var Response = {}
var ResponseTime = {}
var starttime, endtime
var itemsPerPage = 25;
Npage = 5;

var itemPerCollapse = 5;

window.onload = function() {
    //get startTime
    starttime = performance.now()
    // prepare Object
    for (var i = 0; i < Qlength; i++) {
        ResponseTime[(i + 1)] = 0
    }
}


//Preventing send the data repeatedly
$("#MEMCscale").submit(function() {
    $("#MEMCbutton").prop('disabled', true);
});

//Submitting the form
$(".submit_btn").click(function() {
    window.onbeforeunload = null; //prevent window.onbeforeunload event being triggered by button
});