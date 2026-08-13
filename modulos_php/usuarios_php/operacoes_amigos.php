<?php

    include('../conexao.php');

//Ação: Listagem de amigos;
if ($_SERVER["REQUEST METHOD"] === "POST" && isset($_POST["acao"])){
    $acao = $_POST["acao"];

    if($acao === "listar"){
        $query = "SELECT * FROM amigos";
        $result = $conn->query($query);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo"<li>". $row["nome"] . "</li>";
            }
        }else{
            echo "Nenhum amigo encontrado.";
        }
    }

    // Ação: Buscar Amigos
    elseif($acao === "buscar" && isset($_POST["nome_amigo"])){
        $nomeAmigo= $_POST["nome_amigo"];
        $query = "SELECT * FROM amigos WHERE nome LIKE '%$nomeAmigo%'";
        $result = $conn->query($query);

        if ($result ->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["nome"] . "</li>";
            }
        }else{
            echo "Nenhum amigo encontrado.";
        }
    }

    //Ação: Adicionar amigo.
    elseif
        ($acao ===  "adicionar" && isset($_POST["nome_novo_amigo"])){
            $nomeNovoAmigo =  $_POST["nome_novo_amigo"];

            //Verificar se o amigo já existe
            $verificarQuery = "SELECT * FROM amigos WHERE nome = '$nomeNovoAmigo'";
            $verificarQuery = $conn->query($verificarQuery);

            if($verificarQuery->num_rows === 0){
                $inserirQuery = "INSERT INTO amigos (nome) VALUES ('$nomeNovoAmigo')";
                if($conn->query($inserirQuery) === true) {
                    echo "Amigo adicionado com sucesso.";
                }else{
                    echo "Erro ao adicionar amigo: ". $conn->error;
                }
            }else{
                echo "Este amigo já existe na lista.";
            }

        }
    }

$conn->close();
?>