$(document).ready(function(){
    //Funcão para carregar a lista de amigos
    function carregarListaAmigos(){
        $.ajax({
            url: "operacoes_amigos.php",
            method: "POST",
            data: { acao: "listar" },
            success: function(data) {
                $("#lista-amigos").html(data);
            }
        });
    }

    $("#buscar-amigo-form").submit(function(event) {
        event.preventDefault();
        const nomeAmigo = $("#nome-amigo").val();
        $.ajax({
            url: "operacoes_amigos.php",
            method: "POST",
            data: { acao: "buscar", nome_amigo: nomeAmigo},
            success: function(data) {
                $("#lista-amigos").html(data);
            }
        });
    });

    $("#adicionar-amigo-form").submit(function(event){
        event.preventDefault();
        const nomeNovoAmigo = $("#nome-novo-amigo").val();
        $.ajax({
            url: "operacoes_amigos.php",
            method: "POST",
            data: { acao: "adicionar", nome_novo_amigo: nomeNovoAmigo},
            success: function(response) {
                carregarListaAmigos();
                $("nome-novo-amigo").val(""); //Limpagem de campo pós adicionado;
            }
        });
    });

    //Carregar a lista de amigos quando a página é carregada
    carregarListaAmigos();
});

