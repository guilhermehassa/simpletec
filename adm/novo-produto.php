<?php
  session_start();
  include ('includes/connect.php');
  include ('includes/funcoes.php');
  include ('includes/security.php');
  include ('includes/connect_cliente.php');
  
  include('includes/head.php');
  $pagina_atual='produtos';
?>
      <title>Produtos > Novo(a) > adm > simpleTEC</title>

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
              <h1 class="formulario__titulo">Novo Produto</h1>
            </div>
            <!-- CABECALHO - FIM -->
            <form class="formulario__form">
              <?php

                if($empresa['codigoAutomaticoProduto']=='A'){
                  echo'
                  <input type="text" name="codigo" class="invisivel" id="codigo" value="0">
                  ';
                }
                else{
                  echo'
                  <label class="formulario__fieldset">
                    <legend class="formulario__legend">Codigo</legend>
                    <input type="number" name="codigo" id="codigo" class="formulario__input">
                  </label>
                  ';
                }

              ?>
              
              

              <label class="formulario__fieldset">
                <legend class="formulario__legend">Nome</legend>
                <input type="text" id="nome" class="formulario__input">
							</label>

              <label class="formulario__fieldset">
                <legend class="formulario__legend">Categoria</legend>
                <select id="categoria" class="formulario__select">
                  <?php
                  $pesquisa="SELECT * FROM tb_categoria WHERE ic_status_categoria='A'";
                  $select=mysqli_query($con_cliente,$pesquisa);
                  
                  while($objeto=mysqli_fetch_row($select)){
                    $categoria=nomearCategoria($objeto);

                    echo "<option value='{$categoria['codigo']}' class='formulario__option'>{$categoria['nome']}</option>";
                  }
                  ?>
                </select>
              </label>
							
							<label class="formulario__fieldset">
                <legend class="formulario__legend">Destaque</legend>
                <input type="checkbox" id="destaque" class="formulario__input formulario__checkbox">
							</label>
              
							<label class="formulario__fieldset">
                <legend class="formulario__legend">Status</legend>
                <select id="status" class="formulario__select">
                  <option value="A" class="formulario__option">Ativo</option>
                  <option value="D" class="formulario__option">Desativado</option>
                </select>
              </label>

              <label class="formulario__fieldset">
                <legend class="formulario__legend">Valor R$</legend>
                <input type="text" id="valor" class="formulario__input" onkeyup="formatarMoeda()">
							</label>

							<label class="formulario__fieldset">
                <legend class="formulario__legend">Tags</legend>
                <input type="text" id="tags" class="formulario__input formulario__input-tag" placeholder="Outros termos para que seu cliente encontre este produto">
							</label>

              <label class="formulario__fieldset">
                <legend class="formulario__legend">Salve o produto para inserir imagens</legend>
              </label>

							<label class="formulario__fieldset formulario__fieldset-descricao">
                <legend class="formulario__legend">Descricao</legend>
                <textarea id="descricao" class="formulario__input formulario__input-txt"></textarea>
							</label>
							

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


      <section class="scripts"> 
        <?php include('includes/scripts-comum.php') ?>
        <script src="../assets/js/adm/form-action.js"></script>
        
      </section>
    </body>
</html>