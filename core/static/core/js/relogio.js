function mostrarRelogio() {

    var dataHora = new Date();
    var horas = dataHora.getHours();
    var minutos = dataHora.getMinutes();
    var segundos = dataHora.getSeconds();
    var data = dataHora.toLocaleDateString();

    //Formatação para adicionar um zero a esquerda se for menor que 10
    horas = (horas <10) ? "0" + horas : horas;
    minutos = (minutos <10) ? "0" + minutos : minutos;
    segundos = (segundos <10) ? "0" + segundos : segundos;

    var relogio = horas + ":" + minutos + ":" + segundos;
    document.getElementById("relogio").innerHTML = relogio;

    var dataElement = document.getElementById("data");
    dataElement.innerHTML = data;
    
}

setInterval(mostrarRelogio, 1000);