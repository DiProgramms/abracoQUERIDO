<?php

    include('../conexao.php');

if(isset($_GET['pagina']) && isset($_GET['termoPesquisa'])){
    $pagina = intval($_GET['pagina']); //Conversão para int;
    $termoPesquisa = $_GET['termoPesquisa'];

    //Definição do numero de resultados.
    $resultadosPorPagina = 10;
    $limite = $resultadosPorPagina;
    $deslocamento = ($pagina - 1) * $resultadosPorPagina;
    $deslocamento = max(0, $deslocamento);

    //Consulta SQL para buscar psicólogos com base no termo de pesquisa, limitando os resultados por pagina;
    $sql = "SELECT * FROM usuario WHERE Nome LIKE '%$termoPesquisa' LIMIT $deslocamento, $limite";
    $result = $conn->query($sql);

    if($result->num_rows>0) {
        //Processar e exibir resultados, por exemplo, em formato HTML;
        while ($row = $result->fetch_assoc()) {
            echo "Nome: " . $row['Nome'] . "<br>";
        }
    } else {
        echo "Nenhum psicólogo encontrado com o nome: " . $termoPesquisa;
        var_dump($termoPesquisa);
        var_dump($pagina);
        var_dump($deslocamento);
        var_dump($limite);
    }

    //Calculo do número de páginas;
    $sqlTotal = "SELECT COUNT(*) AS total FROM usuario  WHERE nome LIKE '$termoPesquisa'";
    $totalResultados = $conn->query($sqlTotal)->fetch_assoc()["total"];
    $totalPaginas = ceil($totalResultados / $resultadosPorPagina);

    //Retorno do numero total de paginas como JSON;
    echo json_encode(['totalPaginas' => $totalPaginas]);

    $conn->close();
}
?>