<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $senha = $_POST['password'];

    include('./conexao.php');
    
    //Consulta SQL
    $sql = "SELECT Username, Senha, Tipo_idTipo FROM usuario WHERE Username = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $storedUSERNAME = $row['Username'];
        $storedPASSWORD = $row['Senha'];
        $tipoUsuario = $row['Tipo_idTipo'];

        //Verificação da senha
        if($username === $storedUSERNAME && $senha === $storedPASSWORD) {
            echo "Login bem-sucedido!";
            //Armazenamento do nome de usuario
            session_start();            
            $_SESSION['nomeUsuario'] = $storedUSERNAME;   
            //redirecionamento com base no tipo
            switch($tipoUsuario){
                case 1:
                    header('Location: .\usuario_html\menuprincipalUSUARIO.php');
                    exit();
                case 2:
                    header('Location: .\estagiario_html\menuprincipalESTAGIARO.php');
                    
                    exit();
                case 3:
                    header('Location: .\supervisor_html\menuprincipalSUPERVISOR.html');
                    exit();
                case 4:
                    header('Location: .\profissional_html\menuprincipalPROFISSIONAL.html');
                    exit();
            }
        }else{ 
            echo "Erro no login";
        }
        
    }
    $conn->close(); 
}
    //Fechamento da conexão
              
?>