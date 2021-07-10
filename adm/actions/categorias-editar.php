<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  $cod=$_GET['codigo'];
  $nome=$_GET['nome'];
  $status=$_GET['status'];
  
  $sql = '
  UPDATE tb_categoria SET
  nm_categoria = "'.$nome.'",
  ic_status_categoria = "'.$status.'"
  
  WHERE cd_categoria="'.$cod.'"
  
  ';
  
  if( mysqli_query($con_cliente, $sql) ) {
    echo 'ok';
  }
  else{
    echo 'Error: '.$sql.' - '.mysqli_error($con_cliente);
  }
?>