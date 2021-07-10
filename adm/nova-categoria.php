<?php
  session_start();
  include ('includes/connect.php');
  include ('includes/funcoes.php');
  include ('includes/security.php');
  include ('includes/connect_cliente.php');
  
  include('includes/head.php');
  $pagina_atual='categorias';
?>
      <title>Categorias > Novo(a) > adm > simpleTEC</title>

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
              <h1 class="formulario__titulo">Nova Categoria</h1>
            </div>
            <!-- CABECALHO - FIM -->
            <form class="formulario__form">
            <input type="text" class="invisivel" id="codigo" value="0">

              <div class="formulario__fieldset">
                <legend class="formulario__legend">Nome</legend>
                <input type="text" name="nome" required class="formulario__input" id="nomeCategoria">
              </div>

              <div class="formulario__fieldset">
                <legend class="formulario__legend">Status</legend>
                <select name="status-categoria" class="formulario__select" id="statusCategoria">
                  <option value="A" class="formulario__option">Ativo</option>
                  <option value="D" class="formulario__option">Desativado</option>
                </select>
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