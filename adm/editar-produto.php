<?php
  session_start();
  include ('includes/connect.php');
  include ('includes/funcoes.php');
  include ('includes/security.php');
  include ('includes/connect_cliente.php');
  
  include('includes/head.php');
  $pagina_atual='produto';

  $cod=$_GET['cod'];
  $pesquisa='SELECT * FROM tb_produto WHERE cd_produto='.$cod;
  $select=mysqli_query($con_cliente,$pesquisa);
  $selectProduto=mysqli_fetch_row($select);
  $produto=nomearProduto($selectProduto);
  
?>

      <title>Produtos > Editar > adm > simpleTEC</title>

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
              <h1 class="formulario__titulo">Editar produto: <?php echo $produto['codigo'].' - '.$produto['nome'] ?></h1>
            </div>
            <!-- CABECALHO - FIM -->

            <form class="formulario__form" method="post" enctype="multipart/form-data" action="actions/fotos-nova.php">

              <?php
                echo '<input type="text" name="codigo" class="invisivel" id="codigo" value="'.$produto['codigo'].'">';
              ?>

              <label class="formulario__fieldset">
                <legend class="formulario__legend">Nome</legend>
                <input type="text" id="nome" class="formulario__input" <?php echo "value='{$produto['nome']}'"; ?> >
              </label>

              <label class="formulario__fieldset">
                <legend class="formulario__legend">Categoria</legend>
                <select id="categoria" class="formulario__select">
                  <?php
                  $pesquisa="SELECT * FROM tb_categoria WHERE ic_status_categoria='A'";
                  $select=mysqli_query($con_cliente,$pesquisa);
                  
                  while($objeto=mysqli_fetch_row($select)){
                    $categoria=nomearCategoria($objeto);
                    $selected='';
                    if($objeto['0']==$produto['codigoCategoria']){$selected='selected';}

                    echo "<option value='{$categoria['codigo']}' class='formulario__option' {$selected}>{$categoria['nome']}</option>";
                  }
                  if($selected==''){
                    echo "<option value='{$produto['codigoCategoria']}' class='formulario__option' style='color:var(--cinza-claro)' selected>{$produto['nomeCategoria']}</option>";
                  }
                  ?>
                </select>
              </label>
              
              <label class="formulario__fieldset">
                <legend class="formulario__legend">Destaque</legend>
                <?
                  $checked='';
                  if($produto['destaqueCodigo']=='A'){$checked='checked';}
                  echo"
                  <input type='checkbox' id='destaque' class='formulario__input formulario__checkbox' {$checked}>
                  ";
                ?>
                
              </label>
              
              <label class="formulario__fieldset">
                <legend class="formulario__legend">Status</legend>
                <?php
                  $selectAtivo='';
                  $selectDesativado='';
                  if($produto['statusCodigo']=='A'){$selectAtivo='selected';}
                  if($produto['statusCodigo']=='D'){$selectDesativado='selected';}
                  echo"
                  <select id='status' class='formulario__select'>
                    <option value='A' class='formulario__option' {$selectAtivo}>Ativo</option>
                    <option value='D' class='formulario__option'{$selectDesativado}>Desativado</option>
                  </select>
                  ";
                ?>
                
              </label>

              <label class="formulario__fieldset">
                <legend class="formulario__legend">Valor R$</legend>
                <input type="text" id="valor" <?php echo"value='{$produto['valor']}'"; ?> class="formulario__input" onkeyup="formatarMoeda()">
							</label>

              <label class="formulario__fieldset">
                <legend class="formulario__legend">Tags</legend>
                <input type="text" id="tags" class="formulario__input formulario__input-tag" placeholder="Outros termos para que seu cliente encontre este produto" <?php echo"value='{$produto['tags']}'"; ?> >
              </label>

              <div class="formulario__fieldset formulario__imagens">
                <legend class="formulario__legend">Foto(s)</legend>

                <?php
                  $pesquisa='SELECT * FROM tb_foto_produto WHERE tb_produto_cd_produto='.$produto['codigo'];
                  $select=mysqli_query($con_cliente,$pesquisa);
                  
                  if(mysqli_num_rows($select)<=0){
                    echo'
                      <label class="formulario__imagem icon icon__more--blue" id="novaFoto">
                        <input type="file" class="invisivel input-img" id="input-foto" name="foto" accept="image/*" onchange="(acionaMostra(),this.form.submit())" />
                        <span class="icon__legend" id="inserir-foto-legend">Adicionar foto a este produto</span>
                      </label>
                    ';
                  }
                  else{
                    while( $objeto = mysqli_fetch_row($select) ){
                      echo'
                        <label class="formulario__imagem formulario__imagem-ativo" style="background-image:url(../users/'.$empresa['codigo'].'/fotos/'.$objeto[0].'/'.$objeto[0].$objeto[2].');" id="">
                          <span id="cod-fotoProduto" class="invisivel">'.$objeto[0].'</span>
                          <span id="ext-fotoProduto" class="invisivel">'.$objeto[2].'</span>
                          <span class="formulario__imagem-action icon icon__trash--white">
                            <span class="icon__legend" id="deletar-foto-legend">Deletar Foto</span>
                          </span>
                         </label>
                      ';
                    }
                    if(mysqli_num_rows($select)<=2){
                      echo'
                        <label class="formulario__imagem icon icon__more--blue" id="novaFoto">
                          <input type="file" class="invisivel input-img" id="input-foto" name="foto" accept="image/*" onchange="this.form.submit()" />
                          <span class="icon__legend" id="inserir-foto-legend">Adicionar foto a este produto</span>
                        </label>
                      ';
                    }
                  }
                ?>
                
                
                
              </div>

              <label class="formulario__fieldset formulario__fieldset-descricao">
                <legend class="formulario__legend">Descricao</legend>
                <textarea id="descricao" class="formulario__input formulario__input-txt"><?php echo $produto['descricao']; ?></textarea>
              </label>
              

              <div class="formulario__botoes">
                <span class="formulario__botao" id="cancelar">
                  <span class="formulario__botao-icone formulario__botao-cancelar icon icon__cancel--white"></span>
                  <p class="formulario__botao-texto">Cancelar</p>
                </span>
                

                <span class="formulario__botao" id="excluir">
                  <span class="formulario__botao-icone formulario__botao-cancelar icon icon__trash--white"></span>
                  <p class="formulario__botao-texto">Excluir Produto</p>
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