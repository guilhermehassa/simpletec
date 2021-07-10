<?php
  session_start();
  include ('includes/connect.php');
  include ('includes/funcoes.php');
  include ('includes/security.php');
  include ('includes/connect_cliente.php');

  include('includes/head.php');
  $pagina_atual='inicio';
?>

    <title>Início > adm > simpleTEC</title>

    <!-- ESTILOS DOS BOX'S -->
    <link rel="stylesheet" href="../assets/css/adm/box/box.css">
    <link rel="stylesheet" href="../assets/css/adm/box/ultimos-pedidos.css">
    <link rel="stylesheet" href="../assets/css/adm/box/produtos-mais-pedidos.css">
    <link rel="stylesheet" href="../assets/css/adm/box/categoria-mais-vendida.css">
    <link rel="stylesheet" href="../assets/css/adm/box/melhores-clientes.css">

    

  </head>
  <body>
    <?
      include('includes/mostra.php');
      include('includes/header.php')
    ?>
      
    <div class="contem__pagina">
      <?php
        include('includes/menu.php');
      ?>

      <main>

        <?php
          // <!-- <section class="box ultimos-pedidos">
          //   <div class="box__cabecalho">
          //     <span class="cube"></span>
          //     <h2 class="box__titulo">Últimos pedidos</h2>
          //   </div>
            
            
          //   <table class="box-tabela">
          //     <thead class="box-tabela__descricao">
          //       <tr class="box-tabela__descricao--tr">
          //         <th class="box-tabela__descricao--th coluna__numero">Nº</th>
          //         <th class="box-tabela__descricao--th coluna__status">Status</th>
          //         <th class="box-tabela__descricao--th coluna__cliente">Cliente</th>
          //         <th class="box-tabela__descricao--th coluna__data">Data</th>
          //         <th class="box-tabela__descricao--th coluna__valor">Valor</th>
          //       </tr>
          //     </thead>
              
          //     <tbody class="box-tabela__corpo">
                
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__numero">1</td>
          //         <td class="box-tabela__celula coluna__status icon icon__open--black">
          //           <span class="icon__legend">Em Aberto</span>
          //         </td>
          //         <td class="box-tabela__celula coluna__cliente">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__data">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__valor">R$ 999,99</td>
          //       </tr>
          //     </tbody>
            
          //   </table>
            
          // </section> FIM DO BOX - ULTIMOS PEDIDOS -->


          // <!-- <section class="box produtos-mais-pedidos">
          //   <div class="box__cabecalho">
          //     <span class="cube"></span>
          //     <h2 class="box__titulo">Produtos mais pedidos do mês</h2>
          //   </div>
            
          //   <table class="box-tabela">
          //     <thead class="box-tabela__descricao">
          //       <tr class="box-tabela__descricao--tr">
          //         <th class="box-tabela__descricao--th coluna__produto">Produto</th>
          //         <th class="box-tabela__descricao--th coluna__qtd-vendidos">Vendidos</th>
          //         <th class="box-tabela__descricao--th coluna__status">Status</th>
          //       </tr>
          //     </thead>
              
          //     <tbody class="box-tabela__corpo">
                
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__produto">Produto Lorem ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-vendidos">200Un</td>
          //         <td class="box-tabela__celula coluna__status icon icon__ok--blue"><span class="icon__legend">Ativo</span></td>
          //       </tr>
                
          //     </tbody>
            
          //   </table>
            
          // </section> FIM DO BOX - ULTIMOS PEDIDOS -->

          // <!-- <section class="box categoria-mais-vendida">
          //   <div class="box__cabecalho">
          //     <span class="cube"></span>
          //     <h2 class="box__titulo">Categorias de produtos mais vendidos no mês</h2>
          //   </div>
            
          //   <table class="box-tabela">
          //     <thead class="box-tabela__descricao">
          //       <tr class="box-tabela__descricao--tr">
          //         <th class="box-tabela__descricao--th coluna__cd-categoria">COD</th>
          //         <th class="box-tabela__descricao--th coluna__nome-categoria">Categoria</th>
          //         <th class="box-tabela__descricao--th coluna__qtd-itens-vendidos">QTD</th>
          //       </tr>
          //     </thead>
              
          //     <tbody class="box-tabela__corpo">
                
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__cd-categoria">900</td>
          //         <td class="box-tabela__celula coluna__nome-categoria">Categoria Lorem Ipsum</td>
          //         <td class="box-tabela__celula coluna__qtd-itens-vendidos">5000</td>
          //       </tr>
                
          //     </tbody>
            
          //   </table>
            
          // </section> FIM DO BOX - ULTIMOS PEDIDOS -->

          // <!-- <section class="box melhores-clientes">
          //   <div class="box__cabecalho">
          //     <span class="cube"></span>
          //     <h2 class="box__titulo">Melhores Clientes</h2>
          //   </div>
            
          //   <table class="box-tabela">
          //     <thead class="box-tabela__descricao">
          //       <tr class="box-tabela__descricao--tr">
          //         <th class="box-tabela__descricao--th coluna__nome">Nome</th>
          //         <th class="box-tabela__descricao--th coluna__ultimo-pedido">Ultimo Pedido</th>
          //         <th class="box-tabela__descricao--th coluna__total-pedidos">Total Pedidos</th>
          //       </tr>
          //     </thead>
              
          //     <tbody class="box-tabela__corpo">
                
          //       <tr class="box-tabela__linha">
          //         <td class="box-tabela__celula coluna__nome">Fulano de tal</td>
          //         <td class="box-tabela__celula coluna__ultimo-pedido">01/01/2021</td>
          //         <td class="box-tabela__celula coluna__total-pedidos">999</td>
          //       </tr>
                
          //     </tbody>
            
          //   </table>
            
          // </section> FIM DO BOX - MELHORES CLIENTES -->

        ?>
      </main>
    </div><!-- Fim do contem página-->

    <?php
      include('includes/footer.php');
    ?>

    <section class="scripts">
      <?php include('includes/scripts-comum.php') ?>
    </section>
  </body>
</html>