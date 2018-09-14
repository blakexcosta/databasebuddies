var express = require('express');
var router  = express.Router();

//using express router
//this needs to be in same direction as index.js
router.get('/', function(req, res){
	res.send('GET route on things.');
});

router.post('/', function(req, res){
        res.send('POST route on things.');
});

//more complex example of dynamic routes
// http://localhost:3000/things/somethingsomething/3456
//can also put this in /things
router.get('/:name/:id', function(req, res){
	res.send('id: ' + req.params.id + ' and name: ' + req.params.name);
});


//pattern matching routes, will restrict URL parameter matching
//ex:) need the id to be a 5 digit long number
//will ONLY match requests that are 5 digits long
router.get('/:id([0-9]{5})', function(req, res){
        res.send('id: ' + req.params.id);
});


//navigate to localhost:3000/things/hello
router.get('/hello', function(req, res){
	res.send("Hello Page!");
});


//post request to hello, use
//curl -X POST "http://localhost:3000/things/hello"
//look at the command line when doing this
router.post('/hello', function(req, res){
        res.send("You just called the post method at '/hello'!\n");
});


//the 'all' method handles all types of http methods at a particular route
//usually used for defining middleware
//http://localhost:3000/things/test
router.all('/test', function(req, res){
        res.send("HTTP method doesn't have any effect on this route!");
});


module.exports = router;
