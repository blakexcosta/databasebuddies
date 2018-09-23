var express = require('express');
var bodyParser = require('body-parser');
var multer = require('multer');
var upload = multer();
var request = require('request');
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

//making api request call, uncomment to see
/*request('https://data.opendatasoft.com/api/records/1.0/search/?dataset=open-beer-database%40public-us&rows=0&facet=style_name&facet=cat_name&facet=name_breweries&facet=country',  function(error,response, body) {
  if (!error && response.statusCode == 200) {
	//body contains all of information
    console.log(body) // Print the google web page.
	
  }
});
*/
app.listen(3000);
