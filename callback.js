function formatName(nama) {
    const result = nama.toUpperCase();
    return result;
}

function getName(nama, callFormatName) {
    const result = callFormatName(nama);
    console.log(result);
}

getName("aufa", formatName);