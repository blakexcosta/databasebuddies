var express = require("express");
var app = express();

//better separation of concerns
//uses app.use to 'use' the module things.js
var things = require('./things.js');
app.use('/things', things);

//example using middleware functions, which have access to request
//response (req, res) and next objects. used for tasks like parsing/request boides, response headers, etc.
//you'll see "a new request received at ... " for every /middleware request.
//to do this for every request, remove /middleware
// http://localhost:3000/middleware
app.use('/middleware',function(req,res,next){
	console.log("A new request received at " + Date.now());
	//very important, says more processing required
	//for current request + is in next middleware
	//function/route handler.
	next();
});

//dynamic routes
//complex example is in things.js
//allows us to use parameters such as req.params.id
//:id should show up as some number ex:) 123
//    http://localhost:3000/123 
app.get('/:id', function(req, res){
	res.send('The id you specified is ' + req.params.id);
});



//pattern matching routes, will restrict URL parameter matching
//ex:) need the id to be a 5 digit long number
//will ONLY match requests that are 5 digits long
app.get('/things/:id([0-9]{5})', function(req, res){
	res.send('id: ' + req.params.id);
});

//for routes that do not match, equivalent to 404
//should be placed AFTER all other routes, including external routers required
app.get('*', function(req, res){
	res.send('sorry, invalid url.');
});


app.listen(3000);

