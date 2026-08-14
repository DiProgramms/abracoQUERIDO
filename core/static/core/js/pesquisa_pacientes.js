//Pesquisa de Clientes.

    const formPesquisa = document.getElementById("form-pesquisa");
    const resultadosDiv = document.getElementById("resultados");
    const paginationUl = document.getElementById("pagination");

//Função para carregar os resultados de uma página específica
function carregarPagina(pagina, termoPesquisa) {
    fetch('carregar_resultados.php?pagina=${pagina}&termo_pesquisa=${termoPesquisa}')
    .then(response => response.text())
    .then(data => {
        resultadosDiv.innerHTML = data;
    })
    .catch(error => {
        console.error("Erro ao carregar resultados:", error);
    })
}

//Função para criar os botões de paginação
function criarBotoesPaginacao(totalPaginas) {
    paginationUl.innerHTML = ""; //Limpar Botões Existentes

    for(let i = 1; i <= totalPaginas; i++){
        const li = document.createElement("li");
        li.className = "page-link";
        link.href = "#";
        link.textContent = i;
        link.addEventListener("click", () => {
            const termoPesquisa = document.getElementById("termo-pesquisa").value;
            carregarPagina(i, termoPesquisa);
        })
        li.appendChild(link);
        paginationUl.appendChild(li);
    }
}
