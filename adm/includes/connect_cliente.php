<?php
$banco = $empresa['nome_bd'];
$usuarioBD = $empresa['usuario_bd'];
$senha = $empresa['senha_bd'];
$hostname = 'localhost';

$con_cliente = mysqli_connect($hostname,$usuarioBD,$senha,$banco);

// Checa conexao
if (mysqli_connect_errno()) {
	echo "Falha na conexão BD do cliente<br>
	$hostname <br>
	$usuarioBD <br>
	$senha <br>
	$banco <br>

" . mysqli_connect_error();
}
?>