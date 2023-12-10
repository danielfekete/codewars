//Clock shows h hours, m minutes and s seconds after midnight. Your task is to write a function which returns the time since midnight in milliseconds.

function past(h, m, s) {
  return h * Math.pow(6000, 2) + m * 60000 + s * 1000;
}
