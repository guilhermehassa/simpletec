<?php
  if($pagina_atual=='produtos'){
    if(empty($_GET['pesquisa'])){
      $numero='';
      $nome='';

      $statusT='';
      $statusA='';
      $statusD='';

      $categoriaSelecionada='';

      $destaqueT='';
      $destaqueA='';
      $destaqueD='';
      
      $fotoA='';
      $fotoD='';
      $fotoT='';
    }
    else if($_GET['pesquisa']=='sim'){
      $numero=$_GET['numero'];
      $nome=$_GET['nome'];

      $status=$_GET['status'];
      if($status=='T'){$statusT='selected';}
      else if($status=='A'){$statusA='selected';}
      else if($status=='D'){$statusD='selected';}

      $categoriaSelecionada=$_GET['categoria'];

      $destaque=$_GET['destaque'];
      if($destaque=='T'){$destaqueT='selected';}
      else if($destaque=='A'){$destaqueA='selected';}
      else if($destaque=='D'){$destaqueD='selected';}

      $foto=$_GET['foto'];
      if($foto=='T'){$fotoT='selected';}
      else if($foto=='sim'){$fotoA='selected';}
      else if($foto=='nao'){$fotoD='selected';}
    }
    
    echo'
    <section class="filter">
      <div class="filter__cabecalho">
        <div class="filter__description">
          <span class="filter__icon cube"></span>
          <h2 class="filter__titulo">Filtrar</h2>
        </div>
        
        <span class="filter__toggle icon icon__up--black">
    
        </span>
      </div>
    
      <div class="filter__corpo">
        <form class="filter__form filter__form--produtos" action="javascript:filtrarProdutos()">
          <label class="filter__form-label filter-form__n">
            <legend class="filter__form-legend">COD</legend>
            <div>
              <input type="number" id="filter-numero" name="numero" class="filter__form--input filter__form--input-number" value="'.$numero.'" >
            </div>
          </label>
    
          <label class="filter__form-label filter-form__cliente">
            <legend class="filter__form-legend">Produto</legend>
            <div>
              <input type="text" name="produto"  id="filter-nome" class="filter__form--input filter__form--input-text" value="'.$nome.'" >
            </div>
          </label>
    
          <label class="filter__form-label filter-form__status">
            <legend class="filter__form-legend">Status</legend>
            <div>
              <select name="status" id="filter-status" class="filter__form--input filter__form--input-select" >
                <option value="T" class="filter__form-option" '.$statusT.'>- Todos -</option>
                <option value="A" class="filter__form-option" '.$statusA.'>Ativo</option>
                <option value="D" class="filter__form-option" '.$statusD.'>Desativado</option>
              </select>
            </div>
          </label>
    
          <label class="filter__form-label filter-form__categoria">
            <legend class="filter__form-legend">Categoria</legend>
            <div>
              <select name="categoria" id="filter-categoria" class="filter__form--input filter__form--input-select" >
                <option value="0" class="filter__form-option">- Todas -</option>';

                $pesquisaCategorias='SELECT * FROM tb_categoria ORDER BY nm_categoria';
                $selectCategorias=mysqli_query($con_cliente,$pesquisaCategorias);

                while( $objeto=mysqli_fetch_row($selectCategorias) ){
                  $categoria=nomearCategoria($objeto);
                  $selected='';
                  if($categoria['codigo']==$categoriaSelecionada){
                    $selected='selected';
                  }
                  echo'
                    <option value="'.$categoria['codigo'].'" class="filter__form-option" '.$selected.'>'.$categoria['nome'].'</option>
                  ';
                }
              
              echo'
              </select>
            </div>
          </label>
    
          <label class="filter__form-label filter-form__destaque">
            <legend class="filter__form-legend">Destaque</legend>
            <div>
              <select name="foto" id="filter-destaque" class="filter__form--input filter__form--input-select" >
                <option value="T" class="filter__form-option" '.$destaqueT.'>- Todos -</option>
                <option value="A" class="filter__form-option" '.$destaqueA.'>Sim</option>
                <option value="D" class="filter__form-option" '.$destaqueD.'>Não</option>
              </select>
            </div>
          </label>
    
    
          <label class="filter__form-label filter-form__foto">
            <legend class="filter__form-legend">Foto</legend>
            <div>
              <select name="foto" id="filter-foto" class="filter__form--input filter__form--input-select" >
                <option value="T" class="filter__form-option" '.$fotoT.'>Indiferente</option>
                <option value="sim" class="filter__form-option" '.$fotoA.'>Com foto</option>
                <option value="nao" class="filter__form-option" '.$fotoD.'>Sem Foto</option>
              </select>
            </div>
          </label>
    
          <div class="filter__form-send">
            <span class="filter__form--send-icon icon icon__filter--black"></span>
            <span class="filter__form--send-text">Filtrar</span>
          </div>
        </form>
      </div>
    </section><!--FIM DO FILTER -->
    ';
  }
  else if($pagina_atual=='categorias'){
    if(empty($_GET['pesquisa'])){
      $numero='';
      $nome='';
      $statusT='';
      $statusA='';
      $statusD='';
    }
    else if($_GET['pesquisa']=='sim'){
      $numero=$_GET['numero'];
      $nome=$_GET['nome'];

      $status=$_GET['status'];
      if($status=='T'){$statusT='selected';}
      else if($status=='A'){$statusA='selected';}
      else if($status=='D'){$statusD='selected';}
      
    }

    echo'
      <section class="filter">
        <div class="filter__cabecalho">
          <div class="filter__description">
            <span class="filter__icon cube"></span>
            <h2 class="filter__titulo">Filtrar</h2>
          </div>
          
          <span class="filter__toggle icon icon__up--black">

          </span>
        </div>

        <div class="filter__corpo">
          <form class="filter__form filter__form--categorias" action="javascript:filtrarCategoria()">
            <label class="filter__form-label filter-form__n" id="filtroCodigo">
              <legend class="filter__form-legend">COD</legend>
              <div>
                <input type="number" name="codigo-categoria"  id="filter-numero" class="filter__form--input filter__form--input-number" value="'.$numero.'" >
              </div>
            </label>

            <label class="filter__form-label filter-form__cliente" id="filtroNome">
              <legend class="filter__form-legend">Nome</legend>
              <div class="contem__texto__nome">
                <input type="text" name="nome"  id="filter-nome" class="filter__form--input filter__form--input-text" value="'.$nome.'">
              </div>
            </label>

            <label class="filter__form-label filter-form__status" id="filtroStatus">
              <legend class="filter__form-legend">Status</legend>
              <div>
                <select name="status" id="filter-status" class="filter__form--input filter__form--input-select" >
                  <option value="T" class="filter__form-option" '.$statusT.'>- Todos -</option>
                  <option value="A" class="filter__form-option" '.$statusA.'>Ativo</option>
                  <option value="D" class="filter__form-option" '.$statusD.'>Desativado</option>
                </select>
              </div>
            </label>

            

            <div class="filter__form-send">
              <span class="filter__form--send-icon icon icon__filter--black"></span>
              <span class="filter__form--send-text">Filtrar</span>
            </div>
          </form>
        </div>
      </section><!--FIM DO FILTER -->
    ';
  }
?>