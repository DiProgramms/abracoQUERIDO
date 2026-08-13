<?php 
$host = 'localhost';
$dbname = 'projetoamigo';
$usuario = 'root';
$password = '';

$conn = mysqli_connect($host, $usuario, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>