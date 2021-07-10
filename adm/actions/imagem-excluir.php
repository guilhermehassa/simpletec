<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  $codigo=$_GET['codigoFoto'];
  $extensao=$_GET['extensaoFoto'];

  excluirFoto($empresa['codigo'],$codigo,$extensao);
  
  
  $sql = 'DELETE FROM tb_foto_produto WHERE cd_foto_produto='.$codigo;
    
  if( mysqli_query($con_cliente, $sql) ) {
    echo 'ok';
  }
  else{
    echo 'Error: '.$sql.' - '.mysqli_error($con);
  }
?>