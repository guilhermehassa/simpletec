<?php
  session_start();
  include ('includes/connect.php');
  include ('includes/funcoes.php');
  include ('includes/security.php');
  include ('includes/connect_cliente.php');
  
  include('includes/head.php');
  $pagina_atual='categorias';

  $cod=$_GET['cod'];
  $pesquisa='SELECT * FROM tb_categoria WHERE cd_categoria='.$cod;
  $select=mysqli_query($con_cliente,$pesquisa);
  $selectCategoria=mysqli_fetch_row($select);
  $categoria=nomearCategoria($selectCategoria);
  
?>

      <title>Categorias > Editar > adm > simpleTEC</title>

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
              <h1 class="formulario__titulo">Editar Categoria: <?php echo 'COD: '.$categoria['codigo'].' - '.$categoria['nome'] ?></h1>
            </div>
            <!-- CABECALHO - FIM -->
            <form class="formulario__form">

              <?php
              echo '<input type="text" class="invisivel" id="codigo" value="'.$categoria['codigo'].'">';
              ?>

              <div class="formulario__fieldset">
                <legend class="formulario__legend">Nome</legend>
                <input type="text" name="nome" required class="formulario__input" id="nomeCategoria" value="<?php echo $categoria['nome']; ?>" >
              </div>

              <div class="formulario__fieldset">
                <legend class="formulario__legend">Status</legend>
                <select name="status-categoria" class="formulario__select" id="statusCategoria">
                  <?php
                    $selectAtivo='';
                    $selectDesativado='';
                    if($categoria['codigoStatus']=='A'){$selectAtivo='selected';}
                    else if($categoria['codigoStatus']=='D'){$selectDesativado='selected';}
                    echo'
                      <option value="A" class="formulario__option" '.$selectAtivo.'>Ativo</option>
                      <option value="D" class="formulario__option" '.$selectDesativado.'>Desativado</option>
                    ';
                  ?>
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