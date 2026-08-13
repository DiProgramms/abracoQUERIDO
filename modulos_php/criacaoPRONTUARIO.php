<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nomePaciente = $_POST["nomePaciente"];
    $data = $_POST["data"];
    $dataNascimento = $_POST["dataNascimento"];
    $nomePai = $_POST["nomePai"];
    $nomeMae = $_POST["nomeMae"];
    $profissao  = $_POST["profissao"];
    $idPaciente = $_POST["idPaciente"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $anotacoes = $_POST["anotacoes"];

    include('../conexao.php');

    //Consulta SQL para inserir dados no banco de dado;

    $sql = "INSERT INTO prontuario (NomePaciente, Data, DataNascimento, NomePai, NomeMae, Profissao, idPaciente,
    Telefone, Endereco, Cidade, Anotacoes) VALUES ($nomePaciente, $data, $dataNascimento, $nomePai, $nomeMae,
    $profissao, $idPaciente, $telefone, $endereco, $cidade, $anotacoes)" ;

    if(mysqli_query($conn, $sql)){
        echo "Dados inseridos com sucesso!";
    }else{
        echo "Erro ao inserir os dados: " . mysqli_error($conn);
    }
}
    $conn->close();
?>