<?php

include('../conexao.php');

$query = "SELECT * FROM avaliacoes ORDER BY data_avaliacao DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $avaliacao = $row["avaliacao"];
        $dataAvaliacao = $row["data_avaliacao"];

        //Recuperação de informações do estágiario e supervisor com base nos IDs
        $estagiarioId = $row["estagiario_id"];
        $supervisorId = $row["supervisor_id"];

        $queryEstagiario = "SELECT nome FROM usuarios WHERE id = $estagiarioId";
        $querySupervisor = "SELECT nome FROM usuarios WHERE id = $supervisorId";

        $resultEstagiario = $conn->query($queryEstagiario);
        $resultSupervisor = $conn->query($querySupervisor);

        $nomeEstagiario = ($resultEstagiario->num_rows > 0) ? $resultEstagiario->fetch_assoc()["nome"] : 
        "Estagiário Desconhecido";
        $nomeSupervisor = ($resultSupervisor->num_rows > 0) ? $resultSupervisor->fetch_assoc()["nome"] :
        "Supervisor Desconhecido";

        echo "<p> Avaliação de $nomeEstagiario por $nomeSupervisor em $dataAvaliacao: $avaliacao</p>";
    }
}else{
    echo "<p>Nenhuma avaliação encontrada.</p> ";
}

$conn->close();
?>