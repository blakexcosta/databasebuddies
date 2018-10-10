var express = require('express');
var bodyParser = require('body-parser');
var multer = require('multer');
var upload = multer();
var request = require('request');
var mysql = require('mysql');
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


//creating mysql connection
//created a an ExampleDB, a user with only select permission, and
//a table with only 1 record w/ id and name as columns
// var connection = mysql.createConnection({
//   host:'localhost',
//   user:'rickrenardo',
//   password:'password',
//   database:'ExampleDB'
// });
// connection.connect();
// connection.query('SELECT * FROM example', function(err, rows,fields){
// 	if (err) throw err
// 	console.log("ID: " +  rows[0].id);
// 	console.log("Fields: " + rows[0].name);
// });
// connection.end();


//home page
app.get('/', function(req, res){
   res.render('dalord');
});
//routing to person view
app.get('/person', function(req, res, next){
    res.render('person');


//making api request call, uncomment to see
/*request('https://data.opendatasoft.com/api/records/1.0/search/?dataset=open-beer-database%40public-us&rows=0&facet=style_name&facet=cat_name&facet=name_breweries&facet=country',  function(error,response, body) {
  if (!error && response.statusCode == 200) {
	//body contains all of information
    console.log(body) // Print the google web page.

  }
});
*/
});

//listening on port 3000

app.listen(3000);
