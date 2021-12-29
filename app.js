
// import express
const express = require("express");
const { route } = require("./routers/api");

// buat object / server
const app = express();

// definisikan port
app.listen(3000, function(){
    console.log("server berjalan di: http://localhost:3000");
});

//pake router

const router = require("./routers/api");
app.use(express.json());
app.use(router);




