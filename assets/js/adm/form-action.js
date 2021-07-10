var botoesFormulario = document.querySelector('.formulario__botoes');
var mostra = document.querySelector('.mostra');
var codigo=document.querySelector('#codigo').value;

function acaoAjax(acao,tipo,dados){
  if(acao=='inserir'){var textoAcao='inserido(a)';}
  else if(acao=='editar'){var textoAcao='editado(a)';}
  else if(acao=='excluir'){var textoAcao='excluido(a)';}
  else if(acao=='usuario'){var textoAcao='alterado(a)';}
  
  var stringAction='';
  
  for (var [key, value] of Object.entries(dados)) { 
    if(key!=1){stringAction=stringAction+'&'}
    stringAction=stringAction+key+'='+value;
  }

  var ajax = new XMLHttpRequest();
  // Seta tipo de requisição e URL com os parâmetros
  ajax.open("GET", "actions/"+tipo+"-"+acao+".php?"+stringAction, true);

  // Envia a requisição
  ajax.send();

  // Cria um evento para receber o retorno.
  ajax.onreadystatechange = function() {
    // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
    if (ajax.readyState == 4 && ajax.status == 200) {
      var retorno = ajax.responseText;
      if(retorno == 'ok'){
        alert(tipo+' '+textoAcao+' com sucesso!');

        if(tipo=='imagem'){location.reload();}
        else if(tipo=='usuario'){window.location="actions/logout.php";}
        else if(tipo=='produtos' && acao=='inserir'){window.location="produto-inserido.php";}
        else{window.location=tipo+".php";}
        

      }
      else{
        console.log(retorno);
      }
    }
    
  }
}

function identificarCodigoFoto(item){
  while(item.className !='formulario__imagem formulario__imagem-ativo'){
    item = item.parentNode;
  }

  var codigo=item.children[0].textContent;
  
}

function enviarFoto(){
  dados = new Object();
  dados.codigo=codigo;
  dados.imagem=document.querySelector('#input-foto').value;
  // console.log(dados.imagem);
  acaoAjax('nova','fotos',dados);
}

botoesFormulario.addEventListener('click',function(event){
  var itemClicado = event.target;

  while(itemClicado.className !='formulario__botao'){
    itemClicado = itemClicado.parentNode;
  }
  var itemClicadoId = itemClicado.id;

  if(itemClicadoId == 'cancelar'){
    window.location=tituloOficial+'.php';
  }
  else if(itemClicadoId == 'salvar'){
    // acionaMostra();
    // fechaMostra.classList.add('invisivel');
    
    if(tituloOficial=='categorias'){
      //PEGAR VARIAVEIS
      dados = new Object();
      dados.nome=document.querySelector('#nomeCategoria').value,
      dados.status = document.querySelector('#statusCategoria').value ;
      
      
      if(titulo[1]=='Novo(a)'){
        acaoAjax('inserir',tituloOficial,dados);
      }
      else if(titulo[1] == 'Editar'){
        dados.codigo = document.querySelector('#codigo').value ;
        acaoAjax('editar',tituloOficial,dados);
      }
    }

    else if(tituloOficial=='produtos'){
      //PEGAR VARIAVEIS
      dados = new Object();
      dados.codigo = document.querySelector('#codigo').value;
      dados.nome=document.querySelector('#nome').value,
      dados.categoria = document.querySelector('#categoria').value,
      dados.destaque = document.querySelector('#destaque').checked,
      dados.status = document.querySelector('#status').value,
      dados.valor = document.querySelector('#valor').value,
      dados.tags = document.querySelector('#tags').value,
      dados.descricao = document.querySelector('#descricao').value;
      
      if(titulo[1]=='Novo(a)'){
        acaoAjax('inserir',tituloOficial,dados);
      }
      else if(titulo[1] == 'Editar'){
        
        acaoAjax('editar',tituloOficial,dados);
      }
    }

    else if(tituloOficial=='usuario'){
      //PEGAR VARIAVEIS
      dados = new Object();
      dados.usuario=document.querySelector('#codigo').value,
      dados.senhaAtual=document.querySelector('#senhaAtual').value,
      dados.novaSenha1 = document.querySelector('#senha1').value;
      dados.novaSenha2 = document.querySelector('#senha2').value;

      acaoAjax('alterar-senha',tituloOficial,dados);
    }
  }
  else if(itemClicadoId == 'excluir'){
    acionaMostra();
    fechaMostra.classList.add('invisivel');

    
    dados = new Object();
    dados.codigo = document.querySelector('#codigo').value;
    dados.nome=document.querySelector('#nome').value,

    texto = 'excluir o produto "'+dados.nome+'"?';

    reformularValoresForm('excluir',dados.codigo);
    mostrarForm(dados.codigo,texto);
  }
});


if(tituloOficial=='produtos'){
  var imagens=document.querySelector('.formulario__imagens');
  
  imagens.addEventListener('click',function(event){
    var itemClicado = event.target;
    
    //SE CLICAR NA FOTO
    if(itemClicado.className=='formulario__imagem formulario__imagem-ativo'){
      background = event.target.style.backgroundImage;
      caminho = background.substr(5,(background.length - 7));
      mostrarImagem(caminho);
      acionaMostra();
    }
    //SE CLICAR NO DELETE
    else if(itemClicado.className=='formulario__imagem-action icon icon__trash--white' || itemClicado.id=='deletar-foto-legend'){
      dados = new Object();
      if(itemClicado.id=='deletar-foto-legend'){
        dados.codigoFoto = itemClicado.parentNode.parentNode.children[0].textContent;
        dados.extensaoFoto = itemClicado.parentNode.parentNode.children[1].textContent;
      }else{
        dados.codigoFoto = itemClicado.parentNode.children[0].textContent;
        dados.extensaoFoto = itemClicado.parentNode.children[1].textContent;
      }
      
      acaoAjax('excluir','imagem',dados);
      

    }

    //SE CLICAR NO ADICIONAR
    else if(itemClicado.id=='input-foto' || itemClicado.id=="inserir-foto-legend"){
    }
    
    
  })
}