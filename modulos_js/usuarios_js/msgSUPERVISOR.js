$(document).ready(function(){
    //Função para carregar mensagens
    function carregarMensagens(){
        $.ajax({
            url: "carregar_mensagens.php",
            method: "GET",
            success: function(data) {
                $("#lista-mensagens").html(data);
            }
        });
    }

    //Enviar mensagem
    $("#enviar-mensagem-form").submit(function(event){
        event.preventDefault();
        const destinatarioId = $("#destinatario-id").val();
        const mensagem = $('#mensagem').val();

        $.ajax({
            url: "enviar_mensagem.php",
            method: "POST",
            data: { destinatario_id: destinatarioId, mensagem: mensagem },
            success: function(response) {
                carregarMensagens();
                $("mensagem").val(""); //Limpar o campo após envio
            }
        });
    });

    //Carregar mensagens quando a página é carregada
    carregarMensagens();

    //Carregar mensagens automaticamente a cada 10 segundos
    setInterval(function(){
        carregarMensagens();
    }, 10000);
});