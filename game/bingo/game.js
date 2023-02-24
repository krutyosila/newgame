const {Server} = require("socket.io");
const io = new Server(3000);

const Client = require("socket.io-client");
const ic = Client.connect('https://baytombala.com:2053');


io.on("connection", (socket) => {
    console.log(socket.id);
});
ic.on('bingo-event', function (rsp) {
    io.emit('bingo', rsp);
});
