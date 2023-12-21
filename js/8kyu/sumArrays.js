// Sum Numbers
function sum(numbers) {
  "use strict";

  return numbers.reduce((acc, curr) => acc + +curr, 0);
}
