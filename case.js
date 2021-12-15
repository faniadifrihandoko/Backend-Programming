
function persiapan() {
    return new Promise(function (resolve, reject) {
      setTimeout(() => {
        resolve("Persiapan...");
      }, 3000);
    });
  }
  
  function rebusAir() {
    return new Promise(function (resolve, reject) {
      setTimeout(() => {
        resolve("Rebus Air...");
      }, 7000);
    });
  }
  
  function masak() {
    return new Promise(function (resolve, reject) {
      setTimeout(() => {
        resolve("Masak, Selesai");
      }, 5000);
    });
  }
  
  async function main() {
    console.log(await persiapan());
    console.log(await rebusAir());
    console.log(await masak());
  }
  
  main();



