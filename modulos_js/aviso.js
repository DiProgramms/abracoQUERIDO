    // Função para obter a diferença de tempo entre duas datas em minutos
function getDiferencaTempo(emMilissegundos){
    const minutos = Math.floor(emMilissegundos / 1000 / 60);
    return minutos

}

    // Função para atualizar o aviso da consulta 
function atualizarAvisoConsulta(horarioConsulta) {
    const agora = new Date();

    const diferenca = horarioConsulta - agora;
    const minutosRestantes = getDiferencaTempo(diferenca);

    if(minutosRestantes <= 15) {
        document.getElementById("aviso").innerText = "Sua consulta está chegando"
    }else {
        document.getElementById("aviso").innerText = "";
    }
}
