//Warning before existing
// var AttemptLeave = 0
window.onbeforeunload = function() {
    return "糟糕！別走！"
};

// if (window.onbeforeunload== !null) {
//   AttemptLeave += 1;
// };



/* hide the questionires first */
$(function() {
    $('#MEMCscale').hide();
});

/* show the scale after click the MP3 file */
$('#btn-play').on('click', function() {
    $('#MEMCscale').delay(3000).show(300).scrollTop(0);
});



//--------------------------------------- MEMC questions ---------------------------------------
MEMC = {
    // Musical Emotion
    "1": "Filled with wonder, amazed",
    "2": "Moved, touched",
    "3": "Enchanted, in awe",
    "4": "Inspired, enthusiastic",
    "5": "Energetic, lively",
    "6": "Joyful, wanting to dance",
    "7": "Powerful, strong",
    "8": "Full of tenderness, warmhearted",
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






//問卷分頁參數
var Qlength = Object.keys(MEMC).length
// var Qorder = shuffle(range(1,Qlength)) //radom order
var Qorder = range(1, Qlength) // non random order
var itemsPrePage = 25 //一頁幾題
var Npage = Math.ceil(Qlength / itemsPrePage) //共有幾頁
var currentPage = 1 //沒有指導語頁面0
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



function rederMEMC(numQuestion) {

    $memc_area = $("#memc-row");

    for (let i = numQuestion; i > 0; i--) {

        let questionText = `<div class="col-12 col-sm-6">` +
            `<div class="row btn-info align-items-center question-block">` +
            ` <div class="col-12">` +
            `<h5>${i}. ${MEMC[i]}</h5>` +
            `</div>` +
            `<div class="col-12 d-flex justify-content-center">` +
            `<select>` +
            `<option hidden disabled selected value>Choose</option>` +
            `<option name="test1">Very mch</option>` +
            `<option name="test1">Quite a lot</option>` +
            `<option name="test1">Moderately</option>` +
            `<option name="test2">Somewhat</option>` +
            `<option name="test2">Not at all</option>` +
            `</select>` +
            `</div>` +
            `</div>` +
            `</div>`

        $memc_area.prepend(questionText);

    }
}


//append items
//start from 1 because no instruction
$(function() {
    //     console.log(Npage)
//     for (var i = 1; i <= Npage; i++) {
//         $("form").prepend("<div class='page Hide' id='page" + i + "'></div>")
//         for (var j = 0; j < Math.ceil(itemsPerPage / itemPerCollapse); j++) {
//             $("#page" + i).append(`<div class="panel panel-default" id="panel${i}${j}">` +
//                 `<div class="panel-heading" data-toggle="collapse" data-parent="#page${i}" data-target="#collapse${i}${j}">` +
//                 `<ul class="list-group">` +
//                 `<li class="list-group-item list-group-item-primary">${j*5 + 1}. ${MEMC[j*5 + 1]}</li>` +
//                 `<li class="list-group-item list-group-item-warning">${j*5 + 2}. ${MEMC[j*5 + 2]}</li>` +
//                 `<li class="list-group-item list-group-item-success">${j*5 + 3}. ${MEMC[j*5 + 3]}</li>` +
//                 `<li class="list-group-item list-group-item-danger">${j*5 + 4}. ${MEMC[j*5 + 4]}</li>` +
//                 `<li class="list-group-item list-group-item-info">${j*5 + 5}. ${MEMC[j*5 + 5]}</li>` +
//                 `</ul>` +
//                 `</div >` +
//                 `<div id = "collapse${i}${j}" class = "panel-collapse collapse" > </div>` +
//                 `</div>`)
//         }

//         for (var j = 0; j < itemsPerPage; j++) {
//             //             var itemOrder = (i - 1) * itemsPrePage + (j + 1)
//             $("#page" + i).find(`#collapse${i}${Math.floor(j / itemPerCollapse)}`).append("<div class='itembox'><div class='itemcontent'>" + (j + 1) + ". " + MEMC[j + 1] + "</div><div data-item='" + (j + 1) + "' class='rangebar'></div></div>")

//             //             if (itemOrder <= Qlength) {
//             //                 $("#page" + i).append("<div class='itembox'><div class='itemcontent'>" + itemOrder + ". " + MEMC[Qorder[itemOrder - 1]] + "</div><div data-item='" + (Qorder[itemOrder - 1]) + "' class='rangebar'></div></div>")
//             //             }
//         }
//     }
    $("#page1").removeClass("Hide").fadeIn(500)
    if (currentPage == Npage) {
        $("#next").html("Finished")
    }
})

//make rangebar
$(function() {
    $(".rangebar").each(function() {
        $(this).empty().slider({
            value: null,
            min: 1,
            max: 5,
            range: "min",
            animate: "fast",
            slide: function(event, ui) { //slide function supposes to be same as start
                var item = $(this).data("item")
                Response[item] = ui.value //store data
                if ($(this).slider("option", "value") == null) {
                    $(this).slider("value", ui.value) //resolve no slide no value and animate
                }
                endtime = performance.now()
                ResponseTime[item] = Number((ResponseTime[item] + (endtime - starttime)).toFixed(0))
                starttime = performance.now()
                $(this).prev(".itemcontent").removeClass("forgethint")
                return $("[data-item='" + item + "'] .ui-slider-handle").html(ui.value);
            },
            start: function(event, ui) {
                var item = $(this).data("item")
                Response[item] = ui.value //store data
                if ($(this).slider("option", "value") == null) {
                    $(this).slider("value", ui.value) //resolve no slide no value and animate
                }
                endtime = performance.now()
                ResponseTime[item] = Number((ResponseTime[item] + (endtime - starttime)).toFixed(0))
                starttime = performance.now()
                $(this).prev(".itemcontent").removeClass("forgethint")
                return $("[data-item='" + item + "'] .ui-slider-handle").html(ui.value);
            },
            stop: function(event, ui) {

            }
        });
        //make slider value under div
        // Get the options for this slider
        var opt = $(this).data().uiSlider.options;
        // Get the number of possible values
        var vals = opt.max - opt.min;

        //label character you want to show
        var indexvalue = {
            "1": "Not at all",
            "2": "Somewhat",
            "3": "Moderately",
            "4": "Quite a lot",
            "5": "Very much"
        }
        // Space out values
        for (var i = 0; i <= vals; i++) {
            var el = $('<label>' + indexvalue[i + 1] + '</label>').css({
                'left': (i / vals * 100) + '%',
                'width': '85px' //use multiple CSS to set the label inline
            });
            $(this).append(el);
        }
    });
})

function reloadRangebar() {

    $(".rangebar").each(function() {
        $(this).empty().slider({
            value: null,
            min: 1,
            max: 5,
            range: "min",
            animate: "fast",
            slide: function(event, ui) { //slide function supposes to be same as start
                var item = $(this).data("item")
                Response[item] = ui.value //store data
                if ($(this).slider("option", "value") == null) {
                    $(this).slider("value", ui.value) //resolve no slide no value and animate
                }
                endtime = performance.now()
                ResponseTime[item] = Number((ResponseTime[item] + (endtime - starttime)).toFixed(0))
                starttime = performance.now()
                $(this).prev(".itemcontent").removeClass("forgethint")
                return $("[data-item='" + item + "'] .ui-slider-handle").html(ui.value);
            },
            start: function(event, ui) {
                var item = $(this).data("item")
                Response[item] = ui.value //store data
                if ($(this).slider("option", "value") == null) {
                    $(this).slider("value", ui.value) //resolve no slide no value and animate
                }
                endtime = performance.now()
                ResponseTime[item] = Number((ResponseTime[item] + (endtime - starttime)).toFixed(0))
                starttime = performance.now()
                $(this).prev(".itemcontent").removeClass("forgethint")
                return $("[data-item='" + item + "'] .ui-slider-handle").html(ui.value);
            },
            stop: function(event, ui) {

            }
        });
        //make slider value under div
        // Get the options for this slider
        var opt = $(this).data().uiSlider.options;
        // Get the number of possible values
        var vals = opt.max - opt.min;

        //label character you want to show
        var indexvalue = {
            "1": "Not at all",
            "2": "Somewhat",
            "3": "Moderately",
            "4": "Quite a lot",
            "5": "Very much"
        }
        // Space out values
        for (var i = 0; i <= vals; i++) {
            var el = $('<label>' + indexvalue[i + 1] + '</label>').css({
                'left': (i / vals * 100) + '%',
                'width': '85px' //use multiple CSS to set the label inline
            });
            $(this).append(el);
        }
    });


}





//------------------------------------ Comments' function: storage and restart -----------------------------
var CommentsArray = [];


$(function() {
    $('#SendComments').on('click', function() {
        var NewComments = $('#MusicComments').val();
        var NewTAndC = [formatTime(Spectrum.getCurrentTime()), $('#MusicComments').val()];
        var currentProgress = Spectrum.getCurrentTime() / Spectrum.getDuration();
        //console.log(NewComments);

        if ($.isEmptyObject(NewComments) == false) { // add a judgement to avoid empty response
            CommentsArray.push(NewTAndC);
            $('#MusicComments').val(''); // clear the textarea
            $('.InsertNote').after('<i class="fa fa-sticky-note-o"></i>') //.css('left', currentProgress+'%');
        }

    });
});


//Preventing send the data repeatedly
$("#MEMCscale").submit(function() {
    $("#MEMCbutton").prop('disabled', true);
});

//Submitting the form
$(".submit_btn").click(function() {
    window.onbeforeunload = null; //prevent window.onbeforeunload event being triggered by button
});