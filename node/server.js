var
express = require('express'),
app = express(),
http = require('http').Server(app),
io = require('socket.io')(http);

var socket;
var users = [];

io.on('connection', function(socket){
	users.push(socket);

	socket.on('disconnect', function(){
		users = users.splice(users.indexOf(users[socket.id]), 0);
	});
});


app.get('/', function(req, res){
	users.forEach(function(item){
		console.log(item);
		item.emit('mess', '');
	});
	console.log(users);
	res.end('Test is succeded. Queries is working');
});

http.listen('8093');