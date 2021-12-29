// import students
const students = require("../data/students");

// Membuat Class StudentController
class StudentController {
  index(req, res) {
    const data = {
      message: "Menampilkan semua student",
      data: students
    };
    res.json(data);
  }
  store(req, res) {
    const { nama } = req.body;
    students.push(nama);
    const data = {
      message: `Menambahkan data Students : ${nama}`,
      data: students
    };
    res.json(data);
  }
  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;
    students[id] = nama;
    const data = {
      message: `Mengedit Students id ${id}, nama ${nama}`,
      data: students
    };
    res.json(data);
  }
  destroy(req, res) {
    const { id } = req.params;
    students.splice(id, 1);
    const data = {
      message: `Menghapus Students id ${id}`,
      data: students
    };
    res.json(data);
  }
}

// Membuat object StudentController
const object = new StudentController();

// export object StudentController
module.exports = object;