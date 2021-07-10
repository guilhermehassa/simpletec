var toggleOpcoesLista = document.querySelector('.lista__corpo-td-menu');
var corpoTabela = document.querySelector('.lista__corpo');



corpoTabela.addEventListener("click",function(event){

  //FOTO
  var itemClicado = event.target;
  var clicado = event.target.className;
  var linha = event.target.parentNode;

  //SE CLICAR NO ICONE MENU
  if(clicado == 'lista__corpo-td lista__corpo-td-menu icon icon__options--black'){
    var menuOpcoes = itemClicado.querySelector('.opcoes-lista');
    if(menuOpcoes.className == 'opcoes-lista opcoes-lista-ativo'){
      resetarMenusOpcoes();
    }else{
      resetarMenusOpcoes();
      abrirMenuOpcoes(linha);
    }
  }
  else if(clicado == 'lista__corpo-img'){
    mostrarImagem(event.target.src);
  }
  else if(event.target.id=='opcao_lista'){
    chamaAcao(itemClicado);
  }


});

