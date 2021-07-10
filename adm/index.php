<?php
session_start();
include ('includes/connect.php');
include ('includes/funcoes.php');
include ('includes/security.php');

echo '
  <script>
    window.location="inicio.php";
  </script>
  ';
?>