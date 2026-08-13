<?php
session_start();

include('../conexao.php');

$username = $_SESSION['nomeUsuario']; //Obtém o nome do usuário na sessão.

//Consulta SQL para obter os dados do usuário, -incluindo imagem-
$sql = "SELECT * FROM usuario WHERE Username = '$username'";

$result = mysqli_query($conn, $sql);

if($result) {
    $row = mysqli_fetch_assoc($result);

    $username = $row['Username'];
    $senha = $row['Senha'];
    $name = $row['Nome'];
    $cpf = $row['CPF'];
    $birthdate = $row['Birthdate'];
    $city = $row['City'];
    $address = $row['Adress'];
    $tipo = $row['Tipo_idTipo'];

    switch($tipo){
        case 1:
            $tipoESCRITO = "Usuario";
            break;
        case 2:
            $tipoESCRITO = "Estagiario";
            break;
        case 3:
            $tipoESCRITO = "Supervisor";
            break;
        case 4:
            $tipoESCRITO = "Profissional";
            break;
    }

    //Feche a conexão com o banco de dados.
    mysqli_close($conn);
}else{
    echo "Erro na consulta: " . mysqli_error($conn);
}
?>