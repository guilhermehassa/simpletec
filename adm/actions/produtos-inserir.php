<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  if($empresa['codigoAutomaticoProduto']=='A'){
    $codigo='';
  }else{
    $codigo=$_GET['codigo'];
  }
  
  $nome=$_GET['nome'];
  $categoria=$_GET['categoria'];
  $status=$_GET['status'];
  $tags=$_GET['tags'];
  // $foto=$_GET['foto'];
  $descricao=$_GET['descricao'];
  $data=date('Y-m-d');
  $valorProduto=$_GET['valor'];
  
  $destaque=$_GET['destaque'];
  if($destaque=='true'){
    $textoDestaque = 'A';
  }
  else if($destaque=='false'){
    $textoDestaque = 'D';
  }

  $sql = '
  INSERT INTO tb_produto(
    cd_produto,
    nm_produto,
    tb_categoria_cd_categoria,
    vl_produto,
    ic_destaque,
    ds_produto,
    ds_tags_produto,
    dt_cadastro,
    ic_status_produto
    )
    
    VALUES(
    "'.$codigo.'",
    "'.$nome.'",
    "'.$categoria.'",
    "'.$valorProduto.'",
    "'.$textoDestaque.'",
    "'.$descricao.'",
    "'.$tags.'",
    "'.$data.'",
    "'.$status.'"
  )';
    
  if( mysqli_query($con_cliente, $sql) ) {
    echo 'ok';
  }
  else{
    echo 'Error: '.$sql.' - '.mysqli_error($con_cliente);
  }
?>