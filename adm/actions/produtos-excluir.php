<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  $codigo=$_GET['valor'];

  $pesquisa = 'SELECT * FROM tb_foto_produto WHERE tb_produto_cd_produto='.$codigo;
  $select=mysqli_query($con_cliente,$pesquisa);
  
  if(mysqli_num_rows($select) >=1){
    while( $objeto = mysqli_fetch_row($select) ){
      excluirFoto($empresa['codigo'],$objeto[0],$objeto[2]);

      $sql = 'DELETE FROM tb_foto_produto WHERE cd_foto_produto='.$objeto[0];
      mysqli_query($con_cliente, $sql);
    }
  }
  
  $sql = 'DELETE FROM tb_produto WHERE cd_produto='.$codigo;
    
  if( mysqli_query($con_cliente, $sql) ) {
    echo 'ok';
  }
  else{
    echo 'Error: '.$sql.' - '.mysqli_error($con);
  }
?>