<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  $cod=$_GET['cod'];
  $pagina=$_GET['pagina'];
  $pagina=substr($pagina,0,-1);

  $pesquisa='SELECT * FROM tb_'.$pagina.' WHERE cd_'.$pagina.'='.$cod;
  $select=mysqli_query($con_cliente,$pesquisa);
  $objeto = mysqli_fetch_row($select);
  
  echo $objeto[1];
?>