
const mysql = require("mysql");
const bcrypt = require("bcryptjs");


const db = mysql.createConnection({
    host: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE
});

var name = "Manager";

(async function main(){
const originalPassword = "mg";

const hashPassword = await bcrypt.hash(originalPassword,8);
console.log(hashPassword);

db.query('INSERT INTO users where SET ?',{name: name, password: hashPassword}, (error,results) =>{
    if(error){
        console.log(error);
    } else {
        console.log(results);
        return res.render('register', {
            message: 'User registered'

        });
    }
});
})();

