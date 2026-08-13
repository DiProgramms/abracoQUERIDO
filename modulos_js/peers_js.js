$(function () {
    var socket = io();

    var myPeer = new Peer(); //Criação de uma instância do Peer

    socket.on('connect', function(){
        var userId = prompt('Digite seu ID de usuário');
        socket.emit('user connected', userId);
    });

    socket.on('user list', function(users) {
        $('#user-list').empty();
        for (const user of users) {
            $('#user-list').append($('<li>').text(user));
        }
    });

    myPeer.on('open', function(userId){
        socket.emit('peer connected', userId);
    })

    //Lógica para iniciar uma chamada de video com um usuário em específico
    //Lógica para gerenciar as chamadas de video usando o Peers.js

    socket.on('user= disconnected', function(userId){
        //Implementação da lógica para lidar com a desconexão de um usuário
    });
});