<?php
  session_start();
  include ('../includes/connect.php');
  include ('../includes/funcoes.php');
  include ('../includes/security.php');
  include ('../includes/connect_cliente.php');

  $codigo=$_GET['usuario'];
  $senhaAtual=$_GET['senhaAtual'];
  $novaSenha1=$_GET['novaSenha1'];
  $novaSenha2=$_GET['novaSenha2'];

  if($senhaAtual==$usuario['senha']){
    if($novaSenha1==$novaSenha2){
      $sql = '
      UPDATE tb_usuario SET
      cd_senha_usuario = "'.$novaSenha1.'"
      
      WHERE cd_usuario="'.$codigo.'"
      
      ';
      
      if( mysqli_query($con, $sql) ) {
        echo 'ok';
      }
      else{
        echo 'Error: '.$sql.' - '.mysqli_error($con);
      }
    }
    else{
      echo 'Nova senha com valores diferentes nos dois campos.';
    }
  }
  else{
    echo 'A senha atual está incorreta';
  }
?>