/**
 * @author Doublebite r05921030@g.ntu.edu.tw
 * @fileoverview 執行memc初始好的問卷與music初始好的音樂
 */



rederMEMC(25);


$question_menus = $(".question-block").find("select").selectmenu({
    classes: {
        "ui-selectmenu-button": " question-menu",

    },
    width: '80%'
});

$(".question-block").click(function() {

    $(this).find("select").selectmenu("open");
    console.log(123);

});


var random_music;


$.ajax({

        // Get the csv file from server and read it.
        url: "clips_information.csv", //The url of the csv file
        async: false,
        dataType: "text",

    })
    .done(function(csv) {

        // When the reading is done, convert the csv format to an array of objects, and then 
        // convert the array to an object with each element as value and the ID of it as key.
        // arrItems[i] is like: {clips_id: "1", pairs: "1", author: "AI", music_file: "music/AIBachHCII.mp3"}
        // objItem = { 1:{clips_id: "1", pairs: "1", author: "AI", music_file: "music/AIBachHCII.mp3"}, 2:{.......}, ......}
        const arrMusicItems = $.csv.toObjects(csv);
        const objMusicItems = arrMusicItems.reduce((obj, item) => {
            obj[item.clips_id] = item
            return obj
        }, {});

        //     Get the music IDs.
        //         const music_Ids = shuffle(Object.keys(objMusic));
        random_music = sampleAHMusic(objMusicItems);
        random_music = shuffle(random_music);
        console.log(random_music)
        Spectrum.load(random_music[currentPage - 1]); // random assign music here 

    });

function sampleAHMusic(objMusicItems) {

    let human_ai_ids = shuffle([...Array(8).keys()].map(x => x + 1)).slice(0, 2);
    human_ai_ids = human_ai_ids.reduce(function(r, e) {
        r.push(e * 2 - 1, e * 2);
        return r;
    }, []);
    const control_ids = shuffle([...Array(2).keys()].map(x => x + 17)).slice(0, 1);
    const music_ids = human_ai_ids.concat(control_ids);
    const random_musics = music_ids.map(id => objMusicItems[id].music_file);
    return random_musics;
}


function nextPage() {

    if (validateSlider()) {
        if (currentPage == Npage) {
            // last page, do something

        } else {
            $('html, body').animate({
                scrollTop: $("#page" + (currentPage + 1)).offset().top - ($(window).height() - $("#page" + (currentPage + 1)).outerHeight(true)) / 2
            }, 200);
            $(".page").addClass("Hide")
            $("#page" + (currentPage + 1)).removeClass("Hide").fadeIn(500)
            currentPage++

            //             Load new music, reload range bar, hide the MEMC.
            Spectrum.load(random_music[currentPage - 1]); // random assign music here 
            reloadRangebar();
            $('#MEMCscale').hide();


            if (currentPage == Npage) {
                $("#next").html("Finished")
            }
        }
    }
}




// validate if response in currentPage
function validateSlider() {
    var validate = 0
    $("#page" + currentPage + " .rangebar").each(function(index) {
        var response = $(this).slider("option", "value")
        if (response == null) {
            $(this).prev(".itemcontent").addClass("forgethint")
            validate++
        } else {
            // Response[$(this).data("item")] = response
        }
    });

    if (validate != 0) {
        $('html, body').animate({
            scrollTop: $(".forgethint").offset().top - ($(window).height() - $(".forgethint").outerHeight(true)) / 2
        }, 200);
        return false
    } else {
        return true
    }
}
//  記錄每一首歌的時間
var listeningTime = {};
setInterval(function() {
    if (Spectrum.isPlaying() === true) {

        // 如果music 已經有紀錄，就取出之前紀錄的時間，不然songTime就設為0
        let music = random_music[currentPage];
        let songTime = (music in listeningTime) ? listeningTime[music] : 0;

        // 累加時間
        //console.log("Sucessful record");
        songTime = (Number(songTime) + 0.01).toFixed(2); // Number() change the string into number 
        $('#TimeCount').text("Play Time" + songTime);

        // 把時間存回去            
        listeningTime[music] = songTime;
        //             console.log(listeningTime);
    }
}, 10);




//     $("#next").click(function() {

//         // TODO: 上傳分數 要吃music ID 當 參數
//         console.log(currentPage);

//         // TODO: 上傳完要做判斷，如果是第五個就是問卷結束
//         if (idx === 5) {

//         }

//         // TODO: 繼續 清掉range bar
//         //         idx += 1;
//         //         Spectrum.load(random_music[idx]); // random assign music here 
//         //         reloadRangebar();
//         //         $('#MEMCscale').hide();

//     });