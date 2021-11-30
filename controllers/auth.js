
const mysql = require("mysql");
const jwt = require("jsonwebtoken");
const bcrypt = require("bcryptjs");
const {promisify} = require('util');


const { JsonWebTokenError } = require("jsonwebtoken");

const db = mysql.createConnection({
    host: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE
});

//Einloggen daten in db überprüfen
exports.login = async (req, res) => {
    try {
        const {name, password} = req.body;

        if(!name || !password){
            return res.status(400).render('login', {
                message: "Please enter name and password"
            });
        }

        db.query('Select * from users where name = ?',[name], async (error, results) => {
           console.log(results);
           
            if( !results || !(await  bcrypt.compare(password, results[0].password))) {
                res.status(401).render('login', {
                    message: 'Name or Password is incorrect'
                });

                console.log(error);
            } else {
                const id = results[0].id;

                const token = jwt.sign({ id: id}, process.env.JWT_SECRET, {
                    expiresIn: process.env.JWT_EXPIRES_IN
                });

                console.log("The token is " + token );

                const cookieOptions = {
                    expires: new Date(
                        Date.now() + process.env.JWT_COOKIE_EXPIRES * 24 * 60 * 60 * 1000
                    ),
                    httpOnly: true

                }

                res.cookie('jwt', token,cookieOptions);
                res.status(200).redirect('/welcome');
            }
    
           
        });
        
    } catch (error) {
        console.log(error);
    }
 
 }




//Registrierung und in db eintragen
 exports.register = (req, res) => {
    console.log(req.body);

  //  const name = req.body.name;
  //  const password = req.body.password;
  //  const passwordConfirm = req.body.passwordConfirm

    const { name, password, passwordConfirm } = req.body;

    db.query('SELECT name FROM users WHERE name = ?', [name], async (error, results) => {
        if(error){
            console.log(error);
        } 

        if(results.length > 0 ){
            return res.render('register', {
                message: 'That Name is already in use'
            });
        } else if(password !== passwordConfirm){
            return res.render('register', {
                message: 'Passwords do not match'
            });
        }

        let hashedPassword = await bcrypt.hash(password, 8);
        console.log(hashedPassword);

        db.query('INSERT INTO users SET ?', {name: name, password: hashedPassword }, (error, results) => {
            if(error){
                console.log(error);
            } else {
                console.log(results);
                return res.render('register', {
                    message: 'User registered'

                });
            }
        })
    
      // res.send("Password submitted");
    });

   
}
 
//kontrolliert ob user eingeloggt ist
exports.isLoggedIn = async (req, res, next) => {
    console.log(req.cookies);
    if(req.cookies.jwt) {
        try {
            const decoded = await promisify(jwt.verify)(req.cookies.jwt,
                process.env.JWT_SECRET);

               console.log(decoded);

               //Check if user still exist

               db.query('SELECT * FROM users WHERE id = ?',[decoded.id], (error,result) => {
                   console.log(result);

                   if(!result) {
                       return next();
                   }

                   req.user = result[0];
                   return next();
               })
        } catch (error) {
            console.log(error);
            return next();
        }
    } else{
    next();
    }
}


exports.logout = async (req, res ) => {
    res.cookie('jwt', 'logout',{
        expires: new Date(Date.now() + 2*1000),
        httpOnly: true
    });

    res.status(200).redirect('/');
}
