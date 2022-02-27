function rot13(str){
    /*S1*/
    const alphabet=characterRange('a','z');
    let converted="";
    [...str].forEach(l => {
        let tolower=l === l.toLowerCase();
        let found=alphabet.findIndex(el=>el===l.toLowerCase());
        if(found != -1){
            let diff=(alphabet.length-1)-found;
            let index=diff < 13 ? 13-diff-1 : found+13;
            converted+=tolower ? alphabet[index] : alphabet[index].toUpperCase();
        }else{
            //Whitespaces etc.
            converted+=l;
        }
    });
    return converted;

    /*
    S2
    return str.replace(/[a-z]/ig,function(x){
        return String.fromCharCode(x.charCodeAt(0) + (x.toLowerCase() <= 'm' ? 13: -13));
    });
    */
}

function characterRange(start,end){
    return String.fromCharCode(...[...Array(end.charCodeAt()-start.charCodeAt()+1).keys()].map(i => i+start.charCodeAt())).split('');
}

function rot13(str){
    return str.replace(/[a-z]/ig,function(x){
        return String.fromCharCode(x.charCodeAt(0) + (x.toLowerCase() <= 'm' ? 13: -13));
    });
}