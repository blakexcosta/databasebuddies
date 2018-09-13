var express = require("express");
var app = express();


//navigate to localhost:3000
app.get('/', function(req, res){
	res.send("Home Page!");
});


//navigate to localhost:3000/hello
app.get('/hello', function(req, res){
	res.send("Hello Page!");
});


//post request to hello, use
//curl -X POST "http://localhost:3000/hello"
//look at the command line when doing this
app.post('/hello', function(req, res){
        res.send("You just called the post method at '/hello'!\n");
});


//the 'all' method handles all types of http methods at a particular route
//usually used for defining middleware
app.all('/test', function(req, res){
        res.send("HTTP method doesn't have any effect on this route!");
});

app.listen(3000);
