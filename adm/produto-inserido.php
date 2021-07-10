<?php
  session_start();
  include ('includes/connect.php');
  include ('includes/funcoes.php');
  include ('includes/security.php');
  include ('includes/connect_cliente.php');

  $pesquisa = 'SELECT * FROM tb_produto ORDER BY cd_produto DESC limit 1';
  $select=mysqli_query($con_cliente,$pesquisa);
  $ultimoProduto = mysqli_fetch_row($select);

  
  echo'
  <script>
    window.location="editar-produto.php?cod='.$ultimoProduto[0].'";
  </script>
  ';

?>