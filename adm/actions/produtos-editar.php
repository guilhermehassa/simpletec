<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  $cod=$_GET['codigo'];
  $nome=$_GET['nome'];
  $categoria=$_GET['categoria'];
  $status=$_GET['status'];
  $tags=$_GET['tags'];
  $descricao=$_GET['descricao'];
  $valorProduto=$_GET['valor'];
  
  $destaque=$_GET['destaque'];
  if($destaque=='true'){
    $textoDestaque = 'A';
  }
  else if($destaque=='false'){
    $textoDestaque = 'D';
  }

  $sql = '
  UPDATE tb_produto SET
  nm_produto = "'.$nome.'",
  tb_categoria_cd_categoria = "'.$categoria.'",
  vl_produto = "'.$valorProduto.'",
  ic_destaque = "'.$textoDestaque.'",
  ds_produto = "'.$descricao.'",
  ds_tags_produto = "'.$tags.'",
  ic_status_produto = "'.$status.'"
  
  WHERE cd_produto="'.$cod.'"
  
  ';

  
  if( mysqli_query($con_cliente, $sql) ) {
    echo 'ok';
  }
  else{
    echo 'Error: '.$sql.' - '.mysqli_error($con_cliente);
  }
?>