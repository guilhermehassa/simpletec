<?php
  session_start();
  include ('includes/connect.php');
  include ('includes/funcoes.php');
  include ('includes/security.php');
  include ('includes/connect_cliente.php');
  
  include('includes/head.php');
  $pagina_atual='categorias';
?>

      <title>Categorias > adm > simpleTEC</title>

      <!-- ESTILOS DOS FILTROS'S -->
      <link rel="stylesheet" href="../assets/css/adm/filtros/filter-cabecalho.css">
      <link rel="stylesheet" href="../assets/css/adm/filtros/filter-corpo.css">
      <link rel="stylesheet" href="../assets/css/adm/filtros/filter-categorias.css">
      
      <!--LISTAS -->
      <link rel="stylesheet" href="../assets/css/adm/listas/listas-cabecalho.css">
      <link rel="stylesheet" href="../assets/css/adm/listas/listas-conteudo.css">
      <link rel="stylesheet" href="../assets/css/adm/listas/listas-categorias.css">
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
              $pesquisa='SELECT * FROM tb_categoria ORDER BY nm_categoria ASC';
              $select=mysqli_query($con_cliente,$pesquisa);
            }
            else if($_GET['pesquisa']=='sim'){
              $numero = $_GET['numero'];
              $nome = $_GET['nome'];
              $status = $_GET['status'];

              //SE STATUS FOR TODOS, ZERAR PRA PESQUISA
              if($status=='T'){$status='';}

              $pesquisa='SELECT * FROM tb_categoria WHERE cd_categoria LIKE "%'.$numero.'%" AND nm_categoria LIKE "%'.$nome.'%" AND ic_status_categoria LIKE "%'.$status.'%" ORDER BY ic_status_categoria ASC, nm_categoria ASC';
              $select=mysqli_query($con_cliente,$pesquisa);
            }
            include('includes/filter.php');
          ?>

          <section class="contem-lista">
            <div class="contem-lista__cabecalho">
              <div class="contem-lista__titulo">
                <span class="contem-lista__titulo-cube cube"></span>
                <h2 class="contem-lista__titulo-texto">Categorias</h2>
              </div>

              <a href="nova-categoria.php">
              <span class="contem-lista__add icon icon__more--blue">
                <p class="icon__legend icon__legend--add">Nova categoria</p>
              </span>
              </a>
            </div>

            <div class="contem-lista__print">
              <!-- <span class="contem-lista__print-icon icon icon__print--white"></span> -->
              <h3 class="contem-lista__print-texto"><?php echo mysqli_num_rows($select).' categoria(s) encontrada(s).'; ?></h3>
            </div>

            <table class="contem-lista__lista lista lista-categorias">
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
                    <h4 class="lista__cabecalho-texto">Produtos</h4>
                  </th>
                  <th class="lista__cabecalho-th">
                    <h4 class="lista__cabecalho-texto">Status</h4>
                  </th>

                  
                </tr>
              </thead><!--FIM DE LISTA CABECALHO -->

              <tbody class="lista__corpo">

                <?php
                  while($objeto = mysqli_fetch_row($select) ){
                    $categoria = nomearCategoria($objeto);
                    echo'
                    <tr class="lista__corpo-tr">
                      <td class="lista__corpo-td lista__corpo-td-menu icon icon__options--black">
                        <ul class="opcoes-lista">';

                          mostraOpcao('Status',$categoria['codigo'],$categoria['codigoStatus']);
                        
                          echo'
                          <li class="opcoes-lista__li">
                            <span class="icon icon__edit--black opcoes-lista__li-icon"></span>
                            <a href="editar-categoria.php?cod='.$categoria['codigo'].'" class="opcoes-lista__li-p">Editar categoria</a>
                          </li>
    
                        </ul><!--FIM DE SUBMENU -->
                      </td>
                      
                      <td class="lista__corpo-td">
                        <p class="lista__corpo-texto">'.$categoria['codigo'].'</p>
                      </td>
                      <td class="lista__corpo-td">
                        <p class="lista__corpo-texto">'.$categoria['nome'].'</p>
                      </td>
                      <td class="lista__corpo-td">
                        <p class="lista__corpo-texto">'.$categoria['produtos'].'</p>
                      </td>
                      <td class="lista__corpo-td">
                        <p class="lista__corpo-texto">'.$categoria['status'].'</p>
                      </td>
                    
                    </tr>
                    ';
                  }
                ?>
                
                
                
                
                
              </tbody><!--FIM DE LISTA CORPO -->
            </table><!--FIM DE LISTA -->
          </section><!-- FIM DE CONTEM LISTA -->
        </main>
      </div><!-- Fim do contem página-->

      <?php
        include('includes/footer.php');
      ?>

      <section class="scripts">
        <?php include('includes/scripts-comum.php') ?>
        <script src="../assets/js/adm/toggle-filter.js"></script>
        <script src="../assets/js/adm/toggle-opcoes-lista.js"></script>
        <script src="../assets/js/adm/filter-categorias.js"></script>
        
      </section>
    </body>
</html>