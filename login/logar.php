<?php
include('../adm/includes/connect.php');
include('../adm/includes/funcoes.php');

$postLogin=$_POST['login'];
$postEmpresa=$_POST['empresa'];
$postSenha=$_POST['senha'];

$empresa = verificaEmpresa($postEmpresa);

if ( is_array($empresa) ){
	$usuario = verificaUsuario($postLogin,$postSenha,$empresa);
	
	if( is_array($usuario) ){
		iniciarSessao($usuario,$empresa);
	}
	else{
		echo'
		<script>
			alert("'.$usuario.'");
			history.go(-1);
		</script>
		';
	}
}
else{
	echo'
		<script>
			alert("'.$empresa.'");
			history.go(-1);
		</script>
	';
}

?>