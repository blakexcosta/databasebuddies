var express = require("express");
var app = express();

//better separation of concerns
var things = require('./things.js');

app.use('/things', things);

app.listen(3000);
