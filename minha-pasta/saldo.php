
<?php
session_start();
include 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];
$res = $conn->query("SELECT saldo FROM usuarios WHERE id = $usuario_id");
$saldo = $res->fetch_assoc()['saldo'];

echo json_encode(["saldo" => $saldo]);
?>
