// Check to see if a string has the same amount of 'x's and 'o's. The method must return a boolean and be case insensitive. The string can contain any char.

function XO(str) {
  const arr = str.split("").map((el) => el.toLowerCase());
  return (
    arr.filter((el) => el === "x").length ===
    arr.filter((el) => el === "o").length
  );
}
