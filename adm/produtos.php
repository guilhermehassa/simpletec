<?php
  session_start();
  include ('includes/connect.php');
  include ('includes/funcoes.php');
  include ('includes/security.php');
  include ('includes/connect_cliente.php');
  
  include('includes/head.php');
  $pagina_atual='produtos';
?>

      <title>Produtos > adm > simpleTEC</title>
      <!-- ESTILOS DOS FILTROS'S -->
      <link rel="stylesheet" href="../assets/css/adm/filtros/filter-cabecalho.css">
      <link rel="stylesheet" href="../assets/css/adm/filtros/filter-corpo.css">
      <link rel="stylesheet" href="../assets/css/adm/filtros/filter-produtos.css">
      
      <!--LISTAS -->
      <link rel="stylesheet" href="../assets/css/adm/listas/listas-cabecalho.css">
      <link rel="stylesheet" href="../assets/css/adm/listas/listas-conteudo.css">
      <link rel="stylesheet" href="../assets/css/adm/listas/listas-produtos.css">
      <link rel="stylesheet" href="../assets/css/adm/listas/opcoes-lista.css">
      
      

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
        <?php
            // $pesquisa='SELECT * FROM tb_categoria ORDER BY nm_categoria ASC';
            // $select=mysqli_query($con_cliente,$pesquisa);
            if( empty($_GET['pesquisa']) ){
              $pesquisa='SELECT * FROM tb_produto ORDER BY dt_cadastro DESC LIMIT 300';
              $select=mysqli_query($con_cliente,$pesquisa);
            }
            else if($_GET['pesquisa']=='sim'){
              $numero = $_GET['numero'];
              $nome = $_GET['nome'];
              $status = $_GET['status'];
              $categoria = $_GET['categoria'];
              $oferta = $_GET['oferta'];
              $destaque = $_GET['destaque'];
              $foto = $_GET['foto'];

              //SE STATUS FOR TODOS, ZERAR PRA PESQUISA
              if($status=='T'){$status='';}

              //SE STATUS FOR TODOS, ZERAR PRA PESQUISA
              if($categoria=='0'){
                $pesqCategoria='';
              }
              else{
                $pesqCategoria= 'AND tb_categoria_cd_categoria = "'.$categoria.'"';
              }
              
              //SE STATUS FOR TODOS, ZERAR PRA PESQUISA
              if($destaque=='T'){$destaque='';}

              $pesquisa='SELECT * FROM tb_produto WHERE cd_produto LIKE "%'.$numero.'%" AND nm_produto LIKE "%'.$nome.'%" AND ic_status_produto LIKE "%'.$status.'%" AND ic_destaque LIKE "%'.$destaque.'%" '.$pesqCategoria.' ORDER BY ic_status_produto ASC, nm_produto ASC';
              
              $select=mysqli_query($con_cliente,$pesquisa);
              
              
            }
            include('includes/filter.php');
          ?>

          <section class="contem-lista">
            <div class="contem-lista__cabecalho">
              <div class="contem-lista__titulo">
                <span class="contem-lista__titulo-cube cube"></span>
                <h2 class="contem-lista__titulo-texto">Produtos</h2>
              </div>

              <a href="novo-produto.php">
              <span class="contem-lista__add icon icon__more--blue">
                <p class="icon__legend icon__legend--add">Novo produto</p>
              </span>
              </a>
            </div>

            <div class="contem-lista__print">
              <!-- <span class="contem-lista__print-icon icon icon__print--white"></span> -->
              <h3 class="contem-lista__print-texto"><?php echo mysqli_num_rows($select).' produto(s) encontrado(s).'; ?></h3>
            </div>

            <table class="contem-lista__lista lista lista-produtos">
              <thead class="lista__cabecalho">
                <tr class="lista__cabecalho-tr">
                  <th class="lista__cabecalho-th">

                  </th>

                  <th class="lista__cabecalho-th">
                    <h4 class="lista__cabecalho-texto">COD</h4>
                  </th>
                  <th class="lista__cabecalho-th">
                    <h4 class="lista__cabecalho-texto">Nome</h4>
                  </th>
                  <th class="lista__cabecalho-th">
                    <h4 class="lista__cabecalho-texto">Categoria</h4>
                  </th>
                  <th class="lista__cabecalho-th">
                    <h4 class="lista__cabecalho-texto">Valor</h4>
                  </th>
                  <th class="lista__cabecalho-th">
                    <h4 class="lista__cabecalho-texto">Foto</h4>
                  </th>
                  <th class="lista__cabecalho-th">
                    <h4 class="lista__cabecalho-texto">Promoção</h4>
                  </th>
                  <th class="lista__cabecalho-th">
                    <h4 class="lista__cabecalho-texto">Destaque</h4>
                  </th>
                  <th class="lista__cabecalho-th">
                    <h4 class="lista__cabecalho-texto">Status</h4>
                  </th>

                  
                </tr>
              </thead><!--FIM DE LISTA CABECALHO -->

              <tbody class="lista__corpo">
                <?php
                  while( $objeto = mysqli_fetch_row($select) ){
                    $produto=nomearProduto($objeto);
                    $exibir=true;
                    if($foto=='sim'){
                      if($produto['fotosQuantidade']<=0){$exibir=false;}
                    }
                    else if($foto=='nao'){
                      if($produto['fotosQuantidade']>=1){$exibir=false;}
                    }

                    if($exibir==true){
                      echo"
                        <tr class='lista__corpo-tr'>
                          <td class='lista__corpo-td lista__corpo-td-menu icon icon__options--black'>
                            <ul class='opcoes-lista'>";
                              
                              mostraOpcao('Status',$produto['codigo'],$produto['statusCodigo']);
                              mostraOpcao('Destaque',$produto['codigo'],$produto['destaqueCodigo']);

                              echo"
                              <li class='opcoes-lista__li'>
                                <span class='icon icon__edit--black opcoes-lista__li-icon'></span>
                                <a href='editar-produto.php?cod={$produto['codigo']}' class='opcoes-lista__li-p'>Editar produto</a>
                              </li>

                            </ul><!--FIM DE SUBMENU -->
                          </td>
                          
                          <td class='lista__corpo-td'>
                            <p class='lista__corpo-texto'>{$produto['codigo']}</p>
                          </td>
                          <td class='lista__corpo-td'>
                            <p class='lista__corpo-texto'>{$produto['nome']}</p>
                          </td>
                          <td class='lista__corpo-td'>
                            <p class='lista__corpo-texto'>{$produto['nomeCategoria']}</p>
                          </td>
                          <td class='lista__corpo-td'>
                            <p class='lista__corpo-texto'>{$produto['valor']}</p>
                          </td>";

                          //FOTO
                          if($produto['fotosQuantidade']<=0){
                            echo"
                            <td class='lista__corpo-td lista__corpo-td lista__corpo-icon icon icon__cancel--black'>
                              <span class='icon__legend'>Produto sem foto</span>
                            </td>";
                          }else{
                            echo"
                            <td class='lista__corpo-td'>
                              <img src='../users/{$empresa['codigo']}/fotos/{$produto['fotoProdutoCodigo']}/{$produto['fotoProdutoCodigo']}{$produto['fotoProdutoExtensao']}' alt='Nome do Produto' class='lista__corpo-img'>
                            </td>
                            ";
                          }
                          //FOTOS                    
                          
                          echo"
                          <td class='lista__corpo-td'>
                            -
                          </td>
                          <td class='lista__corpo-td lista__corpo-icon icon icon__{$produto['destaqueIcone']}--black'>
                            <span class='icon__legend'>{$produto['destaqueNome']}</span>
                          </td>
                          <td class='lista__corpo-td lista__corpo-icon icon icon__{$produto['statusIcone']}--black'>
                            <span class='icon__legend'>{$produto['statusNome']}</span>
                          </td>
                        
                        </tr>
                      ";
                    }
                    
                  }
                
                ?>
                
                
                
                
                
              </tbody><!--FIM DE LISTA CORPO -->
            </table><!--FIM DE LISTA -->
          </section><!-- FIM DE CONTEM LISTA -->
        </main>
      </div><!-- Fim do contem página-->

      <?php
        include('includes/footer.php')
      ?>

      <section class="scripts">
        <?php include('includes/scripts-comum.php') ?>
        <script src="../assets/js/adm/toggle-filter.js"></script>
        <script src="../assets/js/adm/toggle-opcoes-lista.js"></script>
        <script src="../assets/js/adm/filter-produtos.js"></script>
      </section>
    </body>
</html>