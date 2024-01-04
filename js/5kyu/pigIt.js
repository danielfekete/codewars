//Move the first letter of each word to the end of it, then add "ay" to the end of the word. Leave punctuation marks untouched.

function pigIt(str) {
  return str
    .split(" ")
    .map((el) => (el.match(/\w/g) ? `${el.slice(1)}${el[0]}ay` : el));

  //return str.replace(/\w+/g, (w) => `${w.slice(1)}${w[0]}ay`);
}
