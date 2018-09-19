var express = require('express');
var bodyParser = require('body-parser');
var multer = require('multer');
var upload = multer();
var app = express();

app.get('/', function(req, res){
   res.render('form');
});

app.set('view engine', 'pug');
app.set('views', './views');

// for parsing application/json
app.use(bodyParser.json()); 

// for parsing application/xwww-form-urlencoded header requests. w
app.use(bodyParser.urlencoded({ extended: true })); 


//parsing form data/multipart data
app.use(upload.array());
app.use(express.static('public'));

app.post('/',function(req,res){
	console.log(req.body); // printing out the request body
	res.send('receive request');
});


app.listen(3000);
