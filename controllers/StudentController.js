// import model
const Student = require("../models/Student");


// buat class student Controller
class StudentController {
    async index(req, res) {
        const students = await Student.all();
        const data = {
            message : "menampilkan data student",
            data : students,
        };
        res.json(data);
        res.status(200).json(data);
    }

    async store(req, res) {
        const students = await Student.create(req.body);
        const data = {
            message : `menambahkan data students`,
            data : students,
        };
        res.json(data);
        res.status(201).json(data);
    }

    update(req, res) {
        const {id} = req.params;
        const {nama} = req.body;
        students[id] = nama
        const data = {
            message : `mengedit data students id ${id}, nama ${nama}`,
            data : students,
        };
    res.json(data);
    }

    destroy(req, res){
        const {id} = req.params;
        students.splice(id, 1)
        const data = {
            message : `menghapus data students ${id}`,
            data : students,
        };
    res.send(data);
    }
}

// buat object
const object = new StudentController();

//export object
module.exports = object;