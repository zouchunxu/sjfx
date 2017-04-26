$.par2Json = function (string, overwrite) {
    var obj = {}, pairs = string.split('&'), d = decodeURIComponent, name, value;
    $.each(pairs, function (i, pair) {
        pair = pair.split('=');
        name = d(pair[0]);
        value = d(pair[1]);
        obj[name] = value;
    });
    return obj;
};