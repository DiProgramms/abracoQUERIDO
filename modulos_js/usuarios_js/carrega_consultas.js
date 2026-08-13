function exibirUltimasConsultas(){
    //Chama o PHP para obter as ultimas consultas
    $.ajax({
        type: "POST",
        url: "../abracoQuerido/modulos_php/consultas.php",
        data: { action: 'obterUltimasConsultas'},
        success: function (response){
            var ultimasConsultas = JSON.parse(response);

            //Exibe as ultimas consultas no elemento com o ID "ultimas-consultas"
            var ul = document.getElementById("ultimas-consultas");
            ultimasConsultas.forEach(function (consulta){
                var li = document.createElement("li");
                li.textContent = consulta.descricao_consulta;
                ul.appendChild(li);
            });
        }
    });
}

//Chama a função para exibir as ultimas consultas;
exibirUltimasConsultas();