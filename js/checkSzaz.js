function checkSzaz(szaz) {
    if (szaz) {
        szaz = szaz.replace(/-/g, "");

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
                if (parseInt(m) === 2) {
                    a
                    if (parseInt(y) % 4 === 0 && y !== 0) {
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
                let calcMethod = (array, newMethod = false) => {
                    if (newMethod) {
                        array = array.reverse();
                    }
                    return (
                        array.reduce((carry, item, index) => {
                            let multiplier = index + 1;
                            return Number(carry) + Number(item) * multiplier;
                        }, 0) % 11
                    );
                }


                let array = szaz.substring(0, szaz.length - 1).split("");
                let calcNumber = 0;
                if (g.match(/[1,2,5,6]/)) {
                    if (parseInt(y) < 97) {
                        calcNumber = calcMethod(array);
                    } else {
                        calcNumber = calcMethod(array, true);
                    }
                } else if (g.match(/[3,4]/)) {
                    calcNumber = calcMethod(array);
                    if (calcNumber != cNumber) {
                        calcNumber = calcMethod(array, true);
                    }
                } else {
                    calcNumber = calcMethod(array);
                }

                /*End of Confirmation number calculation*/
                if (calcNumber === cNumber) {
                    return true;
                }
            }
        }
    }
    return false;
}

let szaz = "3-000324-3549";

console.log(szaz, checkSzaz(szaz));