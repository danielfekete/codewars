function firstNonRepeatingLetter(s) {
    let array = s.split("");
    fnrc = "";
    for (let c of array) {
        if (array.filter((el) => el.toLowerCase() === c.toLowerCase()).length === 1) {
            fnrc = c;
            break;
        }
    }
    return fnrc;
}