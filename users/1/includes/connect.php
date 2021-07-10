<?php
$banco = "ghtecb50_papelariaSimple";
$usuario = "ghtecb50_PS";
$senha = '@Papelarias';
$hostname = 'localhost';

$con = mysqli_connect($hostname,$usuario,$senha,$banco);

// Checa conexao
if (mysqli_connect_errno()) {
    echo "Falha na conexão com o servido MySQL:  " . mysqli_connect_error();
}
?>