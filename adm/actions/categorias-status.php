<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  $objeto=$_GET['objeto'];
  $status=$_GET['valor'];
  
  $sql = '
  UPDATE tb_categoria SET
  ic_status_categoria = "'.$status.'"
  
  WHERE cd_categoria="'.$objeto.'"
  
  ';
  
  if( mysqli_query($con_cliente, $sql) ) {
    echo 'ok';
  }
  else{
    echo 'Error: '.$sql.' - '.mysqli_error($con_cliente);
  }
?>