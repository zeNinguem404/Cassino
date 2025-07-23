
<?php
$host = "localhost";
$user = "SEU_USUARIO";
$pass = "SUA_SENHA";
$db = "cassino";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}
?>
