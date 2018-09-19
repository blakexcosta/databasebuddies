var express = require('express');
var bodyParser = require('body-parser');
var multer = require('multer');
var upload = multer();
var mongoose = require('mongoose');
//connecting to the database
mongoose.connect('mongodb://localhost/my_db');
//creating a new Schema
var personSchema = mongoose.Schema({
    name: String,
    age: Number,
    nationality: String
});
//applying schema to database as "Person", acts as a collection
var Person = mongoose.model("Person", personSchema);


///starting the app
var app = express();


//cant forget to do this step!!!, as it sets the view engine. defines parsing and tells use where our public images are
app.set('view engine', 'pug');
app.set('views', './views');
// for parsing application/json
app.use(bodyParser.json());
// for parsing application/xwww-form-urlencoded header requests. w
app.use(bodyParser.urlencoded({ extended: true }));
//parsing form data/multipart data
app.use(upload.array());
app.use(express.static('public'));


//home page
app.get('/', function(req, res){
   res.render('dalord');
});
//routing to person view
app.get('/person', function(req, res, next){
    res.render('person');

});
//handles post requests for person page
app.post('/person', function(req, res, next){
    var personInfo = req.body; //gets parse body information
    //showing error message if not name age or nationality
    if(!personInfo.name || !personInfo.age || !personInfo.nationality){
        res.render('show_message', {message: "Sorry, you provided the wrong info", type: "error"});
    } else {
        //creating new person from information in the request body that was passed from the page template
        var newPerson = new Person({
            name: personInfo.name,
            age: personInfo.age,
            nationality: personInfo.nationality
        });
        //saving the new person
        newPerson.save(function(err, Person){
            if(err){
                res.render('show_message', {message: "Database error", type: "error"});
            }
            else {
                res.render('show_message', {message: "New Person Added", type: "success", person: personInfo});
            }
        });
    }
});

//listening on port 3000
app.listen(3000);
