// import student Controller
const StudentController = require("../controllers/StudentController");

// import router
const express = require("express");

// buat object router
const router = express.Router();

// buat routing gome
router.get("/", (req, res) => {
    res.send("hello fani");

});

// buat routing students
router.get("/students", StudentController.index);
router.post("/students", StudentController.store);
router.put("/students/:id", StudentController.update);
router.delete("/students/:id", StudentController.destroy);
router.get("/students/:id", StudentController.show);


// express routing
module.exports = router;