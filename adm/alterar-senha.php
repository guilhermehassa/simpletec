<?php
  session_start();
  include ('includes/connect.php');
  include ('includes/funcoes.php');
  include ('includes/security.php');
  include ('includes/connect_cliente.php');
  
  include('includes/head.php');
  $pagina_atual='alterar-senha';

?>

      <title>Usuário > Alterar senha > adm > simpleTEC</title>

      <link rel="stylesheet" href="../assets/css/adm/formulario.css">
      
      

    </head>
    <body>
      <?php
        include('includes/mostra.php');
        include('includes/header.php');
      ?>
        
      <div class="contem__pagina">
        <?php
          include('includes/menu.php');
        ?>

        <main>

          <section class="formulario">

            <div class="formulario__cabecalho">
              <span class="cube"></span>
              <h1 class="formulario__titulo">Alterar senha do suário: <?php echo $usuario['nome']; ?></h1>
            </div>
            <!-- CABECALHO - FIM -->
            <form class="formulario__form">

              <?php
              echo '<input type="text" class="invisivel" id="codigo" value="'.$usuario['codigo'].'">';
              ?>

              <div class="formulario__fieldset" style="width:100%;">
                <legend class="formulario__legend">Senha atual</legend>
                <input type="password" name="senhaAtual" required class="formulario__input" id="senhaAtual" >
              </div>

              <div class="formulario__fieldset">
                <legend class="formulario__legend">Nova senha</legend>
                <input type="password" name="senha1" required class="formulario__input" id="senha1" >
              </div>

              <div class="formulario__fieldset">
                <legend class="formulario__legend">Repita nova senha</legend>
                <input type="password" name="senha2" required class="formulario__input" id="senha2" >
              </div>

              <div class="formulario__botoes">
                <span class="formulario__botao" id="cancelar">
                  <span class="formulario__botao-icone formulario__botao-cancelar icon icon__cancel--white"></span>
                  <p class="formulario__botao-texto">Cancelar</p>
                </span>
                <span class="formulario__botao" id="salvar">
                  <span class="formulario__botao-icone formulario__botao-salvar icon icon__ok--white"></span>
                  <p class="formulario__botao-texto">Salvar</p>
                </span>
              </div>

            </form>
          </section>
          
        </main>
      </div><!-- Fim do contem página-->

      <?php
        include('includes/footer.php');
      ?>

      <section class="scripts">
        <?php include('includes/scripts-comum.php') ?>
        <script src="../assets/js/adm/form-action.js"></script>
      </section>
    </body>
</html>