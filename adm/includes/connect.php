<?php

$banco = "";
$usuario = "";
$senha = '';
$hostname = '';

$con = mysqli_connect($hostname,$usuario,$senha,$banco);

// Checa conexao
if (mysqli_connect_errno()) {
	echo "Falha na conexão BD simpleTEC<br>
		$hostname <br>
		$usuario <br>
		$senha <br>
		$banco <br>
	
	" . mysqli_connect_error();
}
?>