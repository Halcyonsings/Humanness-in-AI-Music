function shuffle(array) {
    var rand, index = -1,
        length = array.length,
        result = Array(length)
    while (++index < length) {
        rand = Math.floor(Math.random() * (index + 1))
        result[index] = result[rand];
        result[rand] = array[index];
    }
    return result;
}

function range(start, end) {
    return Array(end - start + 1).fill().map((_, idx) => start + idx)
  }

//   window.onbeforeunload = function(){return "糟糕！別走！"};