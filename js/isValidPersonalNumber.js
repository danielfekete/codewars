function isValidPersonalNumber(szaz) {
  if (szaz.length === 11) {
    //confirmation number
    let cNumber = parseInt(szaz[szaz.length - 1]);
    /*Szaz validation without confirmation number*/
    let x = szaz
      .substring(0, szaz.length - 1)
      .match(
        /^([1-8]{1})(\d{2})([0]{1}[1-9]{1}||[1]{1}[0-2]{1})([0]{1}[1-9]{1}||[1-2]{1}\d{1}||[3]{1}[0-1]{1})(\d{3}||)$/
      );
    //Regex
    if (x) {
      //Groups
      let g = x[1]; //gender
      let y = x[2];
      let m = x[3];
      let d = x[4];
      let n = x[5];
      /*Date of birth validation*/
      //February
      console.log(g, y);
      if (parseInt(m) === 2) {
        //1900-1997 -> g [1,2,5,6]
        //18xx, 20xx -> g [3,4,7,8]
        if (parseInt(y) % 4 === 0 && parseInt(y) != 0 && !g.match(/[7,8]/)) {
          //LeapYear -> except in case of 18xx where g.match([3,4])
          if (parseInt(d) > 29) {
            return false;
          }
        } else if (parseInt(d) > 28) {
          return false;
        }
      }
      //Other months
      else {
        if (
          (parseInt(m) < 8 && parseInt(m) % 2 == 0) ||
          (parseInt(m) > 8 && parseInt(m) % 2 == 1)
        ) {
          if (parseInt(d) === 31) {
            return false;
          }
        }
      }

      /*End of Date of birth validation*/

      /*Born on the same day validation*/
      if (parseInt(n) === 0) {
        return false;
      }

      /*End of Born on the same day validation*/

      /*End of Szaz validation without confirmation number*/

      /*Confirmation number calculation*/
      let array = szaz.substring(0, szaz.length - 1).split("");
      let calculatedNumber = 0;
      if (g.match(/[1,2,5,6]/)) {
        if (parseInt(y) < 97) {
          calculatedNumber = oldMethod(array);
        } else {
          calculatedNumber = newMethod(array);
        }
      } else if (g.match(/[3,4]/)) {
        calculatedNumber = oldMethod(array);
        if (calculatedNumber != cNumber) {
          calculatedNumber = newMethod(array);
        }
      } else {
        calculatedNumber = oldMethod(array);
      }

      /*End of Confirmation number calculation*/
      if (calculatedNumber === cNumber) {
        return true;
      }
    }
  }
  return false;
}

function oldMethod(array) {
  return (
    array.reduce((prev, current, index) => {
      let prevNumber = Number(prev);
      let currentNumber = Number(current);
      console.log(prevNumber, currentNumber);
      let multiplier = index + 1;
      return prevNumber + currentNumber * multiplier;
    }, 0) % 11
  );
}

function newMethod(array) {
  return (
    array.reverse().reduce((prev, current, index) => {
      let prevNumber = Number(prev);
      let currentNumber = Number(current);
      console.log(prevNumber, currentNumber);
      let multiplier = index + 1;
      return prevNumber + currentNumber * multiplier;
    }, 0) % 11
  );
}
