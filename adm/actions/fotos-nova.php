<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  $produto=$_POST['codigo'];
  $extensao = strtolower(substr($_FILES['foto']['name'], -4)); //pega a extensao do arquivo

  $sql = '
    INSERT INTO tb_foto_produto(
      cd_foto_produto,
      tb_produto_cd_produto,
      nm_foto_produto
      )
      
      VALUES(
      "",
      "'.$produto.'",
      "'.$extensao.'"
    )
  ';
    
  if( mysqli_query($con_cliente, $sql) ) {
    $fotoProduto = mysqli_insert_id($con_cliente);
  }
  else{
    echo 'Error: '.$sql.' - '.mysqli_error($con);
    
  }


  $diretorio = criarPastaFotoProduto($empresa['codigo'],$fotoProduto);
  $novoNome = nomearFoto($_FILES['foto']['name'],$fotoProduto);
  uparFoto($_FILES['foto']['tmp_name'],$diretorio,$novoNome);

  echo'
  <script>
    window.location="../editar-produto.php?cod='.$produto.'";
  </script>
  ';
?>