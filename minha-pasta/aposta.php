
<?php
session_start();
include 'conexao.php';

$dados = json_decode(file_get_contents("php://input"), true);
$usuario_id = $_SESSION['usuario_id'];
$aposta = intval($dados['aposta']);

$sql = "SELECT saldo FROM usuarios WHERE id = $usuario_id";
$res = $conn->query($sql);
$saldo = $res->fetch_assoc()['saldo'];

if ($saldo < 10) {
  echo json_encode(["mensagem" => "Saldo insuficiente!", "saldo" => $saldo]);
  exit;
}

$numero_sorteado = rand(0, 36);
$ganhou = $numero_sorteado == $aposta;
$novo_saldo = $saldo - 10 + ($ganhou ? 360 : 0);

$conn->query("UPDATE usuarios SET saldo = $novo_saldo WHERE id = $usuario_id");
$conn->query("INSERT INTO apostas (usuario_id, tipo_aposta, valor_apostado, resultado)
              VALUES ($usuario_id, 'número', 10, '$numero_sorteado')");

$mensagem = $ganhou ? "🎉 Você ganhou! Número: $numero_sorteado" : "❌ Você perdeu. Número: $numero_sorteado";

echo json_encode(["mensagem" => $mensagem, "saldo" => $novo_saldo]);
?>
