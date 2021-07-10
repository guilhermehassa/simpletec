<?php
if( empty($_SESSION['usuario_simpleTEC']) || empty($_SESSION['empresa_simpleTEC']) ){
	
  header("location: ../login/index.php");
}
else{
  $empresa = nomearEmpresa($_SESSION['empresa_simpleTEC']);
  $usuario = nomearUsuario($_SESSION['usuario_simpleTEC']);
  $plano = nomearPlano($empresa['plano']);
  
  
}
?>