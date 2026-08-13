<?php

//Verifica o envio do formulário

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperação dos Valores
    $username = $_POST['username'];
    $senha = $_POST['password'];
    $intention = $_POST['intention'];
    $role = '';//Inicialização da variavel $role como uma string vazia;
    
    if(isset($intention) && !empty($intention)){
        $role = $intention[0];
    }
        
    $name = $_POST['name'];
    $cpf = $_POST ['cpf'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $crp = $_POST['crp'];
    $status = $_POST['status'];
    $selectedStatus = "";

    if(isset($status) && !empty($status)){
        $selectedStatus = $status[0];
    }

    $instituicao = $_POST['instituicao'];
    $tipo = $_POST['tipo'];
    
    include('../conexao.php');  
    
    //Inserir dados do db e criação da conta
    $sql = "INSERT INTO usuario (Username, Senha, Nome, Cpf, Birthdate, City, Adress)
     VALUES ('$username', '$senha', '$name', '$cpf', '$birthdate','$city', '$address' )";
   
   if(mysqli_query($conn, $sql)){
    $user_id = mysqli_insert_id($conn);

    $sql = "INSERT INTO email (email) VALUES ('$email')"; 
        }   
        if(mysqli_query($conn,$sql)){
            $email_id = mysqli_insert_id($conn);

            $sql = "UPDATE usuario SET Email_idEmail = '$email_id' WHERE idUsuario = '$user_id'";
        }
    
    $sql = "SELECT idTipo FROM tipo WHERE Tipo = '$role'";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $idTipo = $row['$idTipo'];
    }
    $sql = "UPDATE usuario SET Tipo_idTipo = '$idTipo' WHERE idUsuario = '$user_id'";

    if(mysqli_query($conn, $sql)){
        echo "Erro ao criar a conta";
    }
    $conn->close();
}
?>