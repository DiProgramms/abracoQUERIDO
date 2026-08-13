<?php 

include('../conexao.php');

// Consulta no banco de dados para obter o horário da consulta
$sql = "SELECT horario_consulta FROM tabela_consultas WHERE id=1";
$result=  $conn->query($sql);

if($result->num_rows> 0) {
    $row = $result->fetch_assoc();
    $horarioConsulta = $row["horario_consulta"];

    // Passa o horário da consulta para o JavaScript
    echo '<script>';
    echo 'const horarioConsulta = new Date("' . $horarioConsulta . '");';
    echo 'atualizarAvisoConsulta(horarioConsulta);';
    echo '</script>';
 
}
    $conn->close();

//Função para buscar as notificações no banco de dados
function buscarNotificacoes(){
    
    include('../conexao.php');

    //Consulta SQL 
    $sql = "SELECT * FROM notificacoes";
    $result = $conn->query($sql);

    // Array para armazenar notificações
    $notificacoes = array();

    //Verificar se há resultados
    if ($result->num_rows > 0) {
        //Loop
        while ($row = $result->fetch_assoc()){
            $notificacoes[] = $row;
        }
    }

    //Fechar Conexão
    $conn->close();

    //Retornar as notifacações como um array JSON
    return json_encode($notificacoes);
}

$notificacoes = buscarNotificacoes();

echo $notificacoes;

function carregar_resultados($pagina, $termoPesquisa) {
    
    include('../conexao.php');

    //Número de resultados por página

    $resultadosPORpagina = 15;

    $inicio = ($pagina - 1) * $resultadosPORpagina;

    //Consulta Sql para buscar resultados da página atual com filtragem por termo de pesquisa
    $sql = "SELECT * FROM tabela WHERE coluna LIKE '%$termoPesquisa% LIMIT $inicio, $resultadosPORpagina"; 
    $resultado = $conn->query($sql);

    //Exibindo os resultados da página atual
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()){
            echo "<p>" . $row["coluna"] . "</p>";

        }
    }else{
        echo "Nenhum resultado encontrado.";
    }

    //Fechamento de conexão com o banco de dados.
    $conn->close();
}
function carregar_resultados_psicologos($pagina, $termoPesquisa) {
    
    include('../conexao.php');

    //Número de resultados por página

    $resultadosPORpagina = 15;

    $inicio = ($pagina - 1) * $resultadosPORpagina;

    //Consulta Sql para buscar resultados da página atual com filtragem por termo de pesquisa
    $sql = "SELECT * FROM tabela WHERE coluna LIKE '%$termoPesquisa% LIMIT $inicio, $resultadosPORpagina"; 
    $resultado = $conn->query($sql);

    //Exibindo os resultados da página atual
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()){
            echo "<p>" . $row["coluna"] . "</p>";

        }
    }else{
        echo "Nenhum resultado encontrado.";
    }
function obterUltimasConsultas() {
    
    include('../conexao.php');

    //Consulta SQL para obter as ultimas 5 consultas em ordem cronológica
    $sql = "SELECT data, horario, nomeProfissional FROM consultas ORDER BY data AND horario DESC LIMIT 5";
    $result = $conn->query($sql);

    //Array para armazenar as ultimas consultas
    $ultimasConsultas = array();

    //Verificação se há resultados
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $ultimasConsultas[] = $row;
        }
    }
    //Fechar a conexão com o bd.
    $conn->close();

    //Retornando resultados como Json
    return json_encode($ultimasConsultas);
}
    //Fechamento de conexão com o banco de dados.
    $conn->close();
}

?>