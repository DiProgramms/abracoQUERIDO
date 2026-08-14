document.addEventListener("DOMContentLoaded", function(){
    var anotacoesInput = document.getElementById("anotacoes");
    var contadorCaracteres = document.getElementById("contadorCaracteres");
    var limiteCaracteres = 500;

    //Adiciona um listener pro input
    anotacoesInput.addEventListener("input", function() {
        var caracteresDigitados = anotacoesInput.value.length;
        contadorCaracteres.textContent = caracteresDigitados + "/" + limiteCaracteres;

        //Limite do numero de caracteres
        if(caracteresDigitados>limiteCaracteres){
            anotacoesInput.value = anotacoesInput.value.substring(0, limiteCaracteres);
            contadorCaracteres.textContent = limiteCaracteres + "/" + limiteCaracteres;
            contadorCaracteres.style.color = "red";
        }else{
            contadorCaracteres.style.color = "";    
        }
    });
});