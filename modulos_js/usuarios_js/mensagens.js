$(function() {
    var socket = io();

    socket.on('connect', function(){
        var userId = prompt('Digite seu ID de usuário:');
        socket.emit('user connected', userId);
        requesthistoricoDOchat(userId);
    });

    function requesthistoricoDOchat(userId) {
        $.ajax({
            url: 'historicoMENSAGENS.php',
            method: 'POST',
            data: { userId: userId},
            dataType: 'json',
            success: function(history){
                for (const msg of history) {
                    $('#messages').append($('<li>').text(msg.content));
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro ao solicitar histórico de mensagens', error);
            }
        });
    }

    $('#form').submit(function(){
        var msg = $('input').val();
        socket.emit('chat message', msg);
        $('input').val('');
        return false;
    });

    socket.on('chat message', function(msg){
        $('#message').append($('<li>').text(msg.content));
    });
});