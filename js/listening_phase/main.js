/*
 *  執行memc初始好的問卷與music初始好的音樂
 * 
 */



// 一開始先 load 第0首
var random_music = sampleMusic();
Spectrum.load(random_music[currentPage]); // random assign music here 

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
            Spectrum.load(random_music[currentPage]); // random assign music here 
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