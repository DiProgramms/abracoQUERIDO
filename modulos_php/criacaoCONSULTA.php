<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeProfissional = $_POST['nomeProfissional'];
    $nomeUsuario = $_POST['nomeUsuario'];
    $idPaciente = $_POST['idPaciente'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $cpr = $_POST['cpr'];
    $idInstituicao = $_POST['idInstituicao'];
    $prontuario = $_POST['prontuario'];

    include('../conexao.php');

    //Preparação da consulta SQL
    $sql = "INSERT INTO consulta (NomeProfissional, NomeUsuario, IdPaciente, Data, Horario, Cpr, IdInstituicao, Prontuario)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if(!$stmt){
        die("Preparação da consulta falhou: " . mysqli_error($conn));
    }

    //Bind dos parâmetros e execução da consulta
    mysqli_stmt_bind_param($stmt, "ssssssss", $nomeProfissional, $nomeUsuario, $idPaciente,
        $data, $horario, $cpr, $idInstituicao, $prontuario);
        if(mysqli_stmt_execute($stmt)){
            echo "Consulta agendada com sucesso!";
        } else {
            echo "Erro ao agendar a consulta: " . mysqli_error($conn);
        }
    
    //Fechamento da conexão e do statement
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}