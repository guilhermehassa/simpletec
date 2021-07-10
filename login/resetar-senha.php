<?php
include('../adm/includes/connect.php');
include('../adm/includes/funcoes.php');

$postLogin=$_POST['login'];
$postEmpresa=$_POST['empresa'];
$postCodigoEmpresa=$_POST['codigoEmpresa'];
$postEmailUsuario=$_POST['emailUsuario'];

$empresa = verificaEmpresa($postEmpresa);

if ( is_array($empresa) ){
	$pesquisa='SELECT * FROM tb_usuario WHERE
  nm_login_usuario="'.$postLogin.'" AND
  tb_cliente_cd_cliente = "'.$postCodigoEmpresa.'" AND
	nm_email_usuario = "'.$postEmailUsuario.'"
  
  ';
	$select=mysqli_query($con,$pesquisa);
	
	if( mysqli_num_rows($select)<1 ){
		echo'
			<script>
				alert("Dados inválidos.");
				history.go(-1);
			</script>
		';
	}
	else{
		$usuario=mysqli_fetch_row($select);
		$sql = '
		UPDATE tb_usuario SET
		cd_senha_usuario = "admin"
		
		WHERE cd_usuario="'.$usuario[0].'"
		
		';

		if( mysqli_query($con, $sql) ) {
			echo'
				<script>
					alert("Sua senha foi resetada para a senha padrão.");
					window.location="index.php";
					</script>
			';
		}
		else{
			echo '
			<script>
				alert("Error: '.$sql.' - '.mysqli_error($con).'");
				history.go(-1);
			</script>
			';
		}
	}
}
else{
	echo'
		<script>
			alert("Empresa não encontrada.");
			history.go(-1);
		</script>
	';
}

?>