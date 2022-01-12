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

        res.status(200).json(data);
    }

    async store(req, res) {
        const { nama, nim, email, jurusan} = req.body;

        const students = await Student.create(req.body);
        if (!nama | !nim | !email | !jurusan) {
            const data = {
                message : "semua data harus terkirim",
            };
            return res.status(422).json(data);
        } else {
            const data = {
                message : `menambahkan data students`,
                data : students,
            };
           res.status(201).json(data);
        }
    }



    async update(req, res) {
        const {id} = req.params;
        const students = await Student.find(id);

        if (students) {
            const studentupdated = await Student.update(id, req.body);
            const data = {
                message: "Mengedit data student ",
                data: studentupdated,
            };

            res.status(200).json(data);
        } else {
            const data = {
                message: "Data tidak ada ",
            };
            res.status(404).json(data);
        }
    }

    async destroy(req, res){
        const {id} = req.params;
        const students = await Student.find(id);
        
        if(students){
            await Student.delete(id);

            const data = {
                message: "Menghapus data student ",
            };
            res.status(200).json(data);
        } else {
            const data = {
                message: "Data tidak ada ",
            };
            res.status(404).json(data);
        }
    }

    async show(req, res){
        const {id} = req.params;
        const students = await Student.find(id);

        if(students){
            const data = {
                message : `menambahkan data students`,
                data : students,
            };
           res.status(200).json(data);
        } else {
            const data = {
                message: "Data tidak ada ",
            };
            res.status(404).json(data);
        }
    }
}

// buat object
const object = new StudentController();

//export object
module.exports = object;