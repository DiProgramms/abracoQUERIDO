const express = require('express');
const http = require('http');
const socketIO = require('socket.io');
const mysql = require('mysql2');
const app = express();
const server = http.createServer(app);
const io = sockteIO(server);

const connection = mysql.createConnection({
    host:'localhost',
    user: 'root',
    password: 'root',
    database: 'projetoAmigo'
});

connection.connect((error) => {
    if (error){
        console.error('Erro ao tentar a conexão com o banco de Dados', error);
    }else{
        console.log('Conexão com o banco de dados estabelecida');
    }
});

io.on('connection', (socket) => {
    console.log('Usuario conectado');

    socket.on('user connected',(userId) => {
        console.log('Usuario ID: ${userId} conectado');
        socket.join(userId);
    });

    socket.on('chat message', (content) =>{
        const timestamp = new Date().toISOString();
        const userId = socket.rooms.values().next().value; //Obter o Id do usuário conectado
        const query = 'INSERT INTO messages (user_id, content, timestamp) VALUES (?, ?, ?)';
        connection.query(query, [userId, content, timestamp], (error, results) =>{
            if (error){
                console.error('Erro ao salvar mensagens no banco de dados', error);
            }else{
                io.to(userId).emit('chat message', {content, timestamp});
            }
        });
    });

    socket.on('disconnect', () => {
        console.log('Usuario desconectado');
    });
});

server.listen(3306, () => {
    console.log('Servidor rodando na porta 3000');
});