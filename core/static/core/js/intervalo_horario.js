document.addEventListener("DOMContentLoaded", function() {
    //Função para gerar as opções de horário com intervalos de 30mins
    function gerarOpcoesHorario(){
        var select = document.getElementById("horario");
        select.innerHTML = "";

        for (var hora = 7; hora <22; hora++) {
            for (var minuto = 0; minuto<60; minuto += 30){
                var horario = (hora <10 ? "0" : "") + hora + ":" + (minuto <10 ? "0" : "") + minuto;

                // Adicionando apenas os intervalos de horários entre 7:00 a 22:00
                if (hora === 22 && minuto > 0) {
                    break;
                }

                var option = document.createElement("option");
                option.text = horario;
                select.add(option);
            }
        }
    }

    //Chamada da função para gerar as opções de horário iniciais
    gerarOpcoesHorario();
});