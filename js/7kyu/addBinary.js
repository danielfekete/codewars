//Implement a function that adds two numbers together and returns their sum in binary. The conversion can be done before, or after the addition.

function toBinary(n) {
  return (n >>> 0).toString(2);
}

function addBinary(a, b) {
  return (a + b).toString(2);
  // return toBinary(a+b)
  //   let c = a + b;
  //   let res = "";
  //   while (c >= 1) {
  //     res = (c % 2) + res;
  //     c = Math.floor(c / 2);
  //   }
  //   return res;
}
