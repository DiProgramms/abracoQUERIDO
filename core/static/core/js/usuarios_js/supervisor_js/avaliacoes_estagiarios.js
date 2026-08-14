$(document).ready(function() {
    //Função para carregar as funções via AJAX
    function carregarAvaliacoes() {
        $.ajax({
            url: "carregar_avaliacoes.php",
            method: "GET",
            success: function(data) {
                $("#avaliacoes-container").html(data);
            }
        });
    }

    //Carregar avaliações no carregamento da página e a cada X segundos
    carregarAvaliacoes();
    setInterval(carregarAvaliacoes, 10000); // 10 segundos
});