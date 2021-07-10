<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  $nome=$_GET['nome'];
  $status=$_GET['status'];
  
  $sql = '
  INSERT INTO tb_categoria(
    cd_categoria,
    nm_categoria,
    ic_status_categoria
    )
    
    VALUES(
    "",
    "'.$nome.'",
    "'.$status.'"
  )';
    
  if( mysqli_query($con_cliente, $sql) ) {
    echo 'ok';
  }
  else{
    echo 'Error: '.$sql.' - '.mysqli_error($con);
  }
?>