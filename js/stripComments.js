function solution(input, markers) {
    let filteredRow = [];
    input.split("\n").forEach(row => {
        let newRow = row;
        for (let k = 0; k < markers.length; k++) {
            let marker = markers[k];
            let found = newRow.search(marker);
            if (found != -1) {
                newRow = row.substring(0, found);
            }
        }
        newRow = newRow.replace(/\s+$/m, '');
        filteredRow.push(newRow);
    });
    return filteredRow.join("\n");
}