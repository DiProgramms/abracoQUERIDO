<?php
session_start();

if(isset($_SESSION["usuarioLogadoId"])) {
    $usuarioLogadoId = $_SESSION["usuarioLogadoId"];

//Conectar ao banco de dados
    include('../conexao.php');

    $query = "SELECT * FROM mensagens WHERE destinatario_id = $usuarioLogadoId ORDER BY data_hora DESC";
    $result = $conn->query($query);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["mensagem"] . "</li>";
        }
    }else{
        echo "<li>Nenhuma mensagem encontrada.</li>";
    }

    $conn->close();
}else{
    echo "Usuário não está logado.";
}

?>