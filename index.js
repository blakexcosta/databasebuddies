var express = require("express");
var app = express();
var bodyParser = require('body-parser');
var cookieParser = require('cookie-parser');
//better separation of concerns
//uses app.use to 'use' the module things.js
var things = require('./things.js');
app.use('/things', things);
//parse url encoded data
app.use(bodyParser.urlencoded({extended: false}));
//parse json data
app.use(bodyParser.json());
//parses cookie header abd populates req.cookies w/ object keyed by cookie names
app.use(cookieParser());



//dynamic routes
//complex example is in things.js
//allows us to use parameters such as req.params.id
//:id should show up as some number ex:) 123
//    http://localhost:3000/123 
app.get('/:id', function(req, res){
	res.send('The id you specified is ' + req.params.id);
});

//First middleware before response is sent
app.use(function(req, res, next){
   console.log("Start");
   next();
});

//Route handler, middleware above deligates to this router when going to localhost:3000
app.get('/', function(req, res, next){
   res.send("Middle");
   next();
});

app.use('/', function(req, res){
   console.log('End');
});

//for routes that do not match, equivalent to 404
//should be placed AFTER all other routes, including external routers required
app.get('*', function(req, res){
	res.send('sorry, invalid url.');
});


app.listen(3000);

