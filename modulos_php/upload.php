<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES['profilePICTURE']['name']);
    $upload_ok = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['profilePICTURE']['tmp_name']);
        if ($check!== false) {
            echo "O arquivo é uma imagem - " . $check['mime'] . ".";
            $upload_ok = 1;
        }else{
            echo "O arquivo não é uma imagem.";
            $upload_ok = 0;
        }
    }

    //Verificação se a imagem já existe
    if(file_exists($targetFile)) {
        echo "Desculpe, o arquivo já existe.";
        $upload_ok = 0;
    }

    if($upload_ok == 0){
        echo "Desculpe, o upload do arquivo não foi realizado.";
    } else{
        if (move_uploaded_file($_FILES['profilePICTURE']['tmp_name'], $targetFile)){
            echo "O arquivo " . basename($_FILES['profilePICTURE']['name']) . " foi enviado com sucesso";
        } else{
            echo "Desculpe, ocorreu um erro ao fazer o upload de arquivo.";
        }
    }
}
?>