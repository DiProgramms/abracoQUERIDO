<?php
session_start();

include('../conexao.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['original_username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    $birthdate = $_POST['birthdate'];

    // Consulta SQL para atualizar os dados do usuário;
    $sql = "UPDATE usuario SET Senha = '$password', Nome = '$name', CPF = '$cpf',
    Birthdate = '$birthdate' WHERE Username = '$username'";

    //Executa a consulta e verifica se foi bem-sucedida;
    if (mysqli_query($conn, $sql)){
        echo "Dados atualizados com sucesso!";
    }else {
        echo "Erro ao atualizar os dados: " . mysqli_error($conn);
    }
}

$conn->close();
?>