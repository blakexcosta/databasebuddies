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
