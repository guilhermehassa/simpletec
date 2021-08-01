<?php
session_start();

include('includes/connect.php');
include('includes/funcoes.php');
?>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Papelaria simple.">
    <meta name="keywords" content="Página demonstrativa para papelaria simple">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="simpleTEC">

    <link rel="shortcut icon" href="assets/img/icon.png">
    <link rel="icon" href="assets/img/icon.png" sizes="32x32">
    <link rel="icon" href="assets/img/icon.png" sizes="57x57">
    <link rel="icon" href="assets/img/icon.png" sizes="76x76">
    <link rel="icon" href="assets/img/icon.png" sizes="96x96">
    <link rel="icon" href="assets/img/icon.png" sizes="128x128">
    <link rel="shortcut icon" href="assets/img/icon.png" sizes="192x192">
    <link rel="apple-touch-icon" href="assets/img/icon.png" sizes="120x120">
    <link rel="apple-touch-icon" href="assets/img/icon.png" sizes="152x152">
    <link rel="apple-touch-icon" href="assets/img/icon.png" sizes="180x180">
    
    <title>Papelaria simple</title>

     <!-- RESETAR ESTILOS -->
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/normalize.css">

    <!-- COMUNS -->
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/produto.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/mostra.css">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K9TPGMGLHX"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-K9TPGMGLHX');
    </script>
 </head>
  <body>

    <section class="mostra">
      <img class="mostra__img" src="assets/img/logo.png"> 
    </section>

    <header class="header">
      <li class="header__toggle-subs"></li>
      <button class="header__toggle">+</button>
      <a href="index.php" class="header__logo"></a>
      <a href="https://api.whatsapp.com/send?phone=5513981447414&text=Contato%20via%20Cat%C3%A1logo" target="_blank" class="header__whats"></a>
    </header>

    <?php
    //SE NÃO TIVER CATEGORIA
    if(empty($_GET['cat'])){$categoria='dest';}
        
    //SE TIVER, CATEGORIA IGUAL A DO GET
    else{$categoria=$_GET['cat'];}
    
    //SE NÃO TIVER PESQUISA
    if(empty($_GET['pesq'])){$pesq='';}
  
    //SE TIVER PESQ, IGUAL A DO GET		
    else{$pesq=$_GET['pesq'];}
    ?>

    <div class="content">
      <nav class="nav">
        <ul class="nav__ul">
  
          <form class="nav__li nav__pesquisa" action="javascript:efetivarPesquisa()">
  
            <?php
            echo'
            <input type="text" placeholder="PESQUISAR" class="nav__pesquisa-input" id="busca-texto" value="'.$_GET['pesq'].'">
            ';

            echo'
            <select class="nav__pesquisa-select nav__pesquisa-categoria" id="busca-categoria" onchange="efetivarPesquisa()">
            ';
              if($_GET['categoria']=='0'||empty($_GET['categoria'])){$validaTodos="selected";}else{$validaTodos = '';}
              if($_GET['categoria']=='dest'){$validaOferta="selected";}else{$validaOferta = '';}
              
              echo'
              <option class="nav__select-option" value="0" '.$validaTodos.'>- CATEGORIA -</option>
              <option class="nav__select-option" value="dest" '.$validaOferta.'>Ofertas</option>
              ';
                $pesquisa='SELECT * FROM tb_categoria ORDER BY nm_categoria ASC';
                $res = mysqli_query($con, $pesquisa);
    
                while ($dados = mysqli_fetch_row($res)){
                  $categoriaAtual=nomearCategoria($dados);
                  
                  if($_GET['categoria']==$categoriaAtual['codigo']){$validaCat = 'selected';}
                  else{$validaCat = '';}
                  echo'
                  <option class="nav__select-option" value="'.$categoriaAtual['codigo'].'" '.$validaCat.'>'.$categoriaAtual['nome'].'</option>
                  ';
                }
            echo'
            </select>
            ';
            
            $statusUnset='';
            $statusTodos='';
            $statusAtivo='';
            $statusIndisponivel='';

            if($_GET['status'] == '-'){$statusUnset = 'selected';}
            else if($_GET['status'] == '0'){$statusTodos = 'selected';}
            else if($_GET['status'] == 'A'){$statusAtivo = 'selected';}
            else if($_GET['status'] == 'D'){$statusIndisponivel = 'selected';}
              
            echo'
            <select class="nav__pesquisa-select nav__pesquisa-status" id="busca-status" onchange="efetivarPesquisa()">
              <option class="nav__select-option" value="-" '.$statusUnset.'>- STATUS -</option>
              <option class="nav__select-option" value="0" '.$statusTodos.'>TODOS</option>
              <option class="nav__select-option" value="A" '.$statusAtivo.'>ATIVO</option>
              <option class="nav__select-option" value="D" '.$statusIndisponivel.'>INDISPONIVEL</option>
            </select>
            ';
            ?>
            <span class="nav__pesquisa-lupa" id="pesquisar"></span>
          </form>
          
  
          <li class="nav__li">
            <a href="index.php?cat=dest" class="nav__link">
              OFERTAS
            </a>
          </li>

          <?php
            //LISTAR CATEGORIAS
            $pesquisa='SELECT * FROM tb_categoria ORDER BY nm_categoria ASC';
            $res = mysqli_query($con, $pesquisa);

            while ($dados = mysqli_fetch_array($res)){
              $rodaCategoria=nomearCategoria($dados);
              echo'
                <li class="nav__li">
                  <a href="index.php?cat='.$rodaCategoria['codigo'].'" class="nav__link">
                    '.$rodaCategoria['nome'].'
                  </a>
                </li>
              ';
            }//FIM DE LISTAR CATEGORIAS
          ?>
  
        </ul>
      </nav>
  
      <?php
        //SE FOR DESTAQUES
        if($categoria=='dest'){
          $pesquisa='SELECT * FROM tb_produto WHERE ic_destaque="A"  ORDER BY rand()';
          $res = mysqli_query($con, $pesquisa);
          $localizacao='OFERTAS';
        }//FIM DE SE FOR DESTAQUES
      
        //SE FOR NOVIDADES
        else if($categoria=='news'){
          $pesquisa='SELECT * FROM tb_produto WHERE ic_status_produto="A" ORDER BY dt_cadastro_produto DESC LIMIT 20 ';
          $res = mysqli_query($con, $pesquisa);
          $localizacao='NOVIDADES';
        }//FIM DE SE FOR NOVIDADES
        
        //SE FOR PESQUISA
        else if($categoria=='pesq'){
          
          if($_GET['status']=='0'|| $_GET['status']=='-'){$pesqStatus = '';}
          else{$pesqStatus = 'ic_status_produto = "'.$_GET["status"].'" AND';}
         
          if($_GET['categoria']=='0'){$pesqCategoria = '';}
          else if($_GET['categoria']=='dest'){$pesqCategoria = 'ic_destaque="A" AND';}
          else{$pesqCategoria = 'tb_categoria_cd_categoria = '.$_GET['categoria'].' AND';}

          $pesquisa='SELECT * FROM tb_produto WHERE '.$pesqStatus.' '.$pesqCategoria.' ( nm_produto LIKE "%'.$pesq.'%" OR ds_tags_produto LIKE "%'.$pesq.'%" OR cd_produto LIKE "%'.$pesq.'%" ) ORDER BY ic_status_produto ASC, nm_produto ASC LIMIT 100';
          
          
          
          $res = mysqli_query($con, $pesquisa);
          $localizacao='Pesquisa por "'.$pesq.'"';
          
          if($_GET['categoria']!='0' && $_GET['categoria']!='-' && $_GET['categoria']!='dest'){
            $localizacaoPesquisa='SELECT * FROM tb_categoria WHERE cd_categoria="'.$_GET['categoria'].'" ';
            $localizacaoRes = mysqli_query($con, $localizacaoPesquisa);
            $localizacaoCategoria = mysqli_fetch_array($localizacaoRes);

            $localizacao=$localizacao.' na categoria: "'.$localizacaoCategoria[1].'"';
          }else if($_GET['categoria']=='dest'){
            $localizacao = $localizacao.' em "OFERTAS"';
          }

          if($_GET['status']=='A'){
            $localizacao=$localizacao.' com status "ATIVO"';
          }else if($_GET['status']=='D'){
            $localizacao=$localizacao.' com status "INDISPONIVEL"';
          }else if($_GET['status']=='0'){
            $localizacao=$localizacao.' disponíveis ou não';
          }
        }//FIM DE SE FOR PESQUISA
        
        //CATEGORIAS
        else if(is_numeric($categoria)){
          $pesquisa='SELECT * FROM tb_produto WHERE tb_categoria_cd_categoria='.$_GET['cat'].' ORDER BY ic_status_produto ASC, nm_produto ASC';
          $res = mysqli_query($con, $pesquisa);
          
          $pesq_categoria='SELECT * FROM tb_categoria WHERE cd_categoria='.$_GET['cat'];
          $res_cat=mysqli_query($con,$pesq_categoria);
          $a_categoria=mysqli_fetch_array($res_cat);
          
          $localizacao=$a_categoria[1];
          
        }//FIM DE SE CATEGORIAS
      ?>
      
      <main>
        <section class="titulo">
          <?php
            echo'<h1 class="titulo__texto">'.$localizacao.'</h1>';
          ?>
          
        </section>

        <section class="produtos">
          <ul class="produtos__ul">

          
            
            

            <?php

              // MODELO DE PRODUTO
              // <li class="produto invisivel">
                // <div class="produto__imagens">
                //   <div class="invisivel">
                //     <img class="invisivel" src='assets/img/whats.png'>
                //     <img class="invisivel" src='assets/img/logo.png'>
                //     <img class="invisivel" src='assets/img/produto_sem_foto.png'>
                //   </div>

                //   <input type="number" class="invisivel" id="contadorFoto" value="3">
                //   <img class="produto__img" src='assets/img/produto_sem_foto.png'>
                  
                //   <span class="arrow arrow-left" id="arrow-left"> < </span>

                //   <span class="arrow arrow-right" id="arrow-right"> > </span>
                // </div>


                // <div class="produto__content">
                //   <h2 class="produto__titulo">NOME DO PRODUTO</h2>

                //   <h6 class="produto__cod">COD - 999</h6>

                //   <p class="produto__descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi tenetur maxime magnam voluptas nisi officia voluptatem hic esse itaque quia natus quaerat tempora molestiae expedita, ea sequi repudiandae, suscipit enim.</p>

                //   <span class="produto__icones">
                //     <span class="produto__icone icon__whats"></span>
                //     <!-- <span class="produto__icone icon__carrinho"></span> -->
                //   </span>
                // </div>

              // </li>


              //EXIBIR PRODUTOS
              while ($dados = mysqli_fetch_array($res)){
                $produto=nomearProduto($dados);
                
                $seAtivo='';
                $spanIndisponivel = '';
                if($produto['statusCodigo']=='D'){
                  $seAtivo='produto-inativo';
                  $spanIndisponivel = '<span class="produto__txt-inativo">PRODUTO INDISPONIVEL NO MOMENTO</span>';
                }
                
                
                
                echo'
                  <li class="produto '.$seAtivo.'">';
                    
                    if($produto['fotosQuantidade'] <= 0){
                      
                      $contadorFoto=1;
                      echo'
                      <div class="produto__imagens">
                        <div class="invisivel">
                          <img class="invisivel" src="assets/img/produto_sem_foto.png" alt="'.$produto['nome'].' - sem foto">
                        </div>
        
                        <input type="number" class="invisivel" id="contadorFoto" value="1">

                        <img class="produto__img" src="assets/img/produto_sem_foto.png" alt="'.$produto['nome'].' - sem foto">
                        
                        
                      </div>  
                      
                      ';
                    }
                    else{
                      
                      echo'
                      <div class="produto__imagens">
                        <div class="invisivel">
        
                        ';

                          $pesquisaFoto='SELECT * FROM tb_foto_produto WHERE tb_produto_cd_produto='.$produto['codigo'];
                          $selectFoto=mysqli_query($con,$pesquisaFoto);
                          $contadorFoto=0;
                          while($foto=mysqli_fetch_row($selectFoto)){
                            $contadorFoto++;
                            echo'
                              <img class="invisivel" src="fotos/'.$foto[0].'/thumb_'.$foto[0].$foto[2].'" alt="'.$produto['nome'].' - '.$contadorFoto.'" >
                            ';

                            $ultimaFoto='fotos/'.$foto[0].'/thumb_'.$foto[0].$foto[2];
                          }
                      
                        echo'
                        </div>

                        <input type="number" class="invisivel" id="contadorFoto" value="'.$contadorFoto.'">

                        <img class="produto__img" src="'.$ultimaFoto.'" alt="'.$produto['nome'].' - sem foto">
                        ';

                        if($produto['fotosQuantidade'] > 1){
                          echo'
                            <span class="arrow arrow-left" id="arrow-left"> < </span>
          
                            <span class="arrow arrow-right" id="arrow-right"> > </span>
                          ';
                        }
                        

                        echo'
                      </div>  
                    
                      ';
                      
                    }
                      
                    echo'
                    <div class="produto__content">
                      <h2 class="produto__titulo">'.$produto['nome'].'</h2>

                      <div class="produto__subtitulo">
                        <h6 class="produto__valor">'.$produto['valor'].'</h6>
                        <h6 class="produto__cod"> COD-'.$produto['codigo'].'</h6>
                      </div>

                      <p class="produto__descricao">'.$produto['descricao'].'</p>
      
                      <span class="produto__icones">
                        <span class="produto__icone icon__whats"></span>
                        <!-- <span class="produto__icone icon__carrinho"></span> -->
                      </span>
                    </div>
                    '.$spanIndisponivel.'
                  </li>
                ';

                
              }//FIM DE EXIBIR
            ?>

            
          </ul>
        </section>
      </main>

    </div>

    <footer class="footer">
      <p class="footer__p">
        Um Produto
      </p>
      <a href="https://simple.tec.br" class="footer__link">
        <img src="https://simple.tec.br/assets/img/logo_transp.png" alt="Logo simpleTEC" class="footer__img">
      </a>

    </footer>

    <section class="scripts">
      <script src="assets/js/troca-foto-produto.js"></script>
      <script src="assets/js/mostra-foto.js"></script>
      <script src="assets/js/enviar-whatsapp.js"></script>
      <script src="assets/js/pesquisa.js"></script>
      <script src="assets/js/toggle-menu.js"></script>
      <script src="assets/js/muda-titulo.js"></script>
      
    </section>
    
	
  </body>
</html>