var mysql = require('mysql');

var con = mysql.createConnection({
  host: "ADO.NET",
  user: "Farhan",
  password: "yourpassword"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("Result: " + result);
  });
});