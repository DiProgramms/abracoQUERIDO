let totalPaginas = 0;
let termoAtual = "";

const resultadosDiv = document.getElementById("resultados");
const paginationUl = document.getElementById("pagination");

function enviarFormulario(){
    const termoPesquisa = document.getElementById("termoPesquisa").value;
    termoAtual = termoPesquisa;
    carregarPagina(1, termoPesquisa);

}

//Função para carregar os resultados de uma pesquisa especifica
function carregarPagina(pagina, termoPesquisa) {
    termoAtual = termoPesquisa;
        
    fetch(`/api/pesquisar-psicologos/?pagina=${pagina}&termoPesquisa=${encodeURIComponent(termoPesquisa)}`, {
            method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            resultadosDiv.innerHTML = data.html;
            totalPaginas = data.total_paginas;
            criarBotoesPaginacao(totalPaginas, pagina);
        })
        .catch(error =>{
            console.error("Erro ao carregar resultados:", error);
        });

}
    //Função para criar os botões de paginação
function criarBotoesPaginacao(totalPaginas, paginaAtual) {
    paginationUl.innerHTML = "";

    function criarBotao(pagina, texto) {
        const li = document.createElement("li");
        li.classList.add("page-item");

        const link = document.createElement("a");
        link.href="#";
        link.textContent = texto;
        link.classList.add("page-link");

        li.appendChild(link);

        link.addEventListener("click", () => {
            carregarPagina(pagina, termoAtual);
        });

        paginationUl.appendChild(li);
    }

        if (totalPaginas > 1) {
            criarBotao( paginalAtual > 1 ? paginalAtual - 1 : 1, "Anterior");
                
            for (let i = 1; i <= totalPaginas; i++) {
                const li = document.createElement("li");
                li.classList.add("page-item");
        
                const link = document.createElement("a");
                link.href= "#";
                link.textContent = i;
                link.classList.add("page-link");
    
                li.appendChild(link);
                    
                if (i === paginaAtual){
                    li.classList.add("active");
                }
                link.addEventListener("click", () => {
                    carregarPagina(i, termoAtual);
                });
        
                paginationUl.appendChild(li);
            }

         criarBotao(paginalAtual < totalPaginas ? paginaAtual + 1 : totalPaginas, "Próximo");
        }
    }