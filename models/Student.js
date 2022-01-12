// import database
const db = require("../config/database");


// class model student
class Student {
    static all() {
        return new Promise((resolve, reject) => {
            // lakukan query ke db
            const sql = "SELECT * FROM students"; 
            db.query(sql, (err, results) => {
            resolve(results);
            });
        });
        
    }

    static async create(data) {
        // insert data ke database
        const id = await new Promise((resolve, reject) => {
            const sql = "INSERT INTO students SET ? ";
            db.query(sql, data, (err, results) => {
                resolve(results.insertId);
            });
        });
        // select data yang baru di insert
        return new Promise(function (resolve, reject) {
            const sql = "SELECT * FROM students WHERE id = ?";
            db.query(sql, id, (err, results) => {
                resolve(results);
            });
        });
    }

    // Update

    static find(id) {
        return new Promise((resolve, reject) => {
            const sql = "SELECT * FROM students WHERE id = ?";
            db.query(sql, id, (err, results) => {
                resolve(results[0]);
            })
        })
    }

    static async update(id,data) {
        await new Promise((resolve, reject ) => {
            const sql = "UPDATE students SET ? WHERE id = ?";
            db.query(sql, [data, id], (err, results) => {
                resolve(results);
            });
        });

        const students = await this.find(id);
        return students;
    }

    static delete(id) {
        return new Promise((resolve, reject) => {
            const sql = "DELETE FROM students WHERE id = ?";
            db.query(sql, id, (err, results) => {
                resolve(results);
            })
        })
    }

    
}


// export model
module.exports = Student;