const download = new Promise(function(resolve, reject){
    setTimeout(() => {
        const status = true;

        if (status) {
            resolve("download Berhasil");
        } else {
            reject("Download Gagal");
        }
    }, 3000);
});

download
    .then(function(result) {
        console.log(result);
    })
    .catch(function (result) {
        console.log(result);
    });