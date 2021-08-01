<?php

$banco = "ghtecb50_simpleTEC";
$usuario = "ghtecb50_ST";
$senha = '@Simple30';
$hostname = 'localhost';

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