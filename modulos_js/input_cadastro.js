document.addEventListener("DOMContentLoaded", function(){
    //Referencia dos campos adicionais
    const camposAdicionais = {
        "usuario": [],
        "supervisor": ["crp","status", "instituicao", "tipo"],
        "profissional": ["crp", "status", "tipo"],
        "estagiario": ["crp", "status", "tipo"]
    };

    //Função para mostrar/ocultar campos adicionais com base na opção selecionada
    function toggleCamposAdicionais(){
        const intentionRadios = document.getElementById("intention");
        let selectedOption = "";
        
        //Encontre a opção selecionada
        intentionRadios.forEach(function(radio){
            if (radio.checked){
                selectedOption = radio.value;
            }
        });
        
        const camposExibir = camposAdicionais[selectedOption];

        //Oculta ou mostra os campos
        ["crp", "status", "instituicao", "tipo"].forEach(function(campo){
            const campoElement = document.getElementById(campo);
            if (camposExibir && camposExibir.includes(campo)){
                campoElement.style.display = "block";
            }else{
                campoElement.style.display = "none";
            }
        });
    }

    //Adiciona um listener de evento para o campo intenção
    const intentionRadios = document.getElementById("intention");
    intentionRadios.forEach(function(radio){
        radio.addEventListener("change", toggleCamposAdicionais);
    });

    //Executa a função
    toggleCamposAdicionais();
});