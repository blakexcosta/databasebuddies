var mysql = require('mysql');
var connection = mysql.createConnection({
	host: 'localhost',
	user: 'root',
	password: 'student',
	database: 'beerbuddies_db'
});

connection.connect();

module.exports = {
	getBeer: function (beerName) {
		var query = "SELECT * FROM beername WHERE vchbeername LIKE ?"
        var allBeers = [];
	
		connection.query(query, '%' + [beerName] + '%', function (err, result) {
			if (err) throw err;
			console.log(result);
            allBeers = result;
            console.log(allBeers);
            return allBeers;
		});
        //console.log(allBeers);
	},
	getCategory: function (categoryName) {
        var query = "SELECT * FROM "
		
		
	},
	getBrewer: function (brewerName) {
		
		
	}


};