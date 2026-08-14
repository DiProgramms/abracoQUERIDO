//Função fetch para para buscar o resultado do PHP
fetch('webScraping.php')
    .then(response => response.text())
    .then(data => {
        //Injeção do resultado no elemento HTML com o ID "mensagem-motivacional"
        document.getElementById('mensagem-motivacional').innerHTML = data;
    })
    .catch(error => {
        console.error('Erro ao buscar a mensagem: ', error);
    });