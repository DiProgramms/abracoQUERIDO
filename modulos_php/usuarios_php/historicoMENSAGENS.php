<?php
$userId = $_POST['userId'];

    include('../conexao.php');

$query = 'SELECT * FROM messages WHERE user_id = ? ORDER by timestamp';
$stmt = $connection->prepare($query);
$stmt->bind_param('s', $userId);
$stmt->execute();

$result = $stmt->get_result();
$history = array();

while ($row = $result->fetch_assoc()){

}

$stmt->close();
$connection->close();

header('Content-Type: application/json');
echo json_encode($history);
?>