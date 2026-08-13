<?php

include('../conexao.php');

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["destinatario_id"]) && isset($_POST["mensagem"])){
        $destinatrioId = $_POST["destinatario_id"];
        $mensagem = $_POST["mensagem"];

        //Certificação de validação do destinatário e da mensagem para evitar problemas de segurança

        $inserirQuery = "INSERT INTO mensagens (remetente_id, destinatario_id, mensagem, data_hora) 
        VALUES ($usuarioLogadoId, $destinatarioId,'$mensagem', NOW())";
        
        if ($conn->query($inserirQuery) === true) {
            echo "Mensagem enviada com sucesso.";
        }else{
            echo "Erro ao enviar a mensagem: " . $conn->error;
        }
    }
}

$conn->close();
?>