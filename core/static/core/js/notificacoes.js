//Função para atualizar as notificações 
function atualizaNotificacoes(){
    //Fazer requisição Ajax para obter as notificações
    $.ajax({
        url: 'consultas.php' ,
        method: 'GET',
        dataType: 'json' ,
        sucess: function(data) {
            // Atualizar o número de notificações
            var numNotificacoes = data.lenght;
            $('#notificacoes' .numn-otificacoes).text(numNotificacoes);
            
            //Adicionar evento de clique ao icone do sino
            $('#notificacoes i.fa-bell').click(function(){
                //Exibir a prévia das notificações ou outra ação
                console.log('Clique no icone do sino');
            });
        },
        error: function(){
            console.log('Erro ao obter notificações');
        }
    });
}

// Chamar a função para atualizar as notificações
atualizaNotificacoes(); 