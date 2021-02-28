function I(r){
    var n="";
    for(i=0;i<r.length;++i)
        n+=String.fromCharCode(128^r.charCodeAt(i));
    return n
}