

const express = require('express');
const authController = require('../controllers/auth')
const router = express.Router();

router.get('/', authController.isLoggedIn, (req, res) =>{
  
        res.render('index', {
            user: req.user
   });   
});

router.get("/login", authController.isLoggedIn, (req, res) => {
    
        res.render("login", {
            user: req.user
   });   
    
});

router.get("/welcome", authController.isLoggedIn, (req, res) => {
    if(req.user) {
         res.render("welcome", {
             user: req.user
         });
    } else {
        res.redirect('/login');
    }
   
});


router.get("/register", authController.isLoggedIn, (req, res) => {
    if(req.user) {
        res.render("register", {
            user: req.user
        });
   } else {
       res.redirect('/');
   }
});

router.get("/manager", authController.isLoggedIn, (req, res) => {
    
    res.render("manager",{
        user: req.user
});   
});


module.exports = router;