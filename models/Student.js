// import database
const db = require("../config/database");

class Student {
    static all() {
        return new Promise((resolve, reject) => {
            // lakukan query
            const sql = "SELECT * FROM students"; 
            db.query(sql, (err, results) => {
            resolve(results);
            });
        });
        
    }

    static async create(data) {
        const id = await new Promise((resolve, reject) => {
            const sql = "INSERT INTO students SET ? ";
            db.query(sql, data, function(err, results) {
                resolve(results.insertId);
            });
        });

        return new Promise(function (resolve, reject) {
            const sql = "SELECT * FROM students WHERE id = ?";
            db.query(sql, id, function(err, results) {
                resolve(results);
            });
        });
    }
}


// export model
module.exports = Student;