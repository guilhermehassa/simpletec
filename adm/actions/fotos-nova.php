<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  include '../../php-image-resize/lib/ImageResize.php';

  $produto=$_POST['codigo'];

  $nome_temporario = $_FILES['foto']['name'];
  $separados_por_pontos = explode('.',$nome_temporario);
  $extensao = '.'.end($separados_por_pontos);

  $sql = '
    INSERT INTO tb_foto_produto(
      cd_foto_produto,
      tb_produto_cd_produto,
      nm_foto_produto
      )
      
      VALUES(
      "",
      "'.$produto.'",
      ".jpg"
    )
  ';
    
  if( mysqli_query($con_cliente, $sql) ) {
    $fotoProduto = mysqli_insert_id($con_cliente);
  }
  else{
    echo 'Error: '.$sql.' - '.mysqli_error($con);
    
  }

  $nome_imagem=$fotoProduto;//nome da imagem
  $nome_com_extensao = $nome_imagem . $extensao; //define o nome do arquivo com extensao
  $diretorio = criarPastaFotoProduto($empresa['codigo'],$fotoProduto);

  move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$nome_imagem.'_original'.$extensao); //efetua o upload

  //FAZ A FOTO GRANDE OTIMIZADA
  $image = new \Gumlet\ImageResize($diretorio.$nome_imagem.'_original'.$extensao);
  $image->resizeToBestFit ( 800 , 800 );
  $image->quality_jpg = 70;
  $image->save($diretorio.$nome_imagem.'.jpg', IMAGETYPE_JPEG);

  //FAZ A THUMB
  $image2 = new \Gumlet\ImageResize($diretorio.$nome_imagem.'_original'.$extensao);
  $image2->resizeToBestFit ( 300 , 300 );
  $image2->quality_jpg = 70;
  $image2->save($diretorio.'thumb_'.$nome_imagem.'.jpg', IMAGETYPE_JPEG);

  // APAGAR FOTO ORIGINAL
  unlink($diretorio.$nome_imagem.'_original'.$extensao);

  echo'
  <script>
    window.location="../editar-produto.php?cod='.$produto.'";
  </script>
  ';
?>