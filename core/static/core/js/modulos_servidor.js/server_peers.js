const express =  require ('express');
const http = require('http');
const socketIO = require('socket.io');
const app = express();
const server = http.createServer(app);
const io = socketIO(server);

io.on('connection', (socket) => {
    console.log('Usuário Conectado');

    socket.on('user connected', (userId) => {
        console.log('Usuário ID: ${userId} conectado');
        socket.join(userId);
        io.emit('user list', getConnectedUsers());
    });

    socket.on('disconnect',() => {
        console.log('Usuario desconectado');
        const userId = getUserIdBySocketId(socket.id);
        if(userId) {
            io.to(userId).emit('user disconnected', userId);
            io.emit('user list', getConnectedUsers());
        }
    });

    //Lógica para gerenciar chamadas de video usando o Peers.js
});


function getConnectedUsers(){
    return Object.keys(io.socket.adapter.rooms);
}

function getUserIdBySocketId(socketId) {
    const room = io.sockets.adapter.rooms.get(socketId);
    if (room) {
        return room.values().next().value;
    }

    return null;
}

server.listen(3000, () =>{
    console.log('Servidor rodando na porta 3000');
})